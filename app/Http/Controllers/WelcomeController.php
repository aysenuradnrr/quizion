<?php
namespace App\Http\Controllers;

use App\Models\Review;

class WelcomeController extends Controller
{
    public function index()
    {
        $reviews = Review::where('approved', true)
                         ->latest()
                         ->get();
        return view('welcome', compact('reviews'));
    }
}