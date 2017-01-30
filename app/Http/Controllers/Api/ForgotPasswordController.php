<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\PasswordResets;

class ForgotPasswordController extends Controller
{
    public function getResetLink(Request $request)
    {
        $users = Users::where('email', $request->email)->firstOrFail();

        if (!$users) {
            return response('Invalid Email', 401);
        }

        $password_reset = PasswordResets::create(
            ['email' => $users->email, 'token' => str_random(36)]
        );

        if ($password_reset) {
            $send = mail($password_reset->email, 'Password Reset Link', "{$request->root()}/password/reset/{$password_reset->token}");

            return response()->json(['message' => 'success', 'data' => $send]);
        }

        return response('error', 401);
    }

    public function setPasswordByToken($token, Request $request)
    {
        $users_token = PasswordResets::where('email', $request->email)
            ->where('token', $token)
            ->first();

        if (empty($users_token)) {
            return response('Invalid Email or Token', 401);
        }

        if ($request->password === $request->password_confirmation) {

            $Users = Users::where('email', $users_token->email)->first();
            $Users->password = bcrypt($request->password);
            $Users->save();

            return response()->json(['message' => 'success', 'data' => $Users]);
        }

        return response('error', 401);
    }
}
