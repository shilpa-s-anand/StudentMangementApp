<?php

  Route::group(['middleware' => ['web','auth'], 'namespace' => 'App\Modules\Students\Controllers'], function() {

	Route::get('/students/create',  ['as' => 'students.create', 'uses' => 'StudentController@create']);

	Route::post('/students/create', ['as' => 'students.create', 'uses' => 'StudentController@store']);

  Route::get('/students/list',    ['as' => 'students.list',   'uses' => 'StudentController@index']);

  Route::post('/students/edit',   ['as' => 'students.edit',   'uses' => 'StudentController@edit']);

	Route::get('/students/{id}',    ['as' => 'students.show',   'uses' => 'StudentController@show']);

  Route::post('/students/update', ['as' => 'students.update',   'uses' => 'StudentController@update']);



  Route::get('/students/marks/enroll', ['as' => 'students.marks.enroll',   'uses' => 'StudentController@add_marks']);


});

?>
