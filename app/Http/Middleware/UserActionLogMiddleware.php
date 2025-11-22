<?php

namespace App\Http\Middleware;

use App\Models\UserActionLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserActionLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        UserActionLog::create([
            'user_id' => $user->id,
            'ip_address' => $request->ip(),
            'url' => $request->path(),
            'method' => $request->method(),
            'user_agent' => $request->userAgent(),
            'payload' => $request->all()
        ]);

        return $next($request);
    }
}
