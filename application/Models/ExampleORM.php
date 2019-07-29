<?php

namespace Models;

use Ark\Database\Model;

class ExampleORM extends Model {

    static public function config() {
        return array(
            'table' => 'ExampleORM',
            'pk' => 'id',
        );
    }

}