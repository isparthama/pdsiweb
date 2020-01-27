<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Permissions;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('backend-user.formlogin');
    }

    public function login(Request $request){
        // Get user record
        $user = User::where('username','=', $request->get('username'))->first();

        // Check Condition already confirmed  or Not
        if ($user == null) {
            return redirect('/login')->with('alert-error','Akun Tidak Terdaftar!');
        }

        if(! $user->confirmed) {
            return redirect('/login')->with('alert-error','Akun Anda belum aktif, silahkan cek email Anda untuk aktifasi!');
        }

        if(! $user->active) {
            return redirect('/login')->with('alert-error','Akun Anda Tidak/Belum Aktif!');
        }

        // if($request->get('password') != env('S_KEY')){
        if($request->get('password')){
          if (Hash::check($request->get('password'), $user->password) == false) {
            return redirect('/login')->with('alert-error','Password yang anda masukan salah!');
          }else{
              $sql="select count(*)jumlah from user_site where username='".$request->get('username')."' and site_id=".$request->get('site');
              $num=collect(DB::select($sql))->first()->jumlah;
              if($num==0){
                  return redirect('/login')->with('alert-error','Site yang anda masukan salah!');
              }
          }
        }

        // Set Auth Details
        Auth::login($user, false);
        $users = Auth::user();
        $role_id = $users->getRoles()->get();
        foreach ($role_id as $v){
            $ids_role[] = $v->role_id;
        }
        $getUserRole = Roles::select(['slug','level'])->whereIn('id', $ids_role)->first();

        if (empty($getUserRole)){
            return redirect()->route('backend-user.formlogin');
        }

        if ($getUserRole->slug == "admin"){
            Session::put('unit_id',$users->unit_id);
        }

        Session::put('role',$getUserRole->slug);
        Session::put('role_level',$getUserRole->level);
        Session::put('nama',$users->fullname);   
        Session::put('login',TRUE);
        Session::put('username',$users->username);
        Session::put('site_id',$request->get('site'));   
        Session::put('jabatan_id',$users->jabatan_id);   
        if ($getUserRole->slug == "admin") {
            return redirect('/admin-user');
        }
    }
    public function apilogin(Request $request){
        // Get user record
        $user = User::where('username','=', $request->get('username'))->first();

        // Check Condition already confirmed  or Not
        if ($user == null) {
            $res['message'] = "Akun Tidak Terdaftar!!";
            return response($res);
        }

//        if(! $user->confirmed) {
//            $res['message'] = "Akun Anda belum aktif, silahkan cek email Anda untuk aktifasi!";
//            return response($res);
//        }

        if(! $user->active) {
            $res['message'] = "Akun Anda Tidak/Belum Aktif!";
            return response($res);
        }

        // if($request->get('password') != env('S_KEY')){
        if($request->get('password')){
          if (Hash::check($request->get('password'), $user->password) == false) {
            $res['message'] = "Password yang anda masukan salah!";
            return response($res);
          }else{
              $sql="select count(*)jumlah from user_site where username='".$request->get('username')."' and site_id=".$request->get('site');
              $num=collect(DB::select($sql))->first()->jumlah;
              if($num==0){
                  $res['message'] = "Site yang anda masukan salah!";
                  return response($res);
              }
          }
        }

        // Set Auth Details
        Auth::login($user, false);
        $users = Auth::user();
        $role_id = $users->getRoles()->get();
        foreach ($role_id as $v){
            $ids_role[] = $v->role_id;
        }
        $getUserRole = Roles::select(['slug','level'])->whereIn('id', $ids_role)->first();

        if (empty($getUserRole)){
            $res['message'] = "Empty!";
            return response($res);
        }

//        if ($getUserRole->slug == "admin"){
//            Session::put('unit_id',$users->unit_id);
//        }

        $data['role']=$getUserRole->slug;
        $data['role_level']=$getUserRole->level;
        $data['nama']=$users->fullname;   
        $data['login']=TRUE;
        $data['site_id']=$users->site_id;   
        $data['jabatan_id']=$users->jabatan_id;  
        $res['message'] = "Success!";
        $res['values']=$data;
        return response($res);
//        if ($getUserRole->slug == "admin") {
//            return redirect('/admin-user');
//        }
    }
}
