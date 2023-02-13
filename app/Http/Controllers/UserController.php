<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{
    // 註冊頁面
    public function register(){
        $jobs = Job::all();

        return view('register', compact('jobs'));
    }

    // 儲存會員資料
    public function store(Request $request){
        $user = new User;
        $user->name = $request->input('name');
        $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');
        $user->job_unit = $request->input('job');
        $user->role = 'user';
        $user->save();

        auth()->login($user);

        return redirect('/')->with('message', '註冊成功!');;
    }

    // 登入頁面
    public function login(){
        return view('login');
    }

    // 登入
    public function authenticate(Request $request){
        // 驗證使用者輸入的 email 和密碼是否正確
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // 登入成功
            return redirect('/')->with('message', '登入成功!');
        } else {
            // 登入失敗
            return redirect()->back()->withInput()->withErrors(['email' => 'Email or password is incorrect']);
        }
    }

    // 登出
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', '登出成功!');

    }
}