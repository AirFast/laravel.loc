<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use App\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail {

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'role_id',
        'email',
        'address',
        'phone',
        'img_src',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role() {
        return $this->belongsTo(Role::class);
    }


    public function stands() {
        return $this->hasMany(Stand::class);
    }


    public function territories() {
        return $this->hasMany(Territory::class);
    }


    public function territoryPeriod() {
        return $this->hasMany(TerritoryPeriod::class);
    }


    public function isAdmin() {
        return $this->role->name == 'admin';
    }

    public function isUser() {
        return $this->role->name == 'user';
    }

    public function sendEmailVerificationNotification() {
        $this->notify(new VerifyEmail);
    }

    public function sendPasswordResetNotification($token) {
        $this->notify(new ResetPassword($token));
    }
}
