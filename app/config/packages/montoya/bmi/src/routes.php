<?php

Route::group(['namespace' => 'Montoya\BMI\Controllers', 'prefix' => 'alpha/admin'], function () {
    Route::get('/', ['as' => 'bmi_path', 'uses' => 'BMIController@index']);

    //route admin faq
	//add faq    
    Route::get('faq/add', 'BMIController@Fagadd');


    Route::get('/faq/edit/{id}', 'BMIController@editFag');//->name('editFag')
    Route::get('faq/del/data/{id}', 'BMIController@delFagdata');
    Route::get('faq/del/get', 'BMIController@delFagget');//->name('delFagget')


    Route::post('faq/add/data', 'BMIController@addFagdata');
    Route::post('/faq/edit/data', 'BMIController@editFagdata');
    Route::post('/faq/re/del','BMIController@redelFagdata');
    Route::get('faq/category/{idcate}','BMIController@GetFaqCategory');


    Route::get('category/get', 'CategoryController@Categoryget');
    Route::get('category/edit/{id}', 'CategoryController@CategoryEdit');
    Route::get('category/dele/{id}', 'CategoryController@CategoryDelete');
    Route::get('category/del/get','CategoryController@CategoryDelGet');
    Route::post('/category/add/data','CategoryController@Categoryadd');
    Route::post('/category/edit/data/','CategoryController@CategoryEditAdd');

    Route::get('/test', function(){
  									echo bmi::greeting();
	});
});