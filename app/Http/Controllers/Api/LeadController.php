<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewLead;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request){
        // validazione
        $data = $request->validate([
            'author' => 'nullable|string|max:150',
            'content' => 'string',
        ]);
        //salvataggio
        $lead = new Lead();
        $lead->author = $data['author'];
        $lead->content = $data['content'];
        $lead->save();
        // mail
        Mail::to('info@boolfolio.it')->send(new NewLead($lead));
    
        return $lead;
    }
}
