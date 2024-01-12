<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Update(Request $request){
        $validate = $request->validate([
            "name" => ['required', 'min:5'],
            "email" => ['required', 'email'],
            "password" => ['required', 'min:5'],
            "new_password" => ['nullable', 'min:5']
        ]);
        try{
            if($request['new_password']){
                $validate["password"] = $validate['new_password'];
            }
            $find = User::findOrFail(Auth::user()->id);
            $hash = Hash::check($request['password'], $find->password);
            if(!$hash){
                return redirect('/usr/setting')->with(['error' => "Password salah"]);
            }
            $find->name = $validate['name'];
            $find->email = $validate['email'];
            $find->password = Hash::make($validate['password']);

            $find->save();
            return redirect('/usr/setting')->with(['success' => 'Berhasil update data']);
        }catch(Exception $exc){
            return redirect('/usr/setting')->with(['error' => $exc->getMessage()]);
        }
    }
}
