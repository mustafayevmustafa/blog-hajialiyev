<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function get () {
        $data = Category::select('id', 'name')
            ->where(DB::raw("(SELECT COUNT(0) FROM categories as child WHERE child.parent_id=categories.id)"), 0)
            ->orderBy('id', 'DESC')->get();
        return response()->json([
            'success' => [
                'message' => 'Successfully!',
                'data' => $data
            ]
        ]);
    }
}
