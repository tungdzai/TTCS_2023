<?php
return [
    'errors' => [
        'login' => 'Login failed!',
        'addUser' => "Add new failed!",
        'updateUser' => "New failed! ",
        'deleteAjax'=>"Delete failed !"
    ],

    'success' => [
        'addUser' => "New successfully added",
        'successUpdate' => 'Update successful',
        'deleteUser' => 'Delete successful'
    ],

    'messages' => [
        'required' => ':attribute cannot be empty ! ',
        'min' => ':attribute min :min characters !',
        'max' => ':attribute max :max characters ! ',
        'unique' => ':attribute already exists on the system!',
        'format'=>':attribute is not in the correct format!',
        'image'=>':attribute is a png , jpg ,jpeg !',
        'integer'=>':attribute must be an integer !',
        'date'=>":attribute must be date month year !",
        'after'=>":attribute must be greater than current time !",
        'alpha_num'=>":attribute contains only a-z, A-Z, 0-9 !"

    ],
    'attributes' => [
        'user' => 'user',
        'email' => "Email",
        'first_name' => "First Name",
        'last_name' => "Last Name",
        'birthday' => "Birthday",
        'avatar'=>'Avatar',
        'province'=>"Province/City",
        'district'=>'District/District',
        'commune'=>"Ward/Commune",
        'address'=>"Address",
    ],

    'attributesProduct' => [
        'name' => 'Name',
        'stock' => "Stock",
        'expired_at' => "Expired at",
        'avatar' => "Avatar",
        'sku' => "Sku",
        'category_id'=>'Category ID'
    ],



];
