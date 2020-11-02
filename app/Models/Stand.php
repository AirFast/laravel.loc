<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stand extends Model {

    use HasFactory;

    protected $guarded = [];

    public function userOne() {
        return $this->belongsTo(User::class, 'user_id_1');
    }

    public function userTwo() {
        return $this->belongsTo(User::class, 'user_id_2');
    }

}
