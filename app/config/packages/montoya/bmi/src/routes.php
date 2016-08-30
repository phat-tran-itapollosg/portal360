<?php

Route::group(['namespace' => 'Montoya\BMI\Controllers', 'prefix' => 'alpha/admin'], function () {
    Route::get('/', ['as' => 'bmi_path', 'uses' => 'BMIController@index']);
   	
    Route::get('/test', function(){
  									echo bmi::greeting();
	});
});