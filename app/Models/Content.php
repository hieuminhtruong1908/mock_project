<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';

    protected $fillable = [
        'title', 'thumbnail', 'content', 'level', 'duration', 'documents', 'start_date', 'end_date', 'author', 'is_done', 'is_approve',
    ];

    public function group()
    {
        return $this->hasMany('App\Models\Group', 'group_id', 'id');
    }
    public function user(){
        return $this->belongsTo('App\User','author');
    }
}

