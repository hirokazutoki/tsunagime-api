<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpRequestController;

Route::group(['prefix' => 'v1'], function () {
    Route::get('version', function () {
        return response()->json(['version' => 'v1']);
    });

    // TODO: middleware
    Route::apiResource('help_requests', HelpRequestController::class);
});
