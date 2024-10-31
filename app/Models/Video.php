<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable=[
        'userid',
        'subject_id',
        'title',
        'video'
    ];
}
