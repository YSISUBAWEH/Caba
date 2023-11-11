<?php

namespace App\Http\Controllers\Saymanager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Unit;
use App\Models\Item;

class MitemController extends Controller
{
    //kategori
    public function kategori() {
        $auth = auth()->user();
        return view('manager.item.kategori.index', compact(['auth']));
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
        return view('manager.item.index', compact(['auth','kategori','unit']));
    } 
 
    public function load_item() {
        $get_menu = Item::all();
        $output = '';
        if ($get_menu->count() > 0) {
            $output .= '<table id="tait" class="table table-stripped">
            <thead>
              <tr>
                <th></th>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Unit</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($get_menu as $no=>$rs) {
                $output .= '<tr>

                <td>
                  <a href="#" id="' . $rs->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editItModal"><i class="ti-pencil"></i></a>
                  <a href="#" id="' . $rs->id . '" class="text-danger mx-1 deleteIcon"><i class="ti-trash"></i></a>
                </td>
            
                <td>' . $no+1 . '</td>
                <td>'. $rs->id .'</td>
                <td>' . $rs->name . '</td>
                <td>' . $rs->harga . '</td>
                <td>' . $rs->stok . '</td>
                <td>' . $rs->kate->name . '</td>
                <td>' . $rs->uk->name . '</td>
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
            'id' => "KI-" . date("YmdHis"),'name' => $request->name, 'harga' => $request->harga,'kode_kate' => $request->kategori,'kode_uk' => $request->unit, 'img' => $imageName,'stok'=>'0',
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

}
