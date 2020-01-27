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
class Realisasi extends Controller
{
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
                $sql="select GROUP_CONCAT(concat(keterangan,'-',id)) keterangan from m_wo_personil where site_id=".Session::get('site_id')." and keterangan like '%".$request->material_name."%'";
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
                echo $hsl->tarif_jam.'~'.$hsl->satuan.'~'.$hsl->id;
            }
            if($request->jns==2){
                $sql="select * from m_wo_tools where id=".$request->id;
                $hsl= collect(DB::select($sql))->first();
                echo $hsl->tarif_jam.'~'.$hsl->satuan.'~'.$hsl->id;
            }
            if($request->jns==3){
                $sql="select * from m_wo_personil where id=".$request->id;
                $hsl= collect(DB::select($sql))->first();
                echo $hsl->tarif_jam.'~'.$hsl->satuan.'~'.$hsl->id;
            }
            if($request->jns==4){
                $sql="select * from m_wo_mesin where id=".$request->id;
                $hsl= collect(DB::select($sql))->first();
                echo $hsl->tarif_jam.'~'.$hsl->satuan.'~'.$hsl->id;
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
        $sql="CALL sp_real_production_listmenu(".$id.",".Session::get('site_id').",'".Session::get('username')."')";
        $data['listdata']=DB::select($sql);
        $data['content']="admin-user.realisasi.list_form";
        $data['judul']="List Realisasi Produksi Menu";
        $data['statusnya']=$id;
        //Session::put('alert-success','');
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('review','');
        Session::put('produksi','');
        Session::put('procurement','');
        Session::put('realisasi','class="current" ');
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
        $data['content']="admin-user.realisasi.form_input";
        $data['judul']="Form Realisasi Produksi";
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
        Session::put('produksi','');
        Session::put('procurement','');
        Session::put('realisasi','class="current"');
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
            $user=Auth::user();
	    $sql="call sp_trx_production_form_update(".$request->ids.", ".$request->serahterima_id.", ".$request->inspeksiperbaikan_id.", '".$request->form_no."', '".$request->tanggal."','".(isset($request->material_sts)?$request->material_sts:"")."','".(isset($request->permit_sts)?$request->permit_sts:"")."', '".(isset($request->tool_sts)?$request->tool_sts:"")."', '".(isset($request->jsa_sts)?$request->jsa_sts:"")."', '".(isset($request->dim_check_sts)?$request->dim_check_sts:"")."',  '".(isset($request->ndt_sts)?$request->ndt_sts:"")."',  '".(isset($request->finishing_sts)?$request->finishing_sts:"")."',  '".(isset($request->vis_check_sts)?$request->vis_check_sts:"")."', '".(isset($request->load_test_sts)?$request->load_test_sts:"")."', '".(isset($request->terima_baik_sts)?$request->terima_baik_sts:"")."', '".(isset($request->kirim_keluar_sts)?$request->kirim_keluar_sts:"")."', '".(isset($request->rework_sts)?$request->rework_sts:"")."', '".(isset($request->tidak_bisa_diperbaiki_sts)?$request->tidak_bisa_diperbaiki_sts:"")."', ".Session::get('site_id').", '".$user->username."')";
            DB::select($sql);
            
        }
    }
    function savematerial(Request $request){
        if($request->ajax()){
            $user=Auth::user();
            $sql='call `sp_trx_production_form_detail'.$request->jenis.'_real_update`('.$request->idx.', '.$request->baris_no.', '.$request->base_id.','.$request->d1.','.$request->d2.','.$request->d3.','.$request->d4.','.$request->d5.','.$request->d6.','.$request->d7.','.$request->d8.','.$request->d9.','.$request->d10.','.$request->d11.','.$request->d12.','.$request->d13.','.$request->d14.','.$request->d15.','.$request->d16.','.$request->d17.','.$request->d18.','.$request->d19.','.$request->d20.','.$request->d21.','.$request->d22.','.Session::get('site_id').', \''.$user->id.'\')';
            DB::select($sql);
            $jum=0;
            for($i=1;$i<=22;$i++){
                $nm="d".$i;
                $jum+=$request->{$nm};
            }
            
            if($request->jenis==1){
                $sql="select * from m_wo_material where id=".$request->base_id;
                $hsl= collect(DB::select($sql))->first();
                echo $jum."~".($jum*$hsl->tarif_jam);
            }
            if($request->jenis==2){
                $sql="select * from m_wo_tools where id=".$request->base_id;
                $hsl= collect(DB::select($sql))->first();
                echo $jum."~".($jum*$hsl->tarif_jam);
            }
            if($request->jenis==3){
                $sql="select * from m_wo_personil where id=".$request->base_id;
                $hsl= collect(DB::select($sql))->first();
                echo $jum."~".($jum*$hsl->tarif_jam);
            }
            if($request->jenis==4){
                $sql="select * from m_wo_mesin where id=".$request->base_id;
                $hsl= collect(DB::select($sql))->first();
                echo $jum."~".($jum*$hsl->tarif_jam);
            }
            
            //echo "ok";

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
        $sql="call sp_proses_review_pr_approval_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.realisasi.form_input_approve";
        $data['judul']="Form Realisasi Produksi Approve";
        
        
        Session::put('review','');
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('produksi','');
        Session::put('procurement','');
        Session::put('realisasi','class="current" ');
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
        return view('admin-user.templatepdsi',$data);
    }
    
    function storeapprove(Request $request)
    {
        if($request->ajax()){
            $sql="update trx_mdr set perhitungan_biaya_perbaikan_sts=1 where routingslip_no='".$request->routingslip_no."'";
            DB::select($sql);
            $user=Auth::user();
            echo $sql="call  sp_realisasi_produksi_approval_exec('".$request->routingslip_no."', 1,".$request->routingslip_status_pr.",'".$request->keterangan_pr."',".Session::get('site_id').",'".$user->username."');";
            DB::select($sql);
            Session::put('alert-success','Data Berhasil Approve');
        }
    }
    function printpdf($id){
        $sql="SELECT b.`keterangan`,a.`estimasi_jumlah`,a.`estimasi_harga`,a.`estimasi_harga_total` FROM `trx_production_form_detail4` a "
                . "INNER JOIN `m_wo_mesin` b ON a.`base_id`=b.`id` "
                . " inner join trx_production_form c on a.production_form_id=c.id"
                . " inner join trx_serahterima_form d on c.serahterima_id=d.id "
                . "WHERE d.routingslip_no='".$id."'";
        $data['listmesin']=DB::select($sql);
        $sql="SELECT b.`keterangan`,a.`estimasi_jumlah`,a.`estimasi_harga`,a.`estimasi_harga_total` FROM `trx_production_form_detail2` a "
                . "INNER JOIN `m_wo_tools` b ON a.`base_id`=b.`id` "
                . " inner join trx_production_form c on a.production_form_id=c.id"
                . " inner join trx_serahterima_form d on c.serahterima_id=d.id "
                . "WHERE d.routingslip_no='".$id."'";
        $data['listtool']=DB::select($sql);
        $sql="SELECT nama_personil keterangan,a.`estimasi_jumlah`,a.`estimasi_harga`,a.`estimasi_harga_total` FROM `trx_production_form_detail3` a "
                . " INNER JOIN `m_personil` b ON a.`base_id`=b.`id` "
                . " inner join trx_production_form c on a.production_form_id=c.id"
                . " inner join trx_serahterima_form d on c.serahterima_id=d.id "
                . "WHERE d.routingslip_no='".$id."'";
        $data['listpersonil']=DB::select($sql);
        $sql="SELECT b.`keterangan`,a.`estimasi_jumlah`,a.`estimasi_harga`,a.`estimasi_harga_total` FROM `trx_production_form_detail1` a "
                . " INNER JOIN `m_wo_material` b ON a.`base_id`=b.`id` "
                . " inner join trx_production_form c on a.production_form_id=c.id"
                . " inner join trx_serahterima_form d on c.serahterima_id=d.id "
                . "WHERE d.routingslip_no='".$id."'";
        $data['listmaterial']=DB::select($sql);
        
        
        
        $data['row']='';
        $pdf = PDF::loadview('pdf/biayaperbaikan',$data);
        return $pdf->stream();
    }
}
