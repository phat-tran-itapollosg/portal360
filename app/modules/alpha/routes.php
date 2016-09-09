<?php

//Route::get('admin/faq', function() {	return View::make('faq::index');});
//Route::get('admin/faq','App'	);
Route::group(['prefix' => 'admin'], function () {
	Route::get('faq', 'App\Modules\Alpha\Controllers\AlphaController@faq');
	
	//add faq
	Route::get('faq/add', 'App\Modules\Alpha\Controllers\AlphaController@Fagadd');
    Route::post('faq/add/data', 'App\Modules\Alpha\Controllers\AlphaController@addFagdata');

    //delete faq
    Route::get('faq/del/{id}', 'App\Modules\Alpha\Controllers\AlphaController@delFag');
    Route::get('faq/list/dele','App\Modules\Alpha\Controllers\AlphaController@delFagget');
  	Route::get('faq/redel/{id}','App\Modules\Alpha\Controllers\AlphaController@redel');

    //edit data
    Route::get('faq/edit/{id}', 'App\Modules\Alpha\Controllers\AlphaController@editFag');//->name('editFag')
    Route::get('faq/upload-images','App\Modules\Alpha\Controllers\AlphaController@updateimg');
    Route::post('faq/edit/data', 'App\Modules\Alpha\Controllers\AlphaController@editFagdata');

    //Route::post('/faq/re/del','App\Modules\Alpha\Controllers\AlphaController@redelFagdata');
    Route::get('faq/category/{idcate}','App\Modules\Alpha\Controllers\AlphaController@GetAlphaCategory');
    
    //NEws
    Route::get('news', 'App\Modules\Alpha\Controllers\AlphaController@newslist'); 
    //del news
    Route::get('news/del/{id}','App\Modules\Alpha\Controllers\AlphaController@delnews');
    Route::get('news/redel/{id}','App\Modules\Alpha\Controllers\AlphaController@redelnews');
    Route::get('news/list/dele','App\Modules\Alpha\Controllers\AlphaController@delNewsget'); 

    //edit news
    Route::get('news/edit/{id}','App\Modules\Alpha\Controllers\AlphaController@newsedit');   
    Route::post('news/edit/data', 'App\Modules\Alpha\Controllers\AlphaController@editnewsdata');

    //add news
    Route::get('news/add', 'App\Modules\Alpha\Controllers\AlphaController@newsadd');
    Route::post('news/add/data', 'App\Modules\Alpha\Controllers\AlphaController@newsadddata');

    //up image
    Route::get('faq/upload/images/{id}','App\Modules\Alpha\Controllers\AlphaController@upload_img');
    Route::post('updata','App\Modules\Alpha\Controllers\AlphaController@updata');
    Route::post('updatajson','App\Modules\Alpha\Controllers\AlphaController@updatajson');
    Route::get('updata/index.php','App\Modules\Alpha\Controllers\AlphaController@updata');

    Route::get('category/get', 'CategoryController@Categoryget');
    Route::get('category/edit/{id}', 'CategoryController@CategoryEdit');
    Route::get('category/dele/{id}', 'CategoryController@CategoryDelete');
    Route::get('category/del/get','CategoryController@CategoryDelGet');
    Route::post('/category/add/data','CategoryController@Categoryadd');
    Route::post('/category/edit/data/','CategoryController@CategoryEditAdd');

});