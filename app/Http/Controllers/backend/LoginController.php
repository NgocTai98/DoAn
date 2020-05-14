<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin(){
        return view('backend.login');
    }
    public function postLogin(LoginRequest $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
          
            // Authentication passed...
            return redirect('admin');
        }
        return redirect('login')->with('thongbao','Tài khoản hoặc mật khẩu không chính xác !')->withInput();
        
    }
    public function getLogout(){
        Auth::logout();
        return redirect('login');
    }
}
