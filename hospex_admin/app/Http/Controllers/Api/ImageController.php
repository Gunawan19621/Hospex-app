<?php

namespace App\Http\Controllers\Api;

use App\EventExhibitor;
use App\Company;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Routing\Controller as BaseController;

class ImageController extends BaseController
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            // $original_filename     = $request->file('image')->getClientOriginalName();
            // $original_filename_arr = explode('.', $original_filename);
            // $file_ext              = end($original_filename_arr);
            // $destination_path      = 'public/upload/exhibitor-logo/';
            // $image                 = 'U-' . time() . '.' . $file_ext;

            $filename = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $filename);

            if ($request->file('image')->move($destination_path, $image)) {
                $user->image = $filename;
                $user->save();
                // $user->image = '/upload/exhibitor-logo/' . $image;
                // $user->image = getimagesize($request->file('image'));
                
                return $this->responseRequestSuccess($user);
            }
            else {
                return $this->responseRequestError('Cannot upload file');
            }
        }
        else {
            return $this->responseRequestError('File not found');
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