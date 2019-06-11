<?php

namespace App\Modules\Users\Middleware;

use App\Modules\Users\Models\Session;
use App\Modules\Users\Models\User;
use Closure;

class Auth
{
    const HEADER_NAME = 'Auth-token';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        $token = $request->header(self::HEADER_NAME);
        if (!$token) {
            if ($request->has('auth_token')) {
                $token = $request->input('auth_token');
            }
        }
        if (!$token) {
            return response(['message' => 'Unauthorized'], 401);
        }

        $session = Session::where('token', '=', $token)
            ->where('expire_at', '>=', time())
            ->first();

        if ($session) {
            $user = User::find($session->user->id);
            $request->user = $user;
        } else {
            return response(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
