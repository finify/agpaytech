<?php 

class Router
{
    static $queryParams = [];
    public static function route($url)
    {
        //controller
        $controller = (isset($url[0]) && $url[0] != '')? ucwords($url[0]): DEFAULT_CONTROLLER;
        $controller_name = '\App\Controllers\\'. $controller ;
        array_shift($url);

        //action
        $action = (isset($url[0]) && $url[0] != '')? $url[0].'Action': 'indexAction';
        $action_name = $action;
        array_shift($url); 
        
        //params
        self::$queryParams = $url;

       
        

        
        if(class_exists($controller_name)){
            $dispatch = new $controller_name($controller, $action);
            call_user_func_array([$dispatch, $action], self::$queryParams);
        }else{
            // Router::redirect('');
            die('That method does not exist in the controller\"'. $controller_name. '\"');
        }
 
    }

    public static function redirect($location){
        if(!headers_sent()){
            header('Location: '.PROOT.$location);
            exit();
        }else{
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.PROOT.$location.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$location.'" />';
            echo '</noscript>'; exit;
        }
    }
} 