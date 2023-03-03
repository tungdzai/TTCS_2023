<?php

namespace App\Repositories\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class UserReponsitory implements UserReponsitoryInterface
{

    /**handle paginate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateUser(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Users::paginate(15);
    }

    /**Handle addUser
     * @param $data
     * @return bool
     */
    public function addUser($data)
    {
        return Users::create($data);
    }

    /**Handle getUser
     * @param $id
     * @return Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getUser($id)
    {
        return Users::select('user_name', 'email', 'first_name', 'last_name', 'birthday', 'avatar')->where("id", $id)->first();
    }

    /**Handle updateUser
     * @param $data
     * @param $id
     * @return int
     */
    public function updateUser($data, $id): int
    {
        return Users::where("id", $id)->update($data);
    }

    /** Handle Delete User
     * @param $id
     * @return int
     */
    public function deleteUser($id): int
    {
        $user = Users::find($id);
        return $user->delete();
    }

}
