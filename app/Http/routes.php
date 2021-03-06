<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
$role = Request::query('role');
if(!$role){
    $role = 'builder';
}
View::share('role', $role);
Route::get('/', [
    'as' => 'index',
    'uses' => 'AreaController@index'
]);

Route::post('upload', [
    'as' => 'photoUpload',
    'uses' => 'AreaController@photoUpload'
]);

Route::get('show/{id}', [
    'as' => 'issue.show',
    'uses' => 'AreaController@showIssue'
]);

Route::resource('issues', 'IssueController');

Route::post('issue/{id}', [
    'as' => 'issue.update',
    'uses' => 'AreaController@update'
]);
