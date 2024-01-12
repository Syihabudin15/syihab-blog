<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function Index(){
        $temp = Post::where("user_id", "=", Auth::user()->id);
        $all = $temp->get();
        $posting = $temp->where("isPost", "=", true)->get();
        $unPost = $temp->where("isPost", "=", false)->get();
        return view('User.Dashboard', [
            "metadata" => [
                "title" => "Dashboard | SB",
                "meta" => collect([
                    "description" => "Dashboard user platform Syihab Blog sebagai tempat pengelolaan data blog dan artikel",
                    "robots" => "index, follow",
                    "keywords" => "syihab blog, dashboard sb, dashboard syihab blog",
                    "og:title" => "Dashboard | SB",
                    "og:description" => "Dashboard user platform Syihab Blog sebagai tempat pengelolaan data blog dan artikel",
                    "og:url" => "https://syihab-blog.vercel.app/usr/dashboard",
                    "og:sitename" => "Syihab Blog",
                    "og:type" => "website",
                    "og:locale" => "en_US"
                ]),
                "link" => collect([
                    "canonical" => "https://syihab-blog.vercel.app/usr/dashboard",
                    "url" => "https://syihab-blog.vercel.app/usr/dashboard"
                ])
            ],
            "all" => $all,
            "posting" => count($posting),
            "unPost" => count($unPost)
        ]);
    }

    public function MyBlog(){
        $all = Post::where("user_id", "=", Auth::user()->id)->get();
        return view('User.Myblog', [
            "metadata" => [
                "title" => "My Blog | SB",
                "meta" => collect([
                    "description" => "Menampilkan list blog atau artikel yang telah anda buat. termasuk yang telah diposting, belum diposting maupun yang telah diposting.",
                    "robots" => "index, follow",
                    "keywords" => "my blog sb, my blog syihab blog, blog saya, artikel saya sb, sb my blog, blog ".Auth::user()->name,
                    "og:title" => "My Blog | SB",
                    "og:description" => "Menampilkan list blog atau artikel yang telah anda buat. termasuk yang telah diposting, belum diposting maupun yang telah diposting.",
                    "og:url" => "https://syihab-blog.vercel.app/usr/myblog",
                    "og:sitename" => "Syihab Blog",
                    "og:type" => "article",
                    "og:locale" => "en_US"
                ]),
                "link" => collect([
                    "canonical" => "https://syihab-blog.vercel.app/usr/myblog",
                    "url" => "https://syihab-blog.vercel.app/usr/myblog"
                ])
            ],
            "myPost" => $all
        ]);
    }

    public function Setting(){
        return view('User.Setting', [
            "metadata" => [
                "title" => "Setting | Syihab Blog",
                "meta" => collect([
                    "description" => "Pengaturan untuk melakukan perubsahaan pada akun pengguna Syihab Blog",
                    "robots" => "index, follow",
                    "keywords" => "syihab blog, list artikel syihab blog, list tutorial belajar coding",
                    "og:title" => "Setting | Syihab Blog",
                    "og:description" => "Pengaturan untuk melakukan perubsahaan pada akun pengguna Syihab Blog",
                    "og:url" => "https://syihab-blog.vercel.app/usr/setting",
                    "og:sitename" => "Syihab Blog",
                    "og:type" => "article",
                    "og:locale" => "en_US"
                ]),
                "link" => collect([
                    "canonical" => "https://syihab-blog.vercel.app/usr/setting",
                    "url" => "https://syihab-blog.vercel.app/usr/setting",
                ])
            ]
        ]);
    }

    public function Categories(){
        $result = Category::latest()->get();
        return view('User.Categories', [
            "metadata" => [
                "title" => "Kategori | Syihab Blog",
                "meta" => collect([
                    "description" => "Halaman untuk menajemen kategori di Syihab Blog",
                    "robots" => "index, follow",
                    "keywords" => "Kategori syihab blog, kategori sb, sb kategori",
                    "og:title" => "Kategori | Syihab Blog",
                    "og:description" => "Pengaturan untuk melakukan perubsahaan pada akun pengguna Syihab Blog",
                    "og:url" => "https://syihab-blog.vercel.app/usr/categories",
                    "og:sitename" => "Syihab Blog",
                    "og:type" => "article",
                    "og:locale" => "en_US"
                ]),
                "link" => collect([
                    "canonical" => "https://syihab-blog.vercel.app/usr/categories",
                    "url" => "https://syihab-blog.vercel.app/usr/categories",
                ])
            ],
            "categories" => $result
        ]);
    }
    
    public function CreatePost(){
        $category = Category::latest()->get();
        return view('User.CreatePost', [
            "metadata" => [
                "title" => "Create Article | SB",
                "meta" => collect([
                    "description" => "Berikut list atau daftar artikel di Syihab Blog",
                    "robots" => "index, follow",
                    "keywords" => "syihab blog, list artikel syihab blog, list tutorial belajar coding, artikel sb, artikel syihab blog",
                    "og:title" => "Artikel | SB",
                    "og:description" => "Berikut list atau daftar artikel di Syihab Blog",
                    "og:url" => "https://syihab-blog.vercel.app/blog",
                    "og:sitename" => "Syihab Blog",
                    "og:type" => "article",
                    "og:locale" => "en_US"
                ]),
                "link" => collect([
                    "canonical" => "https://syihab-blog.vercel.app/blog",
                    "url" => "https://syihab-blog.vercel.app/blog"
                ])
            ],
            "categories" => $category
        ]);
    }
}
