<?php

namespace App\Models;

class Getcurrencies extends \Model
{
    public $table_name = 'currencies';
    
    public function __construct($user = ''){
        $table = 'currencies';
        parent::__construct($table);
    }

    public function getCurrenciesData($param)
    {
        $current_page = intval($param);
      
        $per_page = 10;

        $currencies_arr = [];
        $currencies_arr['pagination'] = [];
        $currencies_arr['data'] = [];
         

        $sql = "SELECT * FROM {$this->table_name}";
        if($this->_db->query($sql)){
            $total_rows = $this->_db->count();
            $offset = ($current_page - 1) * $per_page;
            $pages = floor($total_rows / $per_page);

            $pagination_field = [
                'total_rows'=>  $total_rows,
                'no of_rows_per _age'=>  $per_page,
                'current_page'=>  $current_page
            ];
            $currencies_arr['pagination'] = $pagination_field;

            $sql = "SELECT * FROM {$this->table_name} LIMIT $offset, $per_page";
            if($this->_db->query($sql)){
                $currencies_arr['data'] = $this->_db->results();

                //turn to json
                return json_encode($currencies_arr);
            }
        }


    }

}