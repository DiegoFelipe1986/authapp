<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function verify($token)
    {
        $user = User::whereVerificationToken($token)->firstOrFail();
        $user->verified = User::USER_VERIFIED;
        $user->verification_token = null;
        $user->save();

        return Redirect(route('login'));
    }
}
