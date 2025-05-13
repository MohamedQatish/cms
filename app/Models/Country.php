<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = 'countries';
    protected $fillable = ['id', 'country_code', 'country_name'];
    public $timestamps = false;
}
