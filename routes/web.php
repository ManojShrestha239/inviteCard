<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DownloadLogController;

Route::get('/', function () {
    return view('invite');
});

Route::get('/invitee', function () {
    return view('invite-with-name');
});

Route::post('/log-download', [DownloadLogController::class, 'logDownload']);
