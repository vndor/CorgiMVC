<?php

use vndor\XPDO\Database;

class CorgiMVC
{
    
    public function loadFramework() 
    {
        $this->autoLoader();
        $this->connection();

        if (CONFIG_SESSIONS['enable']) {
            session_start();
        }

        $parameters = $this->getURLParameters();
        $GLOBALS['parameters'] = $parameters;

        if (!in_array($parameters['folder'], CONFIG_PUBLIC)) {
            $controller_path = "Controllers\\{$parameters['controller']}";

            if (class_exists($controller_path) && method_exists($controller_path, $parameters['method'])) {
                $page = new $controller_path();
                $page->{$parameters['method']}($parameters['params']);   
            } else {
                header("HTTP/1.0 404 Not Found");
                $this->redirect(CONFIG_ERRORS['404_Page']);
            }
        }

    }

    private function autoLoader() 
    {
        // autoload classes based on a 1:1 mapping from namespace to directory structure.
        spl_autoload_register(function ($className) {

            // Usually I would just concatenate directly to $file variable below
            // this is just for easy viewing on Stack Overflow)
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

    public function getURLParameters()
    {
        // Break out the params and remove unneeded values
        $params = $_SERVER['REQUEST_URI'];
        $params_array = explode("/", $params);
        $folder = isSet($params_array[1]) ? $params_array[1] : "index";
        unset($params_array[0]);
        unset($params_array[1]);
        $params_array = array_values($params_array);

        // Get the controller param, or default to home
        if (isSet($params_array[0]) && strlen($params_array[0])) {
            $controller_param = $params_array[0] . "Controller";
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
            "controller" => ucfirst($controller_param),
            "method" => strtolower($method_param),
            "params" => $params_array,
            "folder" => $folder
        );
    }

    public static function getView($with='', $layout='default') 
    {
        $corgi = $with;
        $params = $GLOBALS['parameters'];
        $params['controller'] = str_replace("Controller", "", $params['controller']);
        $viewBody = CORGI['application'] . 'Views' . DIRECTORY_SEPARATOR . $params['controller'] . DIRECTORY_SEPARATOR . $params['method'] . '.php';
        require_once CORGI['application'] . 'Layouts' . DIRECTORY_SEPARATOR . $layout . DIRECTORY_SEPARATOR . 'default.php';
    }

    public static function redirect($url) {
        header('Location: ' . $url);
    }

    public static function connection() {

        if (CONFIG_CONNECTION['type'] == "mysql") {
            $db = Database::getInstance();
            $db->MySQLInit(
                CONFIG_CONNECTION['username'],
                CONFIG_CONNECTION['password'],
                CONFIG_CONNECTION['dbname'],
                CONFIG_CONNECTION['host']
            );
        } else if (CONFIG_CONNECTION['type'] == "sqlite") {
            $db = Database::getInstance();
            $db->SQLiteInit(CONFIG_CONNECTION['path']);
        }
        
        return $db;
    }

    public static function createPage($page) {
        $page = ucfirst($page);
        $controller_content = "<?php

namespace Controllers;

use CorgiMVC;

class {$page}Controller
{
    public function index(\$corgi)
    {
        return CorgiMVC::getView();
    }
}";
        file_put_contents("./application/Controllers/{$page}Controller.php", $controller_content);
        mkdir("./application/Views/{$page}");
        file_put_contents("./application/Views/{$page}/index.php", "");
    }

    public static function createModel($name) {
        $name = ucfirst($name);
        $model_content = "<?php

namespace Models;

use vndor\XPDO\Model;

class {$name} extends Model {

    public \$id;

    static function tableName() 
    {
        return '';
    }

}";
        file_put_contents("./application/Models/{$name}.php", $model_content);
    }

    public static function cli($argv) {
        $command = isSet($argv[1]) ? $argv[1] : "";

        switch ($command) {
            case "create:page":
                $page = isSet($argv[2]) ? $argv[2] : "";

                if (strlen($page)) {
                    Self::createPage($page);
                    echo "{$page} Controller and View created.";
                } else {
                    echo "create:page <page_name> : Creates a new controller and view for a page.";
                }
                break;
            case "create:model":
                $model = isSet($argv[2]) ? $argv[2] : "";

                if (strlen($model)) {
                    Self::createModel($model);
                    echo "{$model} Model created.";
                } else {
                    echo "create:model <model_name> : Creates a new model.";
                }
                break;
            default:
                echo "Commands are:";
                echo "\n - create:page <page_name> : Creates a new controller and view for a page.";
                echo "\n - create:model <model_name> : Creates a new model.";
        }
    }
}