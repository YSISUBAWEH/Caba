<?php

namespace App\Http\Controllers\Saymanager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Unit;
use App\Models\Item;
use App\Models\SMasuk;
use App\Models\SKeluar;
use App\Models\Suplayer;

class MitemController extends Controller
{
    //item
    public function item() {
        $auth = auth()->user();
        $item = Item::all();
        return view('manager.iss.item', compact(['auth','item']));
    } 
 
    public function load_item() {
        $get_menu = Item::all();
        $output = '';
        if ($get_menu->count() > 0) {
            $output .= '<table id="tait" class="table activate-select table-striped dt-responsive nowrap w-100">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Stok</th>
                <th>Kategori</th>
                <th>Unit</th>
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
             </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h4 class="text-center text-secondary my-5">Data Item Kosong!</h4>';
        }
    }
    public function stok() {
        $auth = auth()->user();
        $stokM = SMasuk::all();
        $stokK = SKeluar::all();
        $suplayer = Suplayer::all();
        $item = Item::all();
        return view('manager.iss.stok', compact(['auth','stokM','stokK','suplayer','item']));
    } 
 
    public function load_stokM() {
        $get_menu = SMasuk::all();
        $output = '';
        if ($get_menu->count() > 0) {
            $output .= '<table id="tasm" class="table activate-select table-striped dt-responsive nowrap w-100">
            <thead>
              <tr>
                <th>No</th>
                <th>Item</th>
                <th class="text-center">Stok masuk</th>
                <th></th>
              </tr>
            </thead>
            <tbody>';
            foreach ($get_menu as $no=> $rs) {
                $output .= '<tr>
                <td>' . $no+1 . '</td>
                <td>'. $rs->item->name .'</td>
                <td class="text-end">' . $rs->stok . '</td>
                <td class="text-center">
                  <a href="#" data-id="' . $rs->id . '" data-item="' . $rs->item->name . '" data-stok="' . $rs->stok . '" data-sup="' . $rs->suplayer->name . '" data-des="' . $rs->deskripsi . '" class="text-primary detail-button-sm align-items-center mx-1" data-bs-toggle="modal" data-bs-target="#DetailModalSM"><i class="ri-eye-line"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<p class="fs-4 text-center text-secondary my-5">Data Kosong!</p>';
        }
    }
    public function load_stokK() {
        $get_menu = SKeluar::all();
        $output = '';
        if ($get_menu->count() > 0) {
            $output .= '<table id="task" class="table activate-select table-striped dt-responsive nowrap w-100">
            <thead>
              <tr>
                <th>No</th>
                <th>Item</th>
                <th class="text-center">Stok keluar</th>
                <th></th>
              </tr>
            </thead>
            <tbody>';
            foreach ($get_menu as $no=> $rs) {
                $output .= '<tr>
                <td>' . $no+1 . '</td>
                <td>'. $rs->item->name .'</td>
                <td class="text-end">' . $rs->stok . '</td>
                <td class="text-center">
                  <a href="#" data-id="' . $rs->id . '" data-item="' . $rs->item->name . '" data-stok="' . $rs->stok . '" data-us="' . $rs->user->name . '" data-des="' . $rs->deskripsi . '" class="text-primary detail-button-sk align-items-center mx-1" data-bs-toggle="modal" data-bs-target="#DetailModalSK"><i class="ri-eye-line"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<p class="fs-4 text-center text-secondary my-5">Data Kosong!</p>';
        }
    }
    public function suplay() {
        $auth = auth()->user();
        return view('manager.iss.suplayer', compact(['auth']));
    } 
 
    public function load_suplay() {
        $get_menu = Suplayer::all();
        $output = '';
        if ($get_menu->count() > 0) {
            $output .= '<table id="tasu" class="table activate-select table-striped dt-responsive nowrap w-100">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th></th>
              </tr>
            </thead>
            <tbody>';
            foreach ($get_menu as $no=> $rs) {
                $output .= '<tr>
                <td>' . $no+1 . '</td>
                <td>'. $rs->name .'</td>
                <td>' . $rs->telepon . '</td>
                <td>' . $rs->alamat . '</td>
                <td class="text-center">
                  <a href="#" data-id="' . $rs->id . '" data-name="' . $rs->name . '" data-tel="' . $rs->telepon . '" data-al="' . $rs->alamat . '" data-des="' . $rs->deskripsi . '" class="text-primary detail-button-su align-items-center mx-1" data-bs-toggle="modal" data-bs-target="#DetailModalSU"><i class="ri-eye-line"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<p class="fs-4 text-center text-secondary my-5">Data Kosong!</p>';
        }
    }
}
