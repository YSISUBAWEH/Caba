<?php

namespace App\Http\Controllers\Saykasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Transaksi;
use App\Models\SKeluar;

class KtranController extends Controller
{
    //transaki
public function transaksi(){
    $item = Item::all();
    $auth = auth()->user();
    $nota = "TRXBC-" . date("YmdHis");
    // session()->forget('Tcart');
    return view('kasir.transaksi.index')->with([
        'item' => $item,'auth' => $auth,'nota' => $nota,
    ]);
}
public function addCart_transaksi(Request $request)
{
    $selectedItems = $request->input('selected_items');
    
    $Tcart = session()->get('Tcart', []);

    foreach ($selectedItems as $id) {
        $item = Item::where('id',$id)->first();
        if($item->stok < 1){
            session()->forget('Tcart');
           return redirect()->back()->with('stokNull', 'Stok Kosong tidak bisa menambah ke keranjang'); 
        }else{
            if (isset($Tcart[$id])) {
                $Tcart[$id]['quantity']++;
            } else {
                $Tcart[$id] = [
                    "name" => $item->name,
                    "quantity" => 1,
                    "harga" => $item->harga,
                    "img" => $item->img
                ];
            }
        }
    }
    
    session()->put('Tcart', $Tcart);

    return redirect()->back()->with('success', 'Products added to cart successfully!');
}    

    public function update_transaksi(Request $request)
    {
        if($request->id && $request->quantity){
            $Tcart = session()->get('Tcart');
            $Tcart[$request->id]["quantity"] = $request->quantity;
            session()->put('Tcart', $Tcart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove_transaksi(Request $request)
    {
        if($request->id) {
            $Tcart = session()->get('Tcart');
            if(isset($Tcart[$request->id])) {
                unset($Tcart[$request->id]);
                session()->put('Tcart', $Tcart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function selesai_transaksi(Request $request)
{
     // Mengambil nilai 'action' dari permintaan
    $action = $request->input('action');

    if ($action === 'print') {
        $Tcart = session('Tcart');
        $totalPrice = 0;

        // Hitung total pembayaran dari cart
        foreach ($Tcart as $id => $details) {
            $totalPrice += $details['harga'] * $details['quantity'];
        }

        $uangPembayaran = $request->input('money-price');
        $kembalian = $uangPembayaran - $totalPrice;

        // Simpan data transaksi ke dalam tabel
        $transaksi = new Transaksi();
        $transaksi->id = "TRX-" . date("YmdHis");
        $transaksi->total_pembayaran = $totalPrice;
        $transaksi->uang_pembayaran = $uangPembayaran;
        $transaksi->kembalian = $kembalian;
        $transaksi->tanggal_pembayaran = now(); // Tanggal pembayaran saat ini
        $transaksi->metode_pembayaran = $request->input('metode_pembayaran');
        $transaksi->users_id = $request->input('user');
        $transaksi->save();

        // Simpan detail transaksi (menu) ke dalam tabel
        foreach ($Tcart as $id => $details) {
            $transaksi->menus()->attach($id, [
                'quantity' => $details['quantity'],
                'harga' => $details['harga'],
            ]);
            //stok
            $item = Item::find($id);
            $item->stok -= $details['quantity'];
            $item->save();

            $stokK = SKeluar::create([
                'id' => "SKBC-" . date("YmdHis"),
                'item_id' => $id,
                'users_id' => auth()->user()->id,
                'stok' => $details['quantity'],
                'deskripsi' => 'Barang Dijual',
            ]);
        }

        // dd($transaksi,$transaksi->menus);
        // Hapus cart setelah checkout
        session()->forget('Tcart');

        // Buat sesi baru "TRXPrint" dan simpan data transaksi
        session(['TRXPrint' => $transaksi]);

        return redirect()->route('K.V.T')->with('success','haha');
    
    } elseif ($action === 'selesai') {
        $Tcart = session('Tcart');
        $totalPrice = 0;
        // Hitung total pembayaran dari cart
        foreach ($Tcart as $id => $details) {
            $totalPrice += $details['harga'] * $details['quantity'];
        }

        $uangPembayaran = $request->input('money-price');
        $kembalian = $uangPembayaran - $totalPrice;

        // Simpan data transaksi ke dalam tabel
        $transaksi = new Transaksi();
        $transaksi->id = $request->input('nota');
        $transaksi->total_pembayaran = $totalPrice;
        $transaksi->uang_pembayaran = $uangPembayaran;
        $transaksi->kembalian = $kembalian;
        $transaksi->tanggal_pembayaran = now(); // Tanggal pembayaran saat ini
        $transaksi->metode_pembayaran = $request->input('metode_pembayaran');
        $transaksi->users_id = $request->input('user');
        $transaksi->save();

        // Simpan detail transaksi (menu) ke dalam tabel
        foreach ($Tcart as $id => $details) {
            $transaksi->menus()->attach($id, [
                'quantity' => $details['quantity'],
                'harga' => $details['harga'],
            ]);
            //stok
            $item = Item::find($id);
            $item->stok -= $details['quantity'];
            $item->save();

            $stokK = SKeluar::create([
                'id' => "SKBC-" . date("YmdHis"),
                'item_id' => $id,
                'users_id' => auth()->user()->id,
                'stok' => $details['quantity'],
                'deskripsi' => 'Barang Dijual',
            ]);
        }
        // Hapus cart setelah checkout
        session()->forget('Tcart');
        
        return redirect()->route('K.V.T')->with('success', 'Checkout berhasil!');

        }
}

public function riwayat_transaksi(){
    $auth=auth()->user();
    $data= Transaksi::with('menus')->orderBy('tanggal_pembayaran', 'desc')->get();
    return view('kasir.transaksi.riwayat',compact('auth','data'));
}
function struk_riwayat() {
    $auth = auth()->user();
    return view('kasir.print',compact('auth'));
}
}
