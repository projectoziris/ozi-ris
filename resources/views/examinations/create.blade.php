@extends('layouts.app')
@section('title', 'Tambah Pemeriksaan')
@section('header', 'Tambah Pemeriksaan')

@section('content')
<form method="POST" action="{{ route('modalities.examinations.store', $modality->id) }}">
    @csrf
    <div class="form-group">
        <label>Nama Pemeriksaan</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Kod Pemeriksaan</label>
        <input type="text" name="code" class="form-control" required>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
