<?php

namespace App\Http\Middleware;

use App\Model\LawyerProfile;
use Closure;
use Illuminate\Support\Facades\Auth;

class checkLawyerProfile
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
        $data=LawyerProfile::where('lawyer_id',Auth::guard('admin')->user()->id,false)->first();
        if(!$data){
            return redirect(route('lawyerProfile'));
        }
        return $next($request);
    }
}
