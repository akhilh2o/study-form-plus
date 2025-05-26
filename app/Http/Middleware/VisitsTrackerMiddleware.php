<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VisitsTrackerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!collect(config('visits.methods.accept'))->contains($request->method())){
            return $next($request);
        }

        $payload = [];
        if(config('visits.payload.record')){
            $accepts = collect(config('visits.payload.accept'));
            if($accepts->contains('get')){
                $payload = $payload + $request->query();
            }
            if($accepts->contains('post')){
                $payload = $payload + $request->except(array_keys($request->query()));
            }
            if($accepts->contains('files')){
                $payload = $payload + $request->allFiles();
            }
        }

        $visit = new Visit();
        $visit->ip = $request->ip();
        $visit->user_id = auth()->id();
        $visit->url = $request->path();
        $visit->method = $request->method();
        $visit->payload = $payload;
        $visit->save();

        return $next($request);
    }
}
