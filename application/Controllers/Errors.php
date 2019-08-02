<?php

namespace Controllers;

use CorgiMVC;

class Errors
{
    public function error404($corgi)
    {
        return CorgiMVC::getView();
    }

}
