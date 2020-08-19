<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'referral_code', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function role(){
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role){
        return null !== $this->role()->where('name', $role)->first();
    }

    public function hasAnyRoles($roles){
        return null !== $this->role()->whereIn('name', $roles)->first();
    }

    public function investment(){
        return $this->hasMany(Investment::class);
    }

    public function withdrawal(){
        return $this->hasMany(Withdrawal::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }

    public function account(){
        return $this->hasOne(Account::class);
    }

    public function referred(){
        return $this->hasMany(Referral::class);
    }
}
