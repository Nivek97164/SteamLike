<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class BadgesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        // Nom de la table associée dans la base de données
        $this->setTable('badges');
        $this->addBehavior('Timestamp');

        // Définir l'association avec le modèle des jeux
        $this->belongsTo('Games', [
            'foreignKey' => 'game_id', // Clé étrangère dans la table Badges faisant référence à la table Games
            'joinType' => 'INNER' // Type de jointure (INNER, LEFT, RIGHT, etc.)
        ]);
    }
}