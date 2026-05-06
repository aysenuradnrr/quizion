<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {

    public function edit() {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request) {
        $request->validate([
            'name'    => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255'],
        ]);

        $request->user()->update($request->only('name', 'surname', 'email'));
        return back()->with('status', 'Profil güncellendi.');
    }

    public function destroy(Request $request) {
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}