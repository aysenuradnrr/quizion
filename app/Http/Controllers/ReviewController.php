<?php
namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'message' => ['required', 'string', 'min:5', 'max:500'],
            'star'    => ['required', 'integer', 'min:1', 'max:5'],
            'role'    => ['nullable', 'string', 'max:50'],
        ]);

        Review::create([
            'name'     => $request->name,
            'role'     => $request->role ?? 'Kullanıcı',
            'message'  => $request->message,
            'star'     => $request->star,
            'approved' => true,
        ]);

        return back()->with('review_success', true);
    }
}