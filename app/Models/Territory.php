<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Territory extends Model {
    use HasFactory;

    protected $guarded = [];

    protected $attributes = [
        'status' => 2
    ];


    public function getStatusAttribute( $attribute ) {
        return $this->statusOptions()[ $attribute ];
    }


    public function user() {
        return $this->belongsTo( User::class );
    }


    public function statusOptions() {
        return [
            1 => 'processed',
            2 => 'free',
            3 => 'pending',
        ];
    }

    public function getEndTime( $currentTime ) {
        $dt = Carbon::createFromDate( $currentTime )->timezone( 'Europe/Kiev' );

        return $dt->addMonth( 4 );
    }

}
