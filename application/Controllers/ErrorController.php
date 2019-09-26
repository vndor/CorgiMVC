<?php

namespace Controllers;

use CorgiMVC;

class ErrorController
{
    public function error404($corgi)
    {
        return CorgiMVC::getView();
    }

}
