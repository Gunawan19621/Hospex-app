<?php

namespace App\Http\Controllers\Api;

use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\EventVisitor;
use App\Company;
use App\EventExhibitor;
use App\Event;
use Illuminate\Support\Carbon;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use App\Helpers\GetEvent as eventId;
use App\Http\Controllers\Controller;
use App\Mail\forgotPasswordEmail;
use App\Mail\activationEmail;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    public function register(Request $request)
    {
        $name       = $request->input('name');
        $email      = $request->input('email');
        $company    = $request->input('company');
        $address    = $request->input('address');
        $phone      = $request->input('phone');
        $password   = $request->input('password');

        $checkUser = User::where('email',$email)->first();
        if($checkUser){
            return response()->json([
                'success'   => false,
                'message'   => 'Register Fail. Email has been taken',
                'data'      => '',
                'status'    => 403
            ], 403);
        }

        $companyCreate = Company::create([
            'company_name'       => $company,
            'company_web'        => '',
            'company_info'       => '',
        ]);

        $register = User::create([
            'company_id' => $companyCreate->id,
            'name'       => $name,
            'email'      => $email,
            'password'   => Hash::make($password),
            'address'    => $address,
            'phone'      => $phone,
            'type'       => 'visitor'
        ]);

        $api_token = $this->generateRandomString();
        $register->api_token = $api_token;
        $register->save();

        Mail::to($register->email)->send(new activationEmail($register, $api_token));
        
        if ($register) {
            return response()->json([
                'success'   => true,
                'message'   => 'Register Success. Please check your email to activate your account.',
                'data'      => $register,
                'status'    => 201
            ], 201);
        }
        else {
            return response()->json([
                'success'   => false,
                'message'   => 'Register Fail',
                'data'      => '',
                'status'    => 403
            ], 403);
        }
    }

    public function login(Request $request)
    {
        $t = Carbon::now();
        $event = Event::whereDate('begin',' <= ',$t)->whereDate('end',' >= ',$t)->orderBy('begin')->first();

        $email        = $request->input('email');
        $password     = $request->input('password');
        $type         = $request->input('type');
        $device_token = $request->input('device_token');

        $user = User::where('email', $email)->first();
        if ($user) {
            if($type == null || $type == ''){
                if (Hash::check($password, $user->password)) {
                    if($user->email_verified_at == null){
                        Mail::to($user->email)->send(new activationEmail($user, $user->api_token));

                        return response()->json([
                            'success'   => false,
                            'message'   => 'Login Fail. Please check your email to activate your account.',
                            'data'      => '',
                            'status'    => 403
                        ], 403);
                    }
                    else{
                        if($device_token == null || $device_token == ''){
                            $user->device_token = null;
                            $user->save();
                        }
                        else{
                            $user->device_token = $device_token;
                            $user->save();
                        }
                        
                        $data['id']         = $user->id;
                        $data['foto']       = $user->company->image;
                        $data['nama']       = $user->name;
                        $data['email']      = $user->email;
                        $data['type']       = $user->type;
                        $data['phone']      = $user->phone;
                        $data['address']    = $user->address;
                        $data['company']    = $user->company->company_name;

                        if($event){
                            if($user->type == 'visitor'){
                                $checkData = EventVisitor::where('company_id',$user->company_id)->where('event_id',$event->id)->first();
                                if($checkData == null){
                                    $create = EventVisitor::create([
                                        'company_id' => $user->company_id,
                                        'event_id'   => $event->id
                                    ]);
                                }
                            }
                        }

                        return response()->json([
                            'success'   => true,
                            'message'   => 'Login Success',
                            'data'      => [
                                'user'      => $data,
                                'api_token' => $user->api_token
                            ],
                            'status'    => 200
                        ], 200);
                    }
                }
                else{
                    return response()->json([
                        'success'   => false,
                        'message'   => 'Login Fail. Password is wrong',
                        'data'      => '',
                        'status'    => 403
                    ], 403);
                }
            }
            else{
                if($user->type == $type){
                    if (Hash::check($password, $user->password)) {
                        if($user->email_verified_at == null){
                            Mail::to($user->email)->send(new activationEmail($user, $user->api_token));

                            return response()->json([
                                'success'   => false,
                                'message'   => 'Login Fail. Please check your email to activate your account.',
                                'data'      => '',
                                'status'    => 403
                            ], 403);
                        }
                        else{
                            if($device_token == null || $device_token == ''){
                                $user->device_token = null;
                                $user->save();
                            }
                            else{
                                $user->device_token = $device_token;
                                $user->save();
                            }
                            
                            $data['id']         = $user->id;
                            $data['foto']       = $user->company->image;
                            $data['nama']       = $user->name;
                            $data['email']      = $user->email;
                            $data['type']       = $user->type;
                            $data['phone']      = $user->phone;
                            $data['address']    = $user->address;
                            $data['company']    = $user->company->company_name;

                            if($event){
                                $checkData = EventVisitor::where('company_id',$user->company_id)->where('event_id',$event->id)->first();
                                if($checkData){

                                }
                                else{
                                    $create = EventVisitor::create([
                                        'company_id' => $user->company_id,
                                        'event_id'   => $event->id
                                    ]);
                                }
                            }

                            return response()->json([
                                'success'   => true,
                                'message'   => 'Login Success',
                                'data'      => [
                                    'user'      => $data,
                                    'api_token' => $user->api_token
                                ],
                                'status'    => 200
                            ], 200);
                        }
                    }
                    else{
                        return response()->json([
                            'success'   => false,
                            'message'   => 'Login Fail. Password is wrong',
                            'data'      => '',
                            'status'    => 403
                        ], 403);
                    }
                }
                else{
                    return response()->json([
                        'success'   => false,
                        'message'   => 'Login Fail. Type is wrong',
                        'data'      => '',
                        'status'    => 403
                    ], 403);
                }
            }
        }
        else{
            return response()->json([
                'success'   => false,
                'message'   => 'Login Fail. Email not found',
                'data'      => '',
                'status'    => 403
            ], 403);
        }
    }

    public function logout(Request $request)
    {
        $id           = $request->input('id');
        $device_token = $request->input('device_token');

        $user = User::where('id', $id)->first();
        if ($user) {
            if($user->device_token == $device_token){
                $user->device_token = '';
            }
            $user->save();

            return response()->json([
                'success'   => true,
                'message'   => 'Logout Success',
                'data'      => '',
                'status'    => 200
            ], 200);
        }
        else{
            return response()->json([
                'success'   => false,
                'message'   => 'Logout Fail.',
                'data'      => '',
                'status'    => 403
            ], 403);
        }
    }

    public function updateDeviceToken(Request $request)
    {
        $id           = $request->input('id');
        $device_token = $request->input('device_token');

        $user = User::where('id', $id)->first();
        if ($user) {
            $user->device_token = $device_token;
            $user->save();

            return response()->json([
                'success'   => true,
                'message'   => 'Update Device Token Success',
                'data'      => '',
                'status'    => 200
            ], 200);
        }
        else{
            return response()->json([
                'success'   => false,
                'message'   => 'Update Device Token Fail.',
                'data'      => '',
                'status'    => 403
            ], 403);
        }
    }

    public function getUser($id)
    {
        $user = User::where('id',$id)->first();
        if($user){
            $data['id']         = $user->id;
            $data['foto']       = $user->company->image;
            $data['nama']       = $user->name;
            $data['email']      = $user->email;
            $data['type']       = $user->type;
            $data['phone']      = $user->phone;
            $data['address']    = $user->address;
            $data['company']    = $user->company->company_name;

            return response()->json([
                'success'   => true,
                'message'   => 'Get User Success',
                'data'      => $data,
                'status'    => 200
            ], 200);
        }
        else{
            return response()->json([
                'success'   => false,
                'message'   => 'Get User Fail',
                'data'      => '',
                'status'    => 403
            ], 403);
        }
    }

    public function changeProfile(Request $request)
    {
        $id         = $request->input('id');
        $name       = $request->input('name');
        $company    = $request->input('company');
        $address    = $request->input('address');
        $phone      = $request->input('phone');
        $password   = $request->input('password');

        $checkUser = User::where('id',$id)->first();
        if($checkUser){
            if($checkUser->type == 'exhibitor'){
                $checkUser->name = $company;
            }
            else{
                $checkUser->name = $name;
            }
            
            $checkUser->address = $address;
            $checkUser->phone   = $phone;
            $checkUser->save();

            $checkUser->company->company_name = $company;
            $checkUser->company->save();

            if($password != null && $password != ''){
                $checkUser->password = Hash::make($password);
                $checkUser->save();
            }

            return response()->json([
                'success'   => true,
                'message'   => 'Change Profile Success',
                'data'      => $checkUser,
                'status'    => 200
            ], 200);
        }
        else{
            return response()->json([
                'success'   => false,
                'message'   => 'Change Profile Fail',
                'data'      => '',
                'status'    => 403
            ], 403);
        }
    }

    public function changePassword(Request $request)
    {
        $id         = $request->input('id');
        $password   = $request->input('password');
        $type       = $request->input('type');

        $user = User::where('id', $id)->first();
        if ($user) {
            $user->password = Hash::make($password);
            $user->save();

            return response()->json([
                'success'   => true,
                'message'   => 'Change Password Success',
                'data'      => '',
                'status'    => 200
            ], 200);
        }
        else{
            return response()->json([
                'success'   => false,
                'message'   => 'Change Password Fail',
                'data'      => '',
                'status'    => 403
            ], 403);
        }
    }

    public function forgotPassword(Request $request)
    {
        $email = $request->input('email');

        $user = User::where('email', $email)->first();
        if ($user) {
            $code = $this->generateRandomString();
            $user->code = $code;
            $user->save();

            Mail::to($user->email)->send(new forgotPasswordEmail($user, $code));

            return response()->json([
                'success'   => true,
                'message'   => "Please check your registered email for reset your password.",
                'data'      => '',
                'status'    => 200
            ], 200);
        }
        else{
            return response()->json([
                'success'   => false,
                'message'   => 'Email not found',
                'data'      => '',
                'status'    => 403
            ], 403);
        }
    }

    public function generateRandomString($length = 32) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
