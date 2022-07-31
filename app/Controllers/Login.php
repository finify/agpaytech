<?php

namespace App\Controllers;

class Login extends \Controller
{
    public function __construct($controller, $action){
        parent::__construct($controller, $action);
    }

    public function indexAction(){
        $db = \DB::getInstance();
        $find_fields = [
            'conditions'=> "admin_username = ?",
            'bind' => ['admin1'],
            'order' => 'admin_username',
            'limit' => 5
        ];

        $found = $db->find('rx_admin', $find_fields);
           
        
        dnd($found);

        $this->view->setLayout('Loginlayout');
        $this->view->render('Login/index');
    }
}

?>