<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Mail\EmailNotif;

class NotifikasiEmail extends Controller
{
    public function index(){
        $sql="select * from trx_outbox where send_status=0";
        $data['listdata']=DB::select($sql);
        $data['content']="list_form_email";
        $data['judul']="List Email";
        //Session::put('alert-success','');
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
        Session::put('mail','class="current"');
        Session::put('tools','');
        
        return view('admin-user.templatepdsi',$data);
        
    }

    public function sendEmail($id)
    {
        try{
            //$reqTicket = new TicketingRequestController();
            //$request_list_ = $reqTicket->view_data2($id);
            $sql="select * from trx_outbox where id=".$id;
            $hsl=collect(DB::select($sql))->first();
            $hsl2['to']=$hsl->emailto;
            Mail::send('emailku',
            [
                "isi_permintaan"=>$hsl->isi_permintaan,
                "format_permintaan"=>$hsl->format_permintaan
                    
            ],
            function ($pesan) use ($hsl2)
            {
                $pesan->subject('Notifikasi Email ');
                $pesan->from('do-not-reply@tes', 'DIGITAL WORKSHOP');
                $pesan->to($hsl2['to']);
            });
            $sql="update trx_outbox set send_status=1,send_date=now() where id=".$id;
            $hsl=DB::select($sql);
            return back()->with('alert-success','Berhasil Kirim Email');
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }
}
