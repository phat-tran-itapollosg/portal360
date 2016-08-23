
<?php
Route::group(['namespace' => 'Alpha_team\APOLLO\Controllers', 'prefix' => 'alpha_team/apollo'], function () {
    Route::get('/', ['as' => 'apollo_path', 'uses' => 'APOLLOController@index']);
});