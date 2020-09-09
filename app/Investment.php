<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investment extends Model
{
    use SoftDeletes;

    protected $fillable = ['package_id', 'percentage', 'duration', 'maturity', 'withdrawn', 'profit',
        'withdraw_btn','reinvest_commit_btn', 'commitment', 'user_id', 'previous_investment_id', 'reinvest_btn', 'pending'];

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
