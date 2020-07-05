<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Visitor;
use App\UserView;
use App\Company;
use App\EventExhibitor as Exhibitor;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use App\Helpers\GetEvent as eventId;

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
        $info       = $request->input('info');
        $address    = $request->input('address');
        $phone      = $request->input('phone');
        $password   = Hash::make($request->input('password'));

        // $validator = Validator::make($request->all(), [
        //     'name'      => 'required',
        //     'email'     => 'required|email|unique:users',
        //     'password'  => 'required|min:8'
        // ]);
        // if ($validator->fails()) {
        //     return redirect('post/create')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }

        $eventId = eventId::GetEvent();

        $register = Visitor::create([
            'visitor_name'      => $name,
            'visitor_email'      => $email,
            'password'          => $password,
            'company_id'        => '1',
            'event_id'          => $eventId,
            'company'           => $company,
            'info'              => $info,
            'address'           => $address,
            'phone'             => $phone,
            'api_token'         => ''
        ]);
        
        if ($register) {
            return response()->json([
                'success'   => true,
                'message'   => 'Register Success',
                'data'      => $register
            ], 201);
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'Register Fail',
                'data'      => ''
            ], 400);
        }
        

    }
    public function login(Request $request)
    {
        $eventId = eventId::GetEvent();
        $email      = $request->input('email');
        $password   = $request->input('password');
        $type       = $request->input('type');
        $table      = $type == 'visitor' ? 'App\Visitor' : 'App\EventExhibitor';
        // $emailcolumn= $table == 'App\Visitor' ? 'visitor_email' : '$company()->company_email';
        $respon = [
            'success'   => false,
            'message'   => 'Login Fail',
            'data'      => ''
        ];

        $user =  $table == 'App\Visitor' ? $table::where('visitor_email', $email)->first() : $table::whereHas('company', function (Builder $subquery) use($email){
                        $subquery->where('company_email', $email);
                    })->first();
        if ($user) {
            if (Hash::check($password, $user->password)) {
                if ($user->event_id != $eventId) {
                    return response()->json($respon, 400);
                }
                $apiToken = base64_encode(Str::random(40));
                $user->update(['api_token' => $apiToken ]);
                $data['id']         = $user->id;
                $data['foto']       = "foto.jpg";
                $data['nama']       = ($type == 'visitor' ? $user->visitor_name : $user->company->company_name);
                $data['user_name']  = 'user_name';
                $data['email']      = ($type == 'visitor' ? $user->visitor_email : $user->company->company_email);
                $data['type']       = $type;
                return response()->json(['success'   => true,
                    'message'   => 'Login Success',
                    'data'      => [
                        'user'          => $data,
                        'api_token'     => $apiToken
                    ]
                ], 200);
            }
            return response()->json($respon, 400);
        }else{
            return response()->json($respon, 400);
        }





        $user = DB::table('user_views')->where(['type' => $type, 'email' => $email])->first();
        
        if ($user) {
            if (Hash::check($password,$user->password)){
                $apiToken = base64_encode(Str::random(40));
                $table = $type == 'visitor' ? 'event_visitors' : 'event_exhibitors';
                DB::table($table)
                    ->whereId($user->id)
                    ->update(['api_token' => $apiToken]);
                    $data['nama']       = $user->name;
                    $data['user_name']  = 'user_name';
                    $data['email']      = $user->email;
                    $data['type']       = $user->type;
                return response()->json(['success'   => true,
                    'message'   => 'Login Success',
                    'data'      => [
                        'user'          => $data,
                        'api_token'     => $apiToken
                    ]
                ], 201);
            }else{
                return response()->json($respon, 400);
            }
        } else {
            return response()->json($respon, 400);
        }

        // $user = User::whereHasMorph(
        //     'usertable',
        //     ['App\EventExhibitor', 'App\Visitor'],
        //     function (Builder $query, $type) use ($email){
        //         if ($type === 'App\Visitor') {
        //             $query->where('visitor_email', $email);
        //         }
        //         if ($type === 'App\EventExhibitor') {
        //             $query->whereHas('company', function (Builder $subquery) use($email){
        //                 $subquery->where('company_email', $email);
        //             });
        //         }       
        //     }
        // )->first();
        // $respon = [
        //     'success'   => false,
        //     'message'   => 'Login Fail',
        //     'data'      => ''
        // ];
        // if ($user) {
        //     if (Hash::check($password,$user->password)) {
        //         $apiToken = base64_encode(Str::random(40));
        //         $user->update([
        //             'api_token' => $apiToken
        //         ]);
        //         $data['id'] = $user->usertable->id;
        //         $data['foto']   = "foto.jpg";
        //         if ($user->usertable_type === 'App\EventExhibitor') {
        //             $data['nama']       = $user->usertable->company->company_name;
        //             $data['user_name']  = $user->user_name;
        //             $data['email']      = $user->usertable->company->company_email;
        //             $data['type']       = $user->usertable_type;
        //         }else{
        //             $data['nama']       = $user->usertable->visitor_name;
        //             $data['user_name']  = $user->user_name;
        //             $data['email']      = $user->usertable->visitor_email;
        //             $data['type']       = $user->usertable_type;
        //         }
        //         return response()->json([
        //             'success'   => true,
        //             'message'   => 'Login Success',
        //             'data'      => [
        //                     'user'          => $data,
        //                     'api_token'     => $apiToken
        //                 ]
        //             ], 201);
    
        //     } else {
        //         return response()->json($respon, 400);
        //     }
        // } else {
        //     return response()->json($respon, 400);
        // }

    }
   
}
