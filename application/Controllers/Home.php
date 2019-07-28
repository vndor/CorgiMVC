<?php

namespace Controllers;

use Models\Cat;
use Models\Dog;

class Home extends Controller
{
    public function index($corgi)
    {
        $cat = new Cat;
        $dog = new Dog;

        $data = array(
            "cat" => $cat->test(),
            "dog" => $dog->test()
        );

        return $this->getView($data);
    }

}
