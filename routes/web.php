<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('Homepage', [
        "metadata" => [
            "title" => "Syihab Blog",
            "meta" => collect([
                "description" => "Syihab blog adalah sebuah website penyedia informasi yang berkaitan dengan berbagai bidang, seperti IT, Teknologi, Data Mining, Bisnis, SEO, Pertanian, Perhutnan dan lainnya",
                "robots" => "index, follow",
                "keywords" => "blog, artikel, belajar coding, belajar it, belajar machine learning, belajar data mining, belajar seo, info perhutanan, info pertaninan",
                "og:title" => "Syihab Blog",
                "og:description" => "Syihab blog adalah sebuah website penyedia informasi yang berkaitan dengan berbagai bidang, seperti IT, Data Mining, Bisnis, SEO, Pertanian, Perhutnan dan lainnya",
                "og:url" => "https://syihab-blog.vercel.app/",
                "og:sitename" => "Syihab Blog",
                "og:type" => "article",
                "og:locale" => "en_US"
            ]),
            "link" => collect([
                "canonical" => "https://syihab-blog.vercel.app/",
                "url" => "https://syihab-blog.vercel.app/",
            ])
        ]
    ]);
});

Route::get('/auth/register', [AuthController::class, "Register"]);
Route::post('/auth/register', [AuthController::class, "HandleRegister"]);
Route::get('/auth/login', [AuthController::class, "Login"])->name('login');
Route::post('/auth/login', [AuthController::class, "HandleLogin"]);
Route::get('/auth/logout', [AuthController::class, "HandleLogout"])->middleware('auth');

Route::get('/categories', [CategoryController::class, "Index"]);
Route::post('/categories', [CategoryController::class, "Create"]);
Route::get('/categories/{slug}', [CategoryController::class, "CategorySlug"]);

Route::get('/blog', [PostController::class, "Index"]);
Route::get('/blog/{slug}', [PostController::class, "ArtikelSlug"]);
Route::post('/blog/create', [PostController::class, "HandleUpload"]);

Route::get('/usr/dashboard', [DashboardController::class, "Index"])->middleware('auth');
Route::get('/usr/myblog', [DashboardController::class, "MyBlog"])->middleware('auth');
Route::get('/usr/myblog/create', [DashboardController::class, "CreatePost"])->middleware('auth');
Route::get('/usr/categories', [DashboardController::class, "Categories"])->middleware('auth');
Route::get('/usr/setting', [DashboardController::class, "Setting"])->middleware('auth');
Route::put('/usr/setting', [UserController::class, "Update"])->middleware('auth');