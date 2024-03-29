<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pelanggan=DB::table('pelanggan')->join('status', 'pelanggan.id_status', '=', 'status.id_status')->get();
        return view('home',['pelanggan'=>$pelanggan]);
    }

    public function hapus(Request $req, $id){
        DB::table('pelanggan')->where('id_pelanggan',$id)->delete();
        $req->session()->flash('notifdelete', 'Data Pelanggan Berhasil Dihapus!');
        return redirect('/home');
    }

    public function cari(Request $request){
        // menangkap data pencarian
		$cari = $request->cari;
 
        // mengambil data dari table pelanggan sesuai pencarian data
        $pelanggan = DB::table('pelanggan')->join('status', 'pelanggan.id_status', '=', 'status.id_status')
        ->where('telepon','like',"%".$cari."%")
        ->get();

        // mengirim data pelanggan ke view index
        return view('home',['pelanggan'=> $pelanggan]);
    }

    public function store(Request $request){
        DB::table('pelanggan')->insert([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'jumlah' => $request->jumlah,
            'id_status' => $request->status
        ]);
        $request->session()->flash('notifadd',' Data Telah Ditambahkan! ');
        return redirect('/home');
    }

    public function edit($id){
        $pelanggan = DB::table('pelanggan')->where('id_pelanggan',$id)->get();
        return view('home',['pelanggan'=>$pelanggan]);
    }

    public function update(Request $req){
        DB::table('pelanggan')->where('id_pelanggan',$req->id)->update([
            'nama' => $req->nama,
            'telepon' => $req->telepon,
            'alamat' => $req->alamat,
            'jumlah' => $req->jumlah,
            'id_status' => $req->status
        ]);
        $req->session()->flash('notifedit', 'Transaksi Berhasil!');
        return redirect('/home');
    }
}
