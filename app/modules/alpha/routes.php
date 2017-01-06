<?php

Route::group(array('prefix' => 'admin','before' => 'auth','namespace' => 'App\Modules\Alpha\Controllers'), function () {

	Route::get('faq', ['as' => 'alpha.faq.faq', 'uses' => 'AlphaController@faq']);
	
	//add faq
	Route::get('faq/add', ['as' => 'alpha.faq.Fagadd', 'uses' => 'AlphaController@Fagadd']);
    Route::post('faq/add/data', ['as' => 'alpha.faq.dosurvey', 'uses' => 'AlphaController@addFagdata']);

    //delete faq
    Route::get('faq/del/{id}', ['as' => 'alpha.faq.delFag', 'uses' => 'AlphaController@delFag']);
    //Route::get('faq/list/dele', ['as' => 'alpha.faq.dosurvey', 'uses' => 'AlphaController@delFagget']);
  	//Route::get('faq/redel/{id}', ['as' => 'alpha.faq.dosurvey', 'uses' => 'AlphaController@redel']);

    //edit data faq
    Route::get('faq/edit/{id}', ['as' => 'alpha.faq.editFag', 'uses' => 'AlphaController@editFag']);

    

    Route::post('faq/edit/data', ['as' => 'alpha.faq.editFagdata', 'uses' => 'AlphaController@editFagdata']);

    //category faq

   // Route::get('faq/category', ['as' => 'alpha.faq.getCategoryFaq', 'uses' => 'AlphaController@getCategoryFaq']);

    Route::get('faq/category/add', ['as' => 'alpha.faq.addCategoryFaq', 'uses' => 'AlphaController@addCategoryFaq']);

    Route::post('faq/category/add/data',['as' => 'alpha.faq.addCategoryFaqData','uses' => 'AlphaController@addCategoryFaqData']);

    Route::get('faq/category/edit/{id}', ['as' => 'alpha.faq.editCategoryFaq', 'uses' => 'AlphaController@editCategoryFaq']);
    Route::get('faq/category/del/{id}', ['as' => 'alpha.faq.delCategoryFaq', 'uses' => 'AlphaController@delCategoryFaq']);
    Route::post('faq/category/del/data', ['as' => 'alpha.faq.editCategoryFaqData', 'uses' => 'AlphaController@editCategoryFaqData']);
    Route::post('faq/check', ['as' => 'alpha.faq.FaqCheckBox', 'uses' => 'AlphaController@FaqCheckBox']);

    //Route::post('/faq/re/del', ['as' => 'alpha.faq.dosurvey', 'uses' => 'AlphaController@redelFagdata']);
    //Route::get('faq/category/{idcate}', ['as' => 'alpha.faq.dosurvey', 'uses' => 'AlphaController@GetAlphaCategory']);
    
    //NEws
    Route::get('news', ['as' => 'alpha.news.newslist', 'uses' => 'AlphaController@newslist']); 

     //add news
    Route::get('news/add', ['as' => 'alpha.news.newsadd', 'uses' => 'AlphaController@newsadd']);
    Route::post('news/add/data', ['as' => 'alpha.news.newsadddata', 'uses' => 'AlphaController@newsadddata']);

    //del news
    Route::get('news/del/{id}', ['as' => 'alpha.news.delnews', 'uses' => 'AlphaController@delnews']);
    //del check data
    Route::post('news/check', ['as' => 'alpha.news.DelCheckBox', 'uses' => 'AlphaController@DelCheckBox']);
    
    //Route::get('news/redel/{id}', ['as' => 'alpha.faq.dosurvey', 'uses' => 'AlphaController@redelnews']);
    //Route::get('news/list/dele', ['as' => 'alpha.faq.dosurvey', 'uses' => 'AlphaController@delNewsget']); 

    //edit news
    Route::get('news/edit/{id}', ['as' => 'alpha.news.newsedit', 'uses' => 'AlphaController@newsedit']);   
    Route::post('news/edit/data', ['as' => 'alpha.news.editnewsdata', 'uses' => 'AlphaController@editnewsdata']);

   //category news

    //Route::get('news/category', ['as' => 'alpha.news.getCategoryNews', 'uses' => 'AlphaController@getCategoryNews']);

    Route::get('news/category/add', ['as' => 'alpha.news.addCategoryNews', 'uses' => 'AlphaController@addCategoryNews']);

    Route::post('news/category/add/data',['as' => 'alpha.news.addCategoryNewsData','uses' => 'AlphaController@addCategoryNewsData']);


    Route::get('news/category/edit/{id}', ['as' => 'alpha.faq.editCategoryNews', 'uses' => 'AlphaController@editCategoryNews']);
    Route::get('news/category/del/{id}', ['as' => 'alpha.faq.delCategoryNews', 'uses' => 'AlphaController@delCategoryNews']);
    Route::post('news/category/del/data', ['as' => 'alpha.faq.editCategoryNewsData', 'uses' => 'AlphaController@editCategoryNewsData']);

    //up image
    Route::get('faq/upload/images/{id}', ['as' => 'alpha.faq.updateimg', 'uses' => 'AlphaController@updateimg']);

    Route::post('faq/updata',[ 'as' => 'alpha.faq.updata','uses' => 'AlphaController@updata']);

    Route::post('faq/updatajson',[ 'as' => 'alpha.faq.updatajson', 'uses' => 'AlphaController@updatajson']);

    Route::get('news/upload/images/{id}', ['as' => 'alpha.news.updateimgnews', 'uses' => 'AlphaController@updateimgnews']);

    Route::post('news/updata',[ 'as' => 'alpha.news.updata','uses' => 'AlphaController@updata']);

    Route::post('news/updatajson',[ 'as' => 'alpha.news.updatajsonnews', 'uses' => 'AlphaController@updatajsonnews']);

    Route::get('500', ['as' => 'alpha.500', 'uses' => 'AlphaController@error500']);


    Route::get('/survey/index',['as' => 'alpha.survey.index', 'uses' => 'SurveyController@index']);

    Route::get('/elearning',['as' => 'alpha.elearning.index', 'uses' => 'ElearningController@index']);
    Route::get('/elearning/index',['as' => 'alpha.elearning.index', 'uses' => 'ElearningController@index']);
    Route::get('/elearning/retrieve/{id}',['as' => 'alpha.elearning.retrieve', 'uses' => 'ElearningController@retrieve_result']);
    Route::get('/elearning/retrieve/result',['as' => 'alpha.elearning.retrieveResult', 'uses' => 'ElearningController@retrieve']);

    Route::get('/elearning/student/{id}',['as' => 'alpha.elearning.student', 'uses' => 'ElearningController@studentsOfClass']);
    Route::get('/elearning/course/{id}',['as' => 'alpha.elearning.course', 'uses' => 'ElearningController@coursesOfStudents']);
    Route::get('/elearning/lession/{id}',['as' => 'alpha.elearning.lession', 'uses' => 'ElearningController@lessionsOfCourse']);

});
Route::group(array('prefix' => 'admin','namespace' => 'App\Modules\Alpha\Controllers'), function () {

    Route::get('/elearning/retrievejson/{id}',['as' => 'alpha.elearning.retrievejson', 'uses' => 'ElearningController@retrieve_result_json']);
    
});