<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OgretmenController extends Controller {

    public function dashboard() {
        $user = Auth::user();
        return view('ogretmen', compact('user'));
    }
}