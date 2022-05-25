<?php

    Route::get('index.php', function () {
        IndexController::CreateView('IndexView');
    });

    Route::get('jobs',[JobController::class, 'index']);
    Route::get('jobs_create',[JobController::class, 'create']);
    Route::get('jobs_edit',[JobController::class, 'edit']);

    Route::post('jobs',[JobController::class, 'store']);

    Route::put('jobs_update',[JobController::class, 'update']);

    Route::delete('jobs_delete',[JobController::class, 'delete']);

    Route::get('countries',[CountryController::class, 'index']);
    Route::get('countries_create',[CountryController::class, 'create']);
    Route::get('countries_edit',[CountryController::class, 'edit']);

    Route::post('countries',[CountryController::class, 'store']);

    Route::put('countries_update',[CountryController::class, 'update']);

    Route::delete('countries_delete',[CountryController::class, 'delete']);

    Route::get('regions',[RegionController::class, 'index']);
    Route::get('regions_create',[RegionController::class, 'create']);
    Route::get('regions_edit',[RegionController::class, 'edit']);

    Route::post('regions',[RegionController::class, 'store']);

    Route::put('regions_update',[RegionController::class, 'update']);

    Route::delete('regions_delete',[RegionController::class, 'delete']);



