<?php

Route::group(['prefix' => 'admin'], function () {
	Route::get('faq', ['as' => 'alpha.faq.faq', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@faq']);
	
	//add faq
	Route::get('faq/add', ['as' => 'alpha.faq.Fagadd', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@Fagadd']);
    Route::post('faq/add/data', ['as' => 'alpha.faq.dosurvey', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@addFagdata']);

    //delete faq
    Route::get('faq/del/{id}', ['as' => 'alpha.faq.delFag', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@delFag']);
    //Route::get('faq/list/dele', ['as' => 'alpha.faq.dosurvey', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@delFagget']);
  	//Route::get('faq/redel/{id}', ['as' => 'alpha.faq.dosurvey', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@redel']);

    //edit data faq
    Route::get('faq/edit/{id}', ['as' => 'alpha.faq.editFag', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@editFag']);

    

    Route::post('faq/edit/data', ['as' => 'alpha.faq.editFagdata', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@editFagdata']);

    //category faq

   // Route::get('faq/category', ['as' => 'alpha.faq.getCategoryFaq', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@getCategoryFaq']);

    Route::get('faq/category/add', ['as' => 'alpha.faq.addCategoryFaq', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@addCategoryFaq']);

    Route::post('faq/category/add/data',['as' => 'alpha.faq.addCategoryFaqData','uses' => 'App\Modules\Alpha\Controllers\AlphaController@addCategoryFaqData']);

    Route::get('faq/category/edit/{id}', ['as' => 'alpha.faq.editCategoryFaq', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@editCategoryFaq']);
    Route::get('faq/category/del/{id}', ['as' => 'alpha.faq.delCategoryFaq', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@delCategoryFaq']);
    Route::post('faq/category/del/data', ['as' => 'alpha.faq.editCategoryFaqData', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@editCategoryFaqData']);

    //Route::post('/faq/re/del', ['as' => 'alpha.faq.dosurvey', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@redelFagdata']);
    //Route::get('faq/category/{idcate}', ['as' => 'alpha.faq.dosurvey', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@GetAlphaCategory']);
    
    //NEws
    Route::get('news', ['as' => 'alpha.news.newslist', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@newslist']); 

     //add news
    Route::get('news/add', ['as' => 'alpha.news.newsadd', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@newsadd']);
    Route::post('news/add/data', ['as' => 'alpha.news.newsadddata', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@newsadddata']);

    //del news
    Route::get('news/del/{id}', ['as' => 'alpha.news.delnews', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@delnews']);
    //Route::get('news/redel/{id}', ['as' => 'alpha.faq.dosurvey', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@redelnews']);
    //Route::get('news/list/dele', ['as' => 'alpha.faq.dosurvey', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@delNewsget']); 

    //edit news
    Route::get('news/edit/{id}', ['as' => 'alpha.news.newsedit', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@newsedit']);   
    Route::post('news/edit/data', ['as' => 'alpha.news.editnewsdata', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@editnewsdata']);

   //category news

    //Route::get('news/category', ['as' => 'alpha.news.getCategoryNews', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@getCategoryNews']);

    Route::get('news/category/add', ['as' => 'alpha.news.addCategoryNews', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@addCategoryNews']);

    Route::post('news/category/add/data',['as' => 'alpha.news.addCategoryNewsData','uses' => 'App\Modules\Alpha\Controllers\AlphaController@addCategoryNewsData']);


    Route::get('news/category/edit/{id}', ['as' => 'alpha.faq.editCategoryNews', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@editCategoryNews']);
    Route::get('news/category/del/{id}', ['as' => 'alpha.faq.delCategoryNews', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@delCategoryNews']);
    Route::post('news/category/del/data', ['as' => 'alpha.faq.editCategoryNewsData', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@editCategoryNewsData']);

    //up image
    Route::get('faq/upload/images/{id}', ['as' => 'alpha.faq.updateimg', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@updateimg']);

    //Route::post('faq/imagesupdata', ['as' => 'alpha.faq.imagesupdata', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@imagesupdata']);

    Route::post('faq/updata',[ 'as' => 'alpha.faq.updata','uses' => 'App\Modules\Alpha\Controllers\AlphaController@updata']);

    Route::post('faq/updatajson',[ 'as' => 'alpha.faq.updatajson', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@updatajson']);


    //Route::post('updatajson', ['as' => 'alpha.faq.dosurvey', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@updatajson']);
    //Route::get('updata/index.php', ['as' => 'alpha.faq.dosurvey', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@updata']);
    Route::get('500', ['as' => 'alpha.500', 'uses' => 'App\Modules\Alpha\Controllers\AlphaController@error500']);

    Route::get('/survey/index',['as' => 'alpha.survey.index', 'uses' => 'App\Modules\Alpha\Controllers\SurveyController@index']);

});


