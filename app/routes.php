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
        return Redirect::to('/home/index');
    });
    Route::get('/home', function() {
        return Redirect::to('/home/index');
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
    });

    // Routes that dont't need to be checked for authentication
    Route::group(array('after' => 'auth'), function() {
        Route::any('/user/login', 'UserController@login');
        Route::any('/user/logout', 'UserController@logout');
        Route::get('/user/switchLanguage', 'UserController@switchLanguage');
    });