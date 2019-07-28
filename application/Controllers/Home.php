<?php

namespace Controllers;

use Models\Example;

class Home extends Controller
{
    public function index($corgi)
    {
        $example = new Example;

        $data = array(
            "exampleModel" => $example->text(),
            "exampleURL" => isSet($corgi[0]) ? $corgi[0] : '',
        );

        return $this->getView($data);
    }

}
