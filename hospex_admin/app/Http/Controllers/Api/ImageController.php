<?php

namespace App\Http\Controllers\Api;

use App\EventExhibitor;
use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ImageController extends BaseController
{
    public function uploadImage(Request $request)
    {
        @ini_set( 'upload_max_size' , '64M' );
        @ini_set( 'post_max_size', '64M');
        @ini_set( 'max_execution_time', '300' );
        
        $exhibitor = $request->input('exhibitor');

        if ($request->hasFile('image')) {
            $user = User::where('id',$exhibitor)->first();

            try {
                $filename = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('images'), $filename);

                $user->company->image = 'images/'.$filename;
                $user->company->save();

                return response()->json([
                    'success'   => true,
                    'message'   => 'Change Image Success',
                    'data'      => $user->company,
                    'status'    => 200
                ],200);
            }
            catch (Exception $e) {
                return response()->json([
                    'success'   => false,
                    'message'   => $e->getMessage(),
                    'data'      => '',
                    'status'    => 403
                ],403);
            }
        }
        else {
            return response()->json([
                'success'   => false,
                'message'   => 'Data Failed to Save',
                'data'      => '',
                'status'    => 403
            ],403);
        }
    }
}