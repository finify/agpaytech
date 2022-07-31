<?php

use App\Controllers\Home;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class CsvuploadTest extends \PHPUnit\Framework\TestCase 
{
    /** @test */
    public function testCountriesUpload(){

        //given that we have a home controller
        $home = new Home('home','index');

        \dnd($home);
        $testfile = ROOT.'\coutries.csv';

        $_FILES['csv_file'] = $testfile;

        
        //When we call
        $uploaded = $home->uploadcurrenciesAction('currencies');

        //then we assert
        $this->assertEquals(true,$uploaded);

        
    }
}