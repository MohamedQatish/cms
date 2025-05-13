<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseReview extends Model
{
        protected $table ='courses_reviews';

    protected $guarded = [];
    public $timestamps = false;
}
