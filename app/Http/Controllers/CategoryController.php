<?php

namespace App\Http\Controllers;

use App\Models\Category;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index(){
        $page = (int)request("page") || 1;
        $data = [];

        if(request("page")){
            $data = Category::latest()->skip(ceil(($page-1)*5))->take(5)->get();
        }elseif(request("search")){
            if(request("page")){
                $data = Category::where("name", "LIKE", "%" . request("search") . "%")->skip(ceil(($page-1)*5))->take(5)->get();
            }else{
                $data = Category::where("name", "LIKE", "%" . request("search") . "%")->take(5)->get();
            }
        }else{
            $data = Category::latest()->take(5)->get();
        }
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
            ],
            "categories" => $data,
            "total" => ceil(count($data)/5)
        ]);
    }
    public function CategorySlug($slug){
        return view("CategorySlug", [
            "metadata" => [
                "title" => $slug,
                "meta" => collect([
                    "description" => "Berikut List atau daftar kategori di Syihab Blog. IT, Programming, SEO, Bisnis, Elektronik, Olahraga",
                    "robots" => "index, follow",
                    "keywords" => "daftar kategori, list kategori, kategori it, kategori seo, kategori elektronik, kategori olahraga, kategori web, kategori android",
                    "og:title" => $slug,
                    "og:description" => "Berikut List atau daftar kategori di Syihab Blog. IT, Programming, SEO, Bisnis, Elektronik, Olahraga",
                    "og:url" => "https://syihab-blog.vercel.app/categories/".$slug,
                    "og:sitename" => "Syihab Blog",
                    "og:type" => "article",
                    "og:locale" => "en_US"
                ]),
                "link" => collect([
                    "canonical" => "https://syihab-blog.vercel.app/categories/".$slug,
                    "url" => "https://syihab-blog.vercel.app/categories/".$slug,
                ])
            ]
        ]);
    }

    public function Create(Request $request){
        $validate = $request->validate([
            "name" => ['required', 'min:3'],
            "file" => ['required']
        ]);
        try{
            $file = Cloudinary::upload($validate['file']->getRealPath())->getSecurePath();
            
            Category::create([
                "name" => $validate["name"],
                "slug" => strtolower(str_replace(" ", "_", $validate['name'])),
                "image" => $file
            ]);
            return redirect('/usr/categories')->with(['success' => "Berhasil menambahkan kategori baru"]);
        }catch(Exception $exc){
            dd($exc);
            return redirect('/usr/categories')->with(['errors' => $exc->getMessage()]);
        }
    }

    public function Update(Request $request){
        $validate = $request->validate([
            "id" => ['required'],
            'name' => ['required']
        ]);
        try{
            $find = Category::findOrFail($validate['id']);
            $find->name = $validate['name'] == $find->name ? $find->name : $validate['name'];
            $find->save();
            return redirect('/usr/categories')->with(['success' => "Berhasil update kategori"]);
        }catch(Exception $exc){
            return redirect('/usr/categories')->with(["errors" => $exc->getMessage()]);
        }
    }
}
