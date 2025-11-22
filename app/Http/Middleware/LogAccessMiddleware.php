<?php

namespace App\Http\Middleware;

use App\Models\AccessLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = $request->user('sanctum')
            ? $request->user('sanctum')->id
            : null;
        AccessLog::create([
            'ip_address' => $request->ip(),
            'url' => $request->path(),
            'method' => $request->method(),
            'user_agent' => $request->userAgent(),
            'user_id' => $userId
        ]);
        return $next($request);
    }
}
