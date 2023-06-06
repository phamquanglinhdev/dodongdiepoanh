<?php

namespace App\Untils;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadBase64
{
    public static function run(string $param, string $folder, string $name = null): string
    {
        list($extension, $content) = explode(';', $param);
        $tmpExtension = explode('/', $extension);
        preg_match('/.([0-9]+) /', microtime(), $m);
        $fileName = sprintf('%s%s.%s', $name ?? date('YmdHis'), $m[1], $tmpExtension[1]);
        $content = explode(',', $content)[1];
        $storage = Storage::disk('uploads');
        $storage->put($folder . $fileName, base64_decode($content), 'public');

        return $fileName;
    }
}
