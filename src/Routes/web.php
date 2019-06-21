<?php

    Route::middleware('web')->group(function (){
        Route::post('/postSearch',[
            'as'=> 'searchPath',
            'uses' => \CungHocVui\Analytics\Controllers\AnalyticsController::class.'@postSearch'
        ]);
        Route::get('/index', \CungHocVui\Analytics\Controllers\AnalyticsController::class."@index");
    });