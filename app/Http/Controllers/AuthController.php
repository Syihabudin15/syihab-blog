<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login(){
        if(Auth::check()){
            return redirect('/usr/dashboard');
        }else{
            return view("Login", [
                "metadata" => [
                    "title" => "Login | SB",
                    "meta" => collect([
                        "description" => "Login form untuk seorang Penulis masuk ke dalam platform Syihab Blog",
                        "robots" => "index, follow",
                        "keywords" => "login syihab blog, masuk syihab blog, sign in syihab blog, dashboard syihab blog, login sb, masuk sb, signin sb",
                        "og:title" => "Login | Syihab Blog",
                        "og:description" => "Login form untuk seorang Penulis masuk ke dalam platform Syihab Blog",
                        "og:url" => "https://syihab-blog.vercel.app/auth/login",
                        "og:sitename" => "Syihab Blog",
                        "og:type" => "website",
                        "og:locale" => "en_US"
                    ]),
                    "link" => collect([
                        "canonical" => "https://syihab-blog.vercel.app/auth/login",
                        "url" => "https://syihab-blog.vercel.app/auth/login",
                    ])
                ]
            ]);
        }
    }

    public function Register(){
        if(Auth::check()){
            return redirect('/usr/dashboard');
        }else{
            return view("Register", [
                "metadata" => [
                    "title" => "Registration | SB",
                    "meta" => collect([
                        "description" => "Registration form untuk seorang penulis mendaftar di platform Syihab Blog",
                        "robots" => "index, follow",
                        "keywords" => "register syihab blog, daftar syihab blog, registration syihab blog, akun baru syihab blog, buat akun syihab blog, register sb",
                        "og:title" => "Register | Syihab Blog",
                        "og:description" => "Registration form untuk seorang penulis mendaftar di platform Syihab Blog",
                        "og:url" => "https://syihab-blog.vercel.app/auth/register",
                        "og:sitename" => "Syihab Blog",
                        "og:type" => "website",
                        "og:locale" => "en_US"
                    ]),
                    "link" => collect([
                        "canonical" => "https://syihab-blog.vercel.app/auth/register",
                        "url" => "https://syihab-blog.vercel.app/auth/register"
                    ])
                ]
            ]);
        }
    }

    public function HandleRegister(Request $request){
        $validate = $request->validate([
            "name" => ['required', 'min:5'],
            "email" => ["required", "email"],
            "password" => ['required', 'min:5']
        ]);
        try{
            $find = User::where("email", "=", $validate['email'])->first();
            if($find){
                return redirect('/auth/register')->with(["error" => "Registrasi gagal!. Email sudah pernah digunakan"]);
            }
            $validate['role'] = "USER";
            $validate["password"] = Hash::make($validate['password']);
            User::create($validate);
            return redirect('/auth/login')->with(["success" => "Registrasi berhasil!. Silahkan login"]);
        }catch(Exception $exc){
            return redirect('/auth/register')->with(["error" => $exc->getMessage()]);
        }
    }

    public function HandleLogin(Request $request){
        $validate = $request->validate([
            "email" => ['required', 'min:5', 'email'],
            "password" => ['required', 'min:5']
        ]);
        $cred = [
            "email" => $validate['email'],
            "password" => $validate['password']
        ];
        if(Auth::attempt($cred)){
            return redirect('/usr/dashboard');
        }else{
            return redirect('/auth/login')->with(['error' => "Username atau password salah"]);
        }
    }

    public function HandleLogout(){
        Auth::logout();
        return redirect('/auth/login');
    }
}

