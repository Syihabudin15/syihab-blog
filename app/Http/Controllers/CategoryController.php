<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index(){
        $page = (int)request("page") ?? 1;
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
        $total = Category::latest()->get();
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
            "total" => ceil(count($total)/5)
        ]);
    }
    public function CategorySlug($slug){
        $page = (int)request("page") ?? 1;
        $data = [];
        $art = [];
        $cate = [];

        $find = Category::where("slug", "=", $slug)->first();
        if(request("page")){
            $data = Post::where('category_id', "=", $find->id)->where("isPost", "=", true)->skip(ceil(($page-1)*5))->take(5)->get();
        }else{
            $data = Post::where('category_id', "=", $find->id)->where("isPost", "=", true)->take(5)->get();
        }
        $art = Post::latest()->where("isPost", "=", true)->take(5)->get();
        $cate = Category::latest()->take(5)->get();
        $total = Post::latest()->get();
        return view("CategorySlug", [
            "metadata" => [
                "title" => "Kategori ".$find->name,
                "meta" => collect([
                    "description" => "Daftar blog atau artikel dari kategori ".$find->name,
                    "robots" => "index, follow",
                    "keywords" => "daftar kategori, list kategori, kategori it, kategori seo, kategori elektronik, kategori olahraga, kategori web, kategori android,".$slug.",".$find->name,
                    "og:title" => "Kategori ".$find->name,
                    "og:description" => "Daftar blog atau artikel dari kategori ".$find->name,
                    "og:url" => "https://syihab-blog.vercel.app/categories/".$slug,
                    "og:sitename" => "Syihab Blog",
                    "og:type" => "article",
                    "og:locale" => "en_US"
                ]),
                "link" => collect([
                    "canonical" => "https://syihab-blog.vercel.app/categories/".$slug,
                    "url" => "https://syihab-blog.vercel.app/categories/".$slug,
                ])
            ],
            "articles" => $data,
            "title" => $find->name,
            "total" => ceil(count($total)/5),
            "slug" => $find->slug,
            "populer" => $art,
            "hot" => $cate
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
