<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Index(){
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
            ]
        ]);
    }

    public function MyBlog(){
        return view('User.Myblog', [
            "metadata" => [
                "title" => "My Blog | SB",
                "meta" => collect([
                    "description" => "Menampilkan list blog atau artikel yang telah anda buat. termasuk yang telah diposting, belum diposting maupun yang telah diposting.",
                    "robots" => "index, follow",
                    "keywords" => "my blog sb, my blog syihab blog, blog saya, artikel saya sb, sb my blog",
                    "og:title" => "My Blog | SB",
                    "og:description" => "Menampilkan list blog atau artikel yang telah anda buat. termasuk yang telah diposting, belum diposting maupun yang telah diposting.",
                    "og:url" => "https://syihab-blog.vercel.app/usr/dashboard",
                    "og:sitename" => "Syihab Blog",
                    "og:type" => "article",
                    "og:locale" => "en_US"
                ]),
                "link" => collect([
                    "canonical" => "https://syihab-blog.vercel.app/usr/dashboard",
                    "url" => "https://syihab-blog.vercel.app/usr/dashboard"
                ])
            ]
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
    }
}
