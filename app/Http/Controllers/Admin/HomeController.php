<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Users;
use App\Repositories\User\UserReponsitoryInterface;
use Illuminate\Http\Request;
use App\Jobs\SendMail;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\UpdateRequest;

class HomeController extends Controller
{
    protected $userRepository;

    public function __construct(UserReponsitoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /** paginateUser
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $model = $this->userRepository->paginateUser();
        $data["users"] = $model;
        return view('admin.users', $data);

    }

    /**  View add User
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getAdd()
    {
        return view('admin.add');
    }

    /** handle addUser
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAdd(PostRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('upload/user/avatar'), $file_name);
            $pathAvatar = '/upload/user/avatar/' . $file_name;
        }
        $password = Str::random(10);
        $dataUser = [
            'email' => $request->email,
            'user_name' => $request->user,
            'birthday' => $request->birthday,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => bcrypt($password),
            'reset_password' => bcrypt('1'),
            'status' => "active",
            'avatar' => $pathAvatar,
            'flag_delete' => 0,
            'created_at' => date(now('Asia/Ho_Chi_Minh')),
            'address' => $request->address,
            'province_id' => $request->province,
            'district_id' => $request->district,
            'commune_id' => $request->commune

        ];
        $status = $this->userRepository->addUser($dataUser);
//        dd($request->email,$password);
        if ($status) {
            SendMail::dispatch($request->email, $password);
            session()->flash('successAdd', __('messages.success.addUser'));
            return redirect()->route('admin.home');
        } else {
            session()->flash('errorAdd', __('messages.success.addUser'));
            return redirect()->route('admin.addUser');
        }
    }

    /** View editUser and show DB User($id)
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function getEdit(Request $request)
    {
        $id = $request->get('id');
        $getUser = $this->userRepository->getUser($id);
        if (!empty($getUser)) {
            $data['getUser'] = $getUser;
            $request->session()->put('id', $id);
            $request->session()->put('imageUser', $getUser->avatar);
            return view('admin.edit', $data);
        }
        return redirect()->route('admin.home');
    }

    /** handle EditUser
     * @param UpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(UpdateRequest $request)
    {
        $id = session('id');
        $image_user = session('imageUser');
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('upload/user/avatar'), $file_name);
            $pathAvatar = '/upload/user/avatar/' . $file_name;
        } else {
            $pathAvatar = $image_user;
        }
        $dataUpdate = [
            'email' => $request->email,
            'user_name' => $request->user,
            'birthday' => $request->birthday,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'avatar' => $pathAvatar,
            'updated_at' => date(now('Asia/Ho_Chi_Minh')),
            'address' => $request->address,
            'province_id' => $request->province,
            'district_id' => $request->district,
            'commune_id' => $request->commune

        ];
        $status = $this->userRepository->updateUser($dataUpdate, $id);
        if ($status) {
            session()->flash('successUpdate', __('messages.success.successUpdate'));
            return redirect()->route('admin.home');
        } else {
            session()->flash('errorUpdate', __('messages.errors.updateUser'));
            return redirect()->route('admin.getEdit');
        }
    }

    /** delete user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function deleteUser(Request $request)
    {
        $id = $request->get('id');
        if (Users::where('id', $id)->exists()) {
            $status = $this->userRepository->deleteUser($id);
            if ($status) {
                return redirect()->route("admin.home")->with("successDelete", __('messages.success.deleteUser'));
            }
        } else {
            return redirect()->route('admin.home');
        }

    }
}
