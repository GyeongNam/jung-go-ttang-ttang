<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use DB;

class Police
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
      $id = session()->get('login_ID');
      $ban= DB::table('bantime')->select('*')->where(['user_id' => decrypt($id)])->count();
      if ($ban >= 1 ) {
        Session::flash('message', "정지 유저라 거래가 안됩니다.");
        return redirect('/');
      }
      return $next($request);
    }
}
