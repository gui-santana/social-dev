<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class FollowController extends Controller
{
    public function follow(User $user)
    {
        auth()->user()->following()->attach($user->id);
        return response()->json(['status' => 'success']);
    }

    public function unfollow(User $user)
    {
        auth()->user()->following()->detach($user->id);
        return response()->json(['status' => 'success']);
    }
}