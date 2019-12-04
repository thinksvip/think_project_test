<?php

namespace App\Http\Controllers\FrontEnd\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider(Request $request)
    {
        return Socialite::with('weixinweb')->stateless()->redirect();
    }
}
