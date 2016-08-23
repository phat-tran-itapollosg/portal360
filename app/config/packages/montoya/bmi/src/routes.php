<?php

Route::group(['namespace' => 'Montoya\BMI\Controllers', 'prefix' => 'montoya/bmi'], function () {
    Route::get('/', ['as' => 'bmi_path', 'uses' => 'BMIController@index']);
   // Route::get('/', function(){
    	
    //	return View::make('bmi::index');
    //	return $view = View::make('news.index');

   // });
    Route::get('/test', function(){
  									echo bmi::greeting();
	});
});