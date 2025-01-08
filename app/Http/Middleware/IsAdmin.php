<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
        // ตรวจสอบว่าผู้ใช้งานมี role เป็น 'admin'
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request); // อนุญาตให้ดำเนินการต่อ
        }

        // ถ้าไม่ใช่ admin ให้แสดงข้อความหรือ redirect
        abort(403, 'คุณไม่ได้รับอนุญาตให้เข้าถึงหน้านี้');
    }
}
