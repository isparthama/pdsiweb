<?php

namespace App\Http\Controllers\Admin;

use App\Models\Output;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Session;
use Vinkla\Hashids\Facades\Hashids;
use Auth;
use File;
use Illuminate\Support\Facades\Validator;


class OutputController extends Controller
{
    public function index(){
        $data['title'] = "Data Output";
        $data['data'] = Output::all()->toArray();
        return view('admin-user.config.output',['listdata'=> $data]);
    }
    public function edit($id){
        $data['title'] = "Form Edit Output";
        $data['output'] = Output::find($id);
        return view('admin-user.config.form-edit-output',['listdata'=> $data]);
    }

    public function create(){
        $data['title'] = "Form Add Output";
        return view('admin-user.config.form-output',['listdata'=>$data]);
    }

    public function save(Request $request){
        $user = Auth::user();
        $detail=$request->input('content');
        $name=$request->input('name');
        $slug = str_replace(" ","_",strtolower($name));
        $status = $request->input('active');

        $dom = new \DOMDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/img-output/" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $template = $dom->saveHTML();
        $tableOutput = new Output();
        $tableOutput->name = $name;
        $tableOutput->slug = $slug;
        $tableOutput->template = $template;
        $tableOutput->active = ($status == "on") ? true : false;
        $tableOutput->created_by = $user->username;
        $tableOutput->save();

        return redirect()->route('output.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    public function update(Request $request,$id){
        error_reporting(0);
        if(!$id){
            return redirect()->route('output.index');
        }
        $user = Auth::user();
        $detail=$request->input('content');
        $name=$request->input('name');
        $slug = str_replace(" ","_",strtolower($name));
        $status = $request->input('active');

        $dom = new \DOMDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            if($data != "") {
                $image_name = "/img-output/" . time() . $k . '.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $template = $dom->saveHTML();
        $tableOutput = Output::find($id);
        $tableOutput->name = $name;
        $tableOutput->slug = $slug;
        $tableOutput->template = $template;
        $tableOutput->active = ($status == "on") ? true : false;
        $tableOutput->updated_by = $user->username;
        $tableOutput->save();

        return redirect()->route('output.index')->with('alert-success','Berhasil Memperbaharui Data !');
    }

    public function deleteImage(Request $request){
        error_reporting(0);
        $link = $request->input('src');
        $user = Auth::user();
        if(isset($link)) {
            $id = $request->input('idOutput');
            $output = $request->input('template');
            $exp = explode("img-output/", $link);
            $link = public_path() . '/img-output/' . $exp[1];
            if (file_exists($link)) {
                unlink($link);
                echo "deleted";
            }
            $tableOutput = Output::find($id);
            $tableOutput->template = $output;
            $tableOutput->updated_by = $user->username;
            $tableOutput->save();
        }
    }
}

