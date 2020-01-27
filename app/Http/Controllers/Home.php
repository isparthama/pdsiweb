<?php

namespace App\Http\Controllers;

use App\ModelMenuFront;
use App\ModelContents;
use App\ModelPelamar;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{
    //baru
    function index(){
        return view('front-end.pdsitemplate');
        
    }
    function showformmodal(Request $request){
        if($request->ajax())
        {
            
            return view('modals.modal_'.$request->formname);
        }
        
    }
    function adminuser(){
        $data['judul']='Dashboard';
        $sql="select * from mastermenu a"
            . " inner join mastermenu_unit b"
            . " on a.id=b.menu_id "
            . "where b.unit_id=".Session::get('unit_id');
        $data['listmenu']=DB::select($sql);
        $data['content']="admin-user.content_home";
        
        Session::put('serahterima','');
        Session::put('home','class="current" ');
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
        
        return view('admin-user.templatepdsi',$data);
    }
    function underconstruct(){
        $data['judul']='Under Construction';
        $data['content']="admin-user.under_construction";
        return view('admin-user.templatepdsi',$data);
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
    
    
}
