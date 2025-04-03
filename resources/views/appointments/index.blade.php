@extends('layouts.app')
@section('title', 'Senarai Janji Temu')
@section('header', 'Janji Temu')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('appointments.create') }}" class="btn btn-primary mb-3">+ Janji Temu Baru</a>

{{-- Form Filter --}}
<form method="GET" class="card card-body mb-3">
    <div class="row">
        <div class="col-md-3">
            <label>Nama Pesakit</label>
            <input type="text" name="nama" class="form-control" value="{{ request('nama') }}">
        </div>

        <div class="col-md-3">
            <label>Modality</label>
            <select name="modality_id" class="form-control">
                <option value="">-- Semua --</option>
                @foreach ($modalities as $modality)
                    <option value="{{ $modality->id }}" {{ request('modality_id') == $modality->id ? 'selected' : '' }}>
                        {{ $modality->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <label>Tarikh</label>
            <input type="date" name="tarikh" class="form-control" value="{{ request('tarikh') }}">
        </div>

        <div class="col-md-2">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="">-- Semua --</option>
                @foreach (['pending', 'confirmed', 'done', 'cancelled'] as $status)
                    <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2 d-flex align-items-end">
            <button class="btn btn-secondary w-100">Tapis</button>
        </div>
    </div>
</form>

{{-- Senarai --}}
<table class="table table-bordered table-sm">
    <thead>
        <tr>
            <th>Pesakit</th>
            <th>Modality</th>
            <th>Tarikh</th>
            <th>Masa</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($appointments as $a)
            <tr>
                <td>{{ $a->pesakit->nama ?? '-' }}</td>
                <td>{{ $a->modality->name ?? '-' }}</td>
                <td>{{ $a->tarikh_temujanji }}</td>
                <td>{{ $a->masa_mula }} - {{ $a->masa_tamat }}</td>
                <td>{{ ucfirst($a->status) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Tiada rekod ditemui.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $appointments->links() }}
@endsection
