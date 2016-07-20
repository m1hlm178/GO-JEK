<?php

namespace App\Http\Controllers;

use ACL;
use App\Http\Requests;
use App\Http\Requests\VisitorRequest;
use App\User;
use App\master;
use App\visitor;
use Excel;
use Illuminate\Http\Request;
use Log;
use Mail;
use DNS1D;
use DNS2D;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = master::where('jenis','KTP')->get()->lists('nama','nama');
        return view('pages.public.visitor', compact('options'));
    }

    public function savevisitor(VisitorRequest $request){
        $visitor = new visitor;
        $visitor->id = ACL::GetID('visitor','id','GO-JEKVSTR');
        $visitor->name = $request->name;
        $visitor->phone =  $request->phone;
        $visitor->email = $request->email;
        $visitor->occupation = $request->occupation;
        Log::info($request);
        if($visitor->save()){
            Log::info('Masuk');
            $admin = User::find(1)->get();
            $this->email = $admin[0]->email;
            $this->name = $admin[0]->name;
            $data = ['data' => $visitor];
            Mail::send('layouts.email', $data, function ($mail)
            {
              $mail->to($this->email , $this->name);
              $mail->subject('Notification Visitor Registration ');
            });
            $request->session()->flash('success','Your Visitor Registration Has Successfully.');
            return redirect('/');
        }else{
            Log::info('ERROR');
            $request->session()->flash('error','Your Visitor Registration Has Failed \n Please Contact Our Office For Help.');
            return redirect('/');
        }
    }


    public function test(){
        $gambar = DNS2D::getBarcodePNG('16', 'QRCODE',10,10);
        return view('layouts.print',compact('gambar'));
    }

    public function UploadOK(){
        try {
            Excel::load("DATA.xlsx", function ($reader) {
                $i=1;
                foreach ($reader->toArray() as $row) {
                    master::firstOrCreate($row);
                }
                // $reader->select(array('a'))->get();
            });
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
