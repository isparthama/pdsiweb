<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Output extends Model
{
    protected $table = 'output';
    protected $fillable = ['id', 'name','slug','template','created_by','updated_by','created_at','updated_at','active'];

}
