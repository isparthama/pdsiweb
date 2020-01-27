<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\User;
use App\Models\RoleUser;
use Vinkla\Hashids\Facades\Hashids;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
/**
 * Class ApiBaseController
 * @package App\Http\Controllers\Api
 * @author efriandika
 */
class PetugasManagementController extends Controller
{
    public function search(){
        $roles = Roles::select(['id'])->where('slug','=','admin')->get()->toarray();
        $roleuser = RoleUser::select(['user_id'])->whereIn('role_id', $roles)->get();
        $data_users = User::whereIn('id', $roleuser)->get();
        $data_roles = Roles::select(['level'])->where('slug','=','admin')->get(); 

        $data_users->map(function ($value, $key) {
            $userHasRole = User::find($value->id)->hasRoleName();
            $value['role_slug'] = $userHasRole->slug;
            $value['role_level'] = $userHasRole->level;
            return $value;
        });
        $data['content']="admin-user.petugas-management.index";
        $data['judul']="List User Management";
        $data['listdata']=$data_users;
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('produksi','');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('inspeksitest','');
        Session::put('petugas','class="current" ');
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
        //return view('admin-user.petugas-management.index',['listdata'=>$data_users]);
    }

    public function add(){
        $select_roles = Roles::where('slug','=','admin')->get();
        foreach ($select_roles as $value) {
            $listRoles[] = $value;
        }
        $sql="select * from m_user_jabatan";
        $data['listjabatan']=DB::select($sql);
        $sql="select * from m_site";
        $data['listsite']=DB::select($sql);
        
        
        $data['select_roles'] = $listRoles;

        $active[] = (object)["id"=>0,"desc"=>"Tidak Aktif"];
        $active[] = (object)["id"=>1,"desc"=>"Aktif"];
        $data['select_active'] = $active;
        $data['row']= '';
        $data['content']="admin-user.petugas-management.formtambahpetugas";
        $data['judul']="Form User Management";
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('produksi','');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('inspeksitest','');
        Session::put('petugas','class="current" ');
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

    public function registrasi(Request $request){
        $credentials = $request->only('username', 'fullname', 'email', 'password', 'jabatanid', 'siteid');
        $validator = Validator::make($credentials, [
            'username' => 'required|string|max:6|unique:users',
            'email' => 'required|string|email|max:100|unique:users',
            'fullname' => 'required|string|max:100',
        ]);

        if($validator->fails()) {
            return redirect('admin-user/petugas-management')->with('alert-error','Registrasi Petugas Gagal! Data Telah Tersedia');
        }
        $data = new User();
        $data->username	= $request->input('username');
        $data->fullname	= $request->input('fullname');
        $data->email	= $request->input('email');
        if($request->input('password')!=''){
            $data->password	= bcrypt($request->input('password'));
        }
        
        $data->jabatan_id= $request->input('jabatanid');
        //$data->site_id	= $request->input('siteid');
        $data->active	= 1;
        $data->confirmed = 1;
        $data->unit_id = 1;
        $data->save();
        if( $data ){
            foreach($request->input('siteid') as $x=>$y){
                $sql="insert into user_site (username,site_id)values('".$request->input('username')."',".$y.");";
                DB::select($sql);
            }
            $role_user = RoleUser::create([
                'user_id' => $data->id,
                'role_id' => $request->input('id_role')
            ]); 
            if(!$role_user){
                return redirect('admin-user/petugas-management')->with('alert-error','Registrasi Petugas Gagal!');
            }
        } else {
            return redirect('admin-user/petugas-management')->with('alert-error','Registrasi Petugas Gagal!');
        }
        
        return redirect('admin-user/petugas-management')->with('alert-success','Berhasil Registrasi Petugas!');
    }
    

    public function store(Request $request){
        $data = new User();
        $data->name	= $request->input('name');
        $data->slug	= $request->input('slug');
        $data->level = $request->input('level');
        $data->description = $request->input('description');
        $data->jabatan_id = $request->input('jabatanid');
        $data->site_id = $request->input('siteid');
        $data->password = '123';
        
        
        
        $data->save();
        return redirect('admin-user/petugas-management')->with('alert-success','Berhasil Menambahkan Data!');
    }

    public function update(Request $request){
        $currentuser = Auth::user();
        $currentAccess = $currentuser->hasRoleName();
        $data = User::find($request->input('id'));
        if($data){
            if($currentAccess == 'superadmin' || $currentAccess == 'kepala_dinas'){
                $data->email	= $request->input('email');
                $data->username	= $request->input('username');
            }
            if($request->input('password')!=''){
                $data->password	= bcrypt($request->input('password'));
            }
            $data->fullname	= $request->input('fullname');
            $data->active = $request->input('active');
            $data->jabatan_id = $request->input('jabatanid');
            //$data->site_id = $request->input('siteid');
            $role = RoleUser::where('user_id','=',$request->input('id'))->first();
            $role->role_id = $request->input('id_role');
            
            $message = 'Terjadi Kesalahan!';
            $alert = 'alert-error';

            if($role->save()){
                if($data->save()){
                    $sql="delete from user_site where username='".$request->input('username')."'";
                    DB::select($sql);
                    foreach($request->input('siteid') as $x=>$y){
                        $sql="insert into user_site (username,site_id)values('".$request->input('username')."','".$y."');";
                        DB::select($sql);
                    }
                    $message = 'Berhasil Memperbarui Data!';
                    $alert = 'alert-success';
                }
            }
        } else{
            $message = 'Gagal Memperbarui Data!';
            $alert = 'alert-error';
        }

        return redirect('admin-user/petugas-management')->with($alert,$message);
    }
    function getusersite($user,$siteid){
        $sql="select count(*)jumlah from user_site where username='".$user."' and site_id=".$siteid;
        return $num=collect(DB::select($sql))->first()->jumlah;
    }
    public function edit($id = null){
        $idNew = Hashids::decode($id);
        $sql="select * from m_user_jabatan";
        $data['listjabatan']=DB::select($sql);
        $sql="select * from m_site";
        $data['listsite']=DB::select($sql);
        $users = User::select(['id','fullname','email','username','active','jabatan_id','site_id'])->where('id', $idNew[0])->get();
        $users->map(function ($value, $key) {
            $role_user = RoleUser::where('user_id','=',$value->id)->first();
            $role = $role_user->getRoles()->first();
            $value['role_id'] = $role->level;
            return $value;
        });
        Session::put('serahterima','');
        Session::put('home','');
        Session::put('inspeksi','');
        Session::put('routing','');
        Session::put('produksi','');
        Session::put('procurement','');
        Session::put('realisasi','');
        Session::put('inspeksitest','');
        Session::put('petugas','class="current" ');
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
        $data['users'] = $users;
        $select_roles = Roles::where('slug','=','admin')->get();
        foreach ($select_roles as $value) {
            $listRoles[] = $value;
        }
        $data['select_roles'] = $listRoles;

        $data['judul']='Edit Petugas';
        foreach ($users as $value) {
            $dataUser = $value;
        }
        
        $active[] = (object)["id"=>0,"desc"=>"Tidak Aktif"];
        $active[] = (object)["id"=>1,"desc"=>"Aktif"];
        $data['select_active'] = $active;
        $data['row']= $dataUser;
        $data['content']="admin-user.petugas-management.formtambahpetugas";
        $data['judul']="Form User Management";
        return view('admin-user.templatepdsi',$data);
    }


    public function assignrole(Request $request){
        

        // $data->map(function ($value, $key) {
        //     $pendaftar = Pendaftaran::where(['id_kelas'=>$value->id])->get();
        //     $value['sisakuota'] = $value->max_kuota - count($pendaftar);
        //     return $value;
        // });

        return view('admin-user.petugas-management.index',['listdata'=>$data]);
    }
}