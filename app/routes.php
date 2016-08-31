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


    Route::get('/', function() {
        return Redirect::to('/schedule/index');
    });
    Route::get('/home', function() {
        return Redirect::to('/schedule/index');
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
        Route::get('/elearning', 'ElearningController@process');
    });

    // Routes that dont't need to be checked for authentication
    Route::group(array('after' => 'auth'), function() {
        Route::any('/user/login', 'UserController@login');
        Route::any('/user/logout', 'UserController@logout');
        Route::get('/user/switchLanguage', 'UserController@switchLanguage');
    });
    Route::get('/up1','FaqController@up1');
    
    Route::get('/up','FaqController@up');
    Route::post('/updata','FaqController@updata');
    
    Route::post('/updatajson','FaqController@updatajson');
    