<?php

namespace Chatty\Http\Controllers;

use Chatty\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
{
    public function getIndex()
    {
        $friends = Auth::user()->friends();
        return view('friends.index')
            ->with('friends',$friends);
    }
}