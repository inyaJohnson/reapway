<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'message', 'attachment', 'response_status', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

