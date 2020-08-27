<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable = ['user_id', 'referral_code', 'amount', 'withdrawn', 'referred_id', 'investment_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function referred(){
        return $this->belongsTo(User::class, 'referred_id');
    }

}
