<?php

use Illuminate\Support\Facades\Route;
use Http\Message\Authentication\Bearer;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('home'  , function(){
  return view('home');
});

Route::post('/loginme','loginController@login');
Route::get('/AutotestResult',function(){
  $client = \Softonic\GraphQL\ClientBuilder::build('http://10.10.10.100/api/graphql');

  $query = '
  query {
      group(fullPath: "kn2c-cicd") {
        id
        name
        projects {
          nodes {
            name
            id
          }
        }
      }
    }';
  
  
  $variables = [
      'Authorization: Bearer' => '7FaqSoLzAZtFzuxFj7Fs',
      'Content-Type' => 'application/json',
  ];
  $response = $client->query($query, $variables);
  $data = json_encode($response->getData());
    return view('Autotest' , compact('data'));
  // return view('Autotest');
});


Route::get('/testapi',function(){
    
    echo "hello";
    $client = \Softonic\GraphQL\ClientBuilder::build('http://10.10.10.100/api/graphql');

$query = '
query {
    group(fullPath: "mojtabamoazen") {
      id
      name
      projects {
        nodes {
          name
          id
        }
      }
    }
  }';


$variables = [
    'Authorization: Bearer' => '7FaqSoLzAZtFzuxFj7Fs',
    'Content-Type' => 'application/json',
];
$response = $client->query($query, $variables);
dd($response);
});




Route::post('commite'  , 'commitebyrepoController@commites');

Route::post('Ftestcommite'  , 'commitebyrepoController@showCommitsofFormationTest');


// will compare commie commit => jobId
Route::post('seeResultsofAutotest', function(Request $request){
  session_start();
  // print_r();
  // get information abouts commits and job
  $JobInformation =[];
  $i=0;
  foreach ($_SESSION['JobInformation'] as $key => $value) {
    # code...
    if($value['status']== 'success' and 
    $value['name']='make_result_artifact'){
      $JobInformation[$value['id']]['ComitTitle']=$value['commit']['title'];
      $JobInformation[$value['id']]['author_name']=$value['commit']['author_name'];
      $JobInformation[$value['id']]['branch']=$value['pipeline']['ref'];
    }
  }
  // print_r($JobInformation);
  // end get information 
 $projectIdNumber = $_POST['idnumber'];
 array_pop($_POST);
  $willCompareCommitsid= [];
  $index = 0 ;
   foreach( $_POST as $stuff => $val ) {
     if ($index !=0) {
       # code...
       array_push($willCompareCommitsid , [
         $stuff=>$val
       ]);
     }
     $index = $index +1;
}
$jobId=0;
$All_GameData=[];
foreach ($willCompareCommitsid as $key => $value) {
        foreach ($value as $commit => $jobIdnumber) {
          # code...
          $jobId=$jobIdnumber;
        }
        header('Content-Type: application/json'); 
        $endpoint='http://10.10.10.100/api/v4/projects//jobs//artifacts';
        $endpoint = substr_replace($endpoint, $projectIdNumber ,36 , 0);
        $endpoint = substr_replace($endpoint, $jobId ,44 , 0);
        $newstr = $endpoint;
        $token = '7FaqSoLzAZtFzuxFj7Fs';
        $ch = curl_init($newstr); 
        $zipFile ="Artifacts/".$jobId.".zip";
        $fp = fopen ("Artifacts/".$jobId.'.zip', 'w+');
        $authorization = "Authorization: Bearer " .$token;
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        $result = curl_exec($ch); 
        curl_close($ch);
        $zipp = new ZipArchive;
        $extractPath = "Artifacts/Raw";
        if($zipp->open($zipFile) != "true"){
        echo "Error :- Unable to open the Zip File";
        } 
        /* Extract Zip File */
        $zipp->extractTo($extractPath);
        $zipp->close();
        // json to data array 
        $Specific_GameDatadata = json_decode(file_get_contents('Artifacts/Raw/GameData.json'), true);
        $All_GameData[$jobId]=$Specific_GameDatadata;
}
// print_r($All_GameData);
// print_r('--------------------------------------');
// print_r($JobInformation);
return view('showResults' , compact('All_GameData'  , 'JobInformation'));

// two main array =>>>>>>>>> 1 = All_gamedata
// 2 ->  JobInformation
    // we now have all game data with job id 
    // and now we have all commits with job id 



 






}); 



Route::get('/FormationtestRepo',function(){
  $client = \Softonic\GraphQL\ClientBuilder::build('http://10.10.10.100/api/graphql');

  $query = '
  query {
      group(fullPath: "formation_test") {
        id
        name
        projects {
          nodes {
            name
            id
          }
        }
      }
    }';
  
  
  $variables = [
      'Authorization: Bearer' => '7FaqSoLzAZtFzuxFj7Fs',
      'Content-Type' => 'application/json',
  ];
  $response = $client->query($query, $variables);
  $data = json_encode($response->getData());
  // dd($data);
    return view('FOrmationTest' , compact('data'));
  // return view('Autotest');
});




// will compare commie commit => jobId
Route::post('seeResultsofFormationtest', function(Request $request){
  session_start();
  // print_r();
  // get information abouts commits and job
  $JobInformation =[];
  $i=0;
  foreach ($_SESSION['JobInformation'] as $key => $value) {
    # code...
    if($value['status']== 'success' and 
    $value['name']='Run_getResults'){
      $JobInformation[$value['id']]['ComitTitle']=$value['commit']['title'];
      $JobInformation[$value['id']]['author_name']=$value['commit']['author_name'];
      $JobInformation[$value['id']]['branch']=$value['pipeline']['ref'];
    }
  }
  // print_r($JobInformation);
  // end get information 
 $projectIdNumber = $_POST['idnumber'];
 array_pop($_POST);
  $willCompareCommitsid= [];
  $index = 0 ;
   foreach( $_POST as $stuff => $val ) {
     if ($index !=0) {
       # code...
       array_push($willCompareCommitsid , [
         $stuff=>$val
       ]);
     }
     $index = $index +1;
}
$jobId=0;
$All_GameData=[];
foreach ($willCompareCommitsid as $key => $value) {
        foreach ($value as $commit => $jobIdnumber) {
          # code...
          $jobId=$jobIdnumber;
        }
        header('Content-Type: application/json'); 
        $endpoint='http://10.10.10.100/api/v4/projects//jobs//artifacts';
        $endpoint = substr_replace($endpoint, $projectIdNumber ,36 , 0);
        $endpoint = substr_replace($endpoint, $jobId ,44 , 0);
        $newstr = $endpoint;
        $token = '7FaqSoLzAZtFzuxFj7Fs';
        $ch = curl_init($newstr); 
        $zipFile ="Artifacts/".$jobId.".zip";
        $fp = fopen ("Artifacts/".$jobId.'.zip', 'w+');
        $authorization = "Authorization: Bearer " .$token;
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        $result = curl_exec($ch); 
        curl_close($ch);
        $zip = new ZipArchive;
        $extractPath = "Artifacts/Raw";
        if($zip->open($zipFile) != "true"){
        echo "Error :- Unable to open the Zip File";
        } 
        /* Extract Zip File */
        $zip->extractTo($extractPath);
        $zip->close();
        // count .json
        $Specific_GameDatadata = json_decode(file_get_contents('Artifacts/Raw/KN2C_Fract19Norm.json'), true);
        $All_GameData[$jobId]['KN2C_Fract19Norm']=$Specific_GameDatadata;
        $Specific_GameDatadata = json_decode(file_get_contents('Artifacts/Raw/KN2C_Fract19T15.json'), true);
        $All_GameData[$jobId]['KN2C_Fract19T15']=$Specific_GameDatadata;
        $Specific_GameDatadata = json_decode(file_get_contents('Artifacts/Raw/KN2C_Fract19X170.json'), true);
        $All_GameData[$jobId]['KN2C_Fract19X170']=$Specific_GameDatadata;
        $Specific_GameDatadata = json_decode(file_get_contents('Artifacts/Raw/KN2C_Fract19X180.json'), true);
        $All_GameData[$jobId]['KN2C_Fract19X180']=$Specific_GameDatadata;
        $Specific_GameDatadata = json_decode(file_get_contents('Artifacts/Raw/KN2C_Fract19X57.json'), true);
        $All_GameData[$jobId]['KN2C_Fract19X57']=$Specific_GameDatadata;
        $Specific_GameDatadata = json_decode(file_get_contents('Artifacts/Raw/KN2C_Fract19X62.json'), true);
        $All_GameData[$jobId]['KN2C_Fract19X62']=$Specific_GameDatadata;
        $Specific_GameDatadata = json_decode(file_get_contents('Artifacts/Raw/KN2C_Fract19X71.json'), true);
        $All_GameData[$jobId]['KN2C_Fract19X71']=$Specific_GameDatadata;
        $Specific_GameDatadata = json_decode(file_get_contents('Artifacts/Raw/KN2C_Miracle.json'), true);
        $All_GameData[$jobId]['KN2C_Miracle']=$Specific_GameDatadata;
        $Specific_GameDatadata = json_decode(file_get_contents('Artifacts/Raw/KN2C_YuS19Bus150.json'), true);
        $All_GameData[$jobId]['KN2C_YuS19Bus150']=$Specific_GameDatadata;
        $Specific_GameDatadata = json_decode(file_get_contents('Artifacts/Raw/KN2C_YuS19Bus550.json'), true);
        $All_GameData[$jobId]['KN2C_YuS19Bus550']=$Specific_GameDatadata;
        $Specific_GameDatadata = json_decode(file_get_contents('Artifacts/Raw/KN2C_YuS19Norm.json'), true);
        $All_GameData[$jobId]['KN2C_YuS19Norm']=$Specific_GameDatadata;
        $Specific_GameDatadata = json_decode(file_get_contents('Artifacts/Raw/KN2C_YuS19O442.json'), true);
        $All_GameData[$jobId]['KN2C_YuS19O442']=$Specific_GameDatadata;
        $Specific_GameDatadata = json_decode(file_get_contents('Artifacts/Raw/KN2C_YuS19w442.json'), true);
        $All_GameData[$jobId]['KN2C_YuS19w442']=$Specific_GameDatadata;

}

// print_r($All_GameData); 
// print_r('--------------------------------------');
// print_r($JobInformation);
return view('ShowFormationtestResults' , compact('All_GameData'  , 'JobInformation'));

// two main array =>>>>>>>>> 1 = All_gamedata
// 2 ->  JobInformation
    // we now have all game data with job id 
    // and now we have all commits with job id 



 






}); 

