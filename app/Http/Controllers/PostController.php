<?php

namespace App\Http\Controllers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
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

    public function HandleUpload(Request $request){
        if($request->hasFile('upload')){
            $content = file_get_contents($_GET["url"]);
            $info = getimagesizefromstring($content);
            header('Content-Type:' . $info["mime"]);
            $path = Cloudinary::upload($request['file']->getRealPath())->getSecurePath();
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            @header('Content-type: text/html; charset=utf-8'); 
            echo $content;
        }
    }

    public function ArtikelSlug($slug){
        return view('ArticleSlug', [
            "metadata" => [
                "title" => $slug,
                "meta" => collect([
                    "description" => "Slug meruapakan blablablal sadjwrsadnmsad",
                    "robots" => "index, follow",
                    "keywords" => $slug,
                    "og:title" => $slug,
                    "og:description" => "Slug meruapakan blablablal sadjwrsadnmsad",
                    "og:url" => "https://syihab-blog.vercel.app/blog/".$slug,
                    "og:sitename" => "Syihab Blog",
                    "og:type" => "article",
                    "og:locale" => "en_US"
                ]),
                "link" => collect([
                    "canonical" => "https://syihab-blog.vercel.app/blog/".$slug,
                    "url" => "https://syihab-blog.vercel.app/blog/".$slug
                ])
            ]
        ]);
    }
}
