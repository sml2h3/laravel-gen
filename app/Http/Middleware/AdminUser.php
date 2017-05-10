<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Crypt;
use App\Http\Models\Manager;
class AdminUser
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
        if(session('admintoken') === null || session('admintoken') === ''){
            return redirect('/admin/login');
        }
        $userinfo = session('admintoken');

        $userinfo = json_decode(Crypt::decrypt($userinfo));
        $result = Manager::where('username',$userinfo->username)->first();
        if($result){
        }else{
            session(['admintoken'=>'']);
            return redirect('admin/login');
        }
        return $next($request);
    }
}
