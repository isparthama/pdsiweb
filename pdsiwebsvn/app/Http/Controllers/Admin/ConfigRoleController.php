<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\User;
use App\Models\RoleUser;
use Vinkla\Hashids\Facades\Hashids;

/**
 * Class ApiBaseController
 * @package App\Http\Controllers\Api
 * @author efriandika
 */
class ConfigRoleController extends Controller
{
    public function search(){
        $roles = Roles::all();

        return view('admin-user.config.index',['listdata'=>$roles]);
    }

    public function tambah(){

        $data['judul']='Tambah Data Role';
        $data['row']='';
        
        return view('admin-user.config.formtambahrole',$data);
    }

    public function edit($id = null){
        $idNew = Hashids::decode($id);

        $data['judul']='Tambah Data Role';
        $data['row']= Roles::find($idNew[0]);
        
        return view('admin-user.config.formtambahrole',$data);
    }

    public function storerole(Request $request){
        $data = new Roles();
        $data->name	= $request->input('name');
        $data->slug	= $request->input('slug');
        $data->level = $request->input('level');
        $data->description = $request->input('description');
        
        $data->save();
        return redirect()->route('role.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    public function updaterole(Request $request){
        $data = Roles::find($request->input('id'));
        if($data){
            $data->name	= $request->input('name');
            $data->slug	= $request->input('slug');
            $data->level = $request->input('level');
            $data->description = $request->input('description');
            $data->save();
            $message = 'Berhasil Memperbarui Data!';
            $alert = 'alert-success';
        } else{
            $message = 'Gagal Memperbarui Data!';
            $alert = 'alert-error';
        }

        return redirect()->route('role.index')->with($alert,$message);
    }

    public function delete(Request $request){

        $data = Roles::destroy($request->input('id'));
        
        // if ($data) {
            $message = 'Berhasil Menghapus Data!';
            $alert = 'alert-success';
        // } else{
        //     $message = 'Gagal Menghapus Data!';
        //     $alert = 'alert-error';
        // }
        
        // return redirect()->route('role.index')->with($alert,$message);
        return response()->json($alert);
    }
    
}