<?php

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
                "description" => "Syihab blog adalah sebuah website penyedia informasi yang berkaitan dengan IT, seperti Web Development, Android Development, Machine Learning, Data Mining, dan lainnya",
                "robots" => "index, follow",
                "keywords" => "blog, artikel, belajar coding, belajar it, tutorial machine learning, tutorial data mining",
                "og:title" => "Syihab Blog",
                "og:description" => "Syihab blog adalah sebuah website penyedia informasi yang berkaitan dengan IT, seperti Web Development, Android Development, Machine Learning, Data Mining, dan lainnya",
                "og:url" => "https://syihab-blog.vercel.app/",
                "og:sitename" => "Syihab Blog",
                "og:type" => "article",
                "og:locale" => "en_US"
            ]),
            "link" => collect([
                "canonical" => "https://syihab-blog.vercel.app/"
            ])
        ]
    ]);
});
Route::get('/auth/register', function () {
    return view('Register', [
        "metadata" => [
            "title" => "Registration | Syihab Blog",
            "meta" => collect([
                "description" => "Registration form untuk mendaftar di platform Syihab Blog",
                "robots" => "index, follow",
                "keywords" => "register syihab blog, daftar syihab blog, registration syihab blog, akub baru syihab blog, buat akun syihab blog",
                "og:title" => "Register | Syihab Blog",
                "og:description" => "Registration form untuk mendaftar di platform Syihab Blog",
                "og:url" => "https://syihab-blog.vercel.app/auth/register",
                "og:sitename" => "Syihab Blog",
                "og:type" => "article",
                "og:locale" => "en_US"
            ]),
            "link" => collect([
                "canonical" => "https://syihab-blog.vercel.app/auth/register"
            ])
        ]
    ]);
});
Route::get('/auth/login', function () {
    return view('Login', [
        "metadata" => [
            "title" => "Login | Syihab Blog",
            "meta" => collect([
                "description" => "Login form untuk masuk ke dalam platform Syihab Blog",
                "robots" => "index, follow",
                "keywords" => "login syihab blog, masuk syihab blog, sign in syihab blog, dashboard syihab blog",
                "og:title" => "Login | Syihab Blog",
                "og:description" => "Login form untuk masuk ke dalam platform Syihab Blog",
                "og:url" => "https://syihab-blog.vercel.app/auth/login",
                "og:sitename" => "Syihab Blog",
                "og:type" => "article",
                "og:locale" => "en_US"
            ]),
            "link" => collect([
                "canonical" => "https://syihab-blog.vercel.app/auth/login"
            ])
        ]
    ]);
});
Route::get('/categories', function () {
    return view('Categories', [
        "metadata" => [
            "title" => "Categories | Syihab Blog",
            "meta" => collect([
                "description" => "Daftar Kategori blog di platform Syihab Blog",
                "robots" => "index, follow",
                "keywords" => "register syihab blog, daftar syihab blog, registration syihab blog, akub baru syihab blog, buat akun syihab blog",
                "og:title" => "Categories | Syihab Blog",
                "og:description" => "Daftar Kategori blog di platform Syihab Blog",
                "og:url" => "https://syihab-blog.vercel.app/categories",
                "og:sitename" => "Syihab Blog",
                "og:type" => "article",
                "og:locale" => "en_US"
            ]),
            "link" => collect([
                "canonical" => "https://syihab-blog.vercel.app/categories"
            ])
        ]
    ]);
});
Route::get('/blog', function () {
    return view('Article', [
        "metadata" => [
            "title" => "Artikel | Syihab Blog",
            "meta" => collect([
                "description" => "Daftar artikel di platform Syihab Blog",
                "robots" => "index, follow",
                "keywords" => "syihab blog, list artikel syihab blog, list tutorial belajar coding",
                "og:title" => "Artikel | Syihab Blog",
                "og:description" => "Daftar artikel di platform Syihab Blog",
                "og:url" => "https://syihab-blog.vercel.app/blog",
                "og:sitename" => "Syihab Blog",
                "og:type" => "article",
                "og:locale" => "en_US"
            ]),
            "link" => collect([
                "canonical" => "https://syihab-blog.vercel.app/blog"
            ])
        ]
    ]);
});
Route::get('/usr/dashboard', function () {
    return view('User.Dashboard', [
        "metadata" => [
            "title" => "Dashboard | Syihab Blog",
            "meta" => collect([
                "description" => "Dashboard user platform Syihab Blog sebagai tempat pengelolaan data artikel dan kategori",
                "robots" => "index, follow",
                "keywords" => "syihab blog, list artikel syihab blog, list tutorial belajar coding",
                "og:title" => "Dashboard | Syihab Blog",
                "og:description" => "Dashboard user platform Syihab Blog sebagai tempat pengelolaan data artikel dan kategori",
                "og:url" => "https://syihab-blog.vercel.app/usr/dashboard",
                "og:sitename" => "Syihab Blog",
                "og:type" => "article",
                "og:locale" => "en_US"
            ]),
            "link" => collect([
                "canonical" => "https://syihab-blog.vercel.app/usr/dashboard"
            ])
        ]
    ]);
});

Route::get('/usr/myblog', function () {
    return view('User.Myblog', [
        "metadata" => [
            "title" => "My Blog | Syihab Blog",
            "meta" => collect([
                "description" => "Daftar artikel yang telah saya buat di Syihab Blog",
                "robots" => "index, follow",
                "keywords" => "syihab blog, list artikel syihab blog, list tutorial belajar coding",
                "og:title" => "My Blog | Syihab Blog",
                "og:description" => "Daftar artikel yang telah saya buat di Syihab Blog",
                "og:url" => "https://syihab-blog.vercel.app/usr/dashboard",
                "og:sitename" => "Syihab Blog",
                "og:type" => "article",
                "og:locale" => "en_US"
            ]),
            "link" => collect([
                "canonical" => "https://syihab-blog.vercel.app/usr/dashboard"
            ])
        ]
    ]);
});
Route::get('/usr/setting', function () {
    return view('User.Setting', [
        "metadata" => [
            "title" => "Setting | Syihab Blog",
            "meta" => collect([
                "description" => "Pengaturan untuk melakukan perubsahaan pada akun pengguna Syihab Blog",
                "robots" => "index, follow",
                "keywords" => "syihab blog, list artikel syihab blog, list tutorial belajar coding",
                "og:title" => "Setting | Syihab Blog",
                "og:description" => "Pengaturan untuk melakukan perubsahaan pada akun pengguna Syihab Blog",
                "og:url" => "https://syihab-blog.vercel.app/usr/dashboard",
                "og:sitename" => "Syihab Blog",
                "og:type" => "article",
                "og:locale" => "en_US"
            ]),
            "link" => collect([
                "canonical" => "https://syihab-blog.vercel.app/usr/dashboard"
            ])
        ]
    ]);
});