<?php

namespace App\Models;

class Uploadcurrencies extends \Model
{
    public $table_name = 'currencies';
    
    public function __construct($user = ''){
        $table = 'contries';
        parent::__construct($table);
    }

    public function findByIso_code($iso_code){
        return $this->_db->findFirst('currencies',['conditions'=>' iso_code = ?', 'bind'=>[$iso_code]]);
    }

    public function insertRows($fields) {
        return $this->_db->insert($this->table_name, $fields);
    }

    public function updateRows($fields,$col_name , $col_value) {
        
        return $this->_db->updateCol($this->table_name, $col_name, $col_value,$fields);
    }


}

?>