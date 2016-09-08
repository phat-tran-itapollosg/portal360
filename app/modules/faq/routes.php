<?php

//Route::get('admin/faq', function() {	return View::make('faq::index');});
//Route::get('admin/faq','App'	);
Route::group(['prefix' => 'alpha/admin'], function () {
	Route::get('faq', 'App\Modules\Faq\Controllers\FaqController@faq');
	
	//add faq
	Route::get('faq/add', 'App\Modules\Faq\Controllers\FaqController@Fagadd');
    Route::post('faq/add/data', 'App\Modules\Faq\Controllers\FaqController@addFagdata');

    //delete faq
    Route::get('faq/del/{id}', 'App\Modules\Faq\Controllers\FaqController@delFag');
    Route::get('faq/list/dele','App\Modules\Faq\Controllers\FaqController@delFagget');
  	Route::get('faq/redel/{id}','App\Modules\Faq\Controllers\FaqController@redel');

    //edit data
    Route::get('faq/edit/{id}', 'App\Modules\Faq\Controllers\FaqController@editFag');//->name('editFag')
    Route::get('faq/upload-images','App\Modules\Faq\Controllers\FaqController@updateimg');
    Route::post('faq/edit/data', 'App\Modules\Faq\Controllers\FaqController@editFagdata');

    //Route::post('/faq/re/del','App\Modules\Faq\Controllers\FaqController@redelFagdata');
    Route::get('faq/category/{idcate}','App\Modules\Faq\Controllers\FaqController@GetFaqCategory');
    
    //NEws
    Route::get('news', 'App\Modules\Faq\Controllers\FaqController@newslist'); 
    //del news
    Route::get('news/del/{id}','App\Modules\Faq\Controllers\FaqController@delnews');
    Route::get('news/redel/{id}','App\Modules\Faq\Controllers\FaqController@redelnews');
    Route::get('news/list/dele','App\Modules\Faq\Controllers\FaqController@delNewsget'); 

    //edit news
    Route::get('news/edit/{id}','App\Modules\Faq\Controllers\FaqController@newsedit');   
    Route::post('news/edit/data', 'App\Modules\Faq\Controllers\FaqController@editnewsdata');

    //add news
    Route::get('news/add', 'App\Modules\Faq\Controllers\FaqController@newsadd');
    Route::post('news/add/data', 'App\Modules\Faq\Controllers\FaqController@newsadddata');

    //up image
    Route::get('faq/upload/images/{id}','App\Modules\Faq\Controllers\FaqController@upload_img');
    Route::post('updata','App\Modules\Faq\Controllers\FaqController@updata');
    Route::post('updatajson','App\Modules\Faq\Controllers\FaqController@updatajson');
    Route::get('updata/index.php','App\Modules\Faq\Controllers\FaqController@updata');

    Route::get('category/get', 'CategoryController@Categoryget');
    Route::get('category/edit/{id}', 'CategoryController@CategoryEdit');
    Route::get('category/dele/{id}', 'CategoryController@CategoryDelete');
    Route::get('category/del/get','CategoryController@CategoryDelGet');
    Route::post('/category/add/data','CategoryController@Categoryadd');
    Route::post('/category/edit/data/','CategoryController@CategoryEditAdd');

});