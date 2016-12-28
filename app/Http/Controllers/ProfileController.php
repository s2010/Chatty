<?php

namespace Chatty\Http\Controllers;

use Chatty\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function getProfile($username)
    {
        $user = User::where('username', $username)->first();
        if (!$user)
        {
            abort(404);
        }
        return view('profile.index');
    }
}