<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $table = 'user_per';

    protected $guarded = ['id'];

    public $timestamps = false;


    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }
}
