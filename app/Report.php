<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['user_id', 'user_name', 'defaulter_id', 'defaulter_name', 'defaulter_email',
        'subject', 'message', 'attachment', 'status'];
}
