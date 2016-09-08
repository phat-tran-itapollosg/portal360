<?php

Route::group(['namespace' => 'Montoya\BMI\Controllers', 'prefix' => 'alpha/admin'], function () {


    Route::get('/', ['as' => 'bmi_path', 'uses' => 'BMIController@index']);

    //route admin faq
    //all faq
    Route::get('faq','BMIController@faq');
	//add faq    
    Route::get('faq/add', 'BMIController@Fagadd');
    Route::post('faq/add/data', 'BMIController@addFagdata');
    
    Route::get('faq/list/dele','BMIController@delFagget');

    //delete faq
    Route::get('faq/del/data/{id}', 'BMIController@delFagdata');

    //edit data
    Route::get('faq/edit/{id}', 'BMIController@editFag');//->name('editFag')
    Route::get('faq/upload-images','BMIController@updateimg');


    Route::post('faq/edit/data', 'BMIController@editFagdata');

    Route::post('/faq/re/del','BMIController@redelFagdata');
    Route::get('faq/category/{idcate}','BMIController@GetFaqCategory');
    
    //NEws
    Route::get('/news', 'BMIController@newslist'); 
    Route::get('/news/list/dele','BMIController@delNewsget');  
    Route::get('/news/edit/{id}','BMIController@newsedit');   
    Route::post('news/edit/data', 'BMIController@editnewsdata');
    Route::get('news/add', 'BMIController@newsadd');
    Route::post('news/add/data', 'BMIController@newsadddata');

    //up image
    Route::get('faq/upload/images/{id}','BMIController@upload_img');
    Route::post('updata','BMIController@updata');
    Route::post('updatajson','BMIController@updatajson');
    Route::get('updata/index.php','BMIController@updata');

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