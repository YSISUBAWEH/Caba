<?php

namespace App\Http\Controllers\Saymanager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MuserController extends Controller
{
    //kategori
    public function user() {
        $auth = auth()->user();
        return view('manager.users.tabelU', compact(['auth']));
    } 
 
    public function load_user() {
        $get_menu = User::all();
        $output = '';
        if ($get_menu->count() > 0) {
            $output .= '<table id="taus" class="table table-stripped">
            <thead>
              <tr>
                <th>No</th>
                <th>foto/th>
                <th>Nama</th>
                <th>Username</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($get_menu as $no=>$rs) {
                $output .= '<tr>
                <td>' . $no+1 . '</td>
                <td>'. $rs->foto .'</td>
                <td>' . $rs->name . '</td>s
                <td>' . $rs->username . '</td>
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
 
    public function create_user(Request $request) {

        $path = public_path('arsip/data/img/user/');
        !is_dir($path) &&
            mkdir($path, 0777, true);

        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move($path, $imageName);

        $kameData = [
			'name' => $request->name, 'username' => $request->username,'password' => $request->password, 'foto' => $imageName
        ];
        User::create($kameData);
      return response()->json([
            'status' => 200,
        ]);
    }
 
    public function edit_user(Request $request) {
        $id = $request->id;
        $me = User::find($id);
        return response()->json($me);
    }
 
    public function update_user(Request $request) {
        $imageName='';
        $me = User::find($request->me_id);
        if ($request->hasFile('foto')) {
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

        $meData = ['name' => $request->name, 'username' => $request->username,'password' => $request->password, 'foto' => $imageName];
 
        $me->update($meData);
        return response()->json([
            'status' => 200,
        ]);
    }
 
    public function delete_user(Request $request) {
        $id = $request->id;
        $me = User::find($id);
            User::destroy($id);
    }
    //end-of-kategori
}
