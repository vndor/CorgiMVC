<?php

namespace Models;

use aphp\XPDO\Model;
use Models\User;

class Role extends Model {

    public $id;
    public $name;

    static function tableName() 
    {
        return 'Roles';
    }

    public function users()
    {
        return User::loadWithField('roleid', $this->id);
    }

}