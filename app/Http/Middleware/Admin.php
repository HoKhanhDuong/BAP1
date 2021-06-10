<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Admin
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
        $user = Session::get('users');
        $user_id = $user[0][0]->id;
        $user = DB::table('Users')
                    ->where('id',$user_id)
                    ->get();
        if($user[0]->type != 1 || empty($user[0])) return redirect('/');
        return $next($request);
    }
}
