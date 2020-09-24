<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Account extends Model
{
    protected $fillable = ['name', 'number', 'bank', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public const ACCOUNT_VALIDATION_RULES = [
        'name' => ['required', 'string', 'max:255'],
        'bank' => ['required', 'string', 'max:255'],
        'number' => ['required',  'digits:10']
    ];


}
