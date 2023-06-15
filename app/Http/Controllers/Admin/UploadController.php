<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function ckeditor(Request $request)
    {
        $random = Str::random(5);
        /**
         * @var UploadedFile $upload
         */
        $upload = $request->file("file");
        $upload->move(public_path() . "/uploads/news/", $random . $upload->getClientOriginalName());
        $url = "/uploads/news/" . $random . $upload->getClientOriginalName();
        return [
            "location" => url($url)
        ];
    }
}
