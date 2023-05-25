<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

class DownloadController extends Controller
{
    public function download($filename)
    {
        $path = storage_path('app/public/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }
        if (!is_readable($path)) {
                    abort(403, 'Доступ запрещен');
        }

        return Response::download($path);
    }
}
