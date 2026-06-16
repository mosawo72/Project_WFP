<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of doctors.
     */
    public function index()
    {
        $doctors = Doctor::with('user')->paginate(15);
        return view('master.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new doctor.
     */
    public function create()
    {
        $dokterUsers = User::where('role', 'dokter')
            ->whereDoesntHave('doctor')
            ->get();
        return view('master.doctors.create', compact('dokterUsers'));
    }

    /**
     * Store a newly created doctor.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:doctors,user_id',
            'specialization' => 'required|string|max:255',
            'experience_years' => 'required|integer|min:0',
            'bio' => 'nullable|string',
            'schedule' => 'nullable|string',
        ]);

        Doctor::create($request->only([
            'user_id', 'specialization', 'experience_years', 'bio', 'schedule'
        ]));

        return redirect()->route('doctors.index')->with('success', 'Profil dokter berhasil ditambahkan!');
    }

    /**
     * Display the specified doctor.
     */
    public function show(Doctor $doctor)
    {
        $doctor->load('user', 'consultations.member', 'bookings.member');
        return view('master.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified doctor.
     */
    public function edit(Doctor $doctor)
    {
        $doctor->load('user');
        return view('master.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified doctor.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'specialization' => 'required|string|max:255',
            'experience_years' => 'required|integer|min:0',
            'bio' => 'nullable|string',
            'schedule' => 'nullable|string',
        ]);

        $doctor->update($request->only([
            'specialization', 'experience_years', 'bio', 'schedule'
        ]));

        return redirect()->route('doctors.index')->with('success', 'Profil dokter berhasil diperbarui!');
    }

    /**
     * Remove the specified doctor.
     */
    public function destroy(Doctor $doctor)
    {
        $this->authorize('delete-permission', Auth::user());

        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Profil dokter berhasil dihapus!');
    }
}
