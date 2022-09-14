<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;
use Symfony\Component\VarDumper\VarDumper;

class commitebyrepoController extends Controller
{
    //
    public function  commites(Request $req){
        // return view("hellp");
       $selectedProjectid = $_POST['ben'];
       $idnumber= $selectedProjectid[21] .$selectedProjectid[22]  ;
       $token = '7FaqSoLzAZtFzuxFj7Fs';
       header('Content-Type: application/json'); // Specify the type of data
       $endpoint='http://10.10.10.100/api/v4/projects//jobs';
       $newstr = substr_replace($endpoint, $idnumber,36 , 0);
       $ch = curl_init($newstr); // Initialise cU RL
       $authorization = "Authorization: Bearer " .$token; // Prepare the authorisation token
       curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization )); // Inject the token into the header
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_HTTPGET, 1);
       $result = curl_exec($ch); // Execute the cURL statement
       curl_close($ch); // Close the cURL connection
    //    return json_decode($result); // Return the received data
        // var_dump(json_decode($result, true));
        $finaljson = json_decode($result , true);
        // echo $finaljson[0]['id'];
        return view('Commite' , compact('finaljson' , 'idnumber'));

        
        // var_dump($finaljson);
    }


    public function  showCommitsofFormationTest(Request $req){
        // return view("hellp");
       $selectedProjectid = $_POST['ben'];
       $idnumber= $selectedProjectid[21] .$selectedProjectid[22]  ;
    //    echo $idnumber;
       $token = '7FaqSoLzAZtFzuxFj7Fs';
       header('Content-Type: application/json'); // Specify the type of data
       $endpoint='http://10.10.10.100/api/v4/projects//jobs';
       $newstr = substr_replace($endpoint, $idnumber,36 , 0);
       $ch = curl_init($newstr); // Initialise cU RL
       $authorization = "Authorization: Bearer " .$token; // Prepare the authorisation token
       curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization )); // Inject the token into the header
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_HTTPGET, 1);
       $result = curl_exec($ch); // Execute the cURL statement
       curl_close($ch); // Close the cURL connection
    //    return json_decode($result); // Return the received data
        // var_dump(json_decode($result, true));
        $finaljson = json_decode($result , true);
        // echo $finaljson[0]['status'];
        return view('FtestCommites' , compact('finaljson' , 'idnumber'));

        
        // var_dump($finaljson);
    }
   
}
