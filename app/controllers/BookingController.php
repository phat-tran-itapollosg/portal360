<?php

/*
*   Auhor: Loc Pham
*   Date: 2016-09-11
*/

class BookingController extends BaseController {

    public function index() {
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
            'function'  =>  'getSessionBooking',
            'param'     =>  array(
                'student_id'=>'173fd695-524d-dc26-7a50-5710d3fbbeea', //data test: 173fd695-524d-dc26-7a50-5710d3fbbeea
                'start'     =>'2016-09-09',
                'end'       =>'2016-12-12',
                'class_type'=>"Connect Event",
            ),
        );
        $result = $client->call('entryPoint', $data_params);

       
        if(intval($result->success) == 0)
        {
            return App::make("ErrorsController")->callAction("error", ['code'=>500]);
        }
        else
        {
            $booking = json_decode($result->value_list, true);
            return View::make('booking.index')->with(array('booking'=>(array)$booking));
            exit();
        }

    }

    public function history()
    {
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
            'function'  =>  'getSessionBooking',
            'param'     =>  array(
                'student_id'=>$params['student_id'], //data test: 173fd695-524d-dc26-7a50-5710d3fbbeea
                // 'start'     =>'2016-09-12',
                // 'end'       =>'2016-10-04',
                // 'class_type'=>'',
            ),
        );
        $result = $client->call('entryPoint', $data_params);
        $jValueList=array();
        foreach ($result as $key => $value) {
            if($key=='value_list')
            {
                $jValueList = $value;
            }
        }
        // $aData = json_decode($jValueList,true);
        $aData = json_decode($result->value_list, true);
        $data = array(
            'session_booking' => $aData,
        );

        return View::make('booking.history')->with($data);
    }
}