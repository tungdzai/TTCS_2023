<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  App\Http\Requests\home\PostRequest;
use App\Repositories\User\UserReponsitoryInterface;

class HomeController extends Controller
{
    protected $userRepository;
    public function __construct(UserReponsitoryInterface $userRepository)
    {
        $this->userRepository =$userRepository;
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

    /** get View add
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getAdd()
    {
        return view('admin.add');
    }

    /** handle add
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAdd(PostRequest $request)
    {
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
        $status = $this->userRepository->addUser($dataUser);
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
        $getUser = $this->userRepository->getUser($id);
        $data['getUser'] = $getUser;
        if (!empty($getUser)) {
            $request->session()->put('id', $id);
            return view('admin.edit', $data);
        }
        return redirect()->route('admin.home');
    }

    /**
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(PostRequest $request)
    {
        $id = session('id');
        $dataUpdate = [
            'email' => $request->email,
            'user_name' => $request->user,
            'birthday' => $request->birthday,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'updated_at' => date(now('Asia/Ho_Chi_Minh')),
        ];
        $status = $this->userRepository->updateUser($dataUpdate, $id);
        if ($status) {
            return redirect()->route('admin.home')->with('successUpdate', __('messages.success.successUpdate'));
        } else {
            return redirect()->route('admin.getEdit')->with('errorUpdate', __('messages.errors.updateUser'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function deleteUser(Request $request)
    {
        $id = $request->get('id');
        $status = $this->userRepository->deleteUser($id);
        if ($status) {
            return redirect()->route("admin.home")->with("successDelete", __('messages.success.deleteUser'));
        }
    }
}
