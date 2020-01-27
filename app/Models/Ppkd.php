<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ppkd extends Model
{
    protected $table = 't_ppkd';

    public function getKelas(){
        return $this->hasMany('App\Models\Kelas','id_ppkd','id');
    }
}
