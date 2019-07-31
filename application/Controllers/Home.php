<?php

namespace Controllers;

use Models\Example;
use Models\ExampleORM;
use CorgiMVC;

class Home
{
    public function index($corgi)
    {
        $example = new Example;

        // Get record by ID
        $exampleORM = ExampleORM::loadWithId(1)->test();

        $data = array(
            "exampleModel" => $example->text(),
            "exampleORM" => $exampleORM,
            "exampleURL" => isSet($corgi[0]) ? $corgi[0] : '',
        );

        return CorgiMVC::getView($data);
    }

}
