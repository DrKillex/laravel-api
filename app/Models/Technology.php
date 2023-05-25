<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    protected $guarded = ['slug'];
    public function records(){
        return $this->belongsToMany(Record::class);
    }
}
