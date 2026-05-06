<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller {

    public function create() {
        return view('welcome');
    }

    public function store(Request $request) {
        $rules = [
            'name'     => ['required', 'string', 'max:255'],
            'surname'  => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', Rules\Password::defaults()],
            'role'     => ['required', 'in:ogrenci,ogretmen'],
        ];

        if ($request->role === 'ogrenci') {
            $rules['grade'] = ['required', 'string'];
        } else {
            $rules['branch'] = ['required', 'string'];
        }

        $validated = $request->validate($rules);

        $user = User::create([
            'name'     => $validated['name'],
            'surname'  => $validated['surname'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => $validated['role'],
            'grade'    => $validated['grade'] ?? null,
            'branch'   => $validated['branch'] ?? null,
        ]);

        event(new Registered($user));
        Auth::login($user);

        if ($user->isOgrenci()) {
            return redirect()->route('ogrenci.dashboard');
        }
        return redirect()->route('ogretmen.dashboard');
    }
}