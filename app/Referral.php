<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable = ['user_id', 'referral_code', 'apply_for_withdrawal', 'amount', 'withdrawn', 'referred_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function referred(){
        return $this->belongsTo(User::class, 'referred_id');
    }

}
