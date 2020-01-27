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

class Inspeksitest extends Controller
{
    
    public function detail($id)
    {
        $id=explode('~',$id);
        $sql="call sp_trx_test_commissioning_get('".$id[0]."','".$id[1]."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.inspeksitest.form_detail";
        $data['judul']="Detail Form inspeksi dan test Produksi";
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('review','');
        Session::put('produksi','');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('inspeksitest','class="current" ');
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
    public function index($id)
    {
        $sql="CALL sp_trx_test_commissioning_listmenu(".$id.",".Session::get('site_id').",'".Session::get('username')."')";
        $data['listdata']=DB::select($sql);
        $data['content']="admin-user.inspeksitest.list_form";
        $data['judul']="List Inspeksi dan Test Menu";
        $data['statusnya']=$id;
        //Session::put('alert-success','');
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('review','');
        Session::put('produksi','');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('inspeksitest','class="current" ');
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
        $id=explode('~',$id);
        $sql="call sp_trx_test_commissioning_get('".$id[0]."','".$id[1]."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.inspeksitest.form_input";
        $data['judul']="Form inspeksi dan test Produksi";
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('review','');
        Session::put('produksi','');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('inspeksitest','class="current" ');
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
    function showapprove($id){
        $sql="call sp_trx_test_commissioning_approval_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.inspeksitest.form_input_approve";
        $data['judul']="Form Inspeksi dan Test Produksi Approve";
        
        
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('review','');
        Session::put('produksi','');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('inspeksitest','class="current" ');
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
    function store(Request $request)
    {
        if($request->ajax()){
            $filedim="";
            if($request->file('dim_filename')){
                $datenow = new Carbon(now());
                $users = Auth::user();
                $userPath = $request->routingslip_no;
                $ext_file = strtolower($request->file('dim_filename')->getClientOriginalExtension());

                if($ext_file == 'png' || $ext_file == 'jpeg'){
                    $subPath = 'images';
                } else {
                    $subPath = 'files';
                }
                $fileName = $datenow->format('dmy_His').'.'.$ext_file;
                $path = 'uploads/'.$subPath.'/'.$userPath;
                //$path = public_path($path);

                $uploadFile = $request->file('dim_filename')->storeAs('public/'.$path, $fileName);
                $filedim = '/storage/'.$path.'/'.$fileName;
            }
            $filendt="";
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
            $filefinishing="";
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
            $filevis="";
            if($request->file('vis_filename')){
                $datenow = new Carbon(now());
                $users = Auth::user();
                $userPath = $request->routingslip_no;
                $ext_file = strtolower($request->file('vis_filename')->getClientOriginalExtension());

                if($ext_file == 'png' || $ext_file == 'jpeg'){
                    $subPath = 'images';
                } else {
                    $subPath = 'files';
                }
                $fileName = $datenow->format('dmy_His').'.'.$ext_file;
                $path = 'uploads/'.$subPath.'/'.$userPath;
                //$path = public_path($path);

                $uploadFile = $request->file('vis_filename')->storeAs('public/'.$path, $fileName);
                $filevis = '/storage/'.$path.'/'.$fileName;
            }
            $fileload="";
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
            echo $sql="call  sp_trx_test_commissioning_update(".$request->serahterima_id.",'".$request->form_no."','".$request->tanggal."', ".($filedim==""?"''":"'".$filedim."'").", ".($filendt==""?"''":"'".$filendt."'").", ".($filefinishing==""?"''":"'".$filefinishing."'").", ".($filevis==""?"''":"'".$filevis."'").", ".($fileload==""?"''":"'".$fileload."'")." ,'".(isset($request->dim_check_sts)?$request->dim_check_sts:"")."','".(isset($request->ndt_sts)?$request->ndt_sts:"")."','".(isset($request->finishing_sts)?$request->finishing_sts:"")."','".(isset($request->vis_check_sts)?$request->vis_check_sts:"")."','".(isset($request->load_test_sts)?$request->load_test_sts:"")."',".Session::get('site_id').",'".$user->username."');";
            DB::select($sql);
            Session::put('alert-success','Data Berhasil Disimpan');
        }
    }
    function storeapprove(Request $request)
    {
        if($request->ajax()){
            $user=Auth::user();
            echo $sql="call  sp_trx_test_commissioning_approval_exec('".$request->routingslip_no."', 1,".$request->routingslip_status_desc_ihp.",'".$request->keterangan_ihp."',".$request->routingslip_status_desc_test.",'".$request->keterangan_test."','".(isset($request->reproduction_sts)?$request->reproduction_sts:"0")."',".Session::get('site_id').",'".$user->username."');";
            DB::select($sql);
            Session::put('alert-success','Data Berhasil Approve');
        }
    }
}
