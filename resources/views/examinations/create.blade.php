@extends('adminlte::page')

@section('title', 'Tambah Pemeriksaan')

@section('content_header')
    <h1>Tambah Pemeriksaan - {{ $modality->name }}</h1>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ralat!</strong> Sila periksa input anda.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('modalities.examinations.store', $modality) }}" method="POST">
        @csrf

        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label>Nama Pemeriksaan</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label>Kod</label>
                    <input type="text" name="code" class="form-control" value="{{ old('code') }}" required>
                </div>

                <div class="form-group">
                    <label>Durasi (minit)</label>
                    <input type="number" name="default_duration" class="form-control" value="{{ old('default_duration', 30) }}" min="1">
                </div>

                <div class="form-group">
                    <label>Penerangan</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ route('modalities.examinations.index', $modality) }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
        </div>
    </form>
@endsection
