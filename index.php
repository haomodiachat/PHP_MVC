<?php
   session_start();
   //lấy được thư mục mẹ của đường dẫn vật lý trên ổ đĩa của file hiện tại
    $site_path = dirname(__FILE__);
    //define kiểm  tra hằng đó có tồn tại hay không
    define('SITE_PATH', $site_path);
    define('IS_ADMIN',0);
    define('APP_PATH', SITE_PATH.'/app');
    define('CONTROLLER_PATH', SITE_PATH.'/app/controllers');
    define('MODEL_PATH', SITE_PATH.'/app/models');
    define('VIEW_PATH', SITE_PATH.'/app/view');
    define('CORE_PATH', SITE_PATH.'/core');
    define('DB_PATH', SITE_PATH.'/core/database');
    define('HELPER_PATH', SITE_PATH.'/core/helper');
    define('URL', 'http://localhost:8080/PHP_MVC/');
    define('URL_ASSETS', URL.'assets/');

    spl_autoload_register(function ($class_name) {

        /*tôi là sql autoload đây
         * tôi sẽ được chạy ngay khi bạn khởi tạo
         * một class hoặc bạn sử dụng hàm class_exits()
         * */


        $class_file = $class_name . '.php';

        $paths = array(CONTROLLER_PATH, MODEL_PATH, VIEW_PATH, CORE_PATH, DB_PATH, HELPER_PATH);
        if (is_array($paths) && count($paths)) {
            foreach ($paths as $path) {
                $class_file_path = $path . '/' . $class_file;

                if (file_exists($class_file_path)) {
                    require $class_file_path;
                }
            }

        }
    });


    $controller = isset($_REQUEST["controller"]) ? $_REQUEST["controller"] : 'index';

    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : 'index';

    //chuyển chữ hoa thành chữ thường
    $controller = strtolower($controller);
    $action = strtolower($action);

    $controllerClass = $controller.'Controller';
    $actionName = $action.'Action';



    echo "tên class controller:" .$controllerClass ;
    echo "<br>tên action:" .$actionName ;

    if(class_exists($controllerClass)) {
        //class controller có tồn tại
        $instanceController = new $controllerClass();

        if(method_exists($instanceController, $actionName)) {
            $instanceController->$actionName();
        }
        else {
            $instanceController->indexAction();
        }
    }
    else {
        $controllerClass = 'errorController';
        $instanceController= new $controllerClass();
        $instanceController -> indexAction();

    }










