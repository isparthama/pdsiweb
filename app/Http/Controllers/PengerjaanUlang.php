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
class PengerjaanUlang extends Controller
{
    public function index($id)
    {
        $sql="CALL sp_kerja_ulang_listmenu(".$id.",".Session::get('site_id').",'".Session::get('username')."')";
        $data['listdata']=DB::select($sql);
        $data['content']="admin-user.pengerjaanulang.list_form";
        $data['judul']="List Pengerjaan Ulang Menu";
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
        Session::put('inspeksitest','');
        Session::put('pengerjaanulang','class="current" ');
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
        $sql="call sp_kerja_ulang_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.pengerjaanulang.form_input";
        $data['judul']="Form Pengerjaan Ulang ";
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('review','');
        Session::put('produksi','');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('inspeksitest','');
        Session::put('pengerjaanulang','class="current" ');
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
        $sql="call sp_kerja_ulang_approval_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.pengerjaanulang.form_input_approve";
        $data['judul']="Form Pengerjaan Ulang Approve";
        
        
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('review','');
        Session::put('produksi','');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('inspeksitest','');
        Session::put('pengerjaanulang','class="current" ');
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
            $user=Auth::user();
            echo $sql="call  sp_trx_test_commissioning_update(".$request->ids.",".$request->serahterima_id.",".$request->production_id.",'".$request->form_no."','".$request->tanggal."','".(isset($request->dim_check_sts)?$request->dim_check_sts:"")."','".(isset($request->ndt_sts)?$request->ndt_sts:"")."','".(isset($request->finishing_sts)?$request->finishing_sts:"")."','".(isset($request->vis_check_sts)?$request->vis_check_sts:"")."','".(isset($request->load_test_sts)?$request->load_test_sts:"")."',".Session::get('site_id').",'".$user->username."');";
            DB::select($sql);
            Session::put('alert-success','Data Berhasil Disimpan');
        }
    }
    function storeapprove(Request $request)
    {
        if($request->ajax()){
            $user=Auth::user();
            echo $sql="call  sp_kerja_ulang_approval_exec('".$request->routingslip_no."', 1,".$request->routingslip_status_desc_ku.",'".$request->keterangan_ku."',".Session::get('site_id').",'".$user->username."');";
            DB::select($sql);
            Session::put('alert-success','Data Berhasil Approve');
        }
    }
}
