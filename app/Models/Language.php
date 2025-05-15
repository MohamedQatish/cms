<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'flag', 'shortcut', 'active', 'main'];
    protected $casts = [
        'active' => 'boolean',
        'main' => 'boolean',
    ];
    protected $attributes = [
        'active' => false,
        'main' => false,
    ];
}
