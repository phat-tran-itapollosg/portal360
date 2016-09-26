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
    protected $layout = 'layouts.master';

    public function index()
    {
        // $elearnings = array(
        //     array(
        //     'course_name' => 'Beginner Lesson 1',
        //     'sso_code' => 'APOLLO_B1L1'
        //     ),
        //      array(
        //     'course_name' => 'Beginner Lesson 2',
        //     'sso_code' => 'APOLLO_B1L2'
        //     ),array(
        //     'course_name' => 'Beginner Lesson 3',
        //     'sso_code' => 'APOLLO_B1L3'
        //     ),array(
        //     'course_name' => 'Beginner Lesson 4',
        //     'sso_code' => 'APOLLO_B1L4'
        //     ),array(
        //     'course_name' => 'Beginner Lesson 5',
        //     'sso_code' => 'APOLLO_B1L5'
        //     )
        // );  
        $serviceConfig = Config::get('app.service_config');
        $serverUrl = $serviceConfig['server_url'];
        $customService = $serviceConfig['custom_service'];
        $rootUsername = $serviceConfig['root_username'];
        $rootPassword = $serviceConfig['root_password'];

        $client = new SugarClient($serverUrl, $customService, $rootUsername, $rootPassword);

        $session = Session::get('session');
        $contact = Session::get('contact');

        $params = array(
            'session' => $session->root_session_id,
            'student_id' => $contact->id,
        );

        $data_params = array(
            'session'   =>  $session->root_session_id,
            'function'  =>  'getSSOCode',
            'param'     =>  array(
                'student_id'=>$params['student_id'], //data test: 173fd695-524d-dc26-7a50-5710d3fbbeea
            ),
        );
        $result = $client->call('entryPoint', $data_params);
        // var_dump($params['student_id']);37ff9843-89e6-effa-c1e5-56e913a00d6e
        // var_dump($result);
        // die();
        if(intval($result->success) == 0){
            return App::make("ErrorsController")->callAction("error", ['code'=>500]);
        }else{
            $elearnings = json_decode($result->value_list, true);
            return View::make('elearning.index')->with(array('elearnings'=>(array)$elearnings));
            exit();
        }   
        
    }
    public function login()
    {
        if(isset($_REQUEST['sso_code']) AND !empty($_REQUEST['sso_code'])){


        // var_dump($_REQUEST['sso_code']);
        // die();
        $session = Session::get('session');
        $contact = Session::get('contact');
        
        $serviceConfig = Config::get('app.service_elearning');
        $user = array(
            'login'                 => $contact->portal_name,
            'password'              => $contact->password_generated,
            'email'                 =>  $contact->email1,
            'first_name'            =>  $contact->first_name,
            'first_name_alphabet'   =>  $contact->first_name,
            'first_name_local'      =>  $contact->first_name,
            'last_name'             =>  $contact->last_name,
            'last_name_alphabet'    =>  $contact->last_name,
            'last_name_local'       =>  $contact->last_name,
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
                <course_code>'.$_REQUEST['sso_code'].'</course_code>
                <group_code>'.$serviceConfig['course']['group_code'].'</group_code>
                <start_date>'.$serviceConfig['course']['start_date'].'</start_date>    
                <end_date>'.$serviceConfig['course']['end_date'].'</end_date>
                <access_end_date>'.$serviceConfig['course']['access_end_date'].'</access_end_date>
            </course>
          </query>';
        
        $url = $serviceConfig['remoteUrl'];
        $ch = curl_init(); 
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
           return App::make("ErrorsController")->callAction("error", ['code'=>500,'messenger' => curl_error($ch)]);
           curl_close($ch); // close cURL handler 
        } else { 
            $info = curl_getinfo($ch); 
            curl_close($ch); // close cURL handler 
            if (empty($info['http_code'])) { 
                   // die("No HTTP code was returned"); 
                   return App::make("ErrorsController")->callAction("error", ['code'=>500,'messenger' => "No HTTP code was returned"]);
            } else { 
                $xml = new SimpleXMLElement($result);
                if(isset($xml->url_start[0]) && !empty($xml->url_start[0])){
                    header("Location: ".$xml->url_start[0]);
                    exit();  
                }else{
                    return App::make("ErrorsController")->callAction("error", ['code'=>500,'messenger' => $result]);
                }                
            } 
        }
        }else{
            return App::make("ErrorsController")->callAction("error", ['code'=>404]);
        } 
        exit(); 
    }
}
