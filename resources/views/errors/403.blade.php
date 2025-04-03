{{-- resources/views/errors/403.blade.php --}}
@extends('layouts.app')

@section('title', 'Akses Ditolak')
@section('header', '403 – Akses Ditolak')

@section('content')
<div class="alert alert-danger">
    <h4><i class="fas fa-ban"></i> Anda tidak dibenarkan mengakses halaman ini.</h4>
    <p>Sila hubungi pentadbir sistem jika anda memerlukan akses tambahan.</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Kembali ke Dashboard</a>
</div>
@endsection
