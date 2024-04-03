<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterPostRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //login ekranından gelen bilgiler bu fonksion ile kontrol edilecek
    public function loginPost(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
        {
            //kullanıcı adı ve şifre doğru ise dashboarda gidecek
            toastr()->success('Hoşgeldiniz Sayın '.Auth::user()->name,'Karşılama');
            return redirect()->route('dashboard');
        }
        return back()->withFail('E-Posta Adresiniz veya Şifreniz Hatalı!!');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function logout()
    {
        toastr()->success('Güle güle Sayın '.Auth::user()->name,'Uğurlama');
        Auth::logout();
        return redirect()->route('login');
    }
    public function login()
    {
        return view('login');
    }
    public function registerPost(RegisterPostRequest $request)
    {
        //dd($request);
        $request->flash();
        $user = User::create([
            'name' => Str::title($request['name']),               
            'email' => Str::lower($request['email']),
            'password' => Hash::make($request['password']),                   
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
        {
            //kullanıcı adı ve şifre doğru ise dashboarda gidecek
            toastr()->success('Hoşgeldiniz Sayın '.Auth::user()->name,'Karşılama');
            return redirect()->route('dashboard');
        }
        return back()->withFail('Beklenmedik bir hata meydana geldi');

    }
    public function modeswitch(Request $request)
    {
        $user = User::whereId(Auth::user()->id)->first();
        $user->mode = $request->statu == "true" ? 1 : 0; 
        $user->save();
    }
}
