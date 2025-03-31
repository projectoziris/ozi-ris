@extends('adminlte::page')

@section('title', 'Senarai Pemeriksaan')

@section('content_header')
    <h1>Senarai Pemeriksaan - {{ $modality->name }}</h1>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('modalities.examinations.create', $modality) }}" class="btn btn-primary">
            + Tambah Pemeriksaan
        </a>
        <a href="{{ route('modalities.index') }}" class="btn btn-secondary float-right">
            Kembali ke Modality
        </a>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pemeriksaan</th>
                        <th>Kod</th>
                        <th>Durasi (min)</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($examinations as $exam)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $exam->name }}</td>
                            <td>{{ $exam->code }}</td>
                            <td>{{ $exam->default_duration }}</td>
                            <td>
                                @if($exam->status)
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-secondary">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('examinations.edit', $exam) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('examinations.destroy', $exam) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Padam pemeriksaan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Padam</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">Tiada pemeriksaan ditemui.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
