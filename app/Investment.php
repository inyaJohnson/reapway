<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $fillable = ['package_id', 'percentage', 'duration', 'maturity', 'withdrawn', 'profit',
        'reinvest', 'commitment', 'user_id', 'previous_investment_id', 'reinvest_btn'];

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

    public function depositorTransaction()
    {
        return $this->hasMany(Transaction::class, 'depositor_investment_id');
    }

    public function recipientTransaction()
    {
        return $this->hasMany(Transaction::class, 'recipient_investment_id');
    }


}
