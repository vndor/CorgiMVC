<?php

namespace Controllers;

use CorgiMVC;

class Home
{
    public function index($corgi)
    {
        return CorgiMVC::getView();
    }

    public function dashboard($corgi)
    {
        if (!isSet($_SESSION["user"])) {
            CorgiMVC::redirect('/index.php/login');
        }

        $data = [
            'user' => $_SESSION["user"]
        ];

        return CorgiMVC::getView($data);
    }

}
