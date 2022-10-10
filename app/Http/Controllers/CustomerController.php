<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function download()
    {
        $date = date("d-m-y-");
        $date .= time();
        $path = public_path('csv/'. $date .'.csv');
        $fp = fopen($path, 'w+');
        $customers = Customer::all();

        $list = ';id;naam;E-mail;Tel;adres;stad' . "\r\n";

        foreach($customers as $customer) {
            $list .= ';' . $customer['id'] . ';' . $customer['name'] . ';' . $customer['email'] . ';' . $customer['tel_number'] . ';' . $customer['adress'] . ';' . $customer['city'] . "\r\n";
        }

        fwrite($fp, $list);
        fclose($fp);

        if(file_exists($path)) {

            //Define header information
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header("Cache-Control: no-cache, must-revalidate");
            header("Expires: 0");
            header('Content-Disposition: attachment; filename="'.basename($path).'"');
            header('Content-Length: ' . filesize($path));
            header('Pragma: public');
            
            //Clear system output buffer
            flush();
            
            //Read the size of the file
            readfile($path);
        }
        unlink($path);
    }
}
