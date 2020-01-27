<?php

namespace App\Http\Controllers;

use App\ModelMenuFront;
use App\ModelContents;
use App\Modelserahterima;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PDF;
class Jabatan extends Controller
{
    public function index()
    {
        $sql="select * from m_user_jabatan order by id asc";
        $data['listdata']=DB::select($sql);
        $data['content']="admin-user.jabatan.list_form";
        $data['judul']="List Jabatan Menu";
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
        Session::put('jabatan','class="current"');
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
    function showrole($id){
        $sql="select * from mastermenu order by id asc";
        $data['listdata']=DB::select($sql);
        $sql="select * from m_user_jabatan where id=".$id;
        $data['jabatan']=collect(DB::select($sql))->first();
        
        $data['content']="admin-user.jabatan.form_input_role";
        $data['judul']="Form Jabatan Menu";
        
        $mn="";
        foreach ($data['listdata'] as $menu){
            $sql="select * from rolemenu where menuid=".$menu->id." and jabatanid=".$id;
            $hsl=DB::select($sql);
            $mn .=  "<input type='checkbox' ".(count($hsl)>0?"checked":"")." value='".$menu->id."' name='menunya[]'> ".$menu->namamenu."<br>";
        }
        $data['listrolemenu']=$mn;
        
        
        
        
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
        Session::put('jabatan','class="current"');
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
    function storerole(Request $request){
        if($request->ajax()){
            $sql="delete from rolemenu where jabatanid=".$request->idjabatan;
            DB::select($sql);
            foreach ($request->menunya as $x=>$y){
                $sql="insert into rolemenu (menuid,jabatanid)values(".$y.",".$request->idjabatan.")";
                DB::select($sql);
            }
        }
    }
}
