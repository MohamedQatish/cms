<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasTranslations;
    public $translatable = ['name', 'content'];

    protected $fillable = [
        'name',
        'content',
        'title',
        'useful_links',
        'top_menu',
        'parent_id',
        'ordering',
    ];
    protected $casts = [
    'name' => 'array',
    'content' => 'array',
];

}
