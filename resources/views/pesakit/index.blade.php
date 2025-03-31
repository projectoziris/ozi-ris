@extends('adminlte::page')

@section('title', 'Senarai Pesakit')

@section('content_header')
    <h1>Senarai Pesakit</h1>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('pesakit.create') }}" class="btn btn-primary">+ Tambah Pesakit</a>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>IC</th>
                        <th>Jantina</th>
                        <th>Tarikh Lahir</th>
                        <th>Penjawat Awam</th>
                        <th>Kewarganegaraan</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesakits as $pesakit)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pesakit->nama }}</td>
                            <td>{{ $pesakit->ic }}</td>
                            <td>{{ $pesakit->jantina }}</td>
                            <td>{{ $pesakit->tarikh_lahir ?? '-' }}</td>
                            <td>
                                @if($pesakit->gov_officer)
                                    <span class="badge badge-success">Ya</span>
                                @else
                                    <span class="badge badge-secondary">Tidak</span>
                                @endif
                            </td>
                            <td>{{ $pesakit->citizenship ?? '-' }}</td>
                            <td>
                                <a href="{{ route('pesakit.edit', $pesakit) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pesakit.destroy', $pesakit) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Padam pesakit ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Padam</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="text-center">Tiada pesakit ditemui.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
