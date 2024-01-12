<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function CreateReply(Request $request){
        $validate = $request->validate([
            'comment_id' => ['required'],
            "message" => ['required']
        ]);
        if(Auth::check()){
            $validate['user_id'] = Auth::user()->id;
        }
        $validate['like'] = 0;
        $validate['dislike'] = 0;
        try{
            Reply::create($validate);
            return back()->with(['success' => "Berhasil dikirim"]);
        }catch(Exception $exc){
            return back()->with(['error' => $exc->getMessage()]);
        }
    }
}
