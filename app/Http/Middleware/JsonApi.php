<?php

namespace App\Http\Middleware;

use App\Exceptions\InvalidJsonPassed;
use Closure;
use Illuminate\Http\Request;

class JsonApi
{
    const PARSED_METHODS = [
        'POST', 'PUT', 'PATCH'
    ];

    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws InvalidJsonPassed
     */
    public function handle(Request $request, Closure $next)
    {
        if (in_array($request->getMethod(), self::PARSED_METHODS)) {
            $json = json_decode($request->getContent(), true);

            if (JSON_ERROR_NONE === json_last_error()) {
                $request->merge($json);
            } elseif($json === null) {
                throw new InvalidJsonPassed("Error while decoding json");
            }
        }

        return $next($request);
    }
}