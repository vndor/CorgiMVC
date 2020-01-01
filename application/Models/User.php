<?php

namespace Models;

use aphp\XPDO\Model;
use Models\Role;

class User extends Model {

    public $id;
    public $username;

    static function tableName() 
    {
        return 'users';
    }

    public function role()
    {
        return Role::loadWithId($this->roleid);
    }

}