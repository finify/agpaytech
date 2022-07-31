<?php 

namespace App\Controllers;


class Home extends \Controller
{
    public function __construct($controller, $action){
        parent::__construct($controller, $action);

        $this->load_model('Uploadcurrencies');
        $this->load_model('Uploadcountries');
    }

    public function indexAction(){
        $this->view->render('home/index');
    }

    public function uploadAction()
    {
        if($_POST){
                $csv_table = $_POST['csv_table'];
            if($csv_table == 1){
                $csv_table = "countries";
                $this->uploadcountriesAction($csv_table);
            }else{
                $csv_table = "currencies";
                $this->uploadcurrenciesAction($csv_table);
            }
        }else{
            $this->view->render('home/index');
        }
        
    }

    public function uploadcurrenciesAction($csv_table)
    {
        // Allowed mime types
        $fileMimes = array(
            'text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain'
        );

        // Validate whether selected file is a CSV file
        if (!empty($_FILES['csv_file']['name']) && in_array($_FILES['csv_file']['type'], $fileMimes))
        {
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['csv_file']['tmp_name'], 'r');

            // Skip the first line
            fgetcsv($csvFile);

            //variable to get the number of uploaded rows
            $row_uploaded = 0;
            $row_updated = 0;
            
            // Parse data from CSV file line by line
            while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
            {
                
                // Get row data
                $iso_code = $getData[0];
                $iso_numeric_code = $getData[1];
                $common_name = $getData[2];
                $official_name = $getData[3];
                $symbol = $getData[4];

                $fields = [
                    'iso_code' => $iso_code,
                    'iso_numeric_code' => $iso_numeric_code,
                    'common_name' => $common_name,
                    'official_name' => $official_name,
                    'symbol' => $symbol
                ];

                
                // If iso_code already exists in the database with the same iso_code;
                $iso_code_found = $this->UploadcurrenciesModel->findByIso_code($iso_code);

                if (!$iso_code_found) {
                    $rowinserted = $this->UploadcurrenciesModel->insertRows($fields);
                    if($rowinserted){
                        $row_uploaded++;
                    }
                }else{
                    $rowupdated = $this->UploadcurrenciesModel->updateRows($fields,'iso_code', $iso_code);
                    
                    if($rowupdated){
                        $row_updated++;
                    }
                }
                
               
               
            }
            
            $data = [
                'table_name'=> $csv_table,
                'status'=> true,
                'row_updated' => $row_updated,
                'row_uploaded' => $row_uploaded
            ];

            return true;
        }else{
            $data = [
                'error'=> true
            ];
        }
        
        // dnd($data);
        $this->view->render('home/index', $data);


    }


    public function uploadcountriesAction($csv_table)
    {
        
        // Allowed mime types
        $fileMimes = array(
            'text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain'
        );

        // Validate whether selected file is a CSV file
        if (!empty($_FILES['csv_file']['name']) && in_array($_FILES['csv_file']['type'], $fileMimes))
        {
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['csv_file']['tmp_name'], 'r');

            // Skip the first line
            fgetcsv($csvFile);

            //variable to get the number of uploaded rows
            $row_uploaded = 0;
            $row_updated = 0;
            
            // Parse data from CSV file line by line
            while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
            {
                
                // Get row data
                $continent_code = $getData[0];
                $currency_code = $getData[1];
                $iso2_code = $getData[2];
                $iso3_code = $getData[3];
                $iso_numeric_code = $getData[4];
                $fips_code = $getData[5];
                $calling_code = $getData[6];
                $common_name = $getData[7];
                $official_name = $getData[8];
                $endonym = $getData[9];
                $demonym = $getData[10];

                $fields = [
                    'continent_code' => $continent_code,
                    'currency_code' => $currency_code,
                    'iso2_code' => $iso2_code,
                    'iso3_code' => $iso3_code,
                    'iso_numeric_code' => $iso_numeric_code,
                    'fips_code' => $fips_code,
                    'calling_code' => $calling_code,
                    'common_name' => $common_name,
                    'official_name' => $official_name,
                    'endonym' => $endonym,
                    'demonym' => $demonym,
                ];

                
                // If iso_code already exists in the database with the same iso_code;
                $iso_code_found = $this->UploadcountriesModel->findByIsoNumericCode($iso_numeric_code);

                if (!$iso_code_found) {
                    $rowinserted = $this->UploadcountriesModel->insertRows($fields);
                    if($rowinserted){
                        $row_uploaded++;
                    }
                }else{
                    $rowupdated = $this->UploadcountriesModel->updateRows($fields,'iso_numeric_code', $iso_numeric_code);
                    if($rowupdated){
                        $row_updated++;
                    }
                }
                
               
               
            }
            
            $data = [
                'table_name'=> $csv_table,
                'status'=> true,
                'row_updated' => $row_updated,
                'row_uploaded' => $row_uploaded
            ];
        }else{
            $data = [
                'error'=> true
            ];
        }

        $this->view->render('home/index', $data);


    }
}