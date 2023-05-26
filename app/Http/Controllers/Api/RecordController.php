<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index(){

        $records = Record::with('type', 'technologies')->get();
        return response()->json([
            'success' => true,
            'results' => $records
        ]);
    }
    public function show(string $slug)
    {

        $record = Record::where('slug', $slug)->with('type', 'technologies')->first();


        if ($record) {
            return response()->json([
                'success' => true,
                'results' => $record
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => null
            ], 404);
        }
    }
}
