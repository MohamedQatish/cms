<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = ['name', 'content', 'ordering', 'type', 'ar_name'];
    public $timestamps = false;
}
