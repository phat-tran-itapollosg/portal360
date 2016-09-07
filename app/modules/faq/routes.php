<?php

//Route::get('admin/faq', function() {	return View::make('faq::index');});
//Route::get('admin/faq','App'	);
Route::get('admin/faq', 'App\Modules\Faq\Controllers\FaqController@faq');