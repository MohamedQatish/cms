<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageWidget extends Model
{
    protected $fillable = [
        'name',
        'active',
        'file_name',
        'ordering',
        'effect',
        'duration',
        'settings',
    ];

    protected $casts = [
        'active' => 'boolean',
        'settings' => 'array',
    ];
    public function effect()
    {
        return $this->belongsTo(Effect::class, 'effect_id');
    }
}
