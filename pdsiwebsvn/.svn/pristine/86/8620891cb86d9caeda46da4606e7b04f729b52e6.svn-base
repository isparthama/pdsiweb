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

class Routingslip extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function saverouting(Request $request){
        if($request->ajax())
        {
            $req= explode("~", $request->id);
            $sql="update m_routing_slip_status set keterangan='".$request->keterangan."' where routingslip_no='".$req[0]."' and routing_slip_id=".$req[1];
            DB::select($sql);
            echo $req[1]."~".$request->keterangan;
        }
    }
    public function index($id)
    {
        $sql="CALL sp_m_routing_slip_status_get('".$id."');";
        $data['listdata']=DB::select($sql);
        $wono="";
        $register="";
        $user="";
        foreach ($data['listdata'] as $row){
            $wono=$row->wo_no;
            $register=$row->register_no;
            $user=$row->nama_pelanggan;
            break;
        }
        $data['content']="admin-user.routingslip.list_form";
        $data['judul']="List Routing Slip";
        $data['norouting']=$id;
        $data['nomorwo']=$wono;
        $data['register']=$register;
        $data['user']=$user;
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','class="current" ');
        Session::put('review','');
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
        return view('admin-user.templatepdsi',$data);
    }
    function listrouting($id){
        $user=Auth::user();
        $sql="call sp_m_routing_slip_status_listmenu(".$id.",".Session::get('site_id').",'".$user->username."');";
        $data['listdata']=DB::select($sql);
        $data['statusnya']=$id;
        
        $data['content']="admin-user.routingslip.list_form_routing";
        $data['judul']="List Routing Slip";
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('review','');
        Session::put('routing','class="current" ');
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
        return view('admin-user.templatepdsi',$data);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public static function listmenu(Request $request){
            $response['status'] = 'SUCCESS';
            $response['code'] = 200;
            $response['data'] = DB::select(
                    'call sp_m_routing_slip_status_listmenu(
                            ?,
                            ?,
                            ?

                    )',
                    [
                            $request->input('id'),
                            $request->input('site_id'),
                            $request->input('username')
                    ]
            );

            return response()->json($response);
    }
    
    public static function get(Request $request){
            $response['status'] = 'SUCCESS';
            $response['code'] = 200;
            $response['data'] = DB::select(
                    'call sp_m_routing_slip_status_get(
                            ?
                    )',
                    [
                            $request->input('id')
                    ]
            );

            return response()->json($response);
    }
    
}
