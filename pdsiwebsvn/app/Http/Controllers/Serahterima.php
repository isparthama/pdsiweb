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
use Carbon\Carbon;
use DataTables;
class Serahterima extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $sql="CALL sp_trx_serahterima_form_listmenu(".$id.",".Session::get('site_id').",'".Session::get('username')."')";
        $data['listdata']=DB::select($sql);
        $data['content']="admin-user.serah_terima.list_form";
        $data['judul']="List Serah Terima";
        $data['statusnya']=$id;
        Session::put('serahterima','class="current" ');
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
        
        return view('admin-user.templatepdsi',$data);
    }
    public function review($id)
    {
        $sql="CALL sp_proses_review_listmenu(".$id.",".Session::get('site_id').",'".Session::get('username')."')";
        $data['listdata']=DB::select($sql);
        $data['content']="admin-user.proses_review.list_form";
        $data['judul']="List Proses Review";
        $data['statusnya']=$id;
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('review','class="current"');
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
        return view('admin-user.templatepdsi',$data);
    }
    function showapprovereview($id){
        $sql="call sp_proses_review_approval_get('".$id."')";
        $data['row']= collect(DB::select($sql))->first();
        $data['content']="admin-user.proses_review.form_input_approve";
        $data['judul']="Form Proses review Approve";
        $sql="call sp_trx_inspeksiperbaikan_form_get('".$id."')";
        $row= collect(DB::select($sql))->first();
        $sql="call sp_technical_review_approval_show(".$row->serahterima_form_id.",9);";
        $data['status1']=collect(DB::select($sql))->first()->routingslip_status;
        $data['ket1']=collect(DB::select($sql))->first()->keterangan;
        
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('review','class="current"');
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
    
    public function details($id)
    {
        $data['row']=Modelserahterima::where('form_no',$id)->first();
        $data['content']="admin-user.serah_terima.form_detail";
        $data['judul']="Detail Serah Terima";
        Session::put('serahterima','class="current" ');
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
        $data['content']="admin-user.serah_terima.form_input";
        $data['judul']="Form Serah Terima";
        $data['listpelanggan']=DB::select("select a.* from users a inner join user_site b on a.username=b.username where a.jabatan_id=23 and b.site_id=".Session::get('site_id'));
        
        Session::put('serahterima','class="current" ');
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
        $data['penerima']=$user->username;
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
        if($request->ajax())
        {
            $user=Auth::user();
	    //Session::get('site_id')=1;
            $sql="call sp_trx_serahterima_form_insert(0,'','".$request->wo_no."','".$request->hari."','".$request->tanggal."','".$request->pengirim."','".$request->penerima."','".$request->driver."','".$request->nopolisi."','".$request->terima_jam."','".(isset($request->wo_tandatangan_sts)?$request->wo_tandatangan_sts:"")."','".$request->wo_tandatangan_ket."','".(isset($request->wo_peralatan_sts)?$request->wo_peralatan_sts:"")."','".$request->wo_peralatan_ket."','".(isset($request->wo_instruksikerja_sts)?$request->wo_instruksikerja_sts:"")."','".$request->wo_instruksikerja_ket."','".$request->register_no."','".$request->register_desc."','".$request->nama_pelanggan."','".$request->area_pelanggan."','','".Session::get('site_id')."','".$user->username."');";
            DB::select($sql);
            Session::put('alert-success','Data Berhasil Disimpan');
            //return redirect('/admin-user/serah-terima')->with('alert-success','tes');
        }
    }
    public function openstatus(Request $request)
    {
        if($request->ajax())
        {
            $user=Auth::user();
	    //Session::get('site_id')=1;
            $sql="call sp_proses_review_update('".$request->routingslip_no."','".$user->username."','".$request->keteranganopen."');";
            DB::select($sql);
            Session::put('alert-success','Data Berhasil Open');
            
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
        $data['row']=Modelserahterima::where('form_no',$id)->first();
        $data['content']="admin-user.serah_terima.form_input";
        $data['judul']="Form Serah Terima";
        $data['listpelanggan']=DB::select("select a.* from users a inner join user_site b on a.username=b.username where a.jabatan_id=23 and b.site_id=".Session::get('site_id'));
        
        Session::put('serahterima','class="current" ');
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
        if($request->ajax())
        {
            
            $row=Modelserahterima::where('form_no',$request->form_no)->first();
            $fileverif=$row->serahterima_filename;
            if($request->file('verifikasi_filename')){
                $datenow = new Carbon(now());
                $users = Auth::user();
                $userPath = $request->routingslip_no;
                $ext_file = strtolower($request->file('verifikasi_filename')->getClientOriginalExtension());

                if($ext_file == 'png' || $ext_file == 'jpeg'){
                    $subPath = 'serahterima';
                } else {
                    $subPath = 'serahterima';
                }
                $fileName = $request->routingslip_no.'.'.$ext_file;
                $path = 'uploads/'.$userPath.'/'.$subPath;
                //$path = public_path($path);

                $uploadFile = $request->file('verifikasi_filename')->storeAs('public/'.$path, $fileName);
                $fileverif = '/storage/'.$path.'/'.$fileName;
            }
            $user=Auth::user();
	    //Session::get('site_id')=1;
            echo $sql="call sp_trx_serahterima_form_update('".$request->id."','".$request->form_no."','".$request->wo_no."','".$request->hari."','".$request->tanggal."','".$request->pengirim."','".$request->penerima."','".$request->driver."','".$request->nopolisi."','".$request->terima_jam."','".(isset($request->wo_tandatangan_sts)?$request->wo_tandatangan_sts:"")."','".$request->wo_tandatangan_ket."','".(isset($request->wo_peralatan_sts)?$request->wo_peralatan_sts:"")."','".$request->wo_peralatan_ket."','".(isset($request->wo_instruksikerja_sts)?$request->wo_instruksikerja_sts:"")."','".$request->wo_instruksikerja_ket."','".$request->register_no."','".$request->register_desc."','".$request->nama_pelanggan."','".$request->area_pelanggan."','".$request->routingslip_no."','".$fileverif."','".Session::get('site_id')."','".$user->username."');";
            DB::select($sql);
            $sql="update trx_mdr set form_serah_terima_sts='1' where routingslip_no='".$request->routingslip_no."'";
            DB::select($sql);
            Session::put('alert-success','Data Berhasil Update');
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
        Modelserahterima::where('form_no',$id)->delete();
        Session::put('alert-success','Data Berhasil Dihapus');
        return redirect('/admin-user/serah-terima-list/0');
    }
    public function approve($id)
    {
        $data['row']=Modelserahterima::where('form_no',$id)->first();
        $data['content']="admin-user.serah_terima.form_approve";
        $data['judul']="Form Approve Serah Terima";
        $sql="call sp_m_routing_slip_status_view(".$data['row']->id.",1);";
        $data['ket1']=collect(DB::select($sql))->first()->keterangan;
        $data['status1']=collect(DB::select($sql))->first()->routingslip_status;
        $sql="call sp_m_routing_slip_status_view(".$data['row']->id.",2);";
        $data['ket2']=collect(DB::select($sql))->first()->keterangan;
        $data['status2']=collect(DB::select($sql))->first()->routingslip_status;
        $sql="call sp_m_routing_slip_status_view(".$data['row']->id.",3);";
        $data['ket3']=collect(DB::select($sql))->first()->keterangan;
        $data['status3']=collect(DB::select($sql))->first()->routingslip_status;
        Session::put('serahterima','class="current" ');
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
    public function storeapprove(Request $request)
    {
        if($request->ajax())
        {
            $user=Auth::user();
	    //Session::get('site_id')=1;
            
            $ms=Modelserahterima::where('form_no',$request->form_no)->first();
            echo $sql="call sp_m_routing_slip_status_update(".$request->id.",1,".$request->appserahterima.",'".$request->appserahterimaket."',".Session::get('site_id').",'".$user->username."');";
            DB::select($sql);
            echo $sql="call sp_m_routing_slip_status_update(".$request->id.",2,".$request->approuting.",'".$request->approutingket."',".Session::get('site_id').",'".$user->username."');";
            DB::select($sql);
            echo $sql="call sp_m_routing_slip_status_update(".$request->id.",3,".$request->appregister.",'".$request->appregisterket."','".Session::get('site_id')."','".$user->username."');";
            DB::select($sql);
            
            echo $sql="call sp_form_serahterima_exec('".$request->form_no."',".$request->statusnya." ,'".$user->username."');";
            DB::select($sql);
            Session::put('alert-success','Data Berhasil Approve');
            
        }
    }
    function saveapprovereview(Request $request){
        if($request->ajax())
        {
            $user=Auth::user();
            echo $sql="call  sp_proses_review_approval_exec('".$request->routingslip_no."', ".$request->statusnya.",".$request->routingslip_status_pr.",'".$request->keterangan_pr."',".Session::get('site_id').",'".$user->username."');";
            DB::select($sql);
            Session::put('alert-success','Data Berhasil Approve');
        
        }
    }
    function printpdf($id){
        $data['row']=Modelserahterima::where('form_no',$id)->first();
        $pdf = PDF::loadview('pdf/serahterima',$data);
        return $pdf->stream();
    }
}
