<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$active = [
    		'ul' => 'home',
    		'li' => 'home'
    	];
        
        $years = date("Y", strtotime(\Carbon\Carbon::now('Asia/Jakarta')));

        $grafiks = DB::select("SELECT MONTH(tanggal) AS bulan , SUM(jumlah) AS jumlah_bulanan, SUM(total_cost) AS pendapatan FROM tikets WHERE tahun = $years AND status = '1' GROUP BY MONTH(tanggal)");

        $terjuals = DB::select("SELECT MONTH(tanggal) AS bulan , SUM(total_cost) AS pendapatan FROM tikets WHERE tahun = $years AND status = '1' GROUP BY MONTH(tanggal)");

        $pendapatan = \App\Models\Tiket::where('status', '1')->sum('total_cost');
        
        $tiket = \App\Models\Tiket::where('status', '1')->sum('jumlah');
        // dd($pendapatan);
    	return view('backend.index', compact('active','grafiks','terjuals','pendapatan','tiket'));
    }

    public function load(Request $request)
    {
        if(auth()->check())
        {
            $now = \Carbon\Carbon::now('Asia/Jakarta');
            $date_expired = date('Y-m-d',strtotime($now));
            $hours_expired = date('H',strtotime($now));
            $minutes_expired = date('i',strtotime($now));
            if ($minutes_expired == 60) {
                $minutes_expired = $minutes_expired - 5;
            } else if ($minutes_expired == 59) {
                $minutes_expired = $minutes_expired - 4;
            } else if ($minutes_expired == 58) {
                $minutes_expired = $minutes_expired - 3;
            } else if ($minutes_expired == 57) {
                $minutes_expired = $minutes_expired - 2;
            } else if ($minutes_expired == 56) {
                $minutes_expired = $minutes_expired - 1;
            } else {
                $minutes_expired = $minutes_expired;
            }
            $seconds_expired = date('s',strtotime($now));
            $time_expired = $date_expired.' '.$hours_expired.':'.$minutes_expired.':'.$seconds_expired;
            $expired = auth()->user()->id;

            $online = ['expired' => $time_expired];

            $load = \App\User::where('id', $expired)->update($online);

            if ($load) {
                return response()->json(['load' => 'true']);
            }
                return response()->json(['load' => 'false']);
        }
    }

    public function myAccount($id_user)
    {
        $active = [
            'ul' => '',
            'li' => 'account'
        ];
        $account = \App\User::find(base64_decode($id_user));

        return view('auth.account', compact('active', 'account'));
    }

    public function Account(Request $request, $id_user)
    {
        $idProfile = base64_decode($id_user);

        $profile = $request->all();

        $validasi = Validator::make($profile, [
                'newusername'     => 'min : 5 | max : 20 | unique:users,username',
                'pass_lama' => 'required',
                'pass_baru' => 'required | min: 6 | max: 20 | alpha_num | same:confirm_pass',
                'confirm_pass' => 'required',
            ],$pesans =[
                'pass_lama' => 'Hanya terdiri dari huruf & angka, min 6 hruf, max 20 huruf.'
            ],$pass_lama_salah =[
                'pass_lama' => 'Konfimasi Password lama yang Anda masukan tidak cocok dengan system kami.'
            ]);
        if($validasi->fails()){

            // return redirect()->back()->witherrors($pesans)->withInput();
            return response()->json($pesans);

        }
        if($request->Input('newusername') !== ''){

            $newUsername = $request->Input('newusername');

            $passLama = \App\User::find($idProfile);

            $pass = $passLama->password;

            $pass_baru = $request->Input('pass_lama');

            $new = $request->Input('pass_baru');

            if(Hash::check($pass_baru, $pass)){

                $update = [
                    'username' => $newUsername,
                    'password' => bcrypt($new)
                ];

                \App\User::where('id', $idProfile)->update($update);

                    // return redirect('my-account/'.$id_user);
                return response()->json(['simpan' => 'true']);

                }else {

                        // return redirect()->back()->witherrors($pass_lama_salah)->withInput();
                    return response()->json($pass_lama_salah);
            }

        }else{

            $passLama = \App\User::find($idProfile);

            $pass = $passLama->password;

            $pass_baru = $request->Input('pass_lama');

            $new = $request->Input('pass_baru');

            if(Hash::check($pass_baru, $pass)){

                $update = [
                    'password' => bcrypt($new),
                ];

                \App\User::where('id', $idProfile)->update($update);

                    // return redirect('my-account/'.$id_user);
                return response()->json(['simpan' => 'trues']);

                }else {

                        // return redirect()->back()->witherrors($pass_lama_salah)->withInput();
                    return response()->json($pass_lama_salah);

            }
        }
    }
}
