<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['user_id', 'package_id', 'investment_id', 'depositor_id', 'recipient_id', 'withdrawal_id',
        'amount', 'proof_of_payment', 'depositor_status', 'recipient_status'];

    public function package(){
        return $this->belongsTo(Package::class);
    }
}
