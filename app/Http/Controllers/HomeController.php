<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title = "Homepage";
        // compact Tạo một mảng từ các biến có sẵn trong phạm vi hiện tại. 
        // Nó nhận vào danh sách các biến và tạo ra một mảng với các phần tử có tên là tên biến và giá trị là giá trị của biến tương ứng.
        // compact($title)
        return view('welcome',['title'=>$title]); // 
    }
}
