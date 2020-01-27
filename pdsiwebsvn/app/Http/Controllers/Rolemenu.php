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
class Rolemenu extends Controller
{
    public function index()
    {
        $sql="select * from rolemenu a "
                . "inner join mastermenu b "
                . "on a.menuid=b.id "
                . "inner join m_user_jabatan c "
                . "on a.jabatanid=c.id order by a.id asc";
        $data['listdata']=DB::select($sql);
        $data['content']="admin-user.rolemenu.list_form";
        $data['judul']="List Role Menu";
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
        Session::put('rolemenu','class="current" ');
        Session::put('jabatan','');
        Session::put('pengerjaanulang','');
        
        return view('admin-user.templatepdsi',$data);
    }
}
