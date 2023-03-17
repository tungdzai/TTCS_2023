<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class SearchUserController extends Controller
{
    public $query;

    public function __construct()
    {
        $this->query = Users::select(
            'id',
            'email',
            'user_name',
            'birthday',
            'first_name',
            'last_name',
            'flag_delete'
        );
    }

    /** handle search user
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $this->query->where(function ($query) use ($keyword) {
            $query->where('first_name', 'like', '%' . $keyword . '%')
                ->orWhere('last_name', 'like', '%' . $keyword . '%')
                ->orWhere('user_name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%');
        });
        session()->flash("titleSearch", $request->input("search"));
        $users = $this->query;
        $data["users"] = $users->paginate(15);
        return view('admin.users', $data);
    }
}
