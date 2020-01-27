<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';

    public function getUsers(){
        return $this->hasMany('App\Models\RoleUser','role_id','id');
    }
}
