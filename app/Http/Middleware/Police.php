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
      $ban= DB::table('banlog')->select('*')->where(['user_id' => decrypt($id)])->count();
      if ($ban >= 3 ) {
        Session::flash('message', "정지 유저라 거래가 안됩니다.");
        return redirect('/');
      }
      return $next($request);
    }
}
