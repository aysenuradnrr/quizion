<?php
namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use App\Models\Question;
use App\Models\OnlineExam;
use App\Models\TestResult;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'users'     => User::count(),
            'students'  => User::where('role','ogrenci')->count(),
            'teachers'  => User::where('role','ogretmen')->count(),
            'questions' => Question::count(),
            'exams'     => OnlineExam::count(),
            'results'   => TestResult::count(),
            'reviews'   => Review::count(),
        ];

        $users   = User::latest()->get();
        $reviews = Review::latest()->get();
        $exams   = OnlineExam::with('teacher')->latest()->get();

        return view('admin.index', compact('stats','users','reviews','exams'));
    }

    public function deleteReview($id)
    {
        Review::findOrFail($id)->delete();
        return back()->with('success', 'Yorum silindi.');
    }

    public function toggleReview($id)
    {
        $review = Review::findOrFail($id);
        $review->approved = !$review->approved;
        $review->save();
        return back()->with('success', $review->approved ? 'Yorum yayinlandi.' : 'Yorum gizlendi.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        if ($user->is_admin) {
            return back()->with('error', 'Admin kullanici silinemez.');
        }
        $user->delete();
        return back()->with('success', 'Kullanici silindi.');
    }

    public function toggleAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->is_admin = !$user->is_admin;
        $user->save();
        return back()->with('success', $user->is_admin ? 'Admin yetkisi verildi.' : 'Admin yetkisi kaldirildi.');
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate(['role' => 'required|in:ogrenci,ogretmen']);
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();
        return back()->with('success', 'Rol guncellendi.');
    }

    public function deleteExam($id)
    {
        OnlineExam::findOrFail($id)->delete();
        return back()->with('success', 'Sinav silindi.');
    }
}