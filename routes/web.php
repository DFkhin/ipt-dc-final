<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogController;
use App\Models\Blog;
use App\Models\Log;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'loginForm'])->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/verification/{user}/{token}', [AuthController::class, 'verification']);
Route::get('logout', [AuthController::class, 'logout']);



Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/create-blog', [BlogController::class, 'createBlogs']);
    Route::get('/recent-blog', [BlogController::class, 'recentBlogs']);
    Route::get('/my-blog', [BlogController::class, 'myBlogs']);
});


Route::group(['middleware' => ['auth', 'role:writer']], function () {
    Route::get('/dashboard', function() {
        $allBlogs = Blog::count();
        $blogs = Blog::where('user_id', auth()->user()->id)->count();
        $logs = Log::count();

        return view('/dashboard', compact('allBlogs', 'logs', 'blogs'));
    });

});
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/log', [SiteController::class, 'logs']);

});


Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/users', UserController::class);
});
