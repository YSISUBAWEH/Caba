<?php

namespace App\Http\Controllers\Saymanager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suplayer;
use App\Models\SMasuk;
use App\Models\SKeluar;
use App\Models\Item;

class MstokController extends Controller
{
    //suplay
    public function suplay() {
        $auth = auth()->user();
        $suplayer = Suplayer::all();
        return view('manager.item.stok.suplayer', compact(['auth','suplayer']));
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
            echo '<h1 class="text-center text-secondary my-5">Data Kosong!</h1>';
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
        return view('manager.item.stok.stok', compact(['auth','stokM','stokK','suplayer','item']));
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
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($get_menu as $no=> $rs) {
                $output .= '<tr>
                <td>' . $no+1 . '</td>
                <td>'. $rs->item->name .'</td>
                <td class="text-end">' . $rs->stok . '</td>
                <td>
                  <a href="#" id="' . $rs->id . '" class="text-danger mx-1 deleteIcon" data-item="' . $rs->item->id . '"><i class="ti-trash"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Data Kosong!</h1>';
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
                <th>Stok keluar</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($get_menu as $no=> $rs) {
                $output .= '<tr>
                <td>' . $no+1 . '</td>
                <td>'. $rs->item->name .'</td>
                <td>' . $rs->stok . '</td>
                <td>
                  <a href="#" id="' . $rs->id . '" class="text-danger mx-1 deleteIconK" data-item="' . $rs->item->id . '"><i class="ti-trash"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Data Kosong!</h1>';
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
}
