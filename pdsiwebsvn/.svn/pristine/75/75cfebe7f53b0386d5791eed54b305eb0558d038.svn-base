<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';

    protected $fillable = [
        "role_id",
        "user_id"
    ];

    public function getRoles(){
        return $this->belongsTo('App\Models\Roles','role_id');
    }

    public function getUsers(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
