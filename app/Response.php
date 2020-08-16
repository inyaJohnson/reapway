<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'message', 'attachment', 'help_id'];
}
