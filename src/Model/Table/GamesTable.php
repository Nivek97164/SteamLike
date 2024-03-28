<?php
// File: src/Model/Table/GamesTable.php

namespace App\Model\Table;

use Cake\ORM\Table;

class GamesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        // Nom de la table dans la base de données
        $this->setTable('games');

        // Clé primaire de la table
        $this->setPrimaryKey('id');

        // Définir les associations avec d'autres tables si nécessaire
    }
}