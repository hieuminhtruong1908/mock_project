<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';

    protected $fillable = [
        'contents', 'member', 'date', 'content_id'
    ];

    public function content()
    {
        $this->hasMany('App\Models\Content', 'content_id ', 'id');
    }
}

