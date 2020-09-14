<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investment extends Model
{
    use SoftDeletes;

    protected $fillable = ['package_id', 'maturity', 'capital', 'withdrawn', 'user_id'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function withdrawal()
    {
        return $this->hasOne(Withdrawal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function deposit()
    {
        return $this->hasOne(Deposit::class);
    }
}
