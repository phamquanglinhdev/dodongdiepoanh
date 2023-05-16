<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class UploadController extends Controller
{
    public function ckeditor(Request $request)
    {
        /**
         * @var UploadedFile $upload
         */
        $upload = $request->file("upload");
        $upload->move(public_path() . "/uploads/news/", $upload->getClientOriginalName());
        $url = "/uploads/news/" . $upload->getClientOriginalName();
        return [
            "uploaded" => "true",
            "url" => url($url)
        ];
    }
}
