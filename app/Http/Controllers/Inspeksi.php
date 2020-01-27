<?php

namespace App\Http\Controllers;

use App\ModelMenuFront;
use App\ModelContents;
use App\Modelserahterima;
use App\ModelInspeksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use \Chumper\Zipper\Facades\Zipper;
class Inspeksi extends Controller
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
                echo $hsl->tarif_jam.'~'.$hsl->satuan.'~'.$hsl->id.'~'.$hsl->kum_jam.'~'.$hsl->biaya;
            }
            if($request->jns==2){
                $sql="select * from m_wo_tools where id=".$request->id;
                $hsl= collect(DB::select($sql))->first();
                echo $hsl->tarif_jam.'~'.$hsl->satuan.'~'.$hsl->id.'~'.$hsl->kum_jam.'~'.$hsl->biaya;
            }
            if($request->jns==3){
                $sql="SELECT b.tarif_jam,b.satuan,b.keterangan,a.id,b.kum_jam,b.biaya FROM m_personil a INNER JOIN `m_wo_personil` b ON a.`jabatan_id`=b.`id` where a.id=".$request->id;
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
            if($request->jns==6){
                $sql="select * from m_user_jabatan where id=".$request->id;
                $hsl= collect(DB::select($sql))->first();
                echo $hsl->tarif_jam.'~'.$hsl->satuan.'~'.$hsl->id.'~'.$hsl->kum_jam.'~'.$hsl->biaya;
            }
        }
    }
    
    
    public function index($id)
    {
        $sql="CALL sp_trx_inspeksiperbaikan_form_listmenu(".$id.",".Session::get('site_id').",'".Session::get('username')."')";
        $data['listdata']=DB::select($sql);
        $data['content']="admin-user.inspeksi.list_form";
        $data['judul']="List Inspeksi";
        $data['statusnya']=$id;
        //Session::put('alert-success','');
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','class="current" ');
        Session::put('routing','');
        Session::put('review','');
        Session::put('produksi','');
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['row']="";
        $data['content']="admin-user.inspeksi.form_input";
        $data['judul']="Form Inspeksi";
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','class="current" ');
        Session::put('routing','');
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
        return view('admin-user.templatepdsi',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sql="call sp_trx_inspeksiperbaikan_form_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.inspeksi.form_input";
        $data['judul']="Form Inspeksi";
        $sql="call sp_trx_inspeksiperbaikan_form_detail1_get(".$data['row']->id.")";
        $data['listmaterial']=DB::select($sql);
        $sql="call sp_trx_inspeksiperbaikan_form_detail2_get(".$data['row']->id.")";
        $data['listtools']=DB::select($sql);
        $sql="call sp_trx_inspeksiperbaikan_form_detail3_get(".$data['row']->id.")";
        $data['listpersonil']=DB::select($sql);
        $sql="call sp_trx_inspeksiperbaikan_form_detail4_get(".$data['row']->id.")";
        $data['listmesin']=DB::select($sql);
        $sql="select * from trx_inspeksiperbaikan_form_image where inspeksi_id=".$data['row']->id;
        $data['listgambar']=DB::select($sql);
        Session::put('review','');
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','class="current" ');
        Session::put('routing','');
        Session::put('produksi','');
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
        $sql="call sp_trx_inspeksiperbaikan_form_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.inspeksi.form_input_detail";
        $data['judul']="Form Inspeksi";
        $sql="call sp_trx_inspeksiperbaikan_form_detail1_get(".$data['row']->id.")";
        $data['listmaterial']=DB::select($sql);
        $sql="call sp_trx_inspeksiperbaikan_form_detail2_get(".$data['row']->id.")";
        $data['listtools']=DB::select($sql);
        $sql="call sp_trx_inspeksiperbaikan_form_detail3_get(".$data['row']->id.")";
        $data['listpersonil']=DB::select($sql);
        $sql="call sp_trx_inspeksiperbaikan_form_detail4_get(".$data['row']->id.")";
        $data['listmesin']=DB::select($sql);
        $sql="select * from trx_inspeksiperbaikan_form_image where inspeksi_id=".$data['row']->id;
        $data['listgambar']=DB::select($sql);
        Session::put('review','class="current"');
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('produksi','');
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
    public function detailserahterima($id)
    {
        $sql="call sp_trx_inspeksiperbaikan_form_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.inspeksi.form_input_detailserahterima";
        $data['judul']="Form Inspeksi";
        $sql="call sp_trx_inspeksiperbaikan_form_detail1_get(".$data['row']->id.")";
        $data['listmaterial']=DB::select($sql);
        $sql="call sp_trx_inspeksiperbaikan_form_detail2_get(".$data['row']->id.")";
        $data['listtools']=DB::select($sql);
        $sql="call sp_trx_inspeksiperbaikan_form_detail3_get(".$data['row']->id.")";
        $data['listpersonil']=DB::select($sql);
        $sql="call sp_trx_inspeksiperbaikan_form_detail4_get(".$data['row']->id.")";
        $data['listmesin']=DB::select($sql);
        $sql="select * from trx_inspeksiperbaikan_form_image where inspeksi_id=".$data['row']->id;
        $data['listgambar']=DB::select($sql);
        Session::put('review','');
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','class="current"');
        Session::put('routing','');
        Session::put('produksi','');
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
    public function detailserahterima2($id)
    {
        $sql="call sp_trx_inspeksiperbaikan_form_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.proses_review.form_input_detailserahterima";
        $data['judul']="Form Inspeksi";
        $sql="call sp_trx_inspeksiperbaikan_form_detail1_get(".$data['row']->id.")";
        $data['listmaterial']=DB::select($sql);
        $sql="call sp_trx_inspeksiperbaikan_form_detail2_get(".$data['row']->id.")";
        $data['listtools']=DB::select($sql);
        $sql="call sp_trx_inspeksiperbaikan_form_detail3_get(".$data['row']->id.")";
        $data['listpersonil']=DB::select($sql);
        $sql="call sp_trx_inspeksiperbaikan_form_detail4_get(".$data['row']->id.")";
        $data['listmesin']=DB::select($sql);
        $sql="select * from trx_inspeksiperbaikan_form_image where inspeksi_id=".$data['row']->id;
        $data['listgambar']=DB::select($sql);
        Session::put('review','class="current"');
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('produksi','');
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
            $sql="call sp_trx_inspeksiperbaikan_form_get('".$request->routingslip_no."')";
            $row= collect(DB::select($sql))->first();
            $fileverif=$row->verifikasi_filename;
            if($request->file('verifikasi_filename')){
                $datenow = new Carbon(now());
                $users = Auth::user();
                $userPath = $request->routingslip_no;
                $ext_file = strtolower($request->file('verifikasi_filename')->getClientOriginalExtension());

                if($ext_file == 'png' || $ext_file == 'jpeg'){
                    $subPath = 'inspeksi';
                } else {
                    $subPath = 'inspeksi';
                }
                $fileName = $request->routingslip_no.'.'.$ext_file;
                $path = 'uploads/'.$userPath.'/'.$subPath;
                //$path = public_path($path);

                $uploadFile = $request->file('verifikasi_filename')->storeAs('public/'.$path, $fileName);
                $fileverif = '/storage/'.$path.'/'.$fileName;
            }
            $fileapi=$row->api_filename;
            if($request->file('api_filename')){
                $datenow = new Carbon(now());
                $users = Auth::user();
                $userPath = $request->routingslip_no;
                $ext_file = strtolower($request->file('api_filename')->getClientOriginalExtension());

                if($ext_file == 'png' || $ext_file == 'jpeg'){
                    $subPath = 'inspeksi/copy';
                } else {
                    $subPath = 'inspeksi/copy';
                }
                $fileName = $request->routingslip_no.'.'.$ext_file;
                $path = 'uploads/'.$userPath.'/'.$subPath.'/api';
                //$path = public_path($path);

                $uploadFile = $request->file('api_filename')->storeAs('public/'.$path, $fileName);
                $fileapi = '/storage/'.$path.'/'.$fileName;
            }
            $fileastm=$row->astm_filename;
            if($request->file('astm_filename')){
                $datenow = new Carbon(now());
                $users = Auth::user();
                $userPath = $request->routingslip_no;
                $ext_file = strtolower($request->file('astm_filename')->getClientOriginalExtension());

                if($ext_file == 'png' || $ext_file == 'jpeg'){
                    $subPath = 'inspeksi/copy';
                } else {
                    $subPath = 'inspeksi/copy';
                }
                $fileName = $request->routingslip_no.'.'.$ext_file;
                $path = 'uploads/'.$userPath.'/'.$subPath.'/astm';
                $uploadFile = $request->file('astm_filename')->storeAs('public/'.$path, $fileName);
                $fileastm = '/storage/'.$path.'/'.$fileName;
            }
            $fileaws=$row->aws_filename;
            if($request->file('aws_filename')){
                $datenow = new Carbon(now());
                $users = Auth::user();
                $userPath = $request->routingslip_no;
                $ext_file = strtolower($request->file('aws_filename')->getClientOriginalExtension());

                if($ext_file == 'png' || $ext_file == 'jpeg'){
                    $subPath = 'inspeksi/copy';
                } else {
                    $subPath = 'inspeksi/copy';
                }
                $fileName = $request->routingslip_no.'.'.$ext_file;
                $path = 'uploads/'.$userPath.'/'.$subPath.'/aws';
                //$path = public_path($path);

                $uploadFile = $request->file('aws_filename')->storeAs('public/'.$path, $fileName);
                $fileaws = '/storage/'.$path.'/'.$fileName;
            }
            $filetko=$row->tko_filename;
            if($request->file('tko_filename')){
                $datenow = new Carbon(now());
                $users = Auth::user();
                $userPath = $request->routingslip_no;
                $ext_file = strtolower($request->file('tko_filename')->getClientOriginalExtension());

                if($ext_file == 'png' || $ext_file == 'jpeg'){
                    $subPath = 'inspeksi/copy';
                } else {
                    $subPath = 'inspeksi/copy';
                }
                $fileName = $request->routingslip_no.'.'.$ext_file;
                $path = 'uploads/'.$userPath.'/'.$subPath.'/tko';
                //$path = public_path($path);

                $uploadFile = $request->file('tko_filename')->storeAs('public/'.$path, $fileName);
                $filetko = '/storage/'.$path.'/'.$fileName;
            }
            $filetki=$row->tki_filename;
            if($request->file('tki_filename')){
                $datenow = new Carbon(now());
                $users = Auth::user();
                $userPath = $request->routingslip_no;
                $ext_file = strtolower($request->file('tki_filename')->getClientOriginalExtension());

                if($ext_file == 'png' || $ext_file == 'jpeg'){
                    $subPath = 'inspeksi/copy';
                } else {
                    $subPath = 'inspeksi/copy';
                }
                $fileName = $request->routingslip_no.'.'.$ext_file;
                $path = 'uploads/'.$userPath.'/'.$subPath.'/tki';
                //$path = public_path($path);

                $uploadFile = $request->file('tki_filename')->storeAs('public/'.$path, $fileName);
                $filetki = '/storage/'.$path.'/'.$fileName;
            }
            
           
            $user=Auth::user();
	    
            $sql="call sp_trx_inspeksiperbaikan_form_update(".$request->ids.",".$request->serahterima_form_id.",'".$request->form_no."','".$request->tanggal."','".$fileverif."','','','".$fileapi."','".$fileastm."','".$fileaws."','".$filetko."','".$filetki."','".(isset($request->ref_api_sts)?$request->ref_api_sts:"")."','".$request->ref_api_ket."','".(isset($request->ref_astm_sts)?$request->ref_astm_sts:"")."','".$request->ref_astm_ket."','".(isset($request->ref_aws_sts)?$request->ref_aws_sts:"")."','".$request->ref_aws_ket."','".$request->ref_tko_sts."','".$request->ref_tko_ket."','".(isset($request->ref_tki_sts)?$request->ref_tki_sts:"")."','".$request->ref_tki_ket."','".(isset($request->ref_manualbook_sts)?$request->ref_manualbook_sts:"")."','".$request->ref_manualbook_ket."','".(isset($request->ref_lain2_sts)?$request->ref_lain2_sts:"")."','".$request->ref_lain2_ket."','".$request->rencana_perbaikan."',".str_replace(".00","",str_replace(",","",$request->estimasi_biaya)).",'".(isset($request->rip_dynotest_sts)?$request->rip_dynotest_sts:"")."','".(isset($request->rip_loadbank_sts)?$request->rip_loadbank_sts:"")."','".(isset($request->rip_mpo_sts)?$request->rip_mpo_sts:"")."','".(isset($request->rip_dyepenetrant_sts)?$request->rip_dyepenetrant_sts:"")."','".(isset($request->rip_loadtest)?$request->rip_loadtest:"")."','".(isset($request->rip_lain2_sts)?$request->rip_lain2_sts:"")."','".$request->rip_lain2_ket."','".Session::get('site_id')."','".$user->username."')";
            DB::select($sql);
            
            $vis=$request->file('vis_filename');
            $dim=$request->file('dim_filename');
            $visid=$request->visid;
            $x=0;
            while($x<count($visid)){
                $filevis="";
                if($vis[$x]){
                    $datenow = new Carbon(now());
                    $users = Auth::user();
                    $userPath = $request->routingslip_no;
                    $ext_file = strtolower($vis[$x]->getClientOriginalExtension());

                    if($ext_file == 'png' || $ext_file == 'jpeg'){
                        $subPath = 'inspeksi/copy';
                    } else {
                        $subPath = 'inspeksi/copy';
                    }
                    $fileName = $request->routingslip_no."_".date('His').rand(1,100).'.'.$ext_file;
                    $path = 'uploads/'.$userPath.'/'.$subPath.'/visual';
                    //$path = public_path($path);

                    $uploadFile = $vis[$x]->storeAs('public/'.$path, $fileName);
                    $filevis = '/storage/'.$path.'/'.$fileName;
                    
                    
                }
                $filedim="";
                if($dim[$x]){
                    $datenow = new Carbon(now());
                    $users = Auth::user();
                    $userPath = $request->routingslip_no;
                    $ext_file = strtolower($dim[$x]->getClientOriginalExtension());

                    if($ext_file == 'png' || $ext_file == 'jpeg'){
                        $subPath = 'inspeksi/copy';
                    } else {
                        $subPath = 'inspeksi/copy';
                    }
                    $fileName = $request->routingslip_no."_".date('His').rand(1,100).'.'.$ext_file;
                    $path = 'uploads/'.$userPath.'/'.$subPath.'/dimensi';
                    //$path = public_path($path);

                    $uploadFile = $dim[$x]->storeAs('public/'.$path, $fileName);
                    $filedim = '/storage/'.$path.'/'.$fileName;
                    
                    
                }
                if(!isset($request->visid[$x])){
                    $sql="update trx_inspeksiperbaikan_form_image set ".($filevis!=""?"visual='".$filevis."'":"visual=visual")." ,".($filedim!=""?"dimensi='".$filedim."'":"dimensi=dimensi")." where id=".$visid[$x];
                    DB::select($sql);
                }else{
                    $sql="insert into trx_inspeksiperbaikan_form_image (inspeksi_id,visual,dimensi)values(".$request->ids.",'".$filevis."','".$filedim."')";
                    DB::select($sql);
                }
                $x++;
                

            }
            $sql="update trx_mdr set copy_standar_sts='1' where routingslip_no='".$request->routingslip_no."'";
            DB::select($sql);
            
            //Session::put('alert-success','Data Berhasil Terupdate');
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
                        $sql="call `sp_trx_inspeksiperbaikan_form_detail".$request->jenis."_insert`(".$request->idx.", ".$request->baris_no.", ".$id.", '".$request->keterangan."-".$id."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
                        DB::select($sql);
                    }else{
                        $sql="select * from m_wo_material where keterangan='".$request->keterangan."'";
                        $rw=collect(DB::select($sql))->first();
                        $sql="update m_wo_material set keterangan='".$request->keterangan."',satuan='".$request->satuan."',kum_jam=".$request->estimasi_jumlah.",tarif_jam=".$request->estimasi_harga.",biaya=".$request->estimasi_harga_total.",product_no='".$request->keterangan_tambahan."' where id='".$rw->id."'";
                        DB::select($sql);
                        $sql="call `sp_trx_inspeksiperbaikan_form_detail".$request->jenis."_update`(".$request->idx.", ".$request->baris_no.", ".$rw->id.", '".$request->keterangan."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
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
                        $sql="call `sp_trx_inspeksiperbaikan_form_detail".$request->jenis."_insert`(".$request->idx.", ".$request->baris_no.", ".$id.", '".$request->keterangan."-".$id."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
                        DB::select($sql);
                    }else{
                        $sql="select * from m_wo_tools where keterangan='".$request->keterangan."'";
                        $rw=collect(DB::select($sql))->first();
                        $sql="update m_wo_tools set keterangan='".$request->keterangan."',satuan='".$request->satuan."',kum_jam=".$request->estimasi_jumlah.",tarif_jam=".$request->estimasi_harga.",biaya=".$request->estimasi_harga_total.",product_no='".$request->keterangan_tambahan."' where id='".$rw->id."'";
                        DB::select($sql);
                        $sql="call `sp_trx_inspeksiperbaikan_form_detail".$request->jenis."_update`(".$request->idx.", ".$request->baris_no.", ".$rw->id.", '".$request->keterangan."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
                        DB::select($sql);
                    }
		}
		if($request->jenis==4){
                    $sql="select count(*)jumlah from m_wo_mesin where product_no='".$request->keterangan_tambahan."'";
                    $jum=collect(DB::select($sql))->first()->jumlah;
                    if($jum==0){
                        $sql="insert into m_wo_mesin (keterangan,satuan,kum_jam,tarif_jam,biaya,product_no)"
                                . " values('".$request->keterangan."', '".$request->satuan."', ".$request->estimasi_jumlah.", ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".$request->keterangan_tambahan."')";
                        DB::select($sql);
                        $id = DB::getPdo()->lastInsertId();
                        $sql="call `sp_trx_inspeksiperbaikan_form_detail".$request->jenis."_insert`(".$request->idx.", ".$request->baris_no.", ".$id.", '".$request->keterangan."-".$id."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
                        DB::select($sql);
                    }else{
                        $sql="select * from m_wo_mesin where keterangan='".$request->keterangan."'";
                        $rw=collect(DB::select($sql))->first();
                        $sql="update m_wo_mesin set keterangan='".$request->keterangan."',satuan='".$request->satuan."',kum_jam=".$request->estimasi_jumlah.",tarif_jam=".$request->estimasi_harga.",biaya=".$request->estimasi_harga_total.",product_no='".$request->keterangan_tambahan."' where id='".$rw->id."'";
                        DB::select($sql);
                        $sql="call `sp_trx_inspeksiperbaikan_form_detail".$request->jenis."_update`(".$request->idx.", ".$request->baris_no.", ".$rw->id.", '".$request->keterangan."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
                        DB::select($sql);
                    }
                }
            }else{
                echo $sql="select count(*)jumlah from trx_inspeksiperbaikan_form_detail".$request->jenis." where inspeksiperbaikan_form_id=".$request->idx." and base_id=".$request->base_id;
                if(collect(DB::select($sql))->first()->jumlah>0){
                    $sql="call `sp_trx_inspeksiperbaikan_form_detail".$request->jenis."_update`(".$request->idx.", ".$request->baris_no.", ".$request->base_id.", '".$request->keterangan."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
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
                    echo $sql="call `sp_trx_inspeksiperbaikan_form_detail".$request->jenis."_insert`(".$request->idx.", ".$request->baris_no.", ".$request->base_id.", '".$request->keterangan."', '".$request->keterangan_tambahan."', ".$request->estimasi_jumlah.", '".$request->satuan."', ".$request->estimasi_harga.", ".$request->estimasi_harga_total.", '".Session::get('site_id')."', ".$user->id.")";
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
    function deletematerial(Request $request){
        if($request->ajax()){
            $sql="delete from trx_inspeksiperbaikan_form_detail".$request->jenis." where inspeksiperbaikan_form_id=".$request->idx." and base_id=".$request->base_id;
            DB::select($sql);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $sql="call sp_trx_inspeksiperbaikan_form_get('".$id."')";
        $row= collect(DB::select($sql))->first();
        ModelInspeksi::where('id',$row->id)->delete();
        Session::put('alert-success','Data Berhasil Terhapus');
        return redirect('/admin-user/inspeksi-list/0');
    }
    
    function showapprove($id){
        $sql="call sp_trx_inspeksiperbaikan_form_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.inspeksi.form_input_approve";
        $data['judul']="Form Inspeksi Approve";
        
        $sql="call sp_technical_review_approval_show(".$data['row']->serahterima_form_id.",4);";
        $data['status1']=collect(DB::select($sql))->first()->routingslip_status;
        $data['ket1']=collect(DB::select($sql))->first()->keterangan;
        $sql="call sp_technical_review_approval_show(".$data['row']->serahterima_form_id.",5);";
        $data['status2']=collect(DB::select($sql))->first()->routingslip_status;
        $data['ket2']=collect(DB::select($sql))->first()->keterangan;
        $sql="call sp_technical_review_approval_show(".$data['row']->serahterima_form_id.",6);";
        $data['status3']=collect(DB::select($sql))->first()->routingslip_status;
        $data['ket3']=collect(DB::select($sql))->first()->keterangan;
        $sql="call sp_technical_review_approval_show(".$data['row']->serahterima_form_id.",7);";
        $data['status4']=collect(DB::select($sql))->first()->routingslip_status;
        $data['ket4']=collect(DB::select($sql))->first()->keterangan;
        
        Session::put('produksi','');
        Session::put('review','');
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','class="current" ');
        Session::put('routing','');
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
    
    public function storeapprove(Request $request)
    {
        if($request->ajax()){
            $user=Auth::user();
            echo $sql="call  sp_technical_review_approval_exec('".$request->routingslip_no."', ".$request->statusnya.",".$request->routingslip_status_tr.",'".$request->keterangan_tr."',".$request->routingslip_status_li.",'".$request->keterangan_li."',".$request->routingslip_status_lrp.",'".$request->keterangan_lrp."',".$request->routingslip_status_ldkm.",'".$request->keterangan_lkdm."',".Session::get('site_id').",'".$user->username."',".$request->serahterima_form_id.");";
            DB::select($sql);
            Session::put('alert-success','Data Berhasil Approve');
        }
    }
    public function downloadZip($id)
    {
        $headers = ["Content-Type"=>"application/zip"];
        $fileName = $id.".zip"; // name of zip
        Zipper::make(public_path('/documents/'.$id.'.zip')) //file path for zip file
                ->add(public_path()."/documents/".$id.'/')->close(); //files to be zipped

        return response()
        ->download(public_path('/documents/'.$fileName),$fileName, $headers);
    }
    
    public static function listmenu(Request $request){
            $response['status'] = 'SUCCESS';
            $response['code'] = 200;
            $response['data'] = DB::select(
                    'call sp_trx_inspeksiperbaikan_form_listmenu(
                            ?,
                            ?,
                            ?

                    )',
                    [
                            $request->input('id'),
                            $request->input('site_id'),
                            $request->input('username')
                    ]
            );

            return response()->json($response);
    }
    
    public static function get(Request $request){
            $response['status'] = 'SUCCESS';
            $response['code'] = 200;
            $response['data'] = DB::select(
                    'call sp_trx_inspeksiperbaikan_form_get(
                            ?
                    )',
                    [
                            $request->input('id')
                    ]
            );

            return response()->json($response);
    }
    public function setuploadvisual(Request $request){
        if($request->file('visual')){
                $datenow = new Carbon(now());
                $users = Auth::user();
                $userPath = $request->routingslip_no;
                $ext_file = strtolower($request->file('visual')->getClientOriginalExtension());

                if($ext_file == 'png' || $ext_file == 'jpeg'){
                    $subPath = 'inspeksi/copy';
                } else {
                    $subPath = 'inspeksi/copy';
                }
                $fileName = $request->routingslip_no.'.'.$ext_file;
                $path = 'uploads/'.$userPath.'/'.$subPath.'/tko';
                //$path = public_path($path);

                $uploadFile = $request->file('visual')->storeAs('public/'.$path, $fileName);
                $filetko = '/storage/'.$path.'/'.$fileName;
        }
        $response['status'] = 'SUCCESS';
        $response['code'] = 200;
        return response()->json($response);
    }
    public function setuploaddimensi(Request $request){
        if($request->file('dimensi')){
                $datenow = new Carbon(now());
                $users = Auth::user();
                $userPath = $request->routingslip_no;
                $ext_file = strtolower($request->file('dimensi')->getClientOriginalExtension());

                if($ext_file == 'png' || $ext_file == 'jpeg'){
                    $subPath = 'inspeksi/copy';
                } else {
                    $subPath = 'inspeksi/copy';
                }
                $fileName = $request->routingslip_no.'.'.$ext_file;
                $path = 'uploads/'.$userPath.'/'.$subPath.'/tko';
                //$path = public_path($path);

                $uploadFile = $request->file('dimensi')->storeAs('public/'.$path, $fileName);
                $filetko = '/storage/'.$path.'/'.$fileName;
        }
        $response['status'] = 'SUCCESS';
        $response['code'] = 200;
        return response()->json($response);
    }
    
}
