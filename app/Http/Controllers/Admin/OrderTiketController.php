<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tiket;
use App\Models\Message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class OrderTiketController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');    
    }

    public function index()
    {
    	$active = [
    		'ul' => 'orders',
    		'li' => 'order'
    	];
        
        $table = ['msg' => '1'];

        Tiket::where('status','0')->update($table);

    	$orders = Tiket::where('status', '0')->orderBy('tanggal', 'ASC')->get();
    	return view('backend.list_order', compact('active', 'orders'));
    }

    public function notifikasi()
    {
        $table = ['msg' => '1'];

        Tiket::where('status','0')->update($table);

        return redirect()->to('/order');
    }

    public function notify()
    {
        return view('partials.notify');
    }

    public function put(Request $request, $id)
    {
    	if($request->ajax()) {

    		$lunas = ['status' => '1'];

    		Tiket::where('no_tiket', $id)->update($lunas);

    		return response()->json(['success' => 'true']);
    	}
    		return response()->json(['success' => 'false']);
    }

    public function delete(Request $request, $id)
    {
    	if($request->ajax()) {

    		Tiket::find($id)->delete();

    		return response()->json(['success' => 'true']);
    	}
    		return response()->json(['success' => 'false']);
    }

    public function listOrder()
    {
    	$active = [
    		'ul' => 'orders',
    		'li' => 'list-order'
    	];

    	$orders = Tiket::where('status', '1')->orderBy('tanggal', 'DESC')->get();
    	return view('backend.data_order', compact('active', 'orders'));
    }

    public function guest()
    {
    	$active = [
    		'ul' => 'orders',
    		'li' => 'guest'
    	];

    	$orders = Tiket::where('status', '1')->orderBy('nama', 'ASC')->get();
    	return view('backend.pelanggan', compact('active', 'orders'));
    }

    public function message()
    {
        $active = [
            'ul' => '',
            'li' => 'message'
        ];

        return view('backend.message', compact('active'));
    }

    public function listMessage()
    {
        $pesans = \App\Models\Message::all();

        return view('backend.list_msg', compact('pesans'));
    }

    public function sendMessage(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            $validasi = Validator::make($data,[
                    'username' => 'required | max: 20 | min: 3',
                    'email' => 'required | email | max:100',
                    'pesan' => 'required | max: 500'
                ]);

            if($validasi->fails()){
                return response::json(['success' => 'false']);
            }
            $table = new Message;
            $table->nama = $request->Input('username');
            $table->email = $request->Input('email');
            $table->pesan = $request->Input('pesan');
            $table->created_at = \Carbon\Carbon::now('Asia/Jakarta');
            $table->save();

            return response::json(['success' => 'true']);
        }
    }

    public function approveMsg(Request $request, $id)
    {
        if($request->ajax()) {

            $approve = ['status' => '1'];

            Message::where('id', $id)->update($approve);

            return response()->json(['success' => 'true']);
        }
            return response()->json(['success' => 'false']);
    }

    public function blockMsg(Request $request, $id)
    {
        if($request->ajax()) {

            $block = ['status' => '0'];

            Message::where('id', $id)->update($block);

            return response()->json(['success' => 'true']);
        }
            return response()->json(['success' => 'false']);
    }

    public function deleteMsg(Request $request, $id)
    {
        if($request->ajax()) {

            Message::find($id)->delete();

            return response()->json(['success' => 'true']);
        }
            return response()->json(['success' => 'false']);
    }
}
