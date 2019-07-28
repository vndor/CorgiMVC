<?php

namespace Controllers;

class Controller
{
    /* This includes all of the controller helper methods */

    public function getView($with='', $layout='default') {
        $corgi = $with;
        $params = $GLOBALS['parameters'];
        $viewBody = CORGI['application'] . 'Views' . DIRECTORY_SEPARATOR . $params['controller'] . DIRECTORY_SEPARATOR . $params['method'] . '.php';
        require_once CORGI['application'] . 'Layouts' . DIRECTORY_SEPARATOR . $layout . DIRECTORY_SEPARATOR . 'default.php';
    }

}
