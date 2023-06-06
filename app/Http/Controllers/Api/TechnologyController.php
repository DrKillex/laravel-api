<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    // api tutte le technologies
    public function index()
    {
        $technologies = Technology::all();

        return response()->json([
            'success' => true,
            'results' => $technologies
        ]);
    }

    // api technology singola cercato tramite slug nel db con progetti
    public function show(string $slug){
        $technology = Technology::where('slug', $slug)->with('records')->first();

        if ($technology) {
            return response()->json([
                'success' => true,
                'results' => $technology
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => null
            ], 404);
        }

    }
}
