<?php

namespace controllers;

use Models\Cat;

class Home
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index($corgi)
    {
        $cat = new Cat;
        // load views
        /*
        require APP . 'views/_templates/header.php';
        require APP . 'views/home/index.php';
        require APP . 'views/_templates/footer.php';
        */
    }

}
