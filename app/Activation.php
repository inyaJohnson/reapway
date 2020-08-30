<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activation extends Model
{
    use SoftDeletes;

    protected $fillable = ['activator_id', 'user_id', 'attachment'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function activator(){
        return $this->belongsTo(Activator::class);
    }
}
