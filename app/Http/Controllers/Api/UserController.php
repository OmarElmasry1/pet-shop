<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UpdateProfileRequest;
use App\Models\User;

class UserController extends Controller
{

    public function get_profile(User $user) {

        $user = auth()->user();

        return response()->json([
           'name'=>$user->name,
            'email'=>$user->email,
        ]);
    }

    public function update_profile( UpdateProfileRequest $request) {

       $user = User::findOrFail($request->user_id);
       $user->update([
           'name'=>$request->name,
           'email'=>$request->email,
       ]);

       return response()->json([
           'message'=>'Profile updated successfully',
           'name'=>$request->name,
           'email'=>$request->email,
       ]);
    }

}
