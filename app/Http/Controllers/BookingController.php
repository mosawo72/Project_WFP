<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of bookings.
     */
    public function index()
    {
        $bookings = Booking::with(['member', 'doctor.user'])->latest('booking_date')->paginate(15);
        return view('master.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new booking.
     */
    public function create()
    {
        $members = User::where('role', 'member')->get();
        $doctors = Doctor::with('user')->get();
        return view('master.bookings.create', compact('members', 'doctors'));
    }

    /**
     * Store a newly created booking.
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:doctors,id',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'notes' => 'nullable|string',
        ]);

        Booking::create($request->only([
            'member_id', 'doctor_id', 'booking_date', 'booking_time', 'status', 'notes'
        ]));

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil ditambahkan!');
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        $booking->load(['member', 'doctor.user']);
        return view('master.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified booking.
     */
    public function edit(Booking $booking)
    {
        $members = User::where('role', 'member')->get();
        $doctors = Doctor::with('user')->get();
        return view('master.bookings.edit', compact('booking', 'members', 'doctors'));
    }

    /**
     * Update the specified booking.
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'member_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:doctors,id',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'notes' => 'nullable|string',
        ]);

        $booking->update($request->only([
            'member_id', 'doctor_id', 'booking_date', 'booking_time', 'status', 'notes'
        ]));

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil diperbarui!');
    }

    /**
     * Remove the specified booking.
     */
    public function destroy(Booking $booking)
    {
        $this->authorize('delete-permission', Auth::user());

        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dihapus!');
    }
}
