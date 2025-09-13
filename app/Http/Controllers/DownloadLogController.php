<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadLogController extends Controller
{
    public function logDownload(Request $request)
    {
        $logFile = storage_path('logs/download-count.log');
        $count = 0;
        if (file_exists($logFile)) {
            $count = (int)file_get_contents($logFile);
        }
        $count++;
        file_put_contents($logFile, $count);
        return response()->json(['count' => $count]);
    }
}
