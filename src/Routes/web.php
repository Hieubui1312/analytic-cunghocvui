<?php

    Route::middleware('web')->group(function (){
        Route::post('/postSearch',[
            'as'=> 'searchPath',
            'uses' => '\CungHocVui\Analytics\Controllers\AnalyticsController@postSearch'
        ]);
        Route::get('/index/cunghocvui', "\CungHocVui\Analytics\Controllers\AnalyticsController@index");
    });
