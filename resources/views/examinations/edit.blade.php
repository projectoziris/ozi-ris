@extends('adminlte::page')

@section('title', 'Kemaskini Pemeriksaan')

@section('content_header')
    <h1>Kemaskini Pemeriksaan - {{ $examination->modality->name }}</h1>
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

    <form action="{{ route('examinations.update', $examination) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label>Nama Pemeriksaan</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $examination->name) }}" required>
                </div>

                <div class="form-group">
                    <label>Kod</label>
                    <input type="text" name="code" class="form-control" value="{{ old('code', $examination->code) }}" required>
                </div>

                <div class="form-group">
                    <label>Durasi (minit)</label>
                    <input type="number" name="default_duration" class="form-control" value="{{ old('default_duration', $examination->default_duration) }}" min="1">
                </div>

                <div class="form-group">
                    <label>Penerangan</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $examination->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status', $examination->status) == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ old('status', $examination->status) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ route('modalities.examinations.index', $examination->modality_id) }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary float-right">Kemaskini</button>
            </div>
        </div>
    </form>
@endsection
