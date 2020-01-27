<?php

namespace App\Http\Controllers;

use App\ModelMenuFront;
use App\ModelContents;
use App\ModelKota;
use App\ModelKategori;
use App\ModelPengguna;
use App\ModelAgama;
use App\ModelFisik;
use App\ModelNikah;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class Pengguna extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function ceklogin(Request $request){
        $listlogin=DB::select("SELECT * FROM pengguna where email='".$request->input('email')."' and password='".$request->input('password')."'");
        $data = ModelPengguna::where('email',$request->input('email'))->first();
        
        if(count($listlogin)==0){
            return redirect()->route('loginuser');
        }else{
            if($data->perusahaan==0){
                Session::put('nama',$data->nama);
            }else{
                Session::put('nama',$data->nama_perusahaan);
            }
            Session::put('perusahaan',$data->perusahaan);
            Session::put('idpengguna',$data->id);            
            Session::put('email',$data->email);
            Session::put('login',TRUE);
            return redirect()->route('backenduser');
        }
        
    }
    public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }
    function saveperusahaan(Request $request){
        $data = new ModelPengguna();
        $data->nik	=$request->input('nik');
        $data->email	=$request->input('email');
        $data->password	=$request->input('password');
        $data->perusahaan	="1";
        $data->id_provinsi_domisili	=$request->input('provinsi');
        $data->id_kota_domisili	=$request->input('kota');
        $data->id_kecamatan_domisili	=$request->input('kecamatan');
        $data->id_kelurahan_domisili	=$request->input('kelurahan');
        $data->nama_jalan	=$request->input('jalan');
        $data->nama	=$request->input('nama');
        $data->nama_perusahaan	=$request->input('namaperusahaan');
        $data->kodepos	=$request->input('kodepos');
        $data->website	=$request->input('website');
        $data->jenis_perusahaan	=$request->input('jenis');
        $data->deskripsi_perusahaan	=$request->input('deskripsi'); 
        
        
        $data->nomor_hp	=$request->input('nomorhp');
        $data->entryip	=$request->ip();
        $data->create_user =$request->input('email');
        $data->update_user =$request->input('email');
        
        
        $data->updateip	=$request->ip();
        //$data->avatar	=$request->input('avatar');
        $data->save();
        
        return redirect('regis-success');
        
    }
    function savepelamar(Request $request){
        $data = new ModelPengguna();
        $data->nik	=$request->input('nik');
        $data->email	=$request->input('email');
        $data->password	=$request->input('password');
        $data->perusahaan	="0";
        $data->id_provinsi_domisili	=$request->input('provinsi');
        $data->id_kota_domisili	=$request->input('kota');
        $data->id_kecamatan_domisili	=$request->input('kecamatan');
        $data->id_kelurahan_domisili	=$request->input('kelurahan');
        $data->nama_jalan	=$request->input('jalan');
        $data->nama	=$request->input('nama');
        $data->tempat_lahir	=$request->input('tempatlahir');
        $data->tanggal_lahir	=$request->input('tanggallahir');
        $data->jenis_kelamin	=$request->input('jeniskelamin');
        $data->id_agama	=$request->input('agama');
        $data->id_fisik	=$request->input('fisik');
        $data->id_kawin	=$request->input('nikah');
        $data->tinggi	=$request->input('tinggi');
        $data->berat	=$request->input('berat');
        $data->nomor_hp	=$request->input('nomorhp');
        $data->id_tingkat	=$request->input('tingkat');
        $data->id_jurusan	=$request->input('jenisjurusan');
        $data->nama_pendidikan	=$request->input('institusi');
        $data->tahun_lulus	=$request->input('tahunlulus');
        $data->nilai	=$request->input('nilai');
        $data->id_penempatan	=$request->input('penempatan');
        $data->id_provinsi_penempatan	=$request->input('provinsipenempatan');
        $data->id_kota_penempatan	=$request->input('kotapenempatan');
        $data->id_jabatan	=$request->input('jabatan');
        $data->id_jenis_bayar	=$request->input('jenisbayar');
        $data->gaji_minimum	=$request->input('gajiminimum');
        $data->entryip	=$request->ip();
        $data->updateip	=$request->ip();
        $data->create_user =$request->input('email');
        $data->update_user =$request->input('email');
        //$data->avatar	=$request->input('avatar');
        $data->save();
        return redirect('regis-success');
        
    }
    function regissuccess(){
        $listmenu = ModelMenuFront::All();
        $data['judulmenu']='Selamat Anda Berhasil Registrasi';
        $data['judulmenulink']='#';        
        $data['isi_content']='';
        $listmenu = ModelMenuFront::All()->where('is_show','1');
        $data['listmenu']=$listmenu;
        $data['sukses']='Selamat Anda Berhasil Registrasi';
        $data['detil1']=  ModelContents::where('menu_frontend_id','5')->first();
        $data['detil2']=  ModelContents::where('menu_frontend_id','6')->first();
        $data['detil3']=  ModelContents::where('menu_frontend_id','7')->first();
        $data['detil4']=  ModelContents::where('menu_frontend_id','8')->first();
        return view('front-end.home.form_sukses',['data'=>$data]);
        
    }
    
    function daftar(Request $request){
        
        $data['judulmenu']='Registrasi-pengguna';
        $data['judulmenulink']='registrasi-user';        
        $data['isi_content']='';
        
        $data['perusahaan']=$request->input('perusahaan');
        $data['nik']=$request->input('nik');
        $data['email']=$request->input('email');
        $data['password']=$request->input('password');
        
        $listmenu = ModelMenuFront::All();
        $listagama = ModelAgama::All();
        $listnikah = ModelNikah::All();
        $listfisik = ModelFisik::All();
        $listprovinsi=DB::select("SELECT * FROM provinsi WHERE kodenegara='ID'");
        $listtingkat=DB::select("SELECT * FROM pendidikan_group");
        $listjabatan=DB::select("SELECT * FROM jabatan");
        
        $listmenu = ModelMenuFront::All()->where('is_show','1');
        $data['listmenu']=$listmenu;
        $data['listagama']=$listagama;
        $data['listnikah']=$listnikah;
        $data['listfisik']=$listfisik;
        $data['listprovinsi']=$listprovinsi;
        $data['listtingkat']=$listtingkat;
        $data['listjabatan']=$listjabatan;
        
        $data['detil1']=  ModelContents::where('menu_frontend_id','5')->first();
        $data['detil2']=  ModelContents::where('menu_frontend_id','6')->first();
        $data['detil3']=  ModelContents::where('menu_frontend_id','7')->first();
        $data['detil4']=  ModelContents::where('menu_frontend_id','8')->first();
        
        
        if($request->input('perusahaan')==1){
            return view('front-end.home.form_registrasi_pelamar',['data'=>$data]);
        }else{
            return view('front-end.home.form_registrasi_perusahaan',['data'=>$data]);
        }
    }
    function setkota($provinsi){
        $sql="select * from kabupaten where id_prov='".$provinsi."'";
        $hsl=DB::select($sql);
        echo '<option value="">Pilih Kota</option>';
        foreach ($hsl as $kota){
            echo "<option value='".$kota->id_kab."'>".$kota->nama."</option>";
        }
    }
    function setkec($kota){
        $sql="select * from kecamatan where id_kab='".$kota."'";
        $hsl=DB::select($sql);
        echo '<option value="">Pilih Kecamatan</option>';
        foreach ($hsl as $kota){
            echo "<option value='".$kota->id_kec."'>".$kota->nama."</option>";
        }
    }
    function setkel($kec){
        $sql="select * from kelurahan where id_kec='".$kec."'";
        $hsl=DB::select($sql);
        echo '<option value="">Pilih Kelurahan</option>';
        foreach ($hsl as $kota){
            echo "<option value='".$kota->id_kel."'>".$kota->nama."</option>";
        }
    }
    function setjurusan($id){
        $sql="select * from pendidikan_detail where group_id='".$id."'";
        $hsl=DB::select($sql);
        echo '<option value="">Pilih Jenis Jurusan</option>';
        foreach ($hsl as $kota){
            echo "<option value='".$kota->id."'>".$kota->deskripsi."</option>";
        }
    }
    
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    function profiluser(){
        $data['judul']='Profil-User';
        return view('backend-user.profile.form_profil',$data);
    }
}
