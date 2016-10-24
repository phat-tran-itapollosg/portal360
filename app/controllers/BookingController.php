<?php

/*
*   Auhor: Loc Pham
*   Date: 2016-09-11
*/

class BookingController extends BaseController {

    public function index() {

        //var_dump(Input::get('submit'));
        //$booking = array();
        $start = '';
        $end = '';
        $class_type = '';
        $method = 'get';
        $todayDate = date("Y-m-d");
        $todayDateMDY = date("m-d-Y");
    
        if(Input::get('start') && Input::get('end') && Input::get('class_type')) {
            //var_dump($booking);die();
            $method = 'post';
            $start = Input::get('start');
            $end = Input::get('end');
            $class_type = Input::get('class_type');

            //var_dump($start, $end, $class_type);

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
                    'student_id'=>$contact->id, //data test: 173fd695-524d-dc26-7a50-5710d3fbbeea
                    'start'     =>$start,
                    'end'       =>$end,
                    'class_type'=>$class_type,
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
                // var_dump($booking);die();
                return View::make('booking.index')->with(array(
                    'session_booking'=>(array)$booking,
                    'start'=>$start,
                    'end'=>$end,
                    'class_type'=>$class_type,
                    'method'=>$method,
                    'todayDate' => $todayDate,
                    'todayDateMDY' => $todayDateMDY,
                    ));
                exit();
            }

            //var_dump($start, $end, $class_type);
            //exit();
        }else{
            return View::make('booking.index')->with(array(
                'session_booking'=>array(),
                'start'=>$start,
                'end'=>$end,
                'class_type'=>$class_type,
                'method'=>$method,
                'todayDate' => $todayDate,
                'todayDateMDY' => $todayDateMDY,
                ));
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
            'function'  =>  'historyBooking',
            'param'     =>  array(
                'student_id'=>$params['student_id'], //data test: 173fd695-524d-dc26-7a50-5710d3fbbeea
                // 'start'     =>'2016-09-12',
                // 'end'       =>'2016-10-04',
                // 'class_type'=>'',
            ),
        );
        $result = $client->call('entryPoint', $data_params);
        
        if(intval($result->success) == 0)
        {
            // return App::make("ErrorsController")->callAction("error", ['code'=>500]);
            return View::make('booking.history')->with(array(
                'session_booking'=>array(),
                ));
            exit();
        }
        else
        {
            $booking = json_decode($result->value_list, true);
            // var_dump($booking);die();
            return View::make('booking.history')->with(array(
                'session_booking'=>(array)$booking,
                ));
            exit();
        }
    }

    public function submit($id = NULL)
    {
        if(isset($id) && !empty($id)){
            // var_dump($id);die();
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
                'function'  =>  'inputBooking',
                'param'     =>  array(
                    'student_id'=>$contact->id, 
                    'session_id'     =>$id,
                ),
            );
            $result = $client->call('entryPoint', $data_params);
            return View::make('booking.submit')->with(array('result'=>$result));
            exit();
        }else{
             return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
        }
    }
    public function cancel($id = NULL)
    {
        if(isset($id) && !empty($id)){
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
                'function'  =>  'cancelBooking',
                'param'     =>  array(
                    'student_id'=>$contact->id, 
                    'session_id'     =>$id,
                ),
            );
            $result = $client->call('entryPoint', $data_params);
            return View::make('booking.submit')->with(array('result'=>$result));
            exit();
        }else{
             return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
        }
    }
}