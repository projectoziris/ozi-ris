@extends('adminlte::page')

@section('title', 'Modality Management')

@section('content_header')
    <h1 class="m-0 text-dark">Senarai Modaliti</h1>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Modality List</h3>
            <a href="{{ route('modalities.create') }}" class="btn btn-primary btn-sm">+ Tambah Modality</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Kod</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($modalities as $modality)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $modality->name }}</td>
                            <td>{{ $modality->code }}</td>
                            <td>
                                @if($modality->status)
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-secondary">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('modalities.edit', $modality) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('modalities.examinations.index', $modality) }}" class="btn btn-info btn-sm">Pemeriksaan</a>
                                <form action="{{ route('modalities.destroy', $modality) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Padam modality ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Padam</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">Tiada modality ditemui.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
