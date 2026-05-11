<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller {

    public function create() {
        return view('welcome');
    }

    public function store(Request $request) {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => 'E-posta veya sifre hatali.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // Admin ise admin paneline
        if ($user->is_admin) {
            return redirect()->route('admin.index');
        }

        // Ogrenci ise ogrenci paneline
        if ($user->isOgrenci()) {
            return redirect()->intended(route('ogrenci.dashboard'));
        }

        // Ogretmen ise ogretmen paneline
        return redirect()->intended(route('ogretmen.dashboard'));
    }

    public function destroy(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}