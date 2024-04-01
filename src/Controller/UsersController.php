<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

class UsersController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login', 'signup']);
    }

    public function pseudo()
{
    // Récupérer l'identifiant du pseudo à partir des paramètres d'URL
    $id = $this->request->getParam('pass.0');

    // Vérifier si l'identifiant du pseudo est présent
    if (!$id) {
        // Gérer le cas où l'identifiant du pseudo est manquant
        $this->Flash->error(__('User ID is missing.'));
        return $this->redirect(['action' => 'index']);
    }

    // Récupérer l'utilisateur correspondant à l'identifiant du pseudo
    $user = $this->Users->get($id);

    // Envoyer l'utilisateur à la vue
    $this->set(compact('user'));
}


    
    public function index()
    {
    }

    public function signup()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->level = "user";
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function login()
    {
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            $result = $this->Authentication->getResult();
            if ($result->isValid()) {
                $target = $this->Authentication->getLoginRedirect() ?? '/';
                $this->Flash->success('Hello again !');
                return $this->redirect($target);
            }
            $this->Flash->error('Invalid username or password');
        }

        $this->set(compact('user'));
    }

    public function logout()
    {
        $this->Authentication->logout();
        $this->Flash->success('A bientôt !');
        return $this->redirect(['controller' => 'Games', 'action' => 'index']);
    }
}
