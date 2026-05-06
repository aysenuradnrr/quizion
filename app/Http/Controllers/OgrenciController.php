<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OgrenciController extends Controller {

    public function dashboard() {
        $user = Auth::user();
        return view('ogrenci', compact('user'));
    }
}