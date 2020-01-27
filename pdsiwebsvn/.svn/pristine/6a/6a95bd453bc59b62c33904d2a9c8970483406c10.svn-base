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
use App\ModelPersonil;
use App\ModelMasterpersonil;


class Masterpersonil extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $sql="select a.*,b.nama_jabatan,c.nama_site from m_personil a inner join m_user_jabatan b on a.jabatan_id=b.id inner join m_site c on a.site_id=c.id";
        $data['listdata']=DB::select($sql);
        $data['content']="admin-user.masterpersonil.list_form";
        $data['judul']="List Personil";
        
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
        Session::put('material','');
        Session::put('mesin','');
        Session::put('masterpersonil','class="current"');
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
        $data['content']="admin-user.masterpersonil.form_input";
        $data['judul']="Form Personil";
        $sql="select * from m_site";
        $data['listsite']=DB::select($sql);
        $sql="select * from m_user_jabatan";
        $data['listjabatan']=DB::select($sql);
        
        
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
        Session::put('material','');
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
            
            $sql="insert into m_personil (nama_personil,jabatan_id,site_id)"
                . " values('".$request->nama_personil."',".$request->jabatan_id.",".$request->site_id.");";
            DB::select($sql);
            $id = DB::getPdo()->lastInsertId();
            $vis=$request->file('sertifikat');
            $x=0;
            while($x<count($request->srtf)){
                $filevis="";
                if($vis[$x]){
                    $datenow = new Carbon(now());
                    $users = Auth::user();
                    $userPath = $id;
                    $ext_file = strtolower($vis[$x]->getClientOriginalExtension());

                    if($ext_file == 'png' || $ext_file == 'jpeg'){
                        $subPath = $request->nama_personil;
                    } else {
                        $subPath = $request->nama_personil;
                    }
                    $fileName = $id."-".$request->nama_personil.'_'.$datenow.'.'.$ext_file;
                    $path = 'uploads/'.$userPath.'/'.$subPath.'';
                    //$path = public_path($path);

                    $uploadFile = $vis[$x]->storeAs('public/'.$path, $fileName);
                    $filevis = '/storage/'.$path.'/'.$fileName;
                    
                    $sql="insert into m_personil_sertifikat (personil_id,sertifikat)values(".$id.",'".$filevis."');";
                    DB::select($sql);
                    $x++;
                }
            }
            
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
        $data['row']=ModelMasterpersonil::where('id',$id)->first();
        $data['content']="admin-user.masterpersonil.form_input";
        $data['judul']="Form Personil";
        $sql="select * from m_site";
        $data['listsite']=DB::select($sql);
        $sql="select * from m_user_jabatan";
        $data['listjabatan']=DB::select($sql);
        $sql="select * from m_personil_sertifikat where personil_id=".$id;
        $data['listsertifikat']=DB::select($sql);
        
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
            $sql="update m_personil set "
                    . "nama_personil='".$request->nama_personil."',"
                    . "jabatan_id=".$request->jabatan_id.","
                    . "site_id=".$request->site_id.""
                    
                    . " where id=".$request->id;
            DB::select($sql);
            $sql="delete from m_personil_sertifikat where personil_id=".$request->id;
            DB::select($sql);
            $id = $request->id;
            $vis=$request->file('sertifikat');
            $x=0;
            while($x<count($request->srtf)){
                $filevis="";
                if($vis[$x]){
                    $datenow = new Carbon(now());
                    $users = Auth::user();
                    $userPath = $id;
                    $ext_file = strtolower($vis[$x]->getClientOriginalExtension());

                    if($ext_file == 'png' || $ext_file == 'jpeg'){
                        $subPath = $request->nama_personil;
                    } else {
                        $subPath = $request->nama_personil;
                    }
                    $fileName = $id."-".$request->nama_personil.'_'.$datenow.'.'.$ext_file;
                    $path = 'uploads/'.$userPath.'/'.$subPath.'';
                    //$path = public_path($path);

                    $uploadFile = $vis[$x]->storeAs('public/'.$path, $fileName);
                    $filevis = '/storage/'.$path.'/'.$fileName;
                    
                    $sql="insert into m_personil_sertifikat (personil_id,sertifikat)values(".$id.",'".$filevis."');";
                    DB::select($sql);
                    $x++;
                }
                
            }
            
            
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
        ModelPersonil::where('id',$id)->delete();
        Session::put('alert-success','Data Berhasil Dihapus');
        return redirect('/admin-user/masterpersonil-list/');
    }
}
