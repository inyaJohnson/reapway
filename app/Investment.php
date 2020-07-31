<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $fillable = ['package_id', 'percentage', 'duration', 'maturity', 'withdrawn'];

    public function package(){
        return $this->belongsTo(Package::class);
    }
}
