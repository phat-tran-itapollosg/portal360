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
            return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => $result->notify]);
        }
        else
        {
            // ["payment_id"]=> string(36) "94bb0e6b-7f59-f5af-06f2-57eb21bf5584" 
            //  ["payment_type"]=> string(7) "Deposit" 
            //  ["total_amount"]=> string(10) "5000000.00" 
            //  ["payment_amount"]=> string(10) "5000000.00" 
            //  ["freebalance_amount"]=> string(4) "0.00" 
            //  ["used_amount"]=> string(4) "0.00" 
            //  ["start_date"]=> string(10) "2016-09-28" 
            //  ["payment_expired_date"]=> string(10) "0000-00-00" 
            //  ["total_days"]=> string(4) "0.00" 
            //  ["remain_days"]=> NULL 
            //  ["course_fee_name"]=> string(0) "" 
            //  ["ec_name"]=> string(17) "Hoàng Tùng Lâm" 
            //  ["center_name"]=> string(19) "Pham Ngoc Thach 360"
            $payment = json_decode($result->value_list, true);
            return View::make('payment.index')->with(array(
                'paymentlist'=>(array)$payment,
                ));
            exit();
        }
    }
}
