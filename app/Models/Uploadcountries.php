<?php

namespace App\Models;

class Uploadcountries extends \Model
{
    public $table_name = 'countries';
    
    public function __construct($user = ''){
        $table = 'contries';
        parent::__construct($table);
    }

    public function findByIsoNumericCode($iso_numeric_code){
        return $this->_db->findFirst($this->table_name,['conditions'=>' iso_numeric_code = ?', 'bind'=>[$iso_numeric_code]]);
    }

    public function insertRows($fields) {
        return $this->_db->insert($this->table_name, $fields);
    }

    public function updateRows($fields, $col_name , $col_value) {
        
        return $this->_db->updateCol($this->table_name, $col_name, $col_value,$fields);
    }



}