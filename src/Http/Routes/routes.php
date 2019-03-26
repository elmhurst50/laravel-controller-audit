<?php
Route::group(['middleware' => ['audit', 'audit', 'web', 'auth']], function () {
    Route::get('/laravel-controller-audit', ['as' => 'laravel-controller-audit.index', 'uses' => '\SamJoyce777\LaravelControllerAudit\Http\Controllers\StatisticsController@index']);
    Route::post('/laravel-controller-audit', ['as' => 'laravel-controller-audit.index.post', 'uses' => '\SamJoyce777\LaravelControllerAudit\Http\Controllers\StatisticsController@indexPost']);

    Route::get('/laravel-console-audit', ['as' => 'laravel-console-audit.index', 'uses' => '\SamJoyce777\LaravelControllerAudit\Http\Controllers\StatisticsController@consoleIndex']);
    Route::post('/laravel-console-audit', ['as' => 'laravel-console-audit.index.post', 'uses' => '\SamJoyce777\LaravelControllerAudit\Http\Controllers\StatisticsController@consoleIndexPost']);
});