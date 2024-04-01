<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Table\BadgesTable;

class GamesController extends AppController
{
    public function index(){
        $games = $this->paginate($this->Games);

        $this->set(compact('games'));
    }

    public function add()
    {
        $game = $this->Games->newEmptyEntity();
        if ($this->request->is('post')) {
            $game = $this->Games->patchEntity($game, $this->request->getData(), ['associated' => ['Badges']]);
            if ($this->Games->save($game, ['associated' => ['Badges']])) {
                $this->Flash->success(__('The game with achievements has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The game could not be saved. Please, try again.'));
        }
        $this->set(compact('game'));
    }

    public function view($id = null)
    {
        /*$game = $this->Games->get($id);

        $this->set(compact('game'));*/

        $game = $this->Games->get($id);
    
        // Passer les données du jeu à la vue
        $this->set(compact('game'));

        if(empty($id)){
			$this->Flash->error('Impossible de trouver une vdeo sans numéro');
			return $this->redirect(['action' => 'index']);
		}

        $game = $this->Games->get($id); // Récupère le jeu spécifique
        $badgesTable = new BadgesTable(); // Crée une instance du modèle de table Badges
        $gameAchievements = $badgesTable->find()->where(['game_id' => $id])->toArray(); // Récupère les réalisations associées à ce jeu
    
        $this->set(compact('game', 'gameAchievements'));

    }

    public function edit($id = null)
    {
        $game = $this->Games->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $game = $this->Games->patchEntity($game, $this->request->getData());
            if ($this->Games->save($game)) {
                $this->Flash->success(__('The game has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The game could not be saved. Please, try again.'));
        }
        $this->set(compact('game'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $game = $this->Games->get($id);
        if ($this->Games->delete($game)) {
            $this->Flash->success(__('The game has been deleted.'));
        } else {
            $this->Flash->error(__('The game could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}