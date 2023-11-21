<?php

namespace App\Http\Controllers\Saymanager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Unit;
use App\Models\Item;
use App\Models\Transaksi;
use App\Models\Suplayer;
use App\Models\SMasuk;
use App\Models\SKeluar;
use App\Models\Toko;

class MawalController extends Controller
{
    public function index() {
        $auth = auth()->user();
        $user = User::all();
        $item = Item::all();
        $transaksi = Transaksi::with('menus','user')->get();
        $pendapatanB = Transaksi::whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()
        ])
        ->selectRaw('SUM(total_pembayaran) as total_pembayaran')
        ->get();
        $pendapatanH = Transaksi::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])
        ->selectRaw('SUM(total_pembayaran) as total_pembayaran')
        ->get();
        $pendapatanY = Transaksi::whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()
        ])
        ->selectRaw('SUM(total_pembayaran) as total_pembayaran')
        ->get();

        return view('manager.index',compact('auth','item','user','transaksi','pendapatanH','pendapatanB','pendapatanY'));
    }
    public function transaksi(){
	    $auth=auth()->user();
	    $data= Transaksi::with('menus')->orderBy('tanggal_pembayaran', 'desc')->get();
	    return view('manager.riwayatT',compact('auth','data'));
	}
		public function bulan_laporan() {
    $auth = auth()->user();

    $bulanl = [];
    $tanggalTerbaru = now();
    $bulanTerbaru = $tanggalTerbaru->format('n');
    $tahunTerbaru = $tanggalTerbaru->format('Y');
    $bulanTertua = 1;

    for ($i = $bulanTerbaru; $i >= $bulanTertua; $i--) {
        $bulanl[$i] = date('F', mktime(0, 0, 0, $i, 1));
    }
    $selectB = $bulanTerbaru;
    $data = Transaksi::selectRaw('MONTH(tanggal_pembayaran) as bulan, YEAR(tanggal_pembayaran) as tahun')
        ->selectRaw('SUM(total_pembayaran) as total_pembayaran, MONTHNAME(tanggal_pembayaran) as nama_bulan')
        ->selectRaw('SUM(item_transaksi.quantity) as total_quantity')
        ->join('item_transaksi', 'transaksi.id', '=', 'item_transaksi.transaksi_id')
        ->whereYear('tanggal_pembayaran', $tahunTerbaru)
        ->whereMonth('tanggal_pembayaran', $bulanTerbaru)
        ->groupBy('tahun', 'bulan', 'nama_bulan')
        ->get();

    return view('manager.laporan.bulan', compact('bulanl','selectB', 'auth','data'));
}
	public function filter_bulanan_laporan(Request $request) {

		$auth = auth()->user();
		$bulanl = [];
	    $tanggalTerbaru = now();
	    $bulanTerbaru = $tanggalTerbaru->format('n');
	    $tahunTerbaru = $tanggalTerbaru->format('Y');
	    $bulanTertua = 1;

	    for ($i = $bulanTerbaru; $i >= $bulanTertua; $i--) {
	        $bulanl[$i] = date('F', mktime(0, 0, 0, $i, 1));
	    }

	    $selectB = $request->bulan;
	    $data = Transaksi::selectRaw('MONTH(tanggal_pembayaran) as bulan, YEAR(tanggal_pembayaran) as tahun')
	        ->selectRaw('SUM(total_pembayaran) as total_pembayaran, MONTHNAME(tanggal_pembayaran) as nama_bulan')
	        ->selectRaw('SUM(item_transaksi.quantity) as total_quantity')
	        ->join('item_transaksi', 'transaksi.id', '=', 'item_transaksi.transaksi_id')
	        ->whereYear('tanggal_pembayaran', $request->tahun)
	        ->whereMonth('tanggal_pembayaran', $request->bulan)
	        ->groupBy('tahun', 'bulan', 'nama_bulan')
	        ->get();

	    return view('manager.laporan.bulan', compact('bulanl','selectB', 'auth','data'));

	}

	public function harian_laporan() {
	    $auth = auth()->user();
	    $haril = [];
	    $bulanl = [];
	    $tahunl = [];

	    $tanggalTerbaru = now();
	    $hariTerbaru = $tanggalTerbaru->format('d');
	    $bulanTerbaru = $tanggalTerbaru->format('n');
	    $tahunTerbaru = $tanggalTerbaru->format('Y');

	    $hariTertua = 1;
	    $bulanTertua = 1;
	    $tahunTertua = 2019;

	    // Buat loop untuk mengisi $haril dengan nama bulan
	    for ($a = $hariTertua; $a <= $hariTerbaru; $a++) {
	        $haril[$a] = date('F', mktime(0, 0, 0, $bulanTerbaru, $a, $tahunTerbaru));
	    }
	    for ($i = $bulanTerbaru; $i >= $bulanTertua; $i--) {
	        $bulanl[$i] = date('F', mktime(0, 0, 0, $i, 1));
	    }
	     for ($i = $tahunTerbaru; $i >= $tahunTertua; $i--) {
	        $tahunl[$i] = date('F', mktime(0, 0, 0, 1, 1, $i));
	    }

	    $selectH = $hariTerbaru;
	    $selectB = $bulanTerbaru;
	    $selectT = $tahunTerbaru;

	    $harian = Transaksi::selectRaw('DAY(tanggal_pembayaran) as tanggal, MONTH(tanggal_pembayaran) as bulan, YEAR(tanggal_pembayaran) as tahun')
	        ->selectRaw('SUM(total_pembayaran) as total_pembayaran, MONTHNAME(tanggal_pembayaran) as nama_bulan')
	        ->selectRaw('SUM(item_transaksi.quantity) as total_quantity')
	        ->join('item_transaksi', 'transaksi.id', '=', 'item_transaksi.transaksi_id')
	        ->whereYear('tanggal_pembayaran', $tahunTerbaru) // Tambahkan filter tahun
	        ->whereMonth('tanggal_pembayaran', $bulanTerbaru)
	        ->whereDay('tanggal_pembayaran', $hariTerbaru)
	        ->groupBy('tahun', 'bulan', 'tanggal', 'nama_bulan')
	        ->get();
	    return view('manager.laporan.harian', compact('harian', 'selectB', 'selectH','selectT', 'auth', 'haril','bulanl','tahunl'));
	}
	public function filter_harian_laporan(Request $request) {
		$auth = auth()->user();
		$haril = [];
	    $bulanl = [];
	    $tahunl = [];

	    $tanggalTerbaru = now();
	    $hariTerbaru = $tanggalTerbaru->format('d');
	    $bulanTerbaru = $tanggalTerbaru->format('n');
	    $tahunTerbaru = $tanggalTerbaru->format('Y');

	    $hariTertua = 1;
	    $bulanTertua = 1;
	    $tahunTertua = 2019;

	    // Buat loop untuk mengisi $haril dengan nama bulan
	    for ($a = $hariTertua; $a <= $hariTerbaru; $a++) {
	        $haril[$a] = date('F', mktime(0, 0, 0, $bulanTerbaru, $a, $tahunTerbaru));
	    }
	    for ($i = $bulanTerbaru; $i >= $bulanTertua; $i--) {
	        $bulanl[$i] = date('F', mktime(0, 0, 0, $i, 1));
	    }
	     for ($i = $tahunTerbaru; $i >= $tahunTertua; $i--) {
	        $tahunl[$i] = date('F', mktime(0, 0, 0, 1, 1, $i));
	    }

	    $selectT = $request->tahun;
	    $selectB = $request->bulan;
	    $selectH = $request->hari;

	    $harian = Transaksi::selectRaw('DAY(tanggal_pembayaran) as tanggal, MONTH(tanggal_pembayaran) as bulan, YEAR(tanggal_pembayaran) as tahun')
	        ->selectRaw('SUM(total_pembayaran) as total_pembayaran, MONTHNAME(tanggal_pembayaran) as nama_bulan')
	        ->selectRaw('SUM(item_transaksi.quantity) as total_quantity')
	        ->join('item_transaksi', 'transaksi.id', '=', 'item_transaksi.transaksi_id')
	        ->whereYear('tanggal_pembayaran', $request->tahun) // Tambahkan filter tahun
	        ->whereMonth('tanggal_pembayaran', $request->bulan)
	        ->whereDay('tanggal_pembayaran', $request->hari)
	        ->groupBy('tahun', 'bulan', 'tanggal', 'nama_bulan')
	        ->get();

	    
	    return view('manager.laporan.harian', compact('harian', 'selectB', 'selectH','selectT', 'auth', 'haril','bulanl','tahunl'));
	}
	public function tahunan_laporan() {
	    $auth = auth()->user();
	    $tahunl = [];

	    $tanggalTerbaru = now();
	    $tahunTerbaru = $tanggalTerbaru->format('Y');

	    $tahunTertua = 2019;

	    // Buat loop untuk mengisi $haril dengan nama bulan
	    for ($i = $tahunTerbaru; $i >= $tahunTertua; $i--) {
	        $tahunl[$i] = date('F', mktime(0, 0, 0, 1, 1, $i));
	    }

	    $selectT = $tahunTerbaru;

	    $tahunan = Transaksi::selectRaw('YEAR(tanggal_pembayaran) as tahun')
	        ->selectRaw('SUM(total_pembayaran) as total_pembayaran')
	        ->selectRaw('SUM(item_transaksi.quantity) as total_quantity')
	        ->join('item_transaksi', 'transaksi.id', '=', 'item_transaksi.transaksi_id')
	        ->whereYear('tanggal_pembayaran', $tahunTerbaru)
	        ->groupBy('tahun')
	        ->get();
	    return view('manager.laporan.tahunan', compact('tahunan', 'selectT', 'auth','tahunl'));
	}
	public function filter_tahunan_laporan(Request $request) {
		$auth = auth()->user();
	    $tahunl = [];

	    $tanggalTerbaru = now();
	    $tahunTerbaru = $tanggalTerbaru->format('Y');

	    $tahunTertua = 2019;

	    // Buat loop untuk mengisi $haril dengan nama bulan
	     for ($i = $tahunTerbaru; $i >= $tahunTertua; $i--) {
	        $tahunl[$i] = date('F', mktime(0, 0, 0, 1, 1, $i));
	    }

	    $selectT = $request->tahun;

	    $tahunan = Transaksi::selectRaw(' YEAR(tanggal_pembayaran) as tahun')
	        ->selectRaw('SUM(total_pembayaran) as total_pembayaran')
	        ->selectRaw('SUM(item_transaksi.quantity) as total_quantity')
	        ->join('item_transaksi', 'transaksi.id', '=', 'item_transaksi.transaksi_id')
	        ->whereYear('tanggal_pembayaran', $request->tahun)
	        ->groupBy('tahun')
	        ->get();

	    
	    return view('manager.laporan.tahunan', compact('tahunan', 'selectT', 'auth', 'tahunl'));
	}

	public function toko()
	{
		return view('manager.toko');
	}

	public function create_toko(Request $request)
	{
        $toko = Toko::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_toko' => $request->toko,
            'no_telepon' => $request->telepon,
        ]);
        if($toko){
	        $user = User::find(auth()->user()->id);
	        $user->toko_id = $toko->id;
	        $user->save();	        
	        	return redirect()->route('M.index')->with('success', 'Berhasil');
	    }else{
	        return back()->with(
	       		'password', 'Wrong username or password'
	        );
    	}
	}

}
