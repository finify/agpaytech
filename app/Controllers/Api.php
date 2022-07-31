<?php 

namespace App\Controllers;


class Api extends \Controller
{
    public function __construct($controller, $action){
        parent::__construct($controller, $action);
        $this->load_model('Getcountries');
        $this->load_model('Getcurrencies');
        $this->load_model('Searchcountries');
        $this->load_model('Searchcurrencies');
    }

    public function indexAction(){
        $this->view->render('home/index');
    }

    public function getcountriesAction(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        if(\Router::$queryParams === []){
            \Router::$queryParams[0] = 1;
        }elseif(!is_numeric(\Router::$queryParams[0])){
            \Router::$queryParams[0] = 1;
        }
        $results = $this->GetcountriesModel->getCountriesData(\Router::$queryParams[0]);

        echo $results;
    }

    public function getcurrenciesAction(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        if(\Router::$queryParams === []){
            \Router::$queryParams[0] = 1;
        }elseif(!is_numeric(\Router::$queryParams[0])){
            \Router::$queryParams[0] = 1;
        }
        $results = $this->GetcurrenciesModel->getCurrenciesData(\Router::$queryParams[0]);

        echo $results;
    }

    public function searchcurrenciesAction(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        if(\Router::$queryParams === []){
            echo "Please input a valid search query";
        }elseif(!is_numeric(\Router::$queryParams[1])){
            $search_term = \Router::$queryParams[0];
            $search_page = 1;
        }else{
            $search_term = \Router::$queryParams[0];
            $search_page = \Router::$queryParams[1];
        }
        $results = $this->SearchcurrenciesModel->searchCurrenciesData($search_term,$search_page);

        echo $results;
    }

    public function searchcountriesAction(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        if(\Router::$queryParams === []){
            echo "Please input a valid search query";
        }elseif(!is_numeric(\Router::$queryParams[1])){
            $search_term = \Router::$queryParams[0];
            $search_page = 1;
        }else{
            $search_term = \Router::$queryParams[0];
            $search_page = \Router::$queryParams[1];
        }
        $results = $this->SearchcountriesModel->searchCountriesData($search_term,$search_page);

        echo $results;
    }



}

?>