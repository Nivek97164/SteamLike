<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Game extends Entity{
    
    protected $_accessible = [
        'title' => true,
        'description' => true,
        'studio' => true,
        'releaseyears' => true,
        'genre' => true,
        'created' => true,
        'modified' => true,
    ];

}

class Badge extends Entity{
    
    protected $_accessible = [
        'game_id' => true,
        'achievementname' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
    ];

}