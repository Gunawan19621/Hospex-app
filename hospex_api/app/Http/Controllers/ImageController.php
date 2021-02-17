<?php

namespace App\Http\Controllers;

use App\EventExhibitor;
use App\Company;
use App\User;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use Intervention\Image\ImageManagerStatic as Image;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ImageController extends BaseController
{
    public function uploadImage(Request $request)
    {
        $exhibitor = $request->input('exhibitor');

        if ($request->hasFile('image')) {
            $user = User::where('id',$exhibitor)->first();

            try {
                $filename = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('images'), $filename);

                $user->company->image = public_path('images').'/'.$filename;
                $user->company->save();

                return response()->json([
                    'success'   => true,
                    'message'   => 'success',
                    'data'      => ''
                ],200);
            } catch (Exception $e) {
                return response()->json([
                    'success'   => false,
                    'message'   => 'Data Failed to Save',
                    'data'      => $e->getMessage()
                ],503);
            }
            
        }
        else {
            return response()->json([
                'success'   => false,
                'message'   => 'Data Failed to Save',
                'data'      => $e->getMessage()
            ],503);
        }
    }

    public function imageResize($imageResourceId,$width,$height) {
        $targetWidth  = 200;
        $targetHeight = 200;
    
        $targetLayer  = imagecreatetruecolor($targetWidth,$targetHeight);
        imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
    
        return $targetLayer;
    }

    public function logo($exhibitor = null)
    {
        $exhibitor = EventExhibitor::findorfail($exhibitor);
        $company   = Company::findorfail($exhibitor->company_id);
        $type      = 'image/png';
        $headers   = ['Content-Type' => $type];
        $path      = base_path().'/public/'.$company->logo;

        $response  = new BinaryFileResponse($path, 200 , $headers);

        return $response;
    }

    protected function responseRequestSuccess($ret)
    {
        return response()->json(['status' => 'success', 'data' => $ret], 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    protected function responseRequestError($message = 'Bad request', $statusCode = 200)
    {
        return response()->json(['status' => 'error', 'error' => $message], $statusCode)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}