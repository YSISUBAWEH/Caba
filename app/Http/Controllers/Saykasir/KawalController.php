<?php

namespace App\Http\Controllers\Saykasir;

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

class KawalController extends Controller
{
    public function index() {
    	$auth = auth()->user();
        $item = Item::all();
        $transaksi = Transaksi::all();
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

        return view('kasir.index', compact('auth', 'item', 'transaksi','pendapatanH','pendapatanB','pendapatanY'));
    }

    //kategori
    public function kategori() {
        $auth = auth()->user();
        return view('kasir.item.kategori.index', compact(['auth']));
    } 
 
    public function load_kategori() {
        $get_menu = Kategori::all();
        $output = '';
        if ($get_menu->count() > 0) {
            $output .= '<table id="taka" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($get_menu as $no=>$rs) {
                $output .= '<tr>
                <td>' . $no+1 . '</td>
                <td>'. $rs->kode_kate .'</td>
                <td>' . $rs->name . '</td>
                <td>
                  <a href="#" id="' . $rs->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editKaModal"><i class="ti-pencil"></i></a>
                  <a href="#" id="' . $rs->id . '" class="text-danger mx-1 deleteIcon"><i class="ti-trash"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Kategori Kosong!</h1>';
        }
    }
 
    public function create_kategori(Request $request) {
        
        $kameData = [
            'kode_kate' => "KTR-" . date("YmdHis"),
            'name' => $request->name,
        ];
        Kategori::create($kameData);
        return response()->json([
            'status' => 200,
        ]);
    }
 
    public function edit_kategori(Request $request) {
        $id = $request->id;
        $kame = Kategori::find($id);
        return response()->json($kame);
    }
 
    public function update_kategori(Request $request) {

        $kame = Kategori::find($request->kame_id);
        $kameData = ['name' => $request->name];
 
        $kame->update($kameData);
        return response()->json([
            'status' => 200,
        ]);
    }
 
    public function delete_kategori(Request $request) {
        $id = $request->id;
        $me = Kategori::find($id);
            Kategori::destroy($id);
    }
    //end-of-kategori

    //unit
    public function load_unit() {
        $get_unit = Unit::all();
        $output = '';
        if ($get_unit->count() > 0) {
            $output .= '<table id="taun" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($get_unit as $no=>$rs) {
                $output .= '<tr>
                <td>' . $no+1 . '</td>
                <td>'. $rs->kode_uk .'</td>
                <td>' . $rs->name . '</td>
                <td>
                  <a href="#" id="' . $rs->id . '" class="text-success mx-1 editIconU" data-bs-toggle="modal" data-bs-target="#editUnModal"><i class="ti-pencil"></i></a>
                  <a href="#" id="' . $rs->id . '" class="text-danger mx-1 deleteIconU"><i class="ti-trash"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Units Kosong!</h1>';
        }
    }
 
    public function create_unit(Request $request) {
        
        $kameData = [
            'kode_uk' => "UNS-" . date("YmdHis"),
            'name' => $request->name,
        ];
        Unit::create($kameData);
        return response()->json([
            'status' => 200,
        ]);
    }
 
    public function edit_unit(Request $request) {
        $id = $request->id;
        $kame = Unit::find($id);
        return response()->json($kame);
    }
 
    public function update_unit(Request $request) {

        $kame = Unit::find($request->unit_id);
        $kameData = ['name' => $request->nameU];
 
        $kame->update($kameData);
        return response()->json([
            'status' => 200,
        ]);
    }
 
    public function delete_unit(Request $request) {
        $id = $request->id;
        $me = Unit::find($id);
            Unit::destroy($id);
    }
    //end-of-kategori

    //kategori
    public function item() {
        $auth = auth()->user();
        $kategori = Kategori::all();
        $unit = Unit::all();
        return view('kasir.item.index', compact(['auth','kategori','unit']));
    } 
 
    public function load_item() {
        $get_menu = Item::all();
        $output = '';
        if ($get_menu->count() > 0) {
            $output .= '<table id="tait" class="table table-stripped">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Stok</th>
                <th>Kategori</th>
                <th>Unit</th>
                <th></th>
              </tr>
            </thead>
            <tbody>';
            foreach ($get_menu as $no=>$rs) {
                $output .= '<tr>
            
                <td>' . $no+1 . '</td>
                <td>'. $rs->id .'</td>
                <td>' . $rs->name . '</td>
                <td class="text-end">' . $rs->harga . '</td>
                <td class="text-end">' . $rs->stok . '</td>
                <td>' . $rs->kate->name . '</td>
                <td>' . $rs->uk->name . '</td>
                <td>
                  <a href="#" id="' . $rs->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editItModal"><i class="ti-pencil"></i></a>
                  <a href="#" id="' . $rs->id . '" class="text-danger mx-1 deleteIcon"><i class="ti-trash"></i></a>
                </td>
             </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Data Item Kosong!</h1>';
        }
    }
 
    public function create_item(Request $request) {

        $path = public_path('arsip/data/img');
        !is_dir($path) &&
            mkdir($path, 0777, true);

        $imageName = time() . '.' . $request->img->extension();
        $request->img->move($path, $imageName);

        $kameData = [
            'id' => "KI-" . date("YmdHis"),'name' => $request->name, 'harga' => $request->harga,'kode_kate' => $request->kategori,'kode_uk' => $request->unit, 'img' => $imageName,'stok'=>'0','SKU'=>'0',
        ];
        Item::create($kameData);
        return response()->json([
            'status' => 200,
        ]);
    }
 
    public function edit_item(Request $request) {
        $id = $request->id;
        $me = Item::find($id);
        return response()->json($me);
    }
 
    public function update_item(Request $request) {
        $imageName='';
        $me = Item::find($request->me_id);
        if ($request->hasFile('img')) {
            $path = public_path('arsip/data/img');
            !is_dir($path) &&
                mkdir($path, 0777, true);

            $imageName = time() . '.' . $request->img->extension();
            $request->img->move($path, $imageName);
            if ($me->item) {
                Storage::delete('public/images/' . $me->foto);
            }
        } else {
            $imageName = $request->me_foto;
        }

        $meData = ['name' => $request->name, 'harga' => $request->harga,'kode_kate' => $request->kategori,'kode_uk' => $request->unit, 'img' => $imageName,'stok'=>'0',];
 
        $me->update($meData);
        return response()->json([
            'status' => 200,
        ]);
    }
 
    public function delete_item(Request $request) {
        $id = $request->id;
        $me = Item::find($id);
            Item::destroy($id);
    }
    //end-of-kategori
	//suplay
    public function suplay() {
        $auth = auth()->user();
        $suplayer = Suplayer::all();
        return view('kasir.item.stok.suplayer', compact(['auth','suplayer']));
    } 
 
    public function load_suplay() {
        $get_menu = Suplayer::all();
        $output = '';
        if ($get_menu->count() > 0) {
            $output .= '<table id="tasu" class="table table-stripped">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>Deskripsi</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($get_menu as $no=> $rs) {
                $output .= '<tr>
                <td>' . $no+1 . '</td>
                <td>'. $rs->id .'</td>
                <td>' . $rs->name . '</td>
                <td>' . $rs->telepon . '</td>
                <td>' . $rs->alamat . '</td>
                <td>' . $rs->deskripsi . '</td>
                <td>
                  <a href="#" id="' . $rs->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editSuModal"><i class="ti-pencil"></i></a>
                  <a href="#" id="' . $rs->id . '" class="text-danger mx-1 deleteIcon"><i class="ti-trash"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<p class="fs-2 text-center text-secondary my-5">Data Kosong!</p>';
        }
    }
 
    public function create_suplay(Request $request) {

        $kameData = [
            'id' => "KSBC-" . date("YmdHis"),'name' => $request->name,'telepon' => $request->telepon, 'alamat' => $request->alamat,'deskripsi' => $request->deskripsi,
        ];
        Suplayer::create($kameData);
        return response()->json([
            'status' => 200,
        ]);
    }
 
    public function edit_suplay(Request $request) {
        $id = $request->id;
        $me = Suplayer::find($id);
        return response()->json($me);
    }
 
    public function update_suplay(Request $request) {
        $me = Suplayer::find($request->me_id);
        $meData = ['name' => $request->name,'telepon' => $request->telepon, 'alamat' => $request->alamat,'deskripsi' => $request->deskripsi,];
        
        $me->update($meData);
        return response()->json([
            'status' => 200,
        ]);
    }
 
    public function delete_suplay(Request $request) {
        $id = $request->id;
        $me = Suplayer::find($id);
            Suplayer::destroy($id);
    }
    //end-of-suplay

    //stok
    public function stok() {
        $auth = auth()->user();
        $stokM = SMasuk::all();
        $stokK = SKeluar::all();
        $suplayer = Suplayer::all();
        $item = Item::all();
        return view('kasir.item.stok.stok', compact(['auth','stokM','stokK','suplayer','item']));
    } 
 
    public function load_stokM() {
        $get_menu = SMasuk::all();
        $output = '';
        if ($get_menu->count() > 0) {
            $output .= '<table id="tasm" class="table table-stripped">
            <thead>
              <tr>
                <th>No</th>
                <th>Item</th>
                <th class="text-center">Stok masuk</th>
                <th>Suplayer</th>
                <th>Deskripsi</th>
                <th></th>
              </tr>
            </thead>
            <tbody>';
            foreach ($get_menu as $no=> $rs) {
                $output .= '<tr>
                <td>' . $no+1 . '</td>
                <td>'. $rs->item->name .'</td>
                <td class="text-end">' . $rs->stok . '</td>
                <td>'. $rs->suplayer->name .'</td>
                <td>'. $rs->deskripsi .'</td>
                <td>
                  <a href="#" id="' . $rs->id . '" class="text-danger mx-1 deleteIcon" data-item="' . $rs->item->id . '"><i class="ti-trash"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<p class="fs-4 text-center text-secondary my-5">Data Kosong!</p>';
        }
    }
 
    public function create_stokM(Request $request) {
    $stokMasuk = SMasuk::create([
        'id' => "SMBC-" . date("YmdHis"),
        'item_id' => $request->item,
        'suplayer_id' => $request->suplayer,
        'stok' => $request->stok,
        'deskripsi' => $request->deskripsi,
    ]);

    // Ambil item terkait
    $item = Item::find($request->item);

    // Perbarui stok item
    $item->stok += $request->stok;
    $item->save();

        return response()->json([
            'status' => 200,
        ]);
    }
 
    public function delete_stokM(Request $request) {
        $id = $request->id;
        $stokMasuk = SMasuk::find($id);

        // Ambil nilai stok yang akan dikurangkan
        $stokToSubtract = $stokMasuk->stok;

        // Dapatkan item terkait
        $item = Item::find($request->item);

        // Perbarui stok item
        $item->stok -= $stokToSubtract;
        $item->save();

        // Hapus catatan stok masuk
        $stokMasuk->delete();

        return response()->json([
            'status' => 200,
        ]);
    }

   public function load_stokK() {
        $get_menu = SKeluar::all();
        $output = '';
        if ($get_menu->count() > 0) {
            $output .= '<table id="task" class="table table-stripped">
            <thead>
              <tr>
                <th>No</th>
                <th>Item</th>
                <th class="text-center">Stok keluar</th>
                <th>Deskripsi</th>
                <th></th>
              </tr>
            </thead>
            <tbody>';
            foreach ($get_menu as $no=> $rs) {
                $output .= '<tr>
                <td>' . $no+1 . '</td>
                <td>'. $rs->item->name .'</td>
                <td class="text-end">' . $rs->stok . '</td>
                <td>'. $rs->deskripsi .'</td>
                <td class="text-center">
                  <a href="#" id="' . $rs->id . '" class="text-danger mx-1 deleteIconK" data-item="' . $rs->item->id . '"><i class="ti-trash"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<p class="fs-4 text-center text-secondary my-5">Data Kosong!</p>';
        }
    }
 
    public function create_stokK(Request $request) {
    $stokMasuk = SKeluar::create([
        'id' => "SKBC-" . date("YmdHis"),
        'item_id' => $request->item,
        'users_id' => auth()->user()->id,
        'stok' => $request->stok,
        'deskripsi' => $request->deskripsi,
    ]);

    $item = Item::find($request->item);

    // Perbarui stok item
    $item->stok -= $request->stok;
    $item->save();

        return response()->json([
            'status' => 200,
        ]);
    }
 
    public function delete_stokK(Request $request) {
        $id = $request->id;
        $stokKeluar = SKeluar::find($id);

        // Ambil nilai stok yang akan dikurangkan
        $stokPlus = $stokKeluar->stok;

        // Dapatkan item terkait
        $item = Item::find($request->item);

        // Perbarui stok item
        $item->stok += $stokPlus;
        $item->save();

        // Hapus catatan stok masuk
        $stokKeluar->delete();
    }
    //end-of-kategori
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

    return view('kasir.laporan.bulan', compact('bulanl','selectB', 'auth','data'));
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

	    return view('kasir.laporan.bulan', compact('bulanl','selectB', 'auth','data'));

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
	    return view('kasir.laporan.harian', compact('harian', 'selectB', 'selectH','selectT', 'auth', 'haril','bulanl','tahunl'));
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

	    
	    return view('kasir.laporan.harian', compact('harian', 'selectB', 'selectH','selectT', 'auth', 'haril','bulanl','tahunl'));
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
	    return view('kasir.laporan.tahunan', compact('tahunan', 'selectT', 'auth','tahunl'));
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

	    
	    return view('kasir.laporan.tahunan', compact('tahunan', 'selectT', 'auth', 'tahunl'));
	}

}
