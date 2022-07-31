<?php

namespace App\Models;

class Searchcountries extends \Model
{
    public $table_name = 'countries';
    
    public function __construct($user = ''){
        $table = 'countries';
        parent::__construct($table);
    }

    public function searchCountriesData($search_term,$param)
    {
        $current_page = intval($param);
      
        $per_page = 10;

        $countries_arr = [];
        $countries_arr['pagination'] = [];
        $countries_arr['data'] = [];
         
        $sql = "SELECT * FROM {$this->table_name} WHERE official_name LIKE :keyword ORDER BY official_name";
        
        if($this->_db->searchquery($sql,$search_term)){
            $total_rows = $this->_db->count();
            $offset = ($current_page - 1) * $per_page;
            $pages = floor($total_rows / $per_page);

            $pagination_field = [
                'total_rows'=>  $total_rows,
                'no of_rows_per _age'=>  $per_page,
                'current_page'=>  $current_page
            ];
            $countries_arr['pagination'] = $pagination_field;

            $sql = "SELECT * FROM {$this->table_name}  WHERE official_name LIKE :keyword ORDER BY official_name LIMIT $offset, $per_page";
            if($this->_db->searchquery($sql,$search_term)){
                $countries_arr['data'] = $this->_db->results();

                //turn to json
                return json_encode($countries_arr);
            }
        }


    }

}