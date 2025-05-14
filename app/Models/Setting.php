<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations;
    protected $table = 'settings';
    protected $fillable = ['name', 'content', 'ordering', 'type', 'ar_name'];
    public $timestamps = false;
    public $translatable = ['content'];
}
