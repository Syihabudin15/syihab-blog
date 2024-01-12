<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function Index(){
        $page = (int)request("page") || 1;
        $data = [];
        $art = Post::latest()->take(5)->get();
        $cate = Category::latest()->take(5)->get();

        if(request("page")){
            $data = Post::where("isPost", "=", true)->skip(ceil(($page-1)*5))->take(5)->get();
        }elseif(request("search")){
            if(request("page")){
                $data = Post::where("title", "LIKE", "%" . request("search") . "%")->where("isPost", "=", true)->skip(ceil(($page-1)*5))->take(5)->get();
            }else{
                $data = Post::where("title", "LIKE", "%" . request("search") . "%")->where("isPost", "=", true)->take(5)->get();
            }
        }else{
            $data = Post::where("isPost", "=", true)->take(5)->get();
        }
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
            ],
            "data" => $data,
            "total" => ceil(count($data)/5),
            "populer" => $art,
            "hot" => $cate
        ]);
    }

    public function CreatePost(Request $request){
        $validate = $request->validate([
            "title" => ['required', 'min:10'],
            "excerp" => ['required', 'min:10'],
            "category_id" => ['required'],
            "keywords" => ['required', 'min:2'],
            "body" => ['required'],
            "file" => ['image', 'mimes:png,jpg,jpeg,ico,webp']
        ]);
        $validate['view'] = 0;
        $validate['like'] = 0;
        $validate['isPost'] = true;
        $validate['user_id'] = Auth::user()->id;
        $validate['slug'] = strtolower(str_replace([' ', '/'], "_", $validate['title']));
        try{
            if($validate['file']){
                $validate['image'] = Cloudinary::upload($validate['file']->getRealPath())->getSecurePath();
            }
            Post::create($validate);
            return redirect('/usr/myblog/create')->with(['success' => "Berhasil membuat postingan baru"]);
        }catch(Exception $exc){
            return redirect('/usr/myblog/create')->with(['error' => $exc->getMessage()]);
        }
    }

    public function HandleUpload(Request $request){
        if($request->hasFile('file')){
            $file = Cloudinary::upload($request->file('file')->getRealPath())->getSecurePath();
            return ["location" => $file];
        }
    }

    public function ArtikelSlug($slug){
        $result = Post::where("slug", "=", $slug)->first();
        $art = Post::latest()->take(5)->get();
        $cate = Category::latest()->take(5)->get();
        $comments = Comment::where("post_id", "=", $result->id)->get();
        $result->view += 1;
        $result->save();
        return view('ArticleSlug', [
            "metadata" => [
                "title" => $result->title,
                "meta" => collect([
                    "description" => $result->excerp,
                    "robots" => "index, follow",
                    "keywords" => $result->keywords,
                    "og:title" => $result->title,
                    "og:description" => $result->excerp,
                    "og:url" => "https://syihab-blog.vercel.app/blog/".$slug,
                    "og:sitename" => "Syihab Blog",
                    "og:type" => "article",
                    "og:locale" => "en_US"
                ]),
                "link" => collect([
                    "canonical" => "https://syihab-blog.vercel.app/blog/".$slug,
                    "url" => "https://syihab-blog.vercel.app/blog/".$slug
                ])
            ],
            "data" => $result,
            "populer" => $art,
            "hot" => $cate,
            "comments" => $comments
        ]);
    }

    public function handleUnpost($slug){
        try{
            $find = Post::where("slug", "=", $slug)->first();
            $find->isPost = false;
            $find->save();
            return back()->with(['success' => "Blog berhasil ditarik"]);
        }catch(Exception $exc){
            return back()->with(['error' => $exc->getMessage()]);
        }
    }
    public function handlePosting($slug){
        try{
            $find = Post::where("slug", "=", $slug)->first();
            $find->isPost = true;
            $find->save();
            return back()->with(['success' => "Blog berhasil di posting"]);
        }catch(Exception $exc){
            return back()->with(['error' => $exc->getMessage()]);
        }
    }
    public function handleActLike($slug){
        try{
            $find = Post::where("slug", "=", $slug)->first();
            $find->like += 1;
            $find->save();
            return response()->json(["data" => $find->like], 200);
        }catch(Exception $exc){
            return response()->json(['msg' => $exc->getMessage()], 500);
        }
    }
    public function getLike($slug){
        try{
            $find = Post::where("slug", "=", $slug)->first();
            return response()->json(["data" => $find->like], 200);
        }catch(Exception $exc){
            return response()->json(['msg' => $exc->getMessage()], 500);
        }
    }
}
