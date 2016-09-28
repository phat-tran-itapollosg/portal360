<?php

    /*
    |--------------------------------------------------------------------------
    | Application Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    | It's a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the Closure to execute when that URI is requested.
    |
    */
    
    //include('modules/content/routes.php');
    //include('modules/shop/routes.php');
    Route::get('/', function() {
        $service_admin = Config::get('app.service_admin');
        if(Session::get('contact') AND !empty(Session::get('contact'))){
            return Redirect::to('schedule/index');
        }else{
            return Redirect::to($service_admin['url']);
        }

        // return Redirect::to('/schedule/index');
    });
    Route::get('/home', function() {
        // return Redirect::to('/schedule/index');
        $service_admin = Config::get('app.service_admin');
        if(Session::get('contact') AND !empty(Session::get('contact'))){
            return Redirect::to('schedule/index');
        }else{
            return Redirect::to($service_admin['url']);
        }
    });
    Route::group(array('before' => 'auth'), function() {
        Route::get('/home/index', 'HomeController@index');
        Route::get('/user/profile', 'UserController@profile');
        Route::post('/user/saveProfile', 'UserController@saveProfile');
        Route::get('/user/changePassword', 'UserController@changePassword');
        Route::post('/user/savePassword', 'UserController@savePassword');
        Route::get('/project/index', 'ProjectController@index');
        Route::get('/contract/index', 'ContractController@index');
        Route::get('/billing/index', 'BillingController@index');
        Route::get('/complaint/index', 'ComplaintController@index');
        Route::get('/complaint/add', 'ComplaintController@add');
        Route::post('/complaint/save', 'ComplaintController@save');
        Route::get('/ticket/index', 'TicketController@index');
        Route::get('/ticket/add', 'TicketController@add');
        Route::post('/ticket/save', 'TicketController@save');
        Route::get('/ticket/view/{id}', 'TicketController@view');
        Route::post('/ticket/comment/{id}', 'TicketController@comment');
        Route::post('/ticket/close/{id}', 'TicketController@close');
        Route::get('/student/index', 'StudentController@index');
        Route::get('/sms/index', 'SmsController@index');
        Route::get('/schedule/index', 'ScheduleController@index');
        Route::get('/schedule/listview', 'ScheduleController@listview');
        //Route::get('/enrollment/index', 'EnrollmentController@index');
        Route::get('/enrollment/index', 'EnrollmentController@index');
        Route::get('/feedback/index', 'FeedbackController@index');
        Route::get('/feedback/add', 'FeedbackController@add');
        Route::post('/feedback/save', 'FeedbackController@save');
        Route::get('/gradebook/index', 'GradebookController@index');
        Route::post('/gradebook/getGradebookDetail', 'GradebookController@getGradebookDetail');
        Route::get('/gradebook/viewCertificate', 'GradebookController@viewCertificate');


        // Routes FAQ, Category
        Route::get('/faq', 'FaqController@getFag');//->name('getFag')
        Route::get('/faq/detal/{id}','FaqController@getdetal');

        // Routes news
        Route::get('/news', 'NewsController@Getnews');
        Route::get('/news/detal/{id}','NewsController@Getdetal');

        // Routes Elearning
        Route::get('/elearning', ['as' => 'elearning.default', 'uses' =>'ElearningController@index']);
        Route::get('/elearning/index', ['as' => 'elearning.index', 'uses' =>'ElearningController@index']);
        Route::get('/elearning/login', ['as' => 'elearning.login', 'uses' =>'ElearningController@login']);

        // Routes Booking
        Route::get('/booking', ['as' => 'Booking.index', 'uses' => 'BookingController@index']);
        Route::post('/booking', ['as' => 'Booking.index', 'uses' => 'BookingController@index']);
        Route::get('/booking/history', 'BookingController@history');

        //[Ersoshaly] Routes Survey
        Route::get('/survey', 'SurveyController@index');
        Route::get('/survey/index', 'SurveyController@index');
        Route::get('/survey/dosurvey/{id}', ['as' => 'Survey.dosurvey', 'uses' => 'SurveyController@dosurvey']);        


        Route::get('/booking/submit/{id}', ['as' => 'Booking.submit', 'uses' => 'BookingController@submit']);
        Route::get('/booking/cancel/{id}', ['as' => 'Booking.cancel', 'uses' => 'BookingController@cancel']);
        Route::get('/payment/', ['as' => 'Payment.index', 'uses' => 'PaymentController@index']);
        Route::get('/payment/index', ['as' => 'Payment.index', 'uses' => 'PaymentController@index']);
    });

    // Routes that dont't need to be checked for authentication
    Route::group(array('after' => 'auth'), function() {
        Route::any('/user/login', 'UserController@login');
        Route::any('/user/logout', 'UserController@logout');
        Route::get('/user/switchLanguage', 'UserController@switchLanguage');
    });
    
