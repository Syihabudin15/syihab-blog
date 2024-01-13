<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function CreateComment(Request $request){
        $validate = $request->validate([
            'post_id' => ['required'],
            "message" => ['required']
        ]);
        if(Auth::check()){
            $validate['user_id'] = Auth::user()->id;
        }
        $validate['like'] = 0;
        $validate['dislike'] = 0;
        try{
            Comment::create($validate);
            $find = Post::findOrFail($validate['post_id']);
            return redirect('/blog/'.$find->slug)->with(['success' => "Berhasil dikirim"]);
        }catch(Exception $exc){
            return redirect('/blog')->with(['error' => $exc->getMessage()]);
        }
    }
}
