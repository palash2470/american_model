<?php

namespace App\Http\Middleware;

use App\Helpers\Helper;
use App\Models\Category;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $category = Category::where('id',Auth::user()->membership_id)->first();
        //dd($category);
        $modelArry = Helper::categoryTypeArray();
        //dd($modelarray);
        if (Auth::user()->is_register_basic == 0) {
            return redirect()->route('user.basic.information.create');
        }elseif(Auth::user()->is_register_details == 0 && in_array($category->slug,$modelArry)){
            return redirect()->route('user.details.information.create');
        }elseif(Auth::user()->is_subscribe == 0){
            return redirect()->route('user.registration.plan');
        }
   
        return $next($request);
    }
}
