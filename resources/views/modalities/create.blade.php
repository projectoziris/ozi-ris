@extends('adminlte::page')

@section('title', 'Tambah Modality')

@section('content_header')
    <h1>Tambah Modality</h1>
@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Ralat!</strong> Sila periksa input anda.<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('modalities.store') }}" method="POST">
        @csrf

        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label>Nama Modality</label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: X-Ray" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label>Kod</label>
                    <input type="text" name="code" class="form-control" placeholder="Contoh: XR" value="{{ old('code') }}" required>
                </div>

                <div class="form-group">
                    <label>Penerangan (Opsyenal)</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" selected>Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ route('modalities.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
        </div>
    </form>
@endsection
