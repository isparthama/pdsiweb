<?php

namespace App\Http\Controllers;

use App\ModelUseradmin;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class Useradmin extends Controller
{
    function ceklogin(Request $request){
        $listlogin=DB::select("SELECT * FROM useradmin where username='".$request->input('username')."' and password='".$request->input('password')."'");
        $data = ModelUseradmin::where('username',$request->input('username'))->first();
        
        if(count($listlogin)==0){
            return redirect('/disnakerdki');
        }else{
            Session::put('nama',$data->username);
            Session::put('idpengguna',$data->id);            
            Session::put('email',$data->email);
            Session::put('unit_id',$data->unit_id);
            
            Session::put('login',TRUE);
            return redirect('/admin-user');
        }
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
}
