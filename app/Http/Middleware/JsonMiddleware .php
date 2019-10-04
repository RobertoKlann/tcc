<?php

namespace App\Http\Middleware;

use Closure;

class JsonMiddleware {
    
    /**
     * Define o header Accept para enviar sempre uma resposta json
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $request->headers->set('Accept', 'application/json');
        
        return $next($request);
    }
    
}