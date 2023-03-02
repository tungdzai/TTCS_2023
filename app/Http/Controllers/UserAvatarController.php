<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class UserAvatarController extends Controller
{
    public function index()
    {
        return view("upload.avatar");
    }

    public function uploadAvatar(Request $request, Users $user)
    {
        /**
         * validate avatar
         */
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png|max:3072',
        ]);

        // upload new avatar
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('upload/user/avatar'), $file_name);
//            $user->avatar = $path;
        } else {
            $user->avatar = null;
        }
    }
}
