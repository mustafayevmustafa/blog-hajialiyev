<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function random () {
        return response()->json([
            'success' => [
                'message' => 'Successfully!',
                'data' => Advertising::select('id', 'title', 'text', 'image')->inRandomOrder()->first()
            ]
        ]);
    }
}
