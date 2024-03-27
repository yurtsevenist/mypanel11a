<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            toastr()->warning('Yetkiniz olmayan bir alana erişmeye çalışıyorsunuz Ip adresiniz kayıt altına alınmıştır','Uğurlama');
            return route('login');
        }
    }
}
