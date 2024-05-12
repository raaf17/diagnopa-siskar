<?php

use App\Models\Posts;
use App\Http\Controllers\AuthAdmin;
use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\DashboardUser;

use App\Http\Controllers\AuthUser;
use App\Http\Controllers\DataGejala;
use App\Http\Controllers\DataPenyakit;
use App\Http\Controllers\DataPost;
use App\Http\Controllers\DataUser;
use App\Http\Controllers\DiagnosaPenyakit;
use App\Http\Controllers\PostsHome;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/', [PostsHome::class, 'index'])->name('home');
Route::get('/post/{post:slug}', [PostsHome::class, 'show'])->name('single.post');

// Admin
Route::get('/admin/login', [AuthAdmin::class, 'index'])->name('admin.login')->middleware('guest');
Route::post('/admin/login', [AuthAdmin::class, 'authenticate'])->name('admin.auth');
Route::post('/admin/logout', [AuthAdmin::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('admin/dashboard', [DashboardAdmin::class, 'index'])->name('admin.dashboard');

    Route::resource('admin/dashboard/gejala', DataGejala::class);
    Route::get('/admin/dashboard/slugGejala', [DataGejala::class, 'checkSlug']);

    Route::resource('admin/dashboard/penyakit', DataPenyakit::class);
    Route::get('/admin/dashboard/slugPenyakit', [DataPenyakit::class, 'checkSlug']);

    Route::resource('admin/dashboard/datauser', DataUser::class);
    
    Route::resource('admin/dashboard/post', DataPost::class);
    Route::get('admin/dashboard/slugPost', [DataPost::class, 'checkSlug']);
});

// User
Route::get('/user/register', [AuthUser::class, 'register'])->name('user.register');
Route::post('/user/register', [AuthUser::class, 'store'])->name('user.store');
Route::get('/user/login', [AuthUser::class, 'index'])->name('user.login');
Route::post('/user/login', [AuthUser::class, 'authenticate'])->name('user.auth');
Route::post('/user/logout', [AuthUser::class, 'logout'])->name('user.logout');

Route::middleware('auth:users')->group(function () {
    Route::get('user/dashboard', [DashboardUser::class, 'index'])->name('user.dashboard');
    Route::resource('user/diagnosa', DiagnosaPenyakit::class);
});


