<?php

namespace App\Http\Controllers\Sayhai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function cek() {
        if (auth()->user()->role_id === 1) {
            return redirect('/manager');
        }if (auth()->user()->role_id === 2) {
            return redirect('/kasirr');
        } else {
            return redirect('/');
        }
    }
}
