<?php

namespace App\Models;
use App\Models\Agama;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;

class UserProfile extends Model
{
    public $incrementing = true;
    use Notifiable, CanResetPassword;

    protected $table = 'user_profile';

    protected $fillable = [
        "user_id",
        "ktp_file",
        "npwp_file",
        "skck_file",
        "profesi",
        "skill",
        "pendidikan",
        "pelatihan",
        "website",
        "tempat_lahir",
        "tanggal_lahir",
        "jenis_kelamin",
        "agama",
        "status_kawin",
        "tinggi",
        "berat",
        "nomor_hp",
        "id_jabatan",
        "id_jenis_bayar",
        "gaji_minimum",
        "entryip",
    ];

    public function getUsers(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function getAgama(){
        return is_null($this->agama)?"":strtoupper(Agama::where(['id'=>$this->agama])->first()->nama); 
    }
}