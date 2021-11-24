<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function save (ContactUs $request)
    {
        $contactUs = new \App\Models\ContactUs();
        $contactUs->title = $request->title;
        $contactUs->email = $request->email;
        $contactUs->device_id = $request->device_id;
        $contactUs->content = $request->content;
        $contactUs->save();
        return response()->json([
            'success' => [
                'message' => 'Successfully!'
            ]
        ]);
    }
}
