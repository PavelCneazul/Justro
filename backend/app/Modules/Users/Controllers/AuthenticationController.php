<?php

namespace App\Modules\Users\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\Models\Session;
use App\Modules\Users\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthenticationController extends Controller
{

    /**
     * Log in user into application
     *
     * @param Request $request
     * @return array|\Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function signIn(Request $request)
    {
        $data = $request->json()->all();
        if (isset($data['gender'])) {
            if ($data['gender'] === "male") {
                $data['gender'] = 1;
            } else {
                $data['gender'] = 2;
            }
        }

        // Normal auth
        $user = User::with('groups')
            ->where('email', $request->json('email'))
            ->first();
        $ipAddress = $request->ip();


        if ($user && (Hash::check($request->json('password'), $user->password) || $request->json('social_login'))) {
            $session = Session::where('user_id', $user->id)
                ->where('expire_at', '>=', new DateTime())
                ->where('ip_address', $ipAddress)
                ->orderBy('expire_at', 'DESC')
                ->first();
            if (!$session) {
                $session = Session::create([
                    'user_id' => $user->id,
                    'token' => str_random(128),
                    'ip_address' => $ipAddress,
                    'expire_at' => (new DateTime)->setTimestamp(time() + 60 * 24 * 60 * 60)
                ]);
            }

            if ($session) {
                $response = [
                    'session' => $session,
                    'user' => $user
                ];
                return $response;
            } else {
                return response([
                    'message' => 'Error at creating the session'
                ], 400);
            }
        } elseif ($request->json('social_login') && !$user) {
//            return $data;
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt('password'),
                'gender' => $data['gender'],
                'isUser' => true
            ]);
            $session = Session::create([
                'user_id' => $user->id,
                'token' => str_random(128),
                'ip_address' => $ipAddress,
                'expire_at' => (new DateTime)->setTimestamp(time() + 60 * 24 * 60 * 60)
            ]);
            $response = [
                'session' => $session,
                'user' => $user
            ];
            return $response;
        } else {
            return response([
                'message' => 'Invalid credentials'
            ], 401);
        }
    }

    /**
     * Sign out user from application
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function signOut(Request $request)
    {
        if ($request->header('Auth-token')) {
            $token = $request->header('Auth-token');
        } elseif ($request->has('auth_token')) {
            $token = $request->input('auth_token');
        } else {
            $token = null;
        }
        $token = Session::where('token', $token)
            ->where('expire_at', '>=', new DateTime())
            ->where('ip_address', $request->ip())
            ->first();
        if ($token) {
            $token->expire_at = new DateTime;
            $token->save();
        } else {
            return response([
                'message' => 'You are not signed in!'
            ], 200);
        }
        return response([
            'message' => 'Done!'
        ], 200);
    }

    public function getMe(Request $request)
    {
        $token = Session::where(function ($q) use ($request) {
            $q->where('token', '=', $request->header('Auth-token'))
                ->orWhere('token', '=', $request->input('auth_token'));
        })
            ->where('expire_at', '>=', new DateTime())
            ->where('ip_address', $request->ip())
            ->first();
        if (!$token) {
            abort(401);
        }

        $user = $token->user()->first();


        return $user;
    }
}
