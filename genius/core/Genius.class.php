<?php
    class Genius {
        protected  $loader;

        public static function run() {
            // echo "run()";
            self::init();
            self::autoload();
            self::dispatch();
        }

        public static function init() {
            // Initiate Function
            
            // Define path constants
            define("DS", DIRECTORY_SEPARATOR);
            define("ROOT", getcwd() . DS);
            define("APP_PATH", ROOT . 'application' . DS);
            define("FRAMEWORK_PATH", ROOT . "genius" . DS);
            define("PUBLIC_PATH", ROOT . "public" . DS);
            define("CONFIG_PATH", APP_PATH . "config" . DS);
            define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);
            define("MODEL_PATH", APP_PATH . "models" . DS);
            define("VIEW_PATH", APP_PATH . "views" . DS);
            define("CORE_PATH", FRAMEWORK_PATH . "core" . DS);
            define('DB_PATH', FRAMEWORK_PATH . "database" . DS);
            define("LIB_PATH", FRAMEWORK_PATH . "libraries" . DS);
            define("HELPER_PATH", FRAMEWORK_PATH . "helpers" . DS);
            define("UPLOAD_PATH", PUBLIC_PATH . "uploads" . DS);
            
            // Define platform, controller, action, for example:
            // index.php?c=Goods&a=add
            define("PLATFORM", isset($_REQUEST['p']) ? $_REQUEST['p'] : '');
            define("CONTROLLER", isset($_REQUEST['c']) ? $_REQUEST['c'] : 'Index');
            define("ACTION", isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index');
            
            define("CURRENT_CONTROLLER_PATH", CONTROLLER_PATH . PLATFORM . DS);
            define("CURRENT_VIEW_PATH", VIEW_PATH);
            
            // Load core classes
            require CORE_PATH . "Controller.class.php";
            require CORE_PATH . "Loader.class.php";
            require DB_PATH . "Database.class.php";
            require CORE_PATH . "Model.class.php";

            // Load configuration file
            $GLOBALS['config'] = include CONFIG_PATH . "config.php";
            
            // Start session
            session_start();
        }

        public static function autoload() {
            // Autoload Function
            spl_autoload_register(array(__CLASS__,'load'));
        }

        public static function dispatch() {
            // Instantiate the controller class and call its action method
            $controller_name = CONTROLLER . "Controller";
            $action_name = ACTION . "Action";
            $controller = new $controller_name;
            $controller->$action_name();
        }

        private static function load($class) {
            // This function autoload app’s controller and model classes
            if (substr($class, -10) == "Controller") {
                // Controller
                require_once CURRENT_CONTROLLER_PATH . "$class.class.php";
            } elseif (substr($class, -5) == "Model") {
                // Model
                require_once  MODEL_PATH . "$class.class.php";
            }
        }

        /*
        function directRestrict() {
            if(!isset($_SERVER['HTTP_REFERRER'])) {
                die("Direct Access to this page is not allowed");
            }
        }
        */
    }
?>