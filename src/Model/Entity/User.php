<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

class User extends Entity{

    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    //on modifie le setter par defaut pour qu'il hashe le mot de passe automatiquement
    public function _setPassword(string $s) : ?string {
        if(strlen($s) > 0)
            return (new DefaultPasswordHasher())->hash($s);
    }






}
