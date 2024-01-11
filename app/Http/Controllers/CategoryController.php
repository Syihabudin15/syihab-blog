<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index(){
        return view("Categories", [
            "metadata" => [
                "title" => "Categories | SB",
                "meta" => collect([
                    "description" => "Berikut List atau daftar kategori di Syihab Blog. IT, Programming, SEO, Bisnis, Elektronik, Olahraga",
                    "robots" => "index, follow",
                    "keywords" => "daftar kategori, list kategori, kategori it, kategori seo, kategori elektronik, kategori olahraga, kategori web, kategori android",
                    "og:title" => "Categories | SB",
                    "og:description" => "Berikut List atau daftar kategori di Syihab Blog. IT, Programming, SEO, Bisnis, Elektronik, Olahraga",
                    "og:url" => "https://syihab-blog.vercel.app/categories",
                    "og:sitename" => "Syihab Blog",
                    "og:type" => "article",
                    "og:locale" => "en_US"
                ]),
                "link" => collect([
                    "canonical" => "https://syihab-blog.vercel.app/categories",
                    "url" => "https://syihab-blog.vercel.app/categories",
                ])
            ]
        ]);
    }
}
