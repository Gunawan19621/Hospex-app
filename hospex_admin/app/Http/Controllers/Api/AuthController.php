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
        
        if ($register) {
            return response()->json([
                'success'   => true,
                'message'   => 'Register Success',
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
                    $apiToken = base64_encode(Str::random(40));
                    
                    if($device_token == null || $device_token == ''){
                        $user->api_token    = $apiToken;
                        $user->device_token = null;
                        $user->save();
                    }
                    else{
                        $user->api_token    = $apiToken;
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
                            'api_token' => $apiToken
                        ],
                        'status'    => 200
                    ], 200);
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
                        $apiToken = base64_encode(Str::random(40));
                        
                        if($device_token == null || $device_token == ''){
                            $user->api_token    = $apiToken;
                            $user->device_token = null;
                            $user->save();
                        }
                        else{
                            $user->api_token    = $apiToken;
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
                                'api_token' => $apiToken
                            ],
                            'status'    => 200
                        ], 200);
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
            $checkUser->name    = $name;
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
}
