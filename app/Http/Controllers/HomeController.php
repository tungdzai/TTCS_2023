<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /** paginateUser
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $model = new Users();
        $users = $model->paginateUser();
        $data["users"] = $users;
        return view('admin.users', $data);

    }

    public function getAdd()
    {
        return view('admin.add');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAdd(Request $request)
    {
        $rules = [
            'user' => 'required|min:6|unique:users,user_name',
            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'birthday' => 'required|date|before:-18 years',
        ];
        $messages = [
            'user.required' => "User không được để trống !",
            'user.min' => "User tối thiểu :min kí tự !",
            'user.unique' => "User đã tồn tại trên hệ thống!",

            "email.required" => "Email không được để trống !",
            'email.email' => "Email chưa đúng định dạng !",
            'email.unique' => "Email đã tồn tại trên hệ thống ! ",

            'first_name.required' => "First Name không được để  trống !",
            'first_name.max' => "First Name không được quá 50 kí tự ! ",

            'last_name.required' => "Last Name không được để  trống !",
            'last_name.max' => "Last Name không được quá 50 kí tự ! ",

            'birthday.required' => "Birthday không được để trống! ",
            'birthday.before' => "Tuổi phải lớn hơn 18 ! ",
        ];
        $request->validate($rules, $messages);
        $dataUser = [
            'email' => $request->email,
            'user_name' => $request->user,
            'birthday' => $request->birthday,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => bcrypt('1'),
            'reset_password' => bcrypt('1'),
            'status' => "active",
            'flag_delete' => 0,
            'created_at' => date(now('Asia/Ho_Chi_Minh')),
        ];
        $model = new Users();
        $status = $model->addUser($dataUser);
        if ($status) {
            return redirect()->route('admin.home')->with('successAdd', __('messages.success.addUser'));
        } else {
            return redirect()->route('admin.addUser')->with('errorAdd', __('messages.success.addUser'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function getEdit(Request $request)
    {
        $id = $request->get('id');
        $model = new Users();
        $getUser = $model->getUser($id);
        $data['getUser'] = $getUser;
        if (!empty($getUser)) {
            $request->session()->put('id', $id);
            return view('admin.edit', $data);
        }
        return redirect()->route('admin.home');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(Request $request)
    {
        $rules = [
            'user' => 'required|min:6',
            'email' => 'required|email',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'birthday' => 'required|date|before:-18 years',
        ];
        $messages = [
            'user.required' => "User không được để trống !",
            'user.min' => "User tối thiểu :min kí tự !",

            "email.required" => "Email không được để trống !",
            'email.email' => "Email chưa đúng định dạng !",

            'first_name.required' => "First Name không được để  trống !",
            'first_name.max' => "First Name không được quá 50 kí tự ! ",

            'last_name.required' => "Last Name không được để  trống !",
            'last_name.max' => "Last Name không được quá 50 kí tự ! ",

            'birthday.required' => "Birthday không được để trống! ",
            'birthday.before' => "Tuổi phải lớn hơn 18 ! ",
        ];
        $request->validate($rules, $messages);
        $id = session('id');
        $dataUpdate = [
            'email' => $request->email,
            'user_name' => $request->user,
            'birthday' => $request->birthday,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'updated_at' => date(now('Asia/Ho_Chi_Minh')),
        ];
        $model= new Users();
        $status=$model->updateUser($dataUpdate,$id);

        if ($status) {
            return redirect()->route('admin.home')->with('successUpdate', __('messages.success.addUser'));
        } else {
            return redirect()->route('admin.getEdit')->with('errorUpdate', __('messages.success.addUser'));
        }
    }
    public function delete(Request $request){

    }
}
