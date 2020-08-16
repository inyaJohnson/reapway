<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $fillable = ['package_id', 'percentage', 'duration', 'maturity', 'withdrawn', 'profit',
        'reinvest', 'commitment'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function withdrawal()
    {
        return $this->hasMany(Withdrawal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }


}
