<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deposit extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'package_id', 'investment_id',
        'amount', 'proof_of_payment', 'deposit_status', 'confirmation_status'];

    public function package(){
        return $this->belongsTo(Package::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function investment(){
        return $this->belongsTo(Investment::class);
    }
}
