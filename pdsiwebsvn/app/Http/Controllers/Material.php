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
use App\ModelMaterial;

class Material extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql="select * from m_wo_material";
        $data['listdata']=DB::select($sql);
        $data['content']="admin-user.material.list_form";
        $data['judul']="List Material";
        
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
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
        Session::put('material','class="current"');
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
        $data['content']="admin-user.material.form_input";
        $data['judul']="Form Material";
        
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
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
        Session::put('material','class="current"');
        Session::put('mesin','');
        Session::put('masterpersonil','');
        Session::put('mail','');
        Session::put('tools','');
        $user=Auth::user();
        return view('admin-user.templatepdsi',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            $sql="insert into m_wo_material (keterangan,satuan,kum_jam,tarif_jam,biaya,product_no)"
                . " values('".$request->keterangan."','".$request->satuan."','".$request->kum_jam."','".$request->tarif_jam."','".$request->biaya."','".$request->product_no."');";
            DB::select($sql);
            Session::put('alert-success','Data Berhasil Disimpan');
        }
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
        $data['row']=ModelMaterial::where('id',$id)->first();
        $data['content']="admin-user.material.form_input";
        $data['judul']="Form Site";
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('review','');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('produksi','');
        Session::put('inspeksitest','');
        Session::put('petugas','');
        Session::put('menu','');
        Session::put('rolemenu','');
        Session::put('jabatan','');
        Session::put('pengerjaanulang','');
        Session::put('manufacture','');
        Session::put('finishing','');
        Session::put('site','');
        Session::put('material','class="current"');
        Session::put('mesin','');
        Session::put('masterpersonil','');
        Session::put('mail','');
        Session::put('tools','');
        Session::put('serahterimakeluar','');
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
            $sql="update m_wo_material set "
                    . "keterangan='".$request->keterangan."',"
                    . "satuan='".$request->satuan."',"
                    . "kum_jam=".$request->kum_jam.","
                    . "tarif_jam=".$request->tarif_jam.","
                    . "biaya=".$request->biaya.","
                    . "product_no=".$request->product_no.""
                    
                
                    . " where id=".$request->id;
            DB::select($sql);
            Session::put('alert-success','Data Berhasil Diupdate');
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
        ModelMaterial::where('id',$id)->delete();
        Session::put('alert-success','Data Berhasil Dihapus');
        return redirect('/admin-user/material-list/');
    }
}
