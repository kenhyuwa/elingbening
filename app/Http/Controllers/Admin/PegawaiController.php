<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Image;
use File;

class PegawaiController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    	$this->middleware('level');
    }

    public function index()
    {
    	$active = [
    		'ul' => '',
    		'li' => 'user'
    	];

    	return view('backend.pegawai.view', compact('active', 'pegawais'));
    }

    public function listPegawai()
    {
    	$pegawais = \App\Models\Pegawai::all();

    	return view('backend.pegawai.list', compact('pegawais'));
    }

    public function create()
    {
    	$active = [
    		'ul' => '',
    		'li' => 'user'
    	];

    	$datakode = \App\Models\Pegawai::max('kode_pegawai');
		    if($datakode){
		        $nilaikode = substr($datakode, 2);
		        $kode = (int) $nilaikode;
		        $kode = $kode + 1;
		        $newKode = "PG".str_pad($kode, 3, "0", STR_PAD_LEFT);
		        } else {

		        $newKode = 'PG001';
		    }

    	return view('backend.pegawai.create', compact('active', 'newKode'));
    }

    public function store(Request $request)
    {
    	$data = $request->all();
    	$validate = Validator::make($data, [
				"kode_pegawai" => "required | max: 100",
				"name"         => "required | max: 100",
				"gender"       => "required | max: 100",
				"phone"        => "required | max: 100",
				"level"        => "required | max: 100",
				"user_img"     => "mimes:jpg,jpeg,png,gif | max: 2000"
    		]);
    	if($validate->fails()) {
    		return redirect()->back()->withErrors($validate)->withInput();
    	}

    		// set destinasi
            $images = $request->file('user_img');
            $upload = 'upload/images/originals';
            $nama = $request->Input('name');
            $filename = strtolower(str_replace(' ','-',$nama));
            $fullname = $filename.'-'.rand(11111,99999).'-EB'.'.'.$images->getClientOriginalExtension();
            $success = $images->move($upload, $fullname);
            Image::make($success)->resize('128','128')->save('upload/images/thumbnails/'.$fullname);

    	if($success) {
    		$pegawai = new \App\Models\Pegawai;
				$pegawai->kode_pegawai = $request->Input('kode_pegawai');
				$pegawai->name         = $request->Input('name');
				$pegawai->picture      = $fullname;
				$pegawai->gender       = $request->Input('gender');
				$pegawai->phone        = $request->Input('phone');
				$pegawai->level        = $request->Input('level');

    		$simpan = $pegawai->save();
    		if($simpan) {

    			$user = new User;
					$user->username     = $request->Input('kode_pegawai');
					$user->password     = bcrypt($request->Input('kode_pegawai'));
					$user->email        = strtolower(str_replace(' ','.', $request->Input('name'))).'@gmail.com';
					$user->pegawai_kode = $request->Input('kode_pegawai');
    			$user->save();
    		
    		return redirect()->back();
    		}
    	}
    }

    public function show($id)
    {
        $active = [
            'ul' => '',
            'li' => 'user'
        ];

        $detail = \App\Models\Pegawai::find(base64_decode($id));

        return view('backend.pegawai.detail', compact('active', 'detail'));
    }

    public function update(Request $request, $kode_pegawai)
    {
        $exist = \App\Models\Pegawai::find(base64_decode($kode_pegawai));
        $data = $request->all();
        $validate = Validator::make($data,[
                "kode_pegawai" => "required | max: 100",
                "name"         => "required | max: 100",
                "gender"       => "required | max: 100",
                "phone"        => "required | max: 100",
                "level"        => "required | max: 100",
                "user_img"     => "mimes:jpg,jpeg,png,gif | max: 2000"
            ]);
        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $images = $request->file('user_img');
        if($images){
            File::delete('upload/images/originals/'.$exist->picture);
            File::delete('upload/images/thumbnails/'.$exist->picture);
        
            $upload = 'upload/images/originals';
            if(count($fullname = $exist->picture)){
                $fullname = $exist->picture;
            }
            $nama = $request->Input('name');
            $filename = strtolower(str_replace(' ','-',$nama));
            $fullname = $filename.'-'.rand(11111,99999).'-EB'.'.'.$images->getClientOriginalExtension();
            $success = $images->move($upload, $fullname);
            Image::make($success)->resize('128','128')->save('upload/images/thumbnails/'.$fullname);
            if($success){
                $pegawai = [
                    'kode_pegawai' => $request->Input('kode_pegawai'),
                    'name'         => $request->Input('name'),
                    'picture'      => $fullname,
                    'gender'       => $request->Input('gender'),
                    'phone'        => $request->Input('phone'),
                    'level'        => $request->Input('level')
                ];

                \App\Models\Pegawai::where('kode_pegawai', base64_decode($kode_pegawai))->update($pegawai);

                return redirect()->back();
            }
        }else{
            $pegawai = [
                    'kode_pegawai' => $request->Input('kode_pegawai'),
                    'name'         => $request->Input('name'),
                    'gender'       => $request->Input('gender'),
                    'phone'        => $request->Input('phone'),
                    'level'        => $request->Input('level')
                ];

                \App\Models\Pegawai::where('kode_pegawai', base64_decode($kode_pegawai))->update($pegawai);

                return redirect()->back();
        }
    }

    public function delete(Request $request, $kode_pegawai)
    {
        if($request->ajax()) {
            $destroy = \App\Models\Pegawai::find(base64_decode($kode_pegawai));

            $auth = $destroy->getUser->id;
            
            if($auth != auth()->user()->id){

                File::delete('upload/images/originals/'.$destroy->picture);

                File::delete('upload/images/thumbnails/'.$destroy->picture);

                $destroy->delete();

                 return response()->json(['success' => 'true']);
            }
                return response()->json(['success' => 'false']);
        }
    }
}
