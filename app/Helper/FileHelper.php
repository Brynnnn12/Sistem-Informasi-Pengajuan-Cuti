<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FileHelper
{
    public static function uploadLampiran($file, $folder = 'lampiran_keterangan')
    {
        return $file->store($folder, 'public');
    }

    public static function deleteLampiran($path)
    {
        if ($path && Storage::exists('public/' . $path)) {
            Storage::delete('public/' . $path);
        }
    }
}
