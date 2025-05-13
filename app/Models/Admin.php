<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'users';

    protected $guarded = [];
    public $timestamps = false;
      public function permissions()
    {
        return $this->hasMany(UserPermission::class, 'user_id');
    }
}
