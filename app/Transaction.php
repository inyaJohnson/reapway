<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'package_id', 'recipient_investment_id', 'depositor_investment_id', 'depositor_id', 'recipient_id', 'withdrawal_id',
        'amount', 'proof_of_payment', 'depositor_status', 'recipient_status', 'deadline'];

    public function package(){
        return $this->belongsTo(Package::class);
    }

    public function recipient(){
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function depositor(){
        return $this->belongsTo(User::class, 'depositor_id');
    }
}
