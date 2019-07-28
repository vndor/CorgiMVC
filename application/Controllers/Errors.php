<?php

namespace Controllers;

class Errors extends Controller
{
    public function Error404($corgi)
    {
        return $this->getView();
    }

}
