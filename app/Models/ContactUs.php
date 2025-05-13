<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'seen'
    ];

    protected $casts = [
        'seen' => 'boolean',
    ];
    public $timestamps = false;
}
