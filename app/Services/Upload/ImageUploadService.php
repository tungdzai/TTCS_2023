<?php

namespace App\Services\Upload;

class ImageUploadService implements ImageUploadServiceInterface
{

    public function upload($file)
    {
        $filename = $file->getClientOriginalName();
        $file->move(public_path('upload/user/avatar'), $filename);
        return $filename;
    }
}
