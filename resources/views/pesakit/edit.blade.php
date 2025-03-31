@extends('adminlte::page')

@section('title', 'Kemaskini Pesakit')

@section('content_header')
    <h1>Kemaskini Pesakit - {{ $pesakit->nama }}</h1>
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

    <form action="{{ route('pesakit.update', $pesakit) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label>Nama Penuh</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $pesakit->nama) }}" required>
                </div>

                <div class="form-group">
                    <label>No. IC / Passport</label>
                    <input type="text" name="ic" class="form-control" value="{{ old('ic', $pesakit->ic) }}" required>
                </div>

                <div class="form-group">
                    <label>Jantina</label>
                    <select name="jantina" class="form-control" required>
                        <option value="Lelaki" {{ old('jantina', $pesakit->jantina) == 'Lelaki' ? 'selected' : '' }}>Lelaki</option>
                        <option value="Perempuan" {{ old('jantina', $pesakit->jantina) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tarikh Lahir</label>
                    <input type="date" name="tarikh_lahir" class="form-control" value="{{ old('tarikh_lahir', $pesakit->tarikh_lahir) }}">
                </div>

                <div class="form-group">
                    <label>No. Telefon</label>
                    <input type="text" name="telefon" class="form-control" value="{{ old('telefon', $pesakit->telefon) }}">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2">{{ old('alamat', $pesakit->alamat) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Status Penjawat Awam</label><br>
                    <input type="checkbox" name="gov_officer" value="1" {{ old('gov_officer', $pesakit->gov_officer) ? 'checked' : '' }}>
                    <label> Ya </label>
                </div>

                <div class="form-group">
                    <label>Etnik</label>
                    <input type="text" name="etnik" class="form-control" value="{{ old('etnik', $pesakit->etnik) }}">
                </div>

                <div class="form-group">
                    <label>Kewarganegaraan</label>
                    <input type="text" name="citizenship" class="form-control" value="{{ old('citizenship', $pesakit->citizenship) }}">
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ route('pesakit.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary float-right">Kemaskini</button>
            </div>
        </div>
    </form>
@endsection
