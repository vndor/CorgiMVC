<?php

namespace Controllers;

use Models\Example;
use CorgiMVC;

class Home
{
    public function index($corgi)
    {
        $example = new Example;

        $data = array(
            "exampleModel" => $example->text(),
            "exampleURL" => isSet($corgi[0]) ? $corgi[0] : '',
        );

        return CorgiMVC::getView($data);
    }

}
