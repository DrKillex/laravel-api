<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $categories = Type::all();

        return response()->json([
            'success' => true,
            'results' => $categories
        ]);
    }

    public function show(string $slug){
        $type = Type::where('slug', $slug)->with('records')->first();

        if ($type) {
            return response()->json([
                'success' => true,
                'results' => $type
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => null
            ], 404);
        }

    }
}
