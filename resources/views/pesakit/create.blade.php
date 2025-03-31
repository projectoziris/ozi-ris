@extends('adminlte::page')

@section('title', 'Tambah Pesakit')

@section('content_header')
    <h1>Tambah Pesakit</h1>
@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Ralat!</strong> Sila periksa input anda.
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pesakit.store') }}" method="POST">
        @csrf

        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label>Nama Penuh</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>

                <div class="form-group">
                    <label>No. IC / Passport</label>
                    <input type="text" name="ic" class="form-control" value="{{ old('ic') }}" required>
                </div>

                <div class="form-group">
                    <label>Jantina</label>
                    <select name="jantina" class="form-control" required>
                        <option value="">-- Pilih Jantina --</option>
                        <option value="Lelaki" {{ old('jantina') == 'Lelaki' ? 'selected' : '' }}>Lelaki</option>
                        <option value="Perempuan" {{ old('jantina') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tarikh Lahir</label>
                    <input type="date" name="tarikh_lahir" class="form-control" value="{{ old('tarikh_lahir') }}">
                </div>

                <div class="form-group">
                    <label>No. Telefon</label>
                    <input type="text" name="telefon" class="form-control" value="{{ old('telefon') }}">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2">{{ old('alamat') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Status Penjawat Awam</label><br>
                    <input type="checkbox" name="gov_officer" value="1" {{ old('gov_officer') ? 'checked' : '' }}>
                    <label> Ya </label>
                </div>

                <div class="form-group">
                    <label>Etnik</label>
                    <input type="text" name="etnik" class="form-control" value="{{ old('etnik') }}">
                </div>

                <div class="form-group">
                    <label>Kewarganegaraan</label>
                    <input type="text" name="citizenship" class="form-control" value="{{ old('citizenship') }}">
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ route('pesakit.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
        </div>
    </form>
@endsection
