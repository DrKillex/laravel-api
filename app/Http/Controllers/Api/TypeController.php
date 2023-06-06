<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    // api tutti i types
    public function index()
    {
        $types = Type::all();
        return response()->json([
            'success' => true,
            'results' => $types
        ]);
    }

    // api type singolo cercato tramite slug nel db con progetti
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
