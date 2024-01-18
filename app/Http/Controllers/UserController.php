<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($name)
    {
        // Tìm kiếm người dùng theo $name theo cột "name" trong bảng "user"
        // first() trả về một đối tượng người dùng hoặc null
        $user = User::where('name', $name)->first();
        if (!$user) {
            return view('users.notfound');
        }
        return view('users.show',['user' => $user]);
    }
}
