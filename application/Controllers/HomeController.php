<?php

namespace Controllers;

use CorgiMVC;

class HomeController
{
    public function index($corgi)
    {
        return CorgiMVC::getView();
    }

    public function dashboard($corgi)
    {
        if (!isSet($_SESSION["user"])) {
            CorgiMVC::redirect(CORGI['http'] . 'index.php/auth');
        }

        $data = [
            'user' => $_SESSION["user"]
        ];

        return CorgiMVC::getView($data);
    }

}
