<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'content',
        'icon',
        'background_image',
        'link',
    ];

    public $translatable = ['name', 'content'];

}
