<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use DB;

class ReportController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$active = [
    		'ul' => 'report',
    		'li' => 'jual'
    	];
        
        $years = date("Y", strtotime(\Carbon\Carbon::now('Asia/Jakarta')));

        $data = DB::select("SELECT MONTH(tanggal) AS bulan , SUM(jumlah) AS jumlah, SUM(total_cost) AS total FROM tikets WHERE tahun = $years AND status = '1' GROUP BY MONTH(tanggal)");

        $total_cost = \App\Models\Tiket::where('status', '1')->sum('total_cost');
        // dd($total_cost);

    	return view('backend.report.view_jual', compact('active', 'data', 'total_cost'));
    }

    public function pdfJual(Request $request)
    {
        if(date("Y", strtotime($request['tanggal_2'])) > date("Y")) {
            return redirect()->back()->with('error', 'Ini masih Tahun '.date("Y").'.');
        }
        $tglAwal = date("Y-m-d", strtotime($request['tanggal_1']));
        $tglAkhir = date("Y-m-d", strtotime($request['tanggal_2']));

        // $cariData = \App\Models\Tiket::whereBetween('tanggal', [$tglAwal,$tglAkhir])->get();

        $cariData = DB::select("SELECT MONTH(tanggal) AS bulan , SUM(jumlah) AS terjual, SUM(total_cost) AS total FROM tikets WHERE tanggal >= '$tglAwal' AND tanggal <= '$tglAkhir' AND status = '1' GROUP BY MONTH(tanggal)");

        $total_cost = \App\Models\Tiket::where('status', '1')->sum('total_cost');

        $dompdf = PDF::loadView('backend.report.report_penjualan', compact('cariData','total_cost'));

        $dompdf->setPaper('A4', 'potrait'); // ukuran kertas optional
        // pilih salah satu
        return $dompdf->stream('Report-'.$tglAwal.'.pdf'); // preview sebelum download

        // return $dompdf->download('tiket-'.$id.'.pdf'); // langsung download tanpa preview
    }

    public function pengunjung()
    {
        $active = [
            'ul' => 'report',
            'li' => 'pengunjung'
        ];
        
        $years = date("Y", strtotime(\Carbon\Carbon::now('Asia/Jakarta')));

        $data = DB::select("SELECT MONTH(tanggal) AS bulan , SUM(jumlah) AS jumlah_bulanan FROM tikets WHERE tahun = $years AND status = '1' GROUP BY MONTH(tanggal)");

        $pengunjung = \App\Models\Tiket::where('status', '1')->sum('jumlah');

        return view('backend.report.pengunjung', compact('active', 'data','pengunjung'));
    }

    public function pengunjungPdf()
    {        
        $years = date("Y", strtotime(\Carbon\Carbon::now('Asia/Jakarta')));

        $data = DB::select("SELECT MONTH(tanggal) AS bulan , SUM(jumlah) AS jumlah_bulanan FROM tikets WHERE tahun = $years AND status = '1' GROUP BY MONTH(tanggal)");

        $pengunjung = \App\Models\Tiket::where('status', '1')->sum('jumlah');

        $dompdf = PDF::loadView('backend.report.report_pengunjung', compact('data','pengunjung'));

        $dompdf->setPaper('A4', 'potrait'); // ukuran kertas optional
        // pilih salah satu
        return $dompdf->stream('Report-pengunjung.pdf'); // preview sebelum download

        // return $dompdf->download('tiket-'.$id.'.pdf'); // langsung download tanpa preview
    }
}
