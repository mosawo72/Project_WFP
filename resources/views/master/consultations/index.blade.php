@extends('layouts.app')

@section('title', 'Data Konsultasi - VitaGuard')
@section('page-title', 'Master Data Konsultasi')

@section('content')
<div class="page-header d-flex justify-content-between align-items-start">
    <div>
        <h4><i class="fas fa-comments me-2" style="color: #06b6d4;"></i>Data Konsultasi</h4>
        <p>Daftar konsultasi online di VitaGuard</p>
    </div>
    <a href="{{ route('consultations.create') }}" class="btn btn-primary" style="background: linear-gradient(135deg, #06b6d4, #0891b2); border: none; border-radius: 8px;">
        <i class="fas fa-plus me-1"></i> Tambah Konsultasi
    </a>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6><i class="fas fa-table me-2"></i>Tabel Konsultasi</h6>
        <span class="badge bg-primary rounded-pill">{{ $consultations->count() }} data</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table" id="consultations-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Member</th>
                        <th>Dokter</th>
                        <th>Subjek</th>
                        <th>Status</th>
                        <th>Jadwal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consultations as $index => $consultation)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $consultation->member->name }}</td>
                        <td>
                            <strong>{{ $consultation->doctor->user->name }}</strong>
                            <br><small class="text-muted">{{ $consultation->doctor->specialization }}</small>
                        </td>
                        <td>{{ Str::limit($consultation->subject, 30) }}</td>
                        <td><span class="badge-status badge-{{ $consultation->status }}">{{ ucfirst($consultation->status) }}</span></td>
                        <td>
                            @if($consultation->scheduled_at)
                                {{ $consultation->scheduled_at->format('d M Y') }}
                                <br><small class="text-muted">{{ $consultation->scheduled_at->format('H:i') }} WIB</small>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('consultations.show', $consultation) }}" class="btn btn-sm btn-outline-info" title="Detail"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('consultations.edit', $consultation) }}" class="btn btn-sm btn-outline-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('consultations.destroy', $consultation) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus konsultasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
