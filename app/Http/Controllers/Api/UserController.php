<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UpdateProfileRequest;
use App\Models\User;
use App\Traits\ApiResponse;

class UserController extends Controller
{

    Use ApiResponse;

    public function get_profile(User $user) {

        $user = auth()->user();

        $data = ['name'=>$user->name,  'email'=>$user->email, ];

        return $this->returnData('data',$data,'', 200);

    }

    public function update_profile( UpdateProfileRequest $request) {

        $user = auth()->user();

       $user->update([
           'name'=>$request->name,
           'email'=>$request->email,
       ]);

       if($request->password) {
           $user->update([
               'password'=> bcrypt($request->password),
           ]);
       }

        if($request->image) {
            $user->image([
                'image'=> $request->image,
            ]);
        }

        $data = ['name'=>$request->name, 'email'=>$request->email];

        return $this->returnData('data',$data,'Profile updated successfully', 200);

    }

}
