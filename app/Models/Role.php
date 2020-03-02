<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['level'];
    /*protected $appends = ['is_mentor'];*/


    public function group(){
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
    public function getIsMentor(){
        return $this->level == 2;
    }
}

