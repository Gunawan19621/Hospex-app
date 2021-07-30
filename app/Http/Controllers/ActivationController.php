<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class ActivationController extends Controller
{
    public function activation($id, $code)
    {
        $user = User::where('api_token',$code)->where('id',$id)->whereNull('email_verified_at')->first();

        if($user){
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();

            $message = 'Activation your account success';

            return view('auth.activation.index', compact('message'));
        }
        else{
            $message = 'Invalid or expired activation code';

            return view('auth.activation.index', compact('message'));
        }
    }
}
