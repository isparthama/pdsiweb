<?php

namespace App\Http\Controllers;

use App\ModelMenuFront;
use App\ModelContents;
use App\Modelserahterima;
use App\ModelInspeksi;
use App\ModelProduksi;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Produksi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function showmaterial(Request $request){
        if($request->ajax()){
            if($request->jns==1){
                $sql="select GROUP_CONCAT(concat(keterangan,'-',id)) keterangan from m_wo_material where keterangan like '%".$request->material_name."%'";
                $hsl= collect(DB::select($sql))->first();
                echo $hsl->keterangan;
            }
            if($request->jns==2){
                $sql="select GROUP_CONCAT(concat(keterangan,'-',id)) keterangan from m_wo_tools where keterangan like '%".$request->material_name."%'";
                $hsl= collect(DB::select($sql))->first();
                echo $hsl->keterangan;
            }
            if($request->jns==3){
                $sql="select GROUP_CONCAT(concat(nama_personil,'-',id)) keterangan from m_personil where site_id=".Session::get('site_id')." and nama_personil like '%".$request->material_name."%'";
                $hsl= collect(DB::select($sql))->first();
                echo $hsl->keterangan;
            }
            if($request->jns==4){
                $sql="select GROUP_CONCAT(concat(keterangan,'-',id)) keterangan from m_wo_mesin where keterangan like '%".$request->material_name."%'";
                $hsl= collect(DB::select($sql))->first();
                echo $hsl->keterangan;
            }
            
            if($request->jns==5){
                $sql="select GROUP_CONCAT(concat(routingslip_no)) keterangan from trx_serahterima_form where routingslip_no like '%".$request->material_name."%'";
                $hsl= collect(DB::select($sql))->first();
                echo $hsl->keterangan;
            }
            
            
        }
    }
    
    function showmaterialdetail(Request $request){
        if($request->ajax()){
            if($request->jns==1){
                $sql="select * from m_wo_material where id=".$request->id;
                $hsl= collect(DB::select($sql))->first();
                echo $hsl->biaya.'~'.$hsl->satuan.'~'.$hsl->id.'~'.$hsl->kum_jam.'~'.$hsl->biaya;
            }
            if($request->jns==2){
                $sql="select * from m_wo_tools where id=".$request->id;
                $hsl= collect(DB::select($sql))->first();
                echo $hsl->biaya.'~'.$hsl->satuan.'~'.$hsl->id.'~'.$hsl->kum_jam.'~'.$hsl->biaya;
            }
            if($request->jns==3){
                $sql="SELECT b.* FROM m_personil a INNER JOIN `m_wo_personil` b ON a.`jabatan_id`=b.`id` where a.id=".$request->id;
                $hsl= collect(DB::select($sql))->first();
                echo $hsl->tarif_jam.'~'.$hsl->satuan.'~'.$hsl->id.'~'.$hsl->keterangan.'~'.$hsl->kum_jam.'~'.$hsl->biaya;
            }
            if($request->jns==4){
                $sql="select * from m_wo_mesin where id=".$request->id;
                $hsl= collect(DB::select($sql))->first();
                echo $hsl->tarif_jam.'~'.$hsl->satuan.'~'.$hsl->id.'~'.$hsl->kum_jam.'~'.$hsl->biaya;
            }
            
            if($request->jns==5){
                $sql="select * from trx_serahterima_form where routingslip_no='".$request->id."'";
                $hsl= collect(DB::select($sql))->first();
                echo $hsl->wo_no.'~'.$hsl->register_no.'~'.$hsl->nama_pelanggan.'~'.$hsl->id;
            }
            
        }
    }
    
    
    public function index($id)
    {
        $sql="CALL sp_trx_production_form_listmenu(".$id.",".Session::get('site_id').",'".Session::get('username')."')";
        $data['listdata']=DB::select($sql);
        $data['content']="admin-user.produksi.list_form";
        $data['judul']="List Pengisian Format Produksi Menu";
        $data['statusnya']=$id;
        //Session::put('alert-success','');
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('review','');
        Session::put('produksi','class="current" ');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('inspeksitest','');
        Session::put('petugas','');
        Session::put('menu','');
        Session::put('rolemenu','');
        Session::put('jabatan','');
        Session::put('pengerjaanulang','');
        Session::put('manufacture','');
        Session::put('finishing','');
        Session::put('serahterimakeluar','');
        
        Session::put('site','');
        Session::put('material','');
        Session::put('mesin','');
        Session::put('masterpersonil','');
        Session::put('mail','');
        Session::put('tools','');
        return view('admin-user.templatepdsi',$data);
    }

    
    public function edit($id)
    {
        $sql="call sp_trx_production_form_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.produksi.form_input";
        $data['judul']="Form Pengisian Format Produksi";
        $sql="call sp_trx_production_form_detail1_get(".$data['row']->id.")";
        $data['listmaterial']=DB::select($sql);
        $sql="call sp_trx_production_form_detail2_get(".$data['row']->id.")";
        $data['listtools']=DB::select($sql);
        $sql="call sp_trx_production_form_detail3_get(".$data['row']->id.")";
        $data['listpersonil']=DB::select($sql);
        $sql="call sp_trx_production_form_detail4_get(".$data['row']->id.")";
        $data['listmesin']=DB::select($sql);
        Session::put('review','');
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('produksi','class="current" ');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('inspeksitest','');
        Session::put('petugas','');
        Session::put('menu','');
        Session::put('rolemenu','');
        Session::put('jabatan','');
        Session::put('pengerjaanulang','');
        Session::put('manufacture','');
        Session::put('finishing','');
        Session::put('serahterimakeluar','');
        
        Session::put('site','');
        Session::put('material','');
        Session::put('mesin','');
        Session::put('masterpersonil','');
        Session::put('mail','');
        Session::put('tools','');
        return view('admin-user.templatepdsi',$data);
    }
    public function details($id)
    {
        $sql="call sp_trx_production_form_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.produksi.form_input_detail";
        $data['judul']="Form Pengisian Format Produksi";
        $sql="call sp_trx_production_form_detail1_get(".$data['row']->id.")";
        $data['listmaterial']=DB::select($sql);
        $sql="call sp_trx_production_form_detail2_get(".$data['row']->id.")";
        $data['listtools']=DB::select($sql);
        $sql="call sp_trx_production_form_detail3_get(".$data['row']->id.")";
        $data['listpersonil']=DB::select($sql);
        $sql="call sp_trx_production_form_detail4_get(".$data['row']->id.")";
        $data['listmesin']=DB::select($sql);
        Session::put('review','');
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('produksi','class="current" ');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('inspeksitest','');
        Session::put('petugas','');
        Session::put('menu','');
        Session::put('rolemenu','');
        Session::put('jabatan','');
        Session::put('pengerjaanulang','');
        Session::put('manufacture','');
        Session::put('finishing','');
        Session::put('serahterimakeluar','');
        
        Session::put('site','');
        Session::put('material','');
        Session::put('mesin','');
        Session::put('masterpersonil','');
        Session::put('mail','');
        Session::put('tools','');
        return view('admin-user.templatepdsi',$data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->ajax()){
            echo $sql="call sp_trx_production_form_get('".$request->routingslip_no."')";
            $row= collect(DB::select($sql))->first();
            $filedim=$row->dim_filename;
            if($request->file('dim_filename')){
                $datenow = new Carbon(now());
                $users = Auth::user();
                $userPath = $request->routingslip_no;
                $ext_file = strtolower($request->file('dim_filename')->getClientOriginalExtension());

                if($ext_file == 'png' || $ext_file == 'jpeg'){
                    $subPath = 'formatproduksi/permit';
                } else {
                    $subPath = 'formatproduksi/permit';
                }
                $fileName = $request->routingslip_no.'.'.$ext_file;
                $path = 'uploads/'.$userPath.'/'.$subPath;
                //$path = public_path($path);

                $uploadFile = $request->file('dim_filename')->storeAs('public/'.$path, $fileName);
                $filedim = '/storage/'.$path.'/'.$fileName;
            }
            $filendt=$row->ndt_filename;
            if($request->file('ndt_filename')){
                $datenow = new Carbon(now());
                $users = Auth::user();
                $userPath = $request->routingslip_no;
                $ext_file = strtolower($request->file('ndt_filename')->getClientOriginalExtension());

                if($ext_file == 'png' || $ext_file == 'jpeg'){
                    $subPath = 'images';
                } else {
                    $subPath = 'files';
                }
                $fileName = $datenow->format('dmy_His').'.'.$ext_file;
                $path = 'uploads/'.$subPath.'/'.$userPath;
                //$path = public_path($path);

                $uploadFile = $request->file('ndt_filename')->storeAs('public/'.$path, $fileName);
                $filendt = '/storage/'.$path.'/'.$fileName;
            }
            $filefinishing=$row->finishing_filename;
            if($request->file('finishing_filename')){
                $datenow = new Carbon(now());
                $users = Auth::user();
                $userPath = $request->routingslip_no;
                $ext_file = strtolower($request->file('finishing_filename')->getClientOriginalExtension());

                if($ext_file == 'png' || $ext_file == 'jpeg'){
                    $subPath = 'images';
                } else {
                    $subPath = 'files';
                }
                $fileName = $datenow->format('dmy_His').'.'.$ext_file;
                $path = 'uploads/'.$subPath.'/'.$userPath;
                //$path = public_path($path);

                $uploadFile = $request->file('finishing_filename')->storeAs('public/'.$path, $fileName);
                $filefinishing = '/storage/'.$path.'/'.$fileName;
            }
            $filevis=$row->vis_filename;
            if($request->file('vis_filename')){
                $datenow = new Carbon(now());
                $users = Auth::user();
                $userPath = $request->routingslip_no;
                $ext_file = strtolower($request->file('vis_filename')->getClientOriginalExtension());
                
                if($ext_file == 'png' || $ext_file == 'jpeg'){
                    $subPath = 'formatproduksi/JSA';
                } else {
                    $subPath = 'formatproduksi/JSA';
                }
                $fileName = $request->routingslip_no.'.'.$ext_file;
                $path = 'uploads/'.$userPath.'/'.$subPath;
                //$path = public_path($path);

                $uploadFile = $request->file('vis_filename')->storeAs('public/'.$path, $fileName);
                $filevis = '/storage/'.$path.'/'.$fileName;
            }
            $fileload=$row->load_filename;
            if($request->file('load_filename')){
                $datenow = new Carbon(now());
                $users = Auth::user();
                $userPath = $request->routingslip_no;
                $ext_file = strtolower($request->file('load_filename')->getClientOriginalExtension());

                if($ext_file == 'png' || $ext_file == 'jpeg'){
                    $subPath = 'images';
                } else {
                    $subPath = 'files';
                }
                $fileName = $datenow->format('dmy_His').'.'.$ext_file;
                $path = 'uploads/'.$subPath.'/'.$userPath;
                //$path = public_path($path);

                $uploadFile = $request->file('load_filename')->storeAs('public/'.$path, $fileName);
                $fileload = '/storage/'.$path.'/'.$fileName;
            }
            
            $user=Auth::user();
	    $sql="call sp_trx_production_form_update(".$request->ids.", ".$request->serahterima_id.", ".$request->inspeksiperbaikan_id.", ".($filedim==""?"''":"'".$filedim."'").", ".($filendt==""?"''":"'".$filendt."'").", ".($filefinishing==""?"''":"'".$filefinishing."'").", ".($filevis==""?"''":"'".$filevis."'").", ".($fileload==""?"''":"'".$fileload."'")." , '".$request->form_no."', '".$request->tanggal."','".(isset($request->material_sts)?$request->material_sts:"")."','".(isset($request->permit_sts)?$request->permit_sts:"")."', '".(isset($request->tool_sts)?$request->tool_sts:"")."', '".(isset($request->jsa_sts)?$request->jsa_sts:"")."', '".(isset($request->dim_check_sts)?$request->dim_check_sts:"")."',  '".(isset($request->ndt_sts)?$request->ndt_sts:"")."',  '".(isset($request->finishing_sts)?$request->finishing_sts:"")."',  '".(isset($request->vis_check_sts)?$request->vis_check_sts:"")."', '".(isset($request->load_test_sts)?$request->load_test_sts:"")."', '".(isset($request->terima_baik_sts)?$request->terima_baik_sts:"")."', '".(isset($request->kirim_keluar_sts)?$request->kirim_keluar_sts:"")."', '".(isset($request->rework_sts)?$request->rework_sts:"")."', '".(isset($request->tidak_bisa_diperbaiki_sts)?$request->tidak_bisa_diperbaiki_sts:"")."', ".Session::get('site_id').", '".$user->username."')";
            DB::select($sql);
            
        }
    }
    function savematerial(Request $request){
        if($request->ajax()){
            $user=Auth::user();
            if($request->base_id==''){
                if($request->jenis==1){
                    $sql="select count(*)jumlah from m_wo_material where product_no='".$request->keterangan_tambahan."'";
                    $jum=collect(DB::select($sql))->first()->jumlah;
                    if($jum==0){
                        $sql="insert into m_wo_material (keterangan,satuan,kum_jam,tarif_jam,biaya,product_no)"
                                . " values('".$request->keterangan."', '".$request->satuan."', ".$request->estimasi_jumlah.", ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".$request->keterangan_tambahan."')";
                        DB::select($sql);
                        $id = DB::getPdo()->lastInsertId();
                        $sql="call `sp_trx_production_form_detail".$request->jenis."_insert`(".$request->idx.", ".$request->baris_no.", ".$id.", '".$request->keterangan."-".$id."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
                        DB::select($sql);
                    }else{
                        $sql="select * from m_wo_material where keterangan='".$request->keterangan."'";
                        $rw=collect(DB::select($sql))->first();
                        $sql="update m_wo_material set keterangan='".$request->keterangan."',satuan='".$request->satuan."',kum_jam=".$request->estimasi_jumlah.",tarif_jam=".$request->estimasi_harga.",biaya=".$request->estimasi_harga_total.",product_no='".$request->keterangan_tambahan."' where id='".$rw->id."'";
                        DB::select($sql);
                        $sql="call `sp_trx_production_form_detail".$request->jenis."_update`(".$request->idx.", ".$request->baris_no.", ".$rw->id.", '".$request->keterangan."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
                        DB::select($sql);
                    }
                }
                if($request->jenis==2){
                    $sql="select count(*)jumlah from m_wo_tools where product_no='".$request->keterangan_tambahan."'";
                    $jum=collect(DB::select($sql))->first()->jumlah;
                    if($jum==0){
                        $sql="insert into m_wo_tools (keterangan,satuan,kum_jam,tarif_jam,biaya,product_no)"
                                . " values('".$request->keterangan."', '".$request->satuan."', ".$request->estimasi_jumlah.", ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".$request->keterangan_tambahan."')";
                        DB::select($sql);
                        $id = DB::getPdo()->lastInsertId();
                        $sql="call `sp_trx_production_form_detail".$request->jenis."_insert`(".$request->idx.", ".$request->baris_no.", ".$id.", '".$request->keterangan."-".$id."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
                        DB::select($sql);
                    }else{
                        $sql="select * from m_wo_tools where keterangan='".$request->keterangan."'";
                        $rw=collect(DB::select($sql))->first();
                        $sql="update m_wo_tools set keterangan='".$request->keterangan."',satuan='".$request->satuan."',kum_jam=".$request->estimasi_jumlah.",tarif_jam=".$request->estimasi_harga.",biaya=".$request->estimasi_harga_total.",product_no='".$request->keterangan_tambahan."' where id='".$rw->id."'";
                        DB::select($sql);
                        $sql="call `sp_trx_production_form_detail".$request->jenis."_update`(".$request->idx.", ".$request->baris_no.", ".$rw->id.", '".$request->keterangan."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
                        DB::select($sql);
                    }
                }
                
            }else{
                echo $sql="select count(*)jumlah from trx_production_form_detail".$request->jenis." where production_form_id=".$request->idx." and base_id=".$request->base_id;
                if(collect(DB::select($sql))->first()->jumlah>0){
                    $sql="call `sp_trx_production_form_detail".$request->jenis."_update`(".$request->idx.", ".$request->baris_no.", ".$request->base_id.", '".$request->keterangan."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
                    DB::select($sql);
                    //echo "ok";
                    if($request->jenis==3){
                        echo $sql="select count(*)jumlah from m_personil a inner join m_personil_sertifikat b on a.id=b.personil_id where ifnull(b.sertifikat,'')<>'' and a.id=".$request->base_id;
                        $jum=collect(DB::select($sql))->first()->jumlah;
                        if($jum>0){
                            //echo "kesini";
                            echo $path=public_path()."/storage/uploads/".$request->routingslip_no;
                            if(!\File::exists($path)) {
                                echo "kesini";
                                //\File::makeDirectory($path, $mode = 0777, true, true);
                                //$success = File::copy(public_path().'/storage/uploads/'.$request->base_id,$path);
                            }else{
                                echo "kesana";
                                $path = public_path().'/storage/uploads/' . $request->routingslip_no."/personil";
                                //File::makeDirectory($path, $mode = 0777, true, true);
                                if(\File::exists(public_path().'/storage/uploads/'.$request->base_id)) {
                                    echo "ada";
                                    \File::copyDirectory(public_path().'/storage/uploads/'.$request->base_id,$path);
                                }
                                //$success = \File::copy(public_path().'/storage/uploads/'.$request->base_id,$path);
                            }
                        }
                    }
                }else{
                    echo $sql="call `sp_trx_production_form_detail".$request->jenis."_insert`(".$request->idx.", ".$request->baris_no.", ".$request->base_id.", '".$request->keterangan."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
                    DB::select($sql);
                    if($request->jenis==3){
                        echo $sql="select count(*)jumlah from m_personil a inner join m_personil_sertifikat b on a.id=b.personil_id where ifnull(sertifikat,'')<>'' and a.id=".$request->base_id;
                        $jum=collect(DB::select($sql))->first()->jumlah;
                        if($jum>0){
                            echo "kesini";
                            $sql="update trx_mdr set sertifikat_personil_sts=1 where routing_slip_no='".$request->routingslip_no."'";
                            $path=public_path()."/storage/uploads/".$request->routingslip_no;
                            if(!File::exists($path)) {
                                
                                $success = File::copy(public_path().'/storage/uploads/'.$request->base_id,$path);
                            }else{
                                $path = public_path().'/storage/uploads/' . $request->routingslip_no;
                                File::makeDirectory($path, $mode = 0777, true, true);
                            }
                        }
                    }
                    //echo "not ok";
                }
            }
        }
    }
    function savematerialold(Request $request){
        if($request->ajax()){
            $user=Auth::user();
            if($request->base_id==''){
                if($request->jenis==1){
                    $sql="select count(*)jumlah from m_wo_material where product_no='".$request->keterangan_tambahan."'";
                    $jum=collect(DB::select($sql))->first()->jumlah;
                    if($jum==0){
                        $sql="insert into m_wo_material (keterangan,satuan,kum_jam,tarif_jam,biaya,product_no)"
                                . " values('".$request->keterangan."', '".$request->satuan."', ".$request->estimasi_jumlah.", ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".$request->keterangan_tambahan."')";
                        DB::select($sql);
                        $id = DB::getPdo()->lastInsertId();
                        echo $sql="call `sp_trx_production_form_detail".$request->jenis."_insert`(".$request->idx.", ".$request->baris_no.", ".$id.", '".$request->keterangan."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
                        DB::select($sql);
                    }
                }
                if($request->jenis==2){
                    $sql="select count(*)jumlah from m_wo_tools where product_no='".$request->keterangan_tambahan."'";
                    $jum=collect(DB::select($sql))->first()->jumlah;
                    if($jum==0){
                        $sql="insert into m_wo_tools (keterangan,satuan,kum_jam,tarif_jam,biaya,product_no)"
                                . " values('".$request->keterangan."', '".$request->satuan."', ".$request->estimasi_jumlah.", ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".$request->keterangan_tambahan."')";
                        DB::select($sql);
                        $id = DB::getPdo()->lastInsertId();
                        echo $sql="call `sp_trx_production_form_detail".$request->jenis."_insert`(".$request->idx.", ".$request->baris_no.", ".$id.", '".$request->keterangan."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
                        DB::select($sql);
                    }
                }
            }else{
                $sql="select count(*)jumlah from trx_production_form_detail".$request->jenis." where production_form_id=".$request->idx." and base_id=".$request->base_id;
                if(collect(DB::select($sql))->first()->jumlah>0){
                    $sql="call `sp_trx_production_form_detail".$request->jenis."_update`(".$request->idx.", ".$request->baris_no.", ".$request->base_id.", '".$request->keterangan."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
                    DB::select($sql);
                    //echo "ok";
                }else{
                    echo $sql="call `sp_trx_production_form_detail".$request->jenis."_insert`(".$request->idx.", ".$request->baris_no.", ".$request->base_id.", '".$request->keterangan."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
                    DB::select($sql);
                    //echo "not ok";
                }
            }
        }
    }
    function deletematerial(Request $request){
        if($request->ajax()){
            echo $sql="delete from trx_production_form_detail".$request->jenis." where production_form_id=".$request->idx." and base_id=".$request->base_id;
            DB::select($sql);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function destroy($id)
    {
        
        $sql="call sp_trx_inspeksiperbaikan_form_get('".$id."')";
        $row= collect(DB::select($sql))->first();
        ModelInspeksi::where('id',$row->id)->delete();
        Session::put('alert-success','Data Berhasil Terhapus');
        return redirect('/admin-user/inspeksi-list/0');
    }
    
    function showapprove($id){
        $sql="call sp_trx_production_form_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.produksi.form_input_approve";
        $data['judul']="Form Produksi Approve";
        
        
        Session::put('review','');
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('produksi','class="current" ');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('routing','');
        Session::put('inspeksitest','');
        Session::put('petugas','');
        Session::put('menu','');
        Session::put('rolemenu','');
        Session::put('jabatan','');
        Session::put('pengerjaanulang','');
        Session::put('manufacture','');
        Session::put('finishing','');
        Session::put('serahterimakeluar','');
        
        Session::put('site','');
        Session::put('material','');
        Session::put('mesin','');
        Session::put('masterpersonil','');
        Session::put('mail','');
        Session::put('tools','');
        return view('admin-user.templatepdsi',$data);
    }
    
    function storeapprove(Request $request)
    {
        if($request->ajax()){
            $user=Auth::user();
            echo $sql="call  sp_format_produksi_approval_exec('".$request->routingslip_no."', 1,".(isset($request->material_sts)?$request->material_sts:"0").",".(isset($request->permit_sts)?$request->permit_sts:"0").",".(isset($request->tool_sts)?$request->tool_sts:"0").",".(isset($request->jsa_sts)?$request->jsa_sts:"0").",".Session::get('site_id').",'".$user->username."');";
            DB::select($sql);
            Session::put('alert-success','Data Berhasil Approve');
        }
    }
}
