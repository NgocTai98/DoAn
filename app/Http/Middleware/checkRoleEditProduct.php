<?php

namespace App\Http\Middleware;

use Closure;

class checkRoleEditProduct
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
        if (auth()->user()->level == 1 || auth()->user()->level == 2) {
            return $next($request);
        }
        else
        {
            return redirect('admin/product')->with('thongbao','Bạn không có quyền truy cập, chỉ có supper admin mới truy cập được');
        }
    }
}
