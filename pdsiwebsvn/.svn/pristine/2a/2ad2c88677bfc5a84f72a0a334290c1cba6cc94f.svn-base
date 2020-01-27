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
use PDF;
class Finishing extends Controller
{
    public function index($id)
    {
        $sql="CALL sp_finishing_listmenu(".$id.",".Session::get('site_id').",'".Session::get('username')."')";
        $data['listdata']=DB::select($sql);
        $data['content']="admin-user.finishing.list_form";
        $data['judul']="List Finishing dan Dokumentasi Menu";
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
        Session::put('manufacture','');
        Session::put('finishing','class="current" ');
        
        Session::put('petugas','');
        Session::put('menu','');
        Session::put('rolemenu','');
        Session::put('jabatan','');
        Session::put('pengerjaanulang','');
        Session::put('manufacture','');
        
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
        $sql="call sp_finishing_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.finishing.form_input";
        $data['judul']="Form finishing dan dokumentasi entry";
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('review','');
        Session::put('produksi','');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('inspeksitest','');
        Session::put('manufacture','');
        Session::put('finishing','class="current" ');
        
        Session::put('petugas','');
        Session::put('menu','');
        Session::put('rolemenu','');
        Session::put('jabatan','');
        Session::put('pengerjaanulang','');
        Session::put('manufacture','');
        
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
        $sql="call sp_finishing_approval_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.finishing.form_input_approve";
        $data['judul']="Form Finishing dan Dokumentasi Approve";
        
        
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('review','');
        Session::put('produksi','');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('inspeksitest','');
        Session::put('manufacture','');
        Session::put('finishing','class="current" ');
        
        Session::put('petugas','');
        Session::put('menu','');
        Session::put('rolemenu','');
        Session::put('jabatan','');
        Session::put('pengerjaanulang','');
        Session::put('manufacture','');
        
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
            $sql="call sp_finishing_get('".$request->routingslip_no."')";
            $row= collect(DB::select($sql))->first();
            $fileverif=$row->finishing_filename;
            if($request->file('verifikasi_filename')){
                $datenow = new Carbon(now());
                $users = Auth::user();
                $userPath = $request->routingslip_no;
                $ext_file = strtolower($request->file('verifikasi_filename')->getClientOriginalExtension());

                if($ext_file == 'png' || $ext_file == 'jpeg'){
                    $subPath = 'finishing';
                } else {
                    $subPath = 'finishing';
                }
                $fileName = $request->routingslip_no.'.'.$ext_file;
                $path = 'uploads/'.$userPath.'/'.$subPath;
                //$path = public_path($path);

                $uploadFile = $request->file('verifikasi_filename')->storeAs('public/'.$path, $fileName);
                $fileverif = '/storage/'.$path.'/'.$fileName;
            }
            $user=Auth::user();
            echo $sql="call  sp_finishing_update(".$request->serahterima_id.",'".$request->form_no."','".$fileverif."','".$request->tanggal."','".(isset($request->terima_baik_sts)?$request->terima_baik_sts:"")."','".(isset($request->kirim_keluar_sts)?$request->kirim_keluar_sts:"")."','".(isset($request->rework_sts)?$request->rework_sts:"")."','".(isset($request->tidak_bisa_diperbaiki_sts)?$request->tidak_bisa_diperbaiki_sts:"")."',".Session::get('site_id').",'".$user->username."');";
            DB::select($sql);
            $sql="update trx_mdr set berita_acara_sts='1' where routingslip_no='".$request->routingslip_no."'";
            DB::select($sql);
            Session::put('alert-success','Data Berhasil Disimpan');
        }
    }
    function storeapprove(Request $request)
    {
        if($request->ajax()){
            $user=Auth::user();
            echo $sql="call  sp_finishing_approval_exec('".$request->routingslip_no."', 1,".$request->routingslip_status_desc_lhi.",'".$request->keterangan_lhi."',".$request->routingslip_status_desc_lhp.",'".$request->keterangan_lhp."',".$request->routingslip_status_desc_fns.",'".$request->keterangan_fns."',".Session::get('site_id').",'".$user->username."');";
            DB::select($sql);
            Session::put('alert-success','Data Berhasil Approve');
        }
    }
    function printpdf($id){
        $sql="call sp_finishing_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['routingslip_no']=$id;
        $pdf = PDF::loadview('pdf/beritaacara',$data);
        //$content = $pdf->output();
        //file_put_contents('/path/to/your/file', $content);
        return $pdf->stream();
    }
}
