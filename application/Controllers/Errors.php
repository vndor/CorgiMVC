<?php

namespace Controllers;

use CorgiMVC;

class Errors
{
    public function Error404($corgi)
    {
        return CorgiMVC::getView();
    }

}
