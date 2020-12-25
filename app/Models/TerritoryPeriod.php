<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerritoryPeriod extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user() {
        return $this->belongsTo( User::class );
    }


    public function territory() {
        return $this->belongsTo( Territory::class );
    }
}
