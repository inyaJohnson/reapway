<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['story', 'summary', 'photo', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
