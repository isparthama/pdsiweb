<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Roles;

class User extends Authenticatable
{
    public $incrementing = true;
    use Notifiable, CanResetPassword;

    protected $table = 'users';
    protected $hidden = ['password'];
    protected $primaryKey = 'id';

    protected $fillable = [
        "username",
        "fullname",
        "email",
        "password",
        "remember_token",
        "unit_id",
        "confirmed",
        "confirmation_code",
        "flag_perusahaan",
        "active"
    ];

    public function getRoles(){
        return $this->hasMany('App\Models\RoleUser','user_id','id');
    }

    public function getPendaftaran(){
        return $this->hasMany('App\Models\Pendaftaran','user_id','id');
    }

    public function getProfile(){
        return $this->hasOne('App\Models\UserProfile','user_id','id');
    }

    public function hasRoleName(){
        $ids = $this->getRoles()->get();
        foreach ($ids as $value) {
            $roles_id = $value->role_id;
        }
        return $role = Roles::find($roles_id);
    }


    public function getAlamatLengkap(){
        $kelurahan = Kelurahan::where(['id_kel'=>$this->id_kel])->first();

        if($kelurahan){
            $kecamatan = Kecamatan::where(['id_kec'=>$kelurahan['id_kec']])->first();
            $kota = Kota::where(['id_kab'=>$kecamatan['id_kab']])->first();
            $prov = Provinsi::where(['id_prov'=>$kota['id_prov']])->first();

            $alamatLengkap = 'KEL. '.$kelurahan['nama'].', KEC. '.$kecamatan['nama'].', '.$kota['nama'].', '.$prov['nama'];
            
            return $alamatLengkap;
        }
        else{
            return $data = null;
        }
    }

    public function getProv(){
        return is_null($this->id_prov)?"":strtoupper(Provinsi::where(['id_prov'=>$this->id_prov])->first()->nama); 
    }

    public function getKota(){
        return is_null($this->id_kab)?"":strtoupper(Kota::where(['id_kab'=>$this->id_kab])->first()->nama); 
    }

    public function getKec(){
        return is_null($this->id_kec)?"":strtoupper(Kecamatan::where(['id_kec'=>$this->id_kec])->first()->nama); 
    }

    public function getKel(){
        return is_null($this->id_kel)?"":strtoupper(Kelurahan::where(['id_kel'=>$this->id_kel])->first()->nama); 
    }
    
    
}
