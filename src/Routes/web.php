<?php


    Route::get('/demo', function (){
        echo "<h1>Hello World</h1>";
    });

    Route::get('/index', \CungHocVui\Analytics\Controllers\AnalyticsController::class."@index");
    Route::get('/search', \CungHocVui\Analytics\Controllers\AnalyticsController::class.'@search');

    Route::post('/postSearch',[
        'as'=> 'searchPath',
        'uses' => \CungHocVui\Analytics\Controllers\AnalyticsController::class.'@postSearch'
    ]);