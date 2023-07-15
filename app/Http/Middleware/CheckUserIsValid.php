<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use App\Models\Solo_mode ;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::User() ;
        $id = $request->route('id') ;
        $row = Solo_mode::find($id);
        
        if($row->user_id != $user->id){
            abort(404);
        }else {
            return $next($request);
        }

        
    }
}
