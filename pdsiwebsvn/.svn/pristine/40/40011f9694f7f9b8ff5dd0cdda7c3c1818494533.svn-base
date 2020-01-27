<?php

namespace App\Http\Controllers;

use App\ModelMenuFront;
use App\ModelContents;
use App\ModelKota;
use App\ModelKategori;
use App\ModelLowonganKerja;
use App\ModelPelamar;



use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LowonganPekerjaan extends Controller
{
    function setapply($id){
        $data = new ModelPelamar();
        $data->idpengguna	=Session::get('idpengguna');
        $data->idlowongan	=$id;
        $data->save();
        return redirect('/');
    }
    function showbysearch(Request $request){
        $search= $request->input('search');
        $negara= $request->input('negara');
        $lokasi= trim($request->input('lokasi'));
        
        $data['judulmenu']='Pekerjaan Berdasarkan Lokasi';
        $data['judulmenulink']='pekerjaan-berdasarkan-lokasi';        
        $data['isi_content']='';
        
        $listmenu = ModelMenuFront::All();
        
        if($negara=='INA'){
            if($lokasi!="0"){
                $sql="SELECT a.*,b.name namanegara,c.nama namakota,b.sortname kode,d.fullname as nama_perusahaan FROM `lowongan_kerja` a "
                . "inner join negara b "
                . "on a.id_negara=b.id "
                . "inner join kabupaten c "
                . "on a.id_kota=c.id_kab "
                . "inner join users d "
                . "on a.id_pengguna=d.id 
                WHERE
                a.`id_kota`=".$lokasi." and a.judul_ina like '%".$search."%'";
            }else{
                $sql="SELECT a.*,b.name namanegara,c.nama namakota,b.sortname kode,d.fullname as nama_perusahaan FROM `lowongan_kerja` a "
                . "inner join negara b "
                . "on a.id_negara=b.id "
                . "inner join kabupaten c "
                . "on a.id_kota=c.id_kab "
                . "inner join users d "
                . "on a.id_pengguna=d.id 
                WHERE
                b.sortname='ID' and a.judul_ina like '%".$search."%'";
            }
            
        }else{
            if($lokasi!="0"){
                $sql="SELECT a.*,b.name namanegara,c.nama namakota,b.sortname kode,d.fullname as nama_perusahaan FROM `lowongan_kerja` a "
                . "inner join negara b "
                . "on a.id_negara=b.id "
                . "inner join kabupaten c "
                . "on a.id_kota=c.id_kab "
                . "inner join users d "
                . "on a.id_pengguna=d.id 
                WHERE
                a.`id_negara`=".$lokasi." and a.judul_ina like '%".$search."%'";
            }else{
                $sql="SELECT a.*,b.name namanegara,c.nama namakota,b.sortname kode,d.fullname as nama_perusahaan FROM `lowongan_kerja` a "
                . "inner join negara b "
                . "on a.id_negara=b.id "
                . "inner join kabupaten c "
                . "on a.id_kota=c.id_kab "
                . "inner join users d "
                . "on a.id_pengguna=d.id 
                WHERE
                b.sortname<>'ID' and a.judul_ina like '%".$search."%'";
            }
            
        }
        
        $data['listpekerjaan']=DB::select($sql);
        
        $sql="SELECT COUNT(a.id) jumlah,b.nama,b.`id_kab` FROM lowongan_kerja a 
                RIGHT JOIN kabupaten b
                ON a.id_kota=b.id_kab 
                WHERE b.id_prov=31 
                GROUP BY b.nama,b.`id_kab`";
        $data['listjumlahperkota']= DB::select($sql);
        $sql="SELECT COUNT(a.id) jumlah,b.nama,b.id FROM lowongan_kerja a 
                RIGHT JOIN kategori b
                ON a.`kategori_id`=b.id
                GROUP BY b.nama,b.id";
        $data['listjumlahperkategori']=  DB::select($sql);
        
        $sql="select *,b.name namanegara,c.nama namakota,b.sortname kode,d.fullname as nama_perusahaan from lowongan_kerja a "
            . "inner join negara b "
            . "on a.id_negara=b.id "
            . "left join kabupaten c "
            . "on a.id_kota=c.id_kab "
            . "left join users d "
            . "on a.id_pengguna=d.id"
                
            ;
        $data['listlowongankerjaslide1']=  DB::select($sql. " order by a.id desc limit 3");
        $data['listlowongankerjaslide2']=  DB::select($sql. " order by a.id desc limit 10");
        $data['listlowongankerjaslide3']=  DB::select($sql. " order by a.id desc limit 3");
        $listmenu = ModelMenuFront::All()->where('is_show','1');
        $data['listmenu']=$listmenu;
        $data['detil1']=  ModelContents::where('menu_frontend_id','5')->first();
        $data['detil2']=  ModelContents::where('menu_frontend_id','6')->first();
        $data['detil3']=  ModelContents::where('menu_frontend_id','7')->first();
        $data['detil4']=  ModelContents::where('menu_frontend_id','8')->first();
        return view('front-end.home.form_bylokasi',['data'=>$data]);
        
    }
    function showbylokasi($kota){
        $data['judulmenu']='Pekerjaan Berdasarkan Lokasi';
        $data['judulmenulink']='pekerjaan-berdasarkan-lokasi';        
        $data['isi_content']=ModelKota::where('id_kab',$kota)->first()->nama;
        
        $listmenu = ModelMenuFront::All();
        
        $sql="SELECT a.*,b.name namanegara,c.nama namakota,b.sortname kode,d.fullname as nama_perusahaan FROM `lowongan_kerja` a "
            . "inner join negara b "
            . "on a.id_negara=b.id "
            . "inner join kabupaten c "
            . "on a.id_kota=c.id_kab "
            . "inner join users d "
            . "on a.id_pengguna=d.id 
            WHERE
            a.`id_kota`=".$kota;
        $data['listpekerjaan']=DB::select($sql);
        
        $sql="SELECT COUNT(a.id) jumlah,b.nama,b.`id_kab` FROM lowongan_kerja a 
                RIGHT JOIN kabupaten b
                ON a.id_kota=b.id_kab 
                WHERE b.id_prov=31 
                GROUP BY b.nama,b.`id_kab`";
        $data['listjumlahperkota']= DB::select($sql);
        $sql="SELECT COUNT(a.id) jumlah,b.nama,b.id FROM lowongan_kerja a 
                RIGHT JOIN kategori b
                ON a.`kategori_id`=b.id
                GROUP BY b.nama,b.id";
        $data['listjumlahperkategori']=  DB::select($sql);
        
        $sql="select *,b.name namanegara,c.nama namakota,b.sortname kode,d.fullname as nama_perusahaan from lowongan_kerja a "
            . "inner join negara b "
            . "on a.id_negara=b.id "
            . "left join kabupaten c "
            . "on a.id_kota=c.id_kab "
            . "left join users d "
            . "on a.id_pengguna=d.id"
                
            ;
        $data['listlowongankerjaslide1']=  DB::select($sql. " order by a.id desc limit 3");
        $data['listlowongankerjaslide2']=  DB::select($sql. " order by a.id desc limit 10");
        $data['listlowongankerjaslide3']=  DB::select($sql. " order by a.id desc limit 3");
        $listmenu = ModelMenuFront::All()->where('is_show','1');
        $data['listmenu']=$listmenu;
        $data['detil1']=  ModelContents::where('menu_frontend_id','5')->first();
        $data['detil2']=  ModelContents::where('menu_frontend_id','6')->first();
        $data['detil3']=  ModelContents::where('menu_frontend_id','7')->first();
        $data['detil4']=  ModelContents::where('menu_frontend_id','8')->first();
        
        return view('front-end.home.form_bylokasi',['data'=>$data]);
    }
    
    function showbykategori($id){
        $data['judulmenu']='Pekerjaan Berdasarkan Kategori';
        $data['judulmenulink']='pekerjaan-berdasarkan-kategori';        
        $data['isi_content']=ModelKategori::where('id',$id)->first()->nama;
        
        $listmenu = ModelMenuFront::All();
        
        
        $sql="SELECT *,b.name namanegara,c.nama namakota,b.sortname kode,d.fullname as nama_perusahaan,e.nama namakategori FROM `lowongan_kerja` a "
            . "inner join negara b "
            . "on a.id_negara=b.id "
            . "inner join kabupaten c "
            . "on a.id_kota=c.id_kab "
            . "inner join users d "
            . "on a.id_pengguna=d.id 
            inner join kategori e
            on a.kategori_id=e.id
            WHERE
            e.`id`=".$id;
        $data['listpekerjaan']=DB::select($sql);
        
        
        $sql="SELECT COUNT(a.id) jumlah,b.nama,b.`id_kab` FROM lowongan_kerja a 
                RIGHT JOIN kabupaten b
                ON a.id_kota=b.id_kab 
                WHERE b.id_prov=31 
                GROUP BY b.nama,b.`id_kab`";
        $data['listjumlahperkota']= DB::select($sql);
        $sql="SELECT COUNT(a.id) jumlah,b.nama,b.id FROM lowongan_kerja a 
                RIGHT JOIN kategori b
                ON a.`kategori_id`=b.id
                GROUP BY b.nama,b.id";
        $data['listjumlahperkategori']=  DB::select($sql);
        
        $sql="select *,b.name namanegara,c.nama namakota,b.sortname kode,d.fullname as nama_perusahaan from lowongan_kerja a "
            . "inner join negara b "
            . "on a.id_negara=b.id "
            . "left join kabupaten c "
            . "on a.id_kota=c.id_kab "
            . "left join users d "
            . "on a.id_pengguna=d.id"
                
            ;
        $data['listlowongankerjaslide1']=  DB::select($sql. " order by a.id desc limit 3");
        $data['listlowongankerjaslide2']=  DB::select($sql. " order by a.id desc limit 10");
        $data['listlowongankerjaslide3']=  DB::select($sql. " order by a.id desc limit 3");
        $data['listmenu']=$listmenu;
        $data['detil1']=  ModelContents::where('menu_frontend_id','5')->first();
        $data['detil2']=  ModelContents::where('menu_frontend_id','6')->first();
        $data['detil3']=  ModelContents::where('menu_frontend_id','7')->first();
        $data['detil4']=  ModelContents::where('menu_frontend_id','8')->first();
        
        return view('front-end.home.form_bylokasi',['data'=>$data]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['judul']='Lowongan Kerja';
        $sql="select a.*,if(a.jenkel=1,'Laki-laki',if(a.jenkel=2,'Perempuan','Laki-Laki dan Perempuan')) namauntuk,b.nama namajabatan from lowongan_kerja a "
            . " inner join jabatan b "
            . " on a.jabatan_id=b.id "
            . " order by a.id desc";
        $data['listdata']=DB::select($sql);
        return view('backend-user.lowongankerja.lowongankerja',$data);
    }
    function jsonloker(){
    
//        $draw=$_REQUEST['draw'];
//        $length=$_REQUEST['length'];
//        $start=$_REQUEST['start'];
//        $search=$_REQUEST['search']["value"];
//        $orderby=$_REQUEST['order']['0']["dir"];
//        $kolorder="entrytime";
//        if($_REQUEST['order']['0']['column']!=0){
//            $kolorder=$_REQUEST['columns'][$_REQUEST['order']['0']['column']]['name'];
//        }
//        
//        if($search!=""){
//            $this->db->like("a.namalengkap",$search);
//        }
//        $this->db->join("loginuser b","a.nik=b.nik","inner");
//        $this->db->where(array("b.groupcode"=>"01"));
//        $total=$this->db->count_all_results("peksos a");
//        $output=array();
//        $output['draw']=$draw;
//        $output['recordsTotal']=$output['recordsFiltered']=$total;
//        $output['data']=array();
//        if($search!=""){
//            $this->db->like("a.namalengkap",$search);
//        }
//        $this->db->limit($length,$start);
//        $this->db->order_by('a.'.$kolorder,$orderby);
//        $this->db->join("loginuser b","a.nik=b.nik","inner");
//        $this->db->where(array("b.groupcode"=>"01"));
//        $query=$this->db->get('peksos a');
//        //echo $this->db->last_query();
//        if($search!=""){
//            $this->db->like("a.namalengkap",$search);
//            $jum=$this->db->get('peksos a');
//            $output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
//        }
//        $nomor_urut=$start+1;
//        foreach ($query->result_array() as $dt) {
//                //$html2="<a href='".base_url()."menu/detail/".$dt['role_id']."'>".$dt['role_name']."</a>";
//                $html="<button type=\"button\" class=\"btn btn-warning btn-xs waves-effect waves-light\" onclick=\"jsaction('edit','".md5($dt['nik'])."');\">Edit</button>
//                        <button type=\"button\" class=\"btn btn-danger btn-xs waves-effect waves-light\" onclick=\"jsaction('delete','".md5($dt['nik'])."');\">Delete</button>";
//                $output['data'][]=array($nomor_urut,$dt['nik'],$dt['namalengkap'],$dt['nohp'],$dt['email'],$html);
//                $nomor_urut++;
//        }
//
//        echo json_encode($output);

    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['judul']='Lowongan Kerja';
        $data['row']='';
        $sql="select * from jabatan";
        $data['listjabatan']=DB::select($sql);
        $sql="select * from kategori";
        $data['listkategori']=DB::select($sql);
        $sql="select * from negara";
        $data['listnegara']=DB::select($sql);
        $sql="select * from provinsi where kodenegara='ID'";
        $data['listprovinsi']=DB::select($sql);
        
        
        
        return view('backend-user.lowongankerja.form_input',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new ModelLowonganKerja();
        $data->judul_ina	=$request->input('judul_ina');
        $data->deskripsi_ina	=$request->input('deskripsi_ina');
        $data->jenkel	=$request->input('jenkel');
        $data->jabatan_id	=$request->input('jabatan_id');
        $data->kategori_id	=$request->input('kategori_id');
        $data->jenis_waktu_id	=$request->input('jenis_waktu_id');
        $data->lokasi_id	=$request->input('lokasi_id');
        $data->id_negara	=$request->input('id_negara');
        $data->id_prov	=$request->input('id_prov');
        $data->id_kota	=$request->input('id_kota');
        $data->daritanggal	=$request->input('daritanggal');
        $data->sampaitanggal	=$request->input('sampaitanggal');
        $data->id_pengguna	=Session::get('idpengguna');
        
        $data->save();
        return redirect()->route('lowongankerja.index')->with('alert-success','Berhasil Menambahkan Data!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['judul']='Lowongan Kerja';
        $data['row'] = ModelLowonganKerja::where('id',$id)->first();
        return view('backend-user.lowongankerja.form_input',$data);
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
        
        $data = ModelLowonganKerja::where('id',$id)->first();
        $data->judul_ina	=$request->input('judul_ina');
        $data->deskripsi_ina	=$request->input('deskripsi_ina');
        $data->jenkel	=$request->input('jenkel');
        $data->jabatan_id	=$request->input('jabatan_id');
        $data->kategori_id	=$request->input('kategori_id');
        $data->jenis_waktu_id	=$request->input('jenis_waktu_id');
        $data->lokasi_id	=$request->input('lokasi_id');
        $data->id_negara	=$request->input('id_negara');
        $data->id_prov	=$request->input('id_prov');
        $data->id_kota	=$request->input('id_kota');
        $data->daritanggal	=$request->input('daritanggal');
        $data->sampaitanggal	=$request->input('sampaitanggal');
        $data->id_pengguna	=Session::get('idpengguna');
        
        $data->save();
        return redirect()->route('lowongankerja.index')->with('alert-success','Berhasil Update Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ModelLowonganKerja::where('id', '=', $id)->delete();
        return redirect()->route('lowongankerja.index')->with('alert-success','Data berhasi dihapus!');
    }
    
    
}
