<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SetNotitication;
use App\Http\Requests\Api\TurnOnNotitication;
use App\Models\NotificationDevice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function set (SetNotitication $request) {
        $notf = NotificationDevice::where('device_id', $request->device_id)->first();
        if(!$notf) {
            $notf = new NotificationDevice();
            $notf->device_id = $request->device_id;
            $notf->send = true;
        }
        $notf->onesignal_token = $request->onesignal_token;
        $notf->save();
        return response()->json([
            'success' => [
                'message' => 'Successfully!'
            ]
        ]);
    }

    public function turnOn (TurnOnNotitication $request) {
        $notf = NotificationDevice::where('device_id', $request->device_id)->first();
        $notf->send = (bool)$request->send;
        $notf->save();
        return response()->json([
            'success' => [
                'message' => 'Successfully!'
            ]
        ]);
    }
}
