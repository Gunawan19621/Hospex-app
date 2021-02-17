<?php

namespace App\Http\Controllers\Api;

use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\EventVisitor;
use App\Company;
use App\EventExhibitor;
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
                'data'      => ''
            ], 400);
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
                'data'      => ''
            ], 201);
        }
        else {
            return response()->json([
                'success'   => false,
                'message'   => 'Register Fail',
                'data'      => ''
            ], 400);
        }
    }

    public function login(Request $request)
    {
        $email      = $request->input('email');
        $password   = $request->input('password');
        $type       = $request->input('type');

        $respon = [
            'success'   => false,
            'message'   => 'Login Fail',
            'data'      => ''
        ];

        $user = User::where('email', $email)->first();
        if ($user) {
            if (Hash::check($password, $user->password)) {
                $apiToken = base64_encode(Str::random(40));
                $user->update(['api_token' => $apiToken ]);
                
                $data['id']         = $user->id;
                $data['foto']       = $user->company->image;
                $data['nama']       = $user->name;
                $data['user_name']  = 'user_name';
                $data['email']      = $email;
                $data['type']       = $type;

                return response()->json([
                    'success'   => true,
                    'message'   => 'Login Success',
                    'data'      => [
                        'user'      => $data,
                        'api_token' => $apiToken
                    ]
                ], 200);
            }
            return response()->json($respon, 400);
        }
        else{
            return response()->json($respon, 400);
        }
    }

    public function changePassword(Request $request)
    {
        $id         = $request->input('id');
        $password   = $request->input('password');
        $type       = $request->input('type');

        $respon = [
            'success'   => false,
            'message'   => 'Change Password Fail',
            'data'      => ''
        ];

        $user = User::where('id', $id)->first();
        if ($user) {
            $user->update([
                'password' => Hash::make($password)
            ]);

            return response()->json([
                'success'   => true,
                'message'   => 'Change Password Success',
                'data'      => ''
            ], 200);
        }
        else{
            return response()->json($respon, 400);
        }
    }
}
