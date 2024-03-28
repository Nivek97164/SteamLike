<?php
declare(strict_types=1);

namespace App\Controller;

class GamesController extends AppController
{
    public function index(){
        $games = $this->paginate($this->Games);

        $this->set(compact('games'));
    }

}