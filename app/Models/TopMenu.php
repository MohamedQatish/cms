<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopMenu extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'top_menu';
    protected $casts = [
        'active' => 'boolean'
    ];
}
