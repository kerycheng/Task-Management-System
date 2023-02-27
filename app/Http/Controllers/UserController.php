<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller{
    // 註冊頁面
    public function register(){
        $jobs = Job::all();

        return view('register', compact('jobs'));
    }

    // 儲存會員資料
    public function store(Request $request){
        // 檢查輸入資料是否正確
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
            'job' => 'required|exists:jobs,id',
        ], [
            'name.required' => '請輸入名稱',
            'name.string' => '名稱格式錯誤',
            'name.max' => '名稱最多255個字元',
            'email.required' => '請輸入電子郵件',
            'email.email' => '電子郵件格式錯誤',
            'email.unique' => '此電子郵件已經被註冊',
            'email.max' => '電子郵件最多 255 個字元',
            'password.required' => '請輸入密碼',
            'password.string' => '密碼格式錯誤',
            'password.min' => '密碼至少需要8個字元',
            'job.required' => '請選擇職位',
            'job.exists' => '職位名稱錯誤',
        ]);

        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->job_unit = $validatedData['job'];
        $user->save();

        auth()->login($user);

        return redirect('/')->with('message', '註冊成功!');;
    }

    // 登入頁面
    public function login(Request $request){
        // 檢查是否有cookie_token
        $cookie_token = $request->cookie('cookie_token');

        if($cookie_token){
            // 搜尋符合cookie_token的使用者
            $user = User::where('cookie_token', $cookie_token)->first();
            if($user){
                // 如果符合，自動填入email、password
                return view('login', ['email' => $user->email, 'password' => $user->password, 'cookie_token' => $cookie_token]);
            }
        }
        // 如果沒有cookie_token或是找不到符合的使用者，顯示一般登入頁面
        return view('login');
    }

    // 登入
    public function authenticate(Request $request){
        // 檢查是否勾選"記住我"
        $remember = ($request->has('remember')) ? true : false; 

        // 驗證登入表單
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'required' => ':attribute 為必填欄位',
            'email' => '請填寫正確的 :attribute',
        ], [
            'email' => '電子郵件',
            'password' => '密碼',
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // 驗證使用者輸入的 email 和密碼是否正確
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)){
            // 登入成功
            $user = Auth::user();

            // 如果勾選"記住我"，生成cookie_token，並將其存儲到使用者的資料庫記錄中
            if($remember){
                $cookie_token = Str::random(60);
                $user->cookie_token = $cookie_token;
                $user->save();

                return redirect('/')->withCookie('cookie_token', $cookie_token, 60 * 24 * 365);
            }
            return redirect('/')->with('message', '登入成功!');
        }else{
            // 登入失敗，顯示錯誤提示
            // 如果email正確但password錯誤
            if(User::where('email', $request->email)->exists()){
                $user = User::where('email', $request->email)->first();
                if(!Hash::check($request->password, $user->password)){
                    $errors = ['password' => '密碼輸入錯誤'];
                }
            }else{
                // 如果email錯誤
                $errors = ['email' => '電子郵件輸入錯誤'];
            }
            return redirect()->back()->withInput()->withErrors($errors);
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