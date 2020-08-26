<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activator extends Model
{
    protected $fillable = ['account_name', 'account_number', 'bank', 'phone'];
}
