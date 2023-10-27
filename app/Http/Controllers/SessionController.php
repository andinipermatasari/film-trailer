<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class SessionController extends Controller
{
//     function index(){
//         return view("sesi/index");
//     }
//     function login(Request $request){
//         Session::flash('email',$request->email);
//         $request->validate([
//             'email' => 'required',
//             'password' => 'required'
//         ],[
//             'email.required'=>'Email wajib di isi',
//             'password.required'=>'Password wajib di isi',
//         ]);
//         $user = User::where("email",$request->email)->first();
//         if($user){
//             if(Hash::check($request->password,$user->password)){
//                 return redirect('/');
//             }else{
//                 return "Login Gagal Email dan Password Salah !";
//             }
//         }else{
//             return "Email tidak ada";
//         }

//         return $user;

//         if(Auth::attempt($infologin)){
//             return "OK";
//             return '/';
//         } else {
//             return 'gagal';
//             return redirect()->back()->with(['pesan' => 'Username dan password yang dimasukkan tidak sesuai']);
//         }
//         return redirect('/');
//     }
//     function logout(){
//         Auth::logout();
//         return redirect('/login')->with('pesan','Berhasil Logout');
//     }
//     function register(){

//         return view('sesi/register');
//     }
//     function create(Request $request){
//         Session::flash('name',$request->name);
//         Session::flash('email',$request->email);
//         $request->validate([
//             'name' => 'required',
//             'email' => 'required|email|unique:users',
//             'password' => 'required|min:6'
//         ],[
//             'name.required'=>'Nama wajib di isi',
//             'email.required'=>'Email wajib di isi',
//             'email.email'=>'Silahkan masukkan email yang valid',
//             'email.unique'=>'Email sudah pernah digunakan, silahkan masukkan Email yang lain',
//             'password.required'=>'Password wajib di isi',
//             'password.min'=>'Minimal password harus 6 karakter'
//         ]);

//         $data = [
//             'name'=>$request->name,
//             'email'=>$request->email,
//             'password'=>Hash::make($request->password)
//         ];
//         User::create($data);

//         return redirect('/login'); 
//     }
}
