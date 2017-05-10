<?php

namespace App\Http\Middleware;

use App\Http\Models\Manager;
use Closure;
use Illuminate\Support\Facades\Crypt;

class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session('admintoken') != null){
            $userinfo = session('admintoken');
            $userinfo = json_decode(Crypt::decrypt($userinfo));
            $result = Manager::where('username',$userinfo->username)->first();
            if($result){
                return redirect('admin/main');
            }else{
                session(['admintoken'=>'']);
            }
        }
        return $next($request);
    }
}
