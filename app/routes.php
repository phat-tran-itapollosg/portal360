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
    
    Route::get('/faq', 'FaqController@getFag');//->name('getFag')
    Route::get('/faq/edit/{id}', 'FaqController@editFag');//->name('editFag')
    Route::get('faq/del/data/{id}', 'FaqController@delFagdata');
    Route::get('faq/del/get', 'FaqController@delFagget');//->name('delFagget')
    Route::get('/faq/add', 'FaqController@Fagadd');
    Route::get('category/get', 'CategoryController@Categoryget');
    Route::get('category/edit/{id}', 'CategoryController@CategoryEdit');
    Route::get('category/dele/{id}', 'CategoryController@CategoryDelete');
    Route::get('category/del/get','CategoryController@CategoryDelGet');
    
    Route::post('/faq/add/data', 'FaqController@addFagdata');
    Route::post('/faq/edit/data', 'FaqController@editFagdata');
    Route::post('/faq/re/del','FaqController@redelFagdata');
    Route::post('/category/add/data','CategoryController@Categoryadd');
    Route::post('/category/edit/data/','CategoryController@CategoryEditAdd');
    
    Route::get('/', function() {
        return Redirect::to('/schedule/index');
    });
    
    Route::get('/home', function() {
        return Redirect::to('/schedule/index');
    });
    
    // Routes that need to be checked for authentication
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
    });

    // Routes that dont't need to be checked for authentication
    Route::group(array('after' => 'auth'), function() {
        Route::any('/user/login', 'UserController@login');
        Route::any('/user/logout', 'UserController@logout');
        Route::get('/user/switchLanguage', 'UserController@switchLanguage');
    });