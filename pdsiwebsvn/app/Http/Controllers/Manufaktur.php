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
use \Chumper\Zipper\Facades\Zipper;
use PDF;
class Manufaktur extends Controller
{
    public function index($id)
    {
        $sql="CALL sp_mdr_listmenu(".$id.",".Session::get('site_id').",'".Session::get('username')."')";
        $data['listdata']=DB::select($sql);
        $data['content']="admin-user.manufaktur.list_form";
        $data['judul']="List MDR";
        $data['statusnya']=$id;
        //Session::put('alert-success','');
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('review','');
        Session::put('produksi','');
        Session::put('manufacture','class="current" ');
        Session::put('procurement','');
        
        Session::put('realisasi','');
        Session::put('inspeksitest','');
        Session::put('petugas','');
        Session::put('menu','');
        Session::put('rolemenu','');
        Session::put('jabatan','');
        Session::put('pengerjaanulang','');
        
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
    function showform($id){
        $sql="call sp_mdr_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.manufaktur.form_input";
        $data['judul']="Form MDR";
        
        
        Session::put('review','');
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('produksi','');
        Session::put('manufacture','class="current" ');
        Session::put('procurement','');
        Session::put('routing','');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('inspeksitest','');
        Session::put('petugas','');
        Session::put('menu','');
        Session::put('rolemenu','');
        Session::put('jabatan','');
        Session::put('pengerjaanulang','');
        
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
        $sql="call sp_mdr_approval_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.manufaktur.form_input_approve";
        $data['judul']="Form MDR Approve";
        
        
        Session::put('review','');
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('produksi','');
        Session::put('manufacture','class="current" ');
        Session::put('procurement','');
        Session::put('routing','');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('inspeksitest','');
        Session::put('petugas','');
        Session::put('menu','');
        Session::put('rolemenu','');
        Session::put('jabatan','');
        Session::put('pengerjaanulang','');
        
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
    
    function saveapprove(Request $request){
        if($request->ajax())
        {
            $user=Auth::user();
            echo $sql="call  sp_mdr_approval_exec('".$request->routingslip_no."', ".$request->statusnya.",".$request->routingslip_status_mdr.",'".$request->keterangan_mdr."',".Session::get('site_id').",'".$user->username."');";
            DB::select($sql);
            Session::put('alert-success','Data Berhasil Approve');
        
        }
    }
    public function downloadzip($id)
    {
        $headers = ["Content-Type"=>"application/zip"];
        $fileName = $id.".zip"; // name of zip
        Zipper::make(public_path('/storage/uploads/'.$id.'.zip')) //file path for zip file
                ->add(public_path()."/storage/uploads/".$id.'/')->close(); //files to be zipped

        return response()
        ->download(public_path('/storage/uploads/'.$fileName),$fileName, $headers);
    }
    public function downloadzipdetail($id,$alamat)
    {
        if($alamat=="copy"){
            $alamat="inspeksi/".$alamat;
        }
        $headers = ["Content-Type"=>"application/zip"];
        $fileName = $id.'_'.$alamat.".zip"; // name of zip
        Zipper::make(public_path('/storage/uploads/'.$id.'_'.$alamat.'.zip')) //file path for zip file
                ->add(public_path()."/storage/uploads/".$id.'/'.$alamat.'/')->close(); //files to be zipped

        return response()
        ->download(public_path('/storage/uploads/'.$fileName),$fileName, $headers);
    }
    function printpdf($id){
        $sql="call sp_mdr_get('".$id."')";
        $data['row']=collect(DB::select($sql))->first();
        $pdf = PDF::loadview('pdf/mdr',$data);
        return $pdf->stream();
    }
}

