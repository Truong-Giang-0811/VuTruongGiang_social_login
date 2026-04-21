<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;

// 1. TRANG CHỦ (LOGIN)
// Nếu người dùng đã đăng nhập rồi (Auth::check), tự động chuyển sang Dashboard.
// Nếu chưa, hiển thị trang login.blade.php
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('login');
})->name('login');


// 2. CÁC ROUTE ĐIỀU HƯỚNG SOCIAL LOGIN
// {provider} là tham số động, có thể là 'google' hoặc 'facebook'
Route::get('/auth/{provider}/redirect', [SocialController::class, 'redirect'])
    ->name('social.redirect');

// Route nhận dữ liệu trả về từ Google/Facebook sau khi user đồng ý đăng nhập
Route::get('/auth/{provider}/callback', [SocialController::class, 'callback']);


// 3. TRANG DASHBOARD (CHỈ DÀNH CHO USER ĐÃ ĐĂNG NHẬP)
// Middleware 'auth' sẽ bảo vệ trang này, nếu chưa login mà cố vào sẽ bị đá về trang login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// 4. ROUTE ĐĂNG XUẤT
Route::post('/logout', [SocialController::class, 'logout'])->name('logout');
