<?php

namespace Models;

use aphp\XPDO\Model;

class ExampleORM extends Model {

    public $id;
    public $text;

    function test() {
        return $this->text;
    }

}