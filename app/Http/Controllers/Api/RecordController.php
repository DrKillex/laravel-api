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
}
