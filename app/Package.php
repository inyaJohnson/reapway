<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['name', 'description', 'price', 'percentage', 'duration'];

    public function investment(){
        return $this->hasMany(Investment::class);
    }
}
