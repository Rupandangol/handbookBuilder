<?php

namespace App\Http\Middleware;

use App\Model\Frontend\ContactUs;
use Closure;

class ContactReviewCheck
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data['contactReview'] = ContactUs::all();
        return $next($request, $data);
    }
}
