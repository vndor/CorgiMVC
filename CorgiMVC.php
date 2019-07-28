<?php

class CorgiMVC
{

    function __construct() {
        $this->autoLoader();
        $parameters = $this->getURLParameters();
        $GLOBALS['parameters'] = $parameters;

        $controller_path = "Controllers\\{$parameters['controller']}";

        if (class_exists($controller_path) && method_exists($controller_path, $parameters['method'])) {
            $page = new $controller_path();
            $page->{$parameters['method']}($parameters['params']);   
        } else {
            header("HTTP/1.0 404 Not Found");
            $this->redirect(CONFIG_ERRORS['404_Page']);
        }

    }

    private function autoLoader() {
        // autoload classes based on a 1:1 mapping from namespace to directory structure.
        spl_autoload_register(function ($className) {

            # Usually I would just concatenate directly to $file variable below
            # this is just for easy viewing on Stack Overflow)
                $ds = DIRECTORY_SEPARATOR;
                $dir = CORGI['application'];

            // replace namespace separator with directory separator (prolly not required)
                $className = str_replace('\\', $ds, $className);

            // get full name of file containing the required class
                $file = "{$dir}{$ds}{$className}.php";

            // get file if it is readable
                if (is_readable($file)) require_once $file;
        });
    }

    private function getURLParameters()
    {
        // Break out the params and remove unneeded values
        $params = $_SERVER['REQUEST_URI'];
        $params_array = explode("/", $params);
        unset($params_array[0]);
        unset($params_array[1]);
        $params_array = array_values($params_array);

        // Get the controller param, or default to home
        if (isSet($params_array[0]) && strlen($params_array[0])) {
            $controller_param = $params_array[0];
        } else {
            $controller_param = CONFIG_HOME_VIEW['controller'];
        }

        // Get the method param, or default to index
        if (isSet($params_array[1]) && strlen($params_array[1])) {
            $method_param = $params_array[1];
            
        } else {
            $method_param = CONFIG_HOME_VIEW['method'];
        }

        unset($params_array[0]);
        unset($params_array[1]);
        $params_array = array_values($params_array);

        return array(
            "controller" => $controller_param,
            "method" => $method_param,
            "params" => $params_array
        );
    }

    public static function getView($with='', $layout='default') {
        $corgi = $with;
        $params = $GLOBALS['parameters'];
        $viewBody = CORGI['application'] . 'Views' . DIRECTORY_SEPARATOR . $params['controller'] . DIRECTORY_SEPARATOR . $params['method'] . '.php';
        require_once CORGI['application'] . 'Layouts' . DIRECTORY_SEPARATOR . $layout . DIRECTORY_SEPARATOR . 'default.php';
    }

    public static function redirect($url) {
        header('Location: ' . $url);
    }

}