<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    /**
     * Display a listing of consultations.
     */
    public function index()
    {
        $consultations = Consultation::with(['member', 'doctor.user'])->latest()->paginate(15);
        return view('master.consultations.index', compact('consultations'));
    }

    /**
     * Show the form for creating a new consultation.
     */
    public function create()
    {
        $members = User::where('role', 'member')->get();
        $doctors = Doctor::with('user')->get();
        return view('master.consultations.create', compact('members', 'doctors'));
    }

    /**
     * Store a newly created consultation.
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:doctors,id',
            'subject' => 'required|string|max:255',
            'status' => 'required|in:pending,active,completed,cancelled',
            'scheduled_at' => 'nullable|date',
        ]);

        Consultation::create($request->only([
            'member_id', 'doctor_id', 'subject', 'status', 'scheduled_at'
        ]));

        return redirect()->route('consultations.index')->with('success', 'Konsultasi berhasil ditambahkan!');
    }

    /**
     * Display the specified consultation.
     */
    public function show(Consultation $consultation)
    {
        $consultation->load(['member', 'doctor.user', 'messages.sender']);
        return view('master.consultations.show', compact('consultation'));
    }

    /**
     * Show the form for editing the specified consultation.
     */
    public function edit(Consultation $consultation)
    {
        $members = User::where('role', 'member')->get();
        $doctors = Doctor::with('user')->get();
        return view('master.consultations.edit', compact('consultation', 'members', 'doctors'));
    }

    /**
     * Update the specified consultation.
     */
    public function update(Request $request, Consultation $consultation)
    {
        $request->validate([
            'member_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:doctors,id',
            'subject' => 'required|string|max:255',
            'status' => 'required|in:pending,active,completed,cancelled',
            'scheduled_at' => 'nullable|date',
        ]);

        $consultation->update($request->only([
            'member_id', 'doctor_id', 'subject', 'status', 'scheduled_at'
        ]));

        return redirect()->route('consultations.index')->with('success', 'Konsultasi berhasil diperbarui!');
    }

    /**
     * Remove the specified consultation.
     */
    public function destroy(Consultation $consultation)
    {
        $this->authorize('delete-permission', Auth::user());

        $consultation->delete();
        return redirect()->route('consultations.index')->with('success', 'Konsultasi berhasil dihapus!');
    }
}
