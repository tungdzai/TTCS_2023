<?php
return [
    'errors' => [
        'login' => 'Đăng nhập không thành công !',
        'addUser' => "Thêm mới không thành công ! ",
        'updateUser' => "Thêm mới không thành công ! ",
        'deleteAjax'=>"Xóa không thành công !"
    ],
    'success' => [
        'addUser' => "Thêm mới thành công",
        'successUpdate' => 'Update thành công ',
        'deleteUser' => 'Xóa thành công'
    ],
    'messages' => [
        'required' => ':attribute không được để trống ! ',
        'min' => ':attribute tối thiểu :min kí tự !',
        'max' => ':attribute tối đa :max kí tự ! ',
        'unique' => ':attribute đã tồn tại trên hệ thống !',
        'format'=>':attribute chưa đúng định dạng!',
        'image'=>':attribute là file png , jpg ,jpeg !',
        'integer'=>':attribute phải là số nguyên !',
        'date'=>":attribute phải là ngày tháng năm !",
        'after'=>":attribute phải lớn hơn thời gian hiện tại !",
        'alpha_num'=>":attribute chỉ chứa a-z, A-Z, 0-9 !",
        'before'=>":attribute phải lớn hơn 18 ! ",
        'avatarMax'=>":attribute max 3MB ",
        'exists'=>":attribute không tồn tại !",
        'regex'=>":attribute chưa đúng định dạng"

    ],
    'attributes' => [
        'user' => 'User',
        'email' => "Email",
        'first_name' => "First Name",
        'last_name' => "Last Name",
        'birthday' => "Birthday",
        'avatar'=>'Avatar',
        'province'=>"Tỉnh/Thành phố",
        'district'=>'Quận/Huyện',
        'commune'=>"Phường/Xã",
        'address'=>"Địa chỉ ",

    ],

    'attributesProduct' => [
        'name' => 'Name',
        'stock' => "Stock",
        'expired_at' => "Expired at",
        'avatar' => "Avatar",
        'sku' => "Sku",
        'category_id'=>'Category ID'
    ],
    'attributesUserLogin'=>[
        'email'=>'Email',
        'password'=>"Password"
    ],
    'attributesCustomer'=>[
        'phone'=>'Số điện thoại',
        'password'=>"Mật khẩu"
    ]



];
