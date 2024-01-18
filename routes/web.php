<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Nhiệm vụ 1: trỏ URL "/" tới "index" của phương thức HomeController
Route::get('/',[HomeController::class,'index']);

// Nhiệm vụ 2: trỏ URL GET "/user/[name]" tới phương thức "show" của UserController
// Nó không sử dụng Ràng buộc mô hình tuyến đường, nó mong đợi $name làm tham số
Route::get('/user/{name}',[UserController::class,'show']);


// Nhiệm vụ 3: trỏ URL GET "/about" vào view resources/views/pages/about.blade.php - không có controller
// Ngoài ra, đặt tên cho tuyến đường "about"
Route::get('/about',function(){
    return view('pages.about');
})->name('about');


// Nhiệm vụ 4: chuyển hướng URL GET  "log-in" sang URL "login"
Route::get('/log-in',function(){
    return redirect('/login'); // redirect dùng để chuyển hướng URL
});

Route::group(['middleware' => 'auth'], function () {
    // Nhiệm vụ bên trong nhóm:
    
    // Nhiệm vụ 6: nhóm ứng dụng trong một nhóm
    // Thêm một nhóm khác cho các tuyến có prefix "app"
    Route::group(['prefix'=>'app'],function(){
        
        // Nhiệm vụ 7: trỏ URL /app/dashboard tới DashboardController "Single Action"
        // Gán tên tuyến đường "dashboard"
        Route::get('/dashboard',function(){
            return view('app.dashboard');
        })->name('dashboard');
        
        // Nhiệm vụ 8: Quản lý tác vụ với URL /app/tasks/***.
        // Thêm MỘT dòng để gán 7 tuyến tài nguyên cho TaskController
        Route::get('/tasks',[TaskController::class,'index']);
        
    });
    
    
    // Nhiệm vụ 9: nhóm quản trị viên trong một nhóm
    Route::group(['prefix' => 'admin', 'middleware' => 'is_admin'], function () {
        
        // Nhiệm vụ 10: trỏ URL /admin/dashboard tới Admin/DashboardController "Single Action"
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
        
        // Nhiệm vụ 11: trỏ URL /admin/stats tới Admin/StatsController "Single Action"
        Route::get('/stats', 'Admin\StatsController@index')->name('admin.stats');
        
    });
    
});