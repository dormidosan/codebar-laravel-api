<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class CheckRequestController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $response =  [
            'user-agent' => $request->userAgent(),
            'ip-address' => $request->ip(),
            'client-ips' => $request->getClientIps(),
            'language' => $request->getPreferredLanguage(config('app.locales')),
            'acceptable-languages' => $request->getLanguages(),
            'acceptable-content-types' => $request->getAcceptableContentTypes(),
            'acceptable-encodings' => $request->getEncodings(),

            'request-uri' => $request->getRequestUri(),
            'full-url' => $request->fullUrl(),
            'method' => $request->method(),
            'host' => $request->getHost(),
            'scheme' => $request->getScheme(),
            'port' => $request->getPort(),
            'is-secure' => $request->secure(),

            'headers' => $request->headers->all(),
            'referer' => $request->headers->get('referer'),
            'cookies' => $request->cookies->all(),

            'query-params' => $request->query(),
            'post-params' => $request->post(),
            'all-input' => $request->all(),
            'raw-body' => $request->getContent(),

            'ajax' => $request->ajax(),
            'wants-json' => $request->wantsJson(),
            'bearer-token' => $request->bearerToken(),

            'file-count' => $request->files->count(),
            'files' => array_map(function($file) {
                return [
                    'original-name' => $file->getClientOriginalName(),
                    'mime-type' => $file->getMimeType(),
                    'size' => $file->getSize(),
                ];
            }, iterator_to_array($request->files)),

            'route-name' => optional($request->route())->getName(),
            'route-action' => optional($request->route())->getAction(),

            'session-id' => session()->getId(),
            'route-parameters' => $request->route() ? $request->route()->parameters() : [],
            'attributes' => $request->attributes->all(),
        ];

        Log::channel('request-analysis')->info(json_encode($response, JSON_PRETTY_PRINT));

        return response()->noContent();
    }
}
