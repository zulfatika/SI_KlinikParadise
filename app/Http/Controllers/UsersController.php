<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Transformers\UserTransformers;

class UsersController extends Controller
{
    public function users(User $user){
        $users = $user -> all();
        dd($users);
        return fractal()
            -> collection($users)
            -> transformWith(new UserTransformers)
            -> toArray();
    }
}
