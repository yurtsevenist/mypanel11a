<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
    public function blog()
    {
        $blogs=Blog::orderBy('created_at','DESC')->get();
        return view('blog',compact('blogs'));
    }
    public function blogdetail($id)
    {
        $blog=Blog::whereId($id)->first();
        return view('blogdetail',compact('blog'));
    }
    public function blogUpdate(Request $request)
    {
         try {
            if ($request->hasFile('file')) {
                //eğer resim dosyası değişmiş ise
                $mimetype = $request->file->extension();
                $newName = uniqid() . '.' . $mimetype;
                $request->file->move('images', $newName);
                $blog=Blog::whereId($request->id)->first();
                try {
                    unlink($blog->image);
                } catch (\Throwable $th) {
                   
                }
                $blog->image= 'images/'.$newName;                
                $blog->title=$request->title;       
                $blog->content=$request->content;
                $blog->author=Auth::user()->name;
                $blog->updated_at=Carbon::now();
                $blog->save();
            }
            else
            {
                 //resim dosyası değişmemiş ise
                $blog=Blog::whereId($request->id)->first();
                $blog->title=$request->title;       
                $blog->content=$request->content;
                $blog->author=Auth::user()->name;
                $blog->updated_at=Carbon::now();
                $blog->save();
            }
           
            toastr()->success('Blog yazınız güncellenmiştir','Başarılı');
            return redirect()->back();
         } catch (\Throwable $th) {
            toastr()->error('Blog yazınız güncellenmiştir','Hata');
            return redirect()->back();
         }
    }
    public function blogDelete(Request $request)
    {
        $blog=Blog::whereId($request->id)->first();
        $blog->delete();
        return redirect()->back()->withSuccess('Blog Yazınız Siliniştir');
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
    public function blogadd()
    {
        return view('blogadd');
    }
    public function blogPost(Request $request)
    {
        try {
            if ($request->hasFile('file')) {
                //eğer resim dosyası değişmiş ise
                $mimetype = $request->file->extension();
                $newName = uniqid() . '.' . $mimetype;
                $request->file->move('images', $newName);
                $blog=new Blog;              
                $blog->image= 'images/'.$newName;                
                $blog->title=$request->title;       
                $blog->content=$request->content;
                $blog->author=Auth::user()->name;              
                $blog->save();
                toastr()->success('Blog yazınız güncellenmiştir','Başarılı');
                return redirect()->route('blog');
            }
            else
            {
                toastr()->info('Eklenecek bir resim dosyası bulunamadı','Bilgilendirme');   
                return redirect()->back();
            }  
           
           
         } catch (\Throwable $th) {
            toastr()->error('Beklenmedik bir hata meydana geldi ','Hata');
            return redirect()->back();
         }
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
    public function passwordReset(Request $request)
    {
         try {
             
            $email=User::whereEmail($request->email)->first();
            if($email)
            {
                $token = Str::random(64);
                $ara = DB::table('password_resets')
                ->where(['email' => $request->email])
                ->first();
                if($ara)
                {
                    DB::table('password_resets')->update(
                        ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
                    );
                }
                else
                {
                    DB::table('password_resets')->insert(
                        ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
                    ); 
                }             
                
                         
                    $mail= Mail::send('verify', ['token' => $token], function($message) use($request){
                    $message->from('bilgi@ihmtal.com', 'İhsan Mermerci M.T.A.L.');
                    $message->to($request->email);
                    $message->subject('Şifre Değiştirme Doğrulama');
                   
                });
        
            
                    return redirect()->back()->withInfo('E-Posta Adresinize Link Gönderildi!');
              
               
            }
            else
            {
                return back()->withInfo('E-Posta adresiniz sistemde kayıtlı değil!'); 
            }
         } catch (\Throwable $th) {
        //throw $th;
             return back()->withFail('Beklenmedik bir hata meydana geldi');
         }
    }
    public function getPassword($token) {

        return view('reset', ['token' => $token]);
     }
     public function updatePassword(Request $request)
     {

     $request->validate([
         'email' => 'required|email|exists:users',
         'password' => 'required|string|min:6|confirmed',
         'password_confirmation' => 'required',

     ]);

     $updatePassword = DB::table('password_resets')
                         ->where(['email' => $request->email, 'token' => $request->token])
                         ->first();

     if(!$updatePassword)
         return back()->withFail('Geçersiz Anahtar!');
       $user = User::where('email', $request->email)
                   ->update(['password' => Hash::make($request->password)]);

       DB::table('password_resets')->where(['email'=> $request->email])->delete();


                if( Auth::attempt(['email' => $request->email, 'password' =>$request->password]))
                {
                    toastr()->info('Şifreniz Güncellendi, Hoşgeldiniz '.Auth::user()->name,'Bilgilendirme');                   
                    return redirect()->route('dashboard');    

                }


     }
    public function modeswitch(Request $request)
    {
        $user = User::whereId(Auth::user()->id)->first();
        $user->mode = $request->statu == "true" ? 1 : 0; 
        $user->save();
    }
}
