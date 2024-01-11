<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function Index(){
        return view('Article', [
            "metadata" => [
                "title" => "Artikel | SB",
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
            ]
        ]);
    }
}
