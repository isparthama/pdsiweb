<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;
use App\Models\Kelas;

class Pendaftaran extends Model
{
    protected $table = 't_pendaftaran';

    // public static function boot()
    // {
    //     parent::boot();
    //     self::creating(function ($model) {
    //         $model->no_urut = $this->getNourut();
    //         $model->no_registrasi = $this->getNoreg();
    //     });
    // }

    public function getKelas(){
        return $this->belongsTo('App\Models\Kelas','id_kelas');
    }

    public function getUser(){
        return $this->belongsTo('App\Model\User','user_id');
    }

    public function getListPelatihanAvail($aa = null){
        dd($aa);
    }

    public function getNoreg(){
        $kls = $this->getKelas()->first();
        $angkatan = $kls->angkatan;

        $getNoMax = $this->getNourut();
        $ppkd = $kls->getPpkd()->first();
        $kejuruan = $kls->getKejuruan()->first();

        return strtoupper($getNoMax.'/'.$angkatan.'/'.$kejuruan->kode_kejuruan.'/'.$ppkd->kode_ppkd.'/'.$kls->tahun);
    }

    public function getNourut(){
        $kls = $this->getKelas()->first();
        $angkatan = $kls->angkatan;

        $cekNourut = Pendaftaran::where(['id_kelas'=>$kls->id])->get();
        $getNoMax = count($cekNourut)+1;

        return $getNoMax;
    }
}
