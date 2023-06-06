<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    // api tutti i progetti con technologies e type paginati per 6
    public function index(){
        $records = Record::with('type', 'technologies')->paginate(6);
        return response()->json([
            'success' => true,
            'results' => $records
        ]);
    }

    // api progetto singolo cercato tramite slug nel db con technologies e type 
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
