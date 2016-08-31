<?php
/*
 *Alpha team Locpt 
 *loc.pham2412@gmail.com
 *
 */
//namespace App\Controllers\Elearning;
//use DB;
//use Validator;
//use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class ElearningController extends BaseController
{
    public function process()
    {

        $session = Session::get('session');
        $contact = Session::get('contact');
        $serviceConfig = Config::get('app.service_elearning');
        $user = array(
            'login'                 => 'yoshin',
            'password'              => 'your_password',
            'email'                 =>  'yoshin+apollo@reallyenglish.com',  
            'first_name'            =>  'Michael', 
            'first_name_alphabet'   =>  'Michael',   
            'first_name_local'      =>  'Michael',   
            'last_name'             =>  'Schenker',   
            'last_name_alphabet'    =>  'Schenker',   
            'last_name_local'       =>  'Schenker',   
        );
        $xml_data ='<?xml version="1.0"?>
        <query cmd="login">
            <auth>
                <organization_code>'.$serviceConfig['auth']['organization_code'].'</organization_code>
                <password>'.$serviceConfig['auth']['password'].'</password>
            </auth>
            <user>
                <login>'.$user['login'].'</login>
                <password>'.$user['password'].'</password>
                <email>'.$user['email'].'</email>
                <first_name>'.$user['first_name'].'</first_name>
                <first_name_alphabet>'.$user['first_name_alphabet'].'</first_name_alphabet>
                <first_name_local>'.$user['first_name_local'].'</first_name_local>
                <last_name>'.$user['last_name'].'</last_name>
                <last_name_alphabet>'.$user['last_name_alphabet'].'</last_name_alphabet>
                <last_name_local>'.$user['last_name_local'].'</last_name_local>
            </user>
            <course>
                <course_code>'.$serviceConfig['course']['course_code'].'</course_code>
                <group_code>'.$serviceConfig['course']['group_code'].'</group_code>
                <start_date>'.$serviceConfig['course']['start_date'].'</start_date>    
                <end_date>'.$serviceConfig['course']['end_date'].'</end_date>
                <access_end_date>'.$serviceConfig['course']['access_end_date'].'</access_end_date>
            </course>
          </query>';

//         yoshin
// your_password
// yoshin+apollo@reallyenglish.com
// Michael
// Michael
// Michael
// Schenker
// Schenker
// Schenker


// APOLLO-PE6
// TEST_GROUP
// 2016-08-01
// 2016-12-31
// 2016-12-31

        // var_dump($xml_data);die();
        $url = $serviceConfig['remoteUrl'];//"https://re.reallyenglish.com/teachatapollo/sso"; 
        $ch = curl_init(); // initialize curl handle 
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                       'Content-type: application/xml', 
                                       'Content-length: ' . strlen($xml_data)
                                     ));

        $result = curl_exec($ch); // run the whole process 

        if (empty($result)) { 
           // some kind of an error happened 
           // die(curl_error($ch)); 
           return App::make("ErrorsController")->callAction("error", ['code'=>500,'messenger' => curl_error($ch)]);
           curl_close($ch); // close cURL handler 
           // exit();
        } else { 
           $info = curl_getinfo($ch); 
           curl_close($ch); // close cURL handler 
           if (empty($info['http_code'])) { 
                   // die("No HTTP code was returned"); 
                   return App::make("ErrorsController")->callAction("error", ['code'=>500,'messenger' => "No HTTP code was returned"]);
                   // exit();
           } else { 
                // print_r($result); //contains response from server 
                // print_r($info); //contains response from server 
                // exit();
                $xml = new SimpleXMLElement($result);
                if(isset($xml->url_start[0]) && !empty($xml->url_start[0])){
                  header("Location: ".$xml->url_start[0]);
                    exit();  
                }else{
                    return App::make("ErrorsController")->callAction("error", ['code'=>500,'messenger' => $result]);
                }                
           } 
        } 
    }
}