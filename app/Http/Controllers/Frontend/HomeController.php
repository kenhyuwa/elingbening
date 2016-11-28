<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tiket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use PDF;

class HomeController extends Controller
{
    public function index()
    {
    	$active = 'home';
    	return view('frontend.index', compact('active'));
    }

    public function tiket()
    {
    	$active = 'tiket';
    	$datakode = Tiket::max('no_tiket');
		    if($datakode){
		        $nilaikode = substr($datakode, 1);
		        // menjadikan $nilaikode ( int )
		        $kode = (int) $nilaikode;
		        // setiap $kode di tambah 1
		        // $kode = 1;
		        $kode = $kode + 1;
		        // hasil untuk menambahkan kode 
		        // angka 5 untuk menambahkan tiga angka setelah C dan angka 0 angka yang berada di tengah
		        // atau angka sebelum $kode
		        $newKode = "T".str_pad($kode, 4, "0", STR_PAD_LEFT);
		        } else {
		            // $kode= 1;
		        $newKode = 'T0001';
		    }
    	return view('frontend.tiket', compact('newKode','active'));
    }

    public function store(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();

            $validate = Validator::make($data, [
                    'nama'     => 'required',
                    'alamat'   => 'required',
                    'jumlah'      => 'required',
                    'tanggal'      => 'required',
                    'phone'   => 'required',
                    'price'    => 'required',
                    'total_cost'    => 'required'
                ],
                $message = [
                    'nama'     => 'Silakan masukan Nama Anda tidak boleh kosong.',
                    'alamat'   => 'Silakan masukan Alamat Anda tidak boleh kosong.',
                    'jumlah'      => 'Silakan masukan Jumlah pemesanan Tiket Anda.',
                    'tanggal'      => 'Silakan masukan Tanggal pemesanan Tiket Anda.',
                    'phone'   => 'Silakan masukan Nomor Telepon Anda.'
                ]);

            if($validate->fails()) {
                return response()->json(['success' => 'false']);
            }
            // set kode
            $datakode = Tiket::max('no_tiket');
            if($datakode){
                $nilaikode = substr($datakode, 1);
                // menjadikan $nilaikode ( int )
                $kode = (int) $nilaikode;
                // setiap $kode di tambah 1
                // $kode = 1;
                $kode = $kode + 1;
                // hasil untuk menambahkan kode 
                // angka 5 untuk menambahkan tiga angka setelah C dan angka 0 angka yang berada di tengah
                // atau angka sebelum $kode
                $newKode = "T".str_pad($kode, 4, "0", STR_PAD_LEFT);
                } else {
                    // $kode= 1;
                $newKode = 'T0001';
            }
            // set tanggal
                $tanggal = $request->Input('tanggal');
                $tgl     = date("d", strtotime($tanggal));
                $bulan   = date("m", strtotime($tanggal));
                $tahun   = date("Y", strtotime($tanggal));
                $dob     = $tahun.'-'.$bulan.'-'.$tgl;
                $validTgl = date("d", strtotime(\Carbon\Carbon::now('Asia/Jakarta')));
                $validBln = date("m", strtotime(\Carbon\Carbon::now('Asia/Jakarta')));
                $validThn = date("Y", strtotime(\Carbon\Carbon::now('Asia/Jakarta')));

            if($tgl < $validTgl && $bulan == $validBln && $tahun == $validThn) {
                return response()->json(['success' => 'false']);
            }
                $tiket = new Tiket;
            $tiket->no_tiket   = $newKode;
            $tiket->nama       = $request['nama'];
            $tiket->alamat     = $request['alamat'];
            $tiket->tanggal    = $dob;
            $tiket->tahun      = $tahun;
            $tiket->phone      = $request['phone'];
            $tiket->jumlah     = $request['jumlah'];
            $tiket->price      = $request['price'];
            $tiket->total_cost = $request['total_cost'];

            $tiket->save();

            return response()->json(['success' => 'true', 'id' => $newKode]);
        }
    }

    public function spot()
    {
    	$active = 'spot';
    	return view('frontend.spot', compact('active'));
    }

    public function service()
    {
    	$active = 'service';
    	return view('frontend.service', compact('active'));
    }

    public function testimoni()
    {
        $active = 'testimoni';

        $testimoni = \App\Models\Message::where('status', '1')->paginate(10);

        return view('frontend.testimoni', compact('active','testimoni'));
    }

    public function pdf($id)
    {
        $getTiket = \App\Models\Tiket::where('no_tiket',$id)->first();

        $dompdf = PDF::loadView('frontend.tiket_pdf', compact('getTiket'));

        $dompdf->setPaper('B6', 'landscape'); // ukuran kertas optional
        // pilih salah satu
        // return $dompdf->stream('tiket-'.$id.'.pdf'); // preview sebelum download

        return $dompdf->download('tiket-'.$id.'.pdf'); // langsung download tanpa preview
    }
}
