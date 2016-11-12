<?php

/*
*   Class PaymentController
*   Auhor: Pong Pi (Eroshaly@gmail.com)
*/

class PaymentController extends BaseController {

    public function index() {
        $serviceConfig = Config::get('app.service_config');
        $serverUrl = $serviceConfig['server_url'];
        $customService = $serviceConfig['custom_service'];
        $rootUsername = $serviceConfig['root_username'];
        $rootPassword = $serviceConfig['root_password'];

        $client = new SugarClient($serverUrl, $customService, $rootUsername, $rootPassword);

        $session = Session::get('session');
        $contact = Session::get('contact');

        $data_params = array(
            'session'   =>  $session->root_session_id,
            'function'  =>  'getPaymentList',
            'param'     =>  array(
                'student_id'=>$contact->id, 
            ),
        );
        $result = $client->call('entryPoint', $data_params);

        // print_r($result);
        // die();
       
        if(intval($result->success) == 0)
        {
            return View::make('payment.index')->with(array(
                'paymentlist'=>array(),
                'notify' => $result->notify
                ));
            // return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => $result->notify]);
        }
        else
        {
            $payment = json_decode($result->value_list, true);
            return View::make('payment.index')->with(array(
                'paymentlist'=>(array)$payment,
                ));
            exit();
        }
    }
}
