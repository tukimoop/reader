<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LastSeen
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
        if (Auth::check()) {
            $currentTime = Carbon::now();
            $currentUser = User::find(Auth::user()->id);

            $currentUser->last_seen = $currentTime;
            $currentUser->save();

            Cache::put('user_online_' . $currentUser->id, true, $currentTime->addMinutes(5));
        }

        return $next($request);
    }
}
