<?php

namespace Models;

use vndor\XPDO\Model;
use Models\User;

class Role extends Model {

    public $id;
    public $name;

    static function tableName() 
    {
        return 'roles';
    }

    public function users()
    {
        return User::loadWithField('role_id', $this->id);
    }

}