<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\VisitorRequest;
use App\User;
use App\master;
use App\visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;
use Validator;
use Yajra\Datatables\Datatables;
use DNS2D;

class AdminController extends Controller
{
	public $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    public $bulan = array("","Januari","Febuari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	public function index(){
        $options = master::where('jenis','KTP')->get()->lists('nama','nama');
        $header['first'] = 'Home';
        $header['second'] = 'Home';
        $header['third'] = 'Home';
		return view('pages.admin.admin', compact('options','header'));
	}

    public function profile(){
        $header['first'] = 'Profile';
        $header['second'] = 'Profile';
        $header['third'] = 'Profile';
        $email = Auth::user()->email;
        return view('pages.admin.profile', compact('header','email'));
    }

    public function changeprofile(Request $request){
        $rules = array(
          'email'=> 'required',
         );
        $messages = [
            'required' => ':attribute must fill.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return Response::json($validator);
        }else{
            if(User::find(Auth::user()->id)->update(['email' => $request->email])){
                $request->session()->flash('success', "Email has changes.");
                return redirect()->route('Profile');
            }
        }
    }

    public function destroy($id){
        return Response::json(visitor::destroy($id));
    }


    public function view($id){
        return Response::json(visitor::find($id));
    }

    public function update(VisitorRequest $request, $id){
        $data = visitor::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->occupation = $request->occupation;
        $data->updated_at = Carbon::now()->toDateTimeString();
        $data->save();
        return Response::json($data);
    }

    public function printtag($id){
        $data = visitor::find($id);
        $data->barcode = DNS2D::getBarcodePNG($data->id, 'QRCODE',10,10);
        return view('layouts.print',compact('data'));
    }

    /**
     * Table Admin Praktikum
     * @param Request $request [description]
     */
	public function TableVisitor(Request $request){
         DB::statement(DB::raw('set @rownum=0'));
            $table = visitor::select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'id',
                'name',
                'email',
                'phone',
                'occupation']);
            $datatables = Datatables::of($table);

            if ($keyword = $request->get('search')['value']) {
                $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
            }
            return $datatables->addColumn('action', function ($table) {
            return '<a href="'.url('/visitor/print/'.$table->id).'" target="_blank" class="btn btn-primary btn-sm download" role="button"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a> <button class="btn btn-warning btn-sm open-modal" value="'.$table->id.'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button> <button class="btn btn-danger btn-sm delete-data" value="'.$table->id.'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
            })
            ->make(true);
    }
}
