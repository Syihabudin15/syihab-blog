<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
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
Route::get('/auth/login', [AuthController::class, "Login"]);
Route::post('/auth/login', [AuthController::class, "HandleLogin"]);
Route::get('/auth/logout', [AuthController::class, "HandleLogout"]);

Route::get('/categories', [CategoryController::class, "Index"]);

Route::get('/blog', [PostController::class, "Index"]);

Route::get('/usr/dashboard', [DashboardController::class, "Index"]);
Route::get('/usr/myblog', [DashboardController::class, "MyBlog"]);
Route::get('/usr/setting', [DashboardController::class, "Setting"]);