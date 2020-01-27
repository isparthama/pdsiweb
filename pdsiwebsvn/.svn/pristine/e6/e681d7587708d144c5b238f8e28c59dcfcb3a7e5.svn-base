<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\RoleUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Mail;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->confirmation_code = str_random(30);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:16|unique:users',
            'email' => 'required|string|email|max:100|unique:users'
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('front-end.home.form_registrasi');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['user_type'] == 1){
            $status = 0;
        }elseif($data['user_type'] == 2){
            $status = 1;
        }
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            // 'password' => Hash::make($data['password']),
            'password' => bcrypt($data['password']),
            'confirmation_code' => $this->confirmation_code,
            'flag_perusahaan' => $status,
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $credentials = $request->only('username', 'email', 'password');
        
        // check user if exist
        $username_exist = User::where('username', '=', $request->input('username'))->first();
        $email_exist = User::where('email', '=', $request->input('email'))->first();
        
        if($username_exist){
            return redirect('/registrasi-user')->with('alert-error','Registrasi Gagal! NIK / NPWP Sudah Terdaftar!');
        }
        
        if($email_exist){
            return redirect('/registrasi-user')->with('alert-error','Registrasi Gagal! Email Sudah Terdaftar!');
        }
        
        $validator = $this->validator($credentials);
        if($validator->fails()) {
            return redirect('/registrasi-user')->with('alert-error','Registrasi Gagal! Akun Sudah Terdaftar!');
        }
        
        if( $users = $this->create($request->all()) ){
            
            $role_user = RoleUser::create([
                'user_id' => $users->id,
                'role_id' => $request->input('user_type')
            ]); 
            if($role_user){

                $mailSend = env('ALLOW_SEND_EMAIL', false);

                if($mailSend){
                    Mail::send('email.register', ['code'=>$this->confirmation_code, 'email' => $request->email], function($message) use($request){

                        $message->to($request->email);
                        $message->subject('Verifikasi Email');
                    });
                }
            }

        } else {
            return redirect('/registrasi-user')->with('alert-error','Registrasi Gagal! Terjadi Kesalahan.');
        }

        // $this->guard()->login($user);

        return redirect('/registrasi-user')->with('alert-success','Registrasi Berhasil! Confirmation code telah dikirim ke email anda.');
    }
}
