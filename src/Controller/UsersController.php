<?php
declare(strict_types=1);

namespace App\Controller;

class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $e){
        parent::beforeFilter($e);

        //liste des actions possibles sans être connecté
        $this->Authentication->addUnauthenticatedActions(['login', 'signup']);

    }

    public function index(){
    }

    public function signup()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->level="user";
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function login(){
		$user = $this->Users->newEmptyEntity();

		if ($this->request->is('post')) {
			$result = $this->Authentication->getResult();
			// If the user is logged in send them away.
			if ($result->isValid()) {
				$target = $this->Authentication->getLoginRedirect() ?? '/';
				$this->Flash->success('Hello again !');
				return $this->redirect($target);
			}
			$this->Flash->error('Invalid username or password');
		}

		$this->set(compact('user'));
	}

	public function logout(){
		$this->Authentication->logout();
		$this->Flash->success('A bientôt !');
    	return $this->redirect(['controller' => 'Games', 'action' => 'index']);
	}
}
