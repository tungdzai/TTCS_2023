<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserAvatarController extends Controller
{
    public function index(){
        return view("upload.avatar");
    }
    public function uploadAvatar(Request $request)
    {
        $model= new Users();
        /**
         * validate avatar
         */
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png|max:3072',
        ]);
    }
}
