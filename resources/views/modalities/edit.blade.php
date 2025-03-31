@extends('adminlte::page')

@section('title', 'Kemaskini Modality')

@section('content_header')
    <h1>Kemaskini Modality</h1>
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

    <form action="{{ route('modalities.update', $modality) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label>Nama Modality</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $modality->name) }}" required>
                </div>

                <div class="form-group">
                    <label>Kod</label>
                    <input type="text" name="code" class="form-control" value="{{ old('code', $modality->code) }}" required>
                </div>

                <div class="form-group">
                    <label>Penerangan</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $modality->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status', $modality->status) == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ old('status', $modality->status) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ route('modalities.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary float-right">Kemaskini</button>
            </div>
        </div>
    </form>
@endsection
