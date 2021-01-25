<?php

namespace App\Http\Controllers\Api;

use App\Models\Device;
use App\Models\MobileApp;
use Illuminate\Http\Request;
use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MobileAppController extends Controller
{

    public function appRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'in_app_purchase' => 'required|boolean',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        $token = $request->bearerToken();
        $device = Device::where('client_token', $token)->first();
        if ($device) {
            $request['app_token'] = Hash::make(Str::random(10));
            $request['device_id'] = $device->id;
            $request['device_OS'] = $device->OS;
            $device = MobileApp::create($request->toArray());
            return response($device, 200);
        } else {
            $response = ["message" => 'Wrong token or Device does not exist'];
            return response($response, 422);
        }

    }


}