<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Effect extends Model
{
    public function widgets()
    {
        return $this->hasMany(HomepageWidget::class, 'effect_id');
    }
}
