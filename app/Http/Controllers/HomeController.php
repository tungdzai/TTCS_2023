<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /** paginateUser
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $model= new Users();
        $users=$model->paginateUser();
        $data["users"]=$users;
        return view('admin.users',$data);

    }
    public function getAdd(){
        return view('admin.add');
    }
    public function postAdd(Request $request){
        $rules=[
            'user'=>'required|min:6',
            'email'=>'required|email|unique:users',
            'first_name'=>'required|max:50',
            'last_name'=>'required|max:50',
            'birthday'=>'required|min:18',
        ];
        $messages=[
            'user.required'=>"User không được để trống !",
            'user.min'=>"User tối thiểu :min kí tự !",
            "email.required"=>"Email không được để trống !",
            'email.email'=>"Email chưa đúng định dạng !",
            'email.unique'=>"Email đã tồn tại trên hệ thống ! ",
            'first_name.required'=>"First Name không được để  trống !",
            'first_name.max'=>"First Name không được quá 50 kí tự ! ",
            'last_name.required'=>"Last Name không được để  trống !",
            'last_name.max'=>"Last Name không được quá 50 kí tự ! ",
            'birthday'=>"Birthday không được để trống! ",
        ];
        $request->validate($rules,$messages);
    }
}
