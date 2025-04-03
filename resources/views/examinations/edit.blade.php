@extends('layouts.app')
@section('title', 'Kemaskini Pemeriksaan')
@section('header', 'Kemaskini Pemeriksaan')

@section('content')
<form method="POST" action="{{ route('examinations.update', $examination->id) }}">
    @csrf @method('PUT')
    <div class="form-group">
        <label>Nama Pemeriksaan</label>
        <input type="text" name="name" class="form-control" value="{{ $examination->name }}" required>
    </div>

    <div class="form-group">
        <label>Kod Pemeriksaan</label>
        <input type="text" name="code" class="form-control" value="{{ $examination->code }}" required>
    </div>

    <button class="btn btn-primary">Kemaskini</button>
</form>
@endsection
