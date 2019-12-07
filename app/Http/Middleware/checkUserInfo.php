<?php

namespace App\Http\Middleware;

use App\Model\Frontend\UserInfo;
use Closure;
use Illuminate\Support\Facades\Auth;

class checkUserInfo
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
        $data=UserInfo::where('user_id',Auth::guard('userList')->user()->id,false)->first();
        if(!$data){
            return redirect(route('userInfoForm'));
        }
        return $next($request);
    }
}
