<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Article;
use App\Models\Consultation;
use App\Models\Booking;

class MasterDataController extends Controller
{
    /**
     * Dashboard overview.
     */
    public function dashboard()
    {
        return view('dashboard', [
            'totalUsers' => User::count(),
            'totalDoctors' => Doctor::count(),
            'totalArticles' => Article::count(),
            'totalConsultations' => Consultation::count(),
            'totalBookings' => Booking::count(),
        ]);
    }

    /**
     * Display users master data.
     */
    public function users()
    {
        $users = User::orderBy('role')->orderBy('name')->get();
        return view('master.users', compact('users'));
    }

    /**
     * Display doctors master data.
     */
    public function doctors()
    {
        $doctors = Doctor::with('user')->get();
        return view('master.doctors', compact('doctors'));
    }

    /**
     * Display articles master data.
     */
    public function articles()
    {
        $articles = Article::with('user')->latest()->get();
        return view('master.articles', compact('articles'));
    }

    /**
     * Display consultations master data.
     */
    public function consultations()
    {
        $consultations = Consultation::with(['member', 'doctor.user'])->latest()->get();
        return view('master.consultations', compact('consultations'));
    }

    /**
     * Display bookings master data.
     */
    public function bookings()
    {
        $bookings = Booking::with(['member', 'doctor.user'])->latest('booking_date')->get();
        return view('master.bookings', compact('bookings'));
    }
}
