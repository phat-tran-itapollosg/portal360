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
        /* change info of xml
        $dom=new DOMDocument();
        $dom->load(app_path()."\storage\xml\default.xml");
        var_dump($dom);die;
        //var_dump($dom);die;
        $root=$dom->documentElement;

        $nodesToDelete=array();

        $login=$root->getElementsByTagName('login')->item(0)->nodeValue = "locpt";
        $session = Session::get('contact');

        $id = $session->id;
        $dom->save(app_path()."\storage\xml\\".$id.".xml");
        */


        /* cach 1:
        $session = Session::get('session');
        $contact = Session::get('contact');
        $xml_data ='<?xml version="1.0"?>
        <query cmd="login">
            <auth>
                <organization_code>APOLLO</organization_code>
                <password>abc123</password>
            </auth>
            <user>
                <login>hungmn_apollo</login>
                <password>w7vubOvqX</password>
                <email>hungmn@outlook.com</email>
                <first_name>Hung</first_name>
                <first_name_alphabet>Hung</first_name_alphabet>
                <first_name_local>Hung</first_name_local>
                <last_name>Nguyen</last_name>
                <last_name_alphabet>Nguyen</last_name_alphabet>
                <last_name_local>Nguyen</last_name_local>
            </user>
            <course>
                <course_code>APOLLO-PE6</course_code>
                <group_code>TEST_GROUP</group_code>
                <start_date>2016-08-01</start_date>    
                <end_date>2016-12-31</end_date>
                <access_end_date>2016-12-31</access_end_date>
            </course>
          </query>';

        $curl = curl_init();
    
        curl_setopt($curl, CURLOPT_URL, "https://re.reallyenglish.com/teachatapollo/sso");
         curl_setopt($curl, CURLOPT_POSTFIELDS,
                    "xmlRequest=" . $xml_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 300);
        $data = curl_exec($curl);
        curl_close($curl);

        //convert the XML result into array
        $array_data = json_decode(json_encode(simplexml_load_string($data)), true);

        print_r('<pre>');
        print_r($array_data);
        print_r('</pre>');*/

        
        // cach 2
        $session = Session::get('session');
        $contact = Session::get('contact');

        $filename = app_path()."\storage\xml\apollo.xml"; 
        $handle = fopen($filename, "r"); 
        $XPost = fread($handle, filesize($filename)); 
        fclose($handle); 
        $url = "https://re.reallyenglish.com/teachatapollo/sso"; 
        $ch = curl_init(); // initialize curl handle 
        curl_setopt($ch, CURLOPT_VERBOSE, 1); // set url to post to 
        curl_setopt($ch, CURLOPT_URL, $url); // set url to post to 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable 
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml")); 
        curl_setopt($ch, CURLOPT_HEADER, 1); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 40); // times out after 4s 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $XPost); // add POST fields 
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $result = curl_exec($ch); // run the whole process 

        if (empty($result)) { 
           // some kind of an error happened 
           die(curl_error($ch)); 
           curl_close($ch); // close cURL handler 
        } else { 
           $info = curl_getinfo($ch); 
           curl_close($ch); // close cURL handler 
           if (empty($info['http_code'])) { 
                   die("No HTTP code was returned"); 
           } else { 
            
           } 
        } 
        echo $result; //contains response from server 

    }
}