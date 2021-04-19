<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'password' => 'required|confirmed|min:8',
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [];
    }

    /**
     * Validate the email for the given request.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }

    /**
     *
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm($id, $code)
    {
        $user = User::where('code',$code)->where('id',$id)->first();

        if($user){
            return view('auth.passwords.reset');
        }

        return 'Invalid or expired reset code.';
    }

    /**
     * Reset the given user's password.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function reset($id, $code, Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());
        $user = User::where('code',$code)->where('id',$id)->first();

        if (!$user) {
            return 'Invalid or expired reset code.';
        }
        else{
            $user->code     = '';
            $user->password = Hash::make($request->password);
            $user->save();

            return 'Reset Password Success';
        }
    }
}
