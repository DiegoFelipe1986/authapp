<?php

namespace App\Http\Middleware;

use Closure;
use App\UserPrivilege;
use Illuminate\Support\Facades\Redirect;

class Privilege
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        $privileges = UserPrivilege::where($type, 1)
            ->whereUserId(auth()->user()->id)
            ->count();

        if ($privileges == 0) {
            return Redirect(route('admin'))
                ->withErrors(['no tiene permisos']);
        }

        return $next($request);
    }
}
