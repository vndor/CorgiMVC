<?php

namespace Controllers;

use Models\Example;
use CorgiMVC;

class Home
{
    public function index($corgi)
    {
        $example = new Example;

        // Create Factory
        $factory = CorgiMVC::connection()->factory('Models\ExampleORM');
        // Get record by ID
        $exampleORM = $factory->find(1);

        $data = array(
            "exampleModel" => $example->text(),
            "exampleORM" => $exampleORM->text,
            "exampleURL" => isSet($corgi[0]) ? $corgi[0] : '',
        );

        return CorgiMVC::getView($data);
    }

}
