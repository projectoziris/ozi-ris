@extends('layouts.app')
@section('title', 'Tambah Pengguna')
@section('header', 'Tambah Pengguna Baru')

@section('content')
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Katalaluan</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Sahkan Katalaluan</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Peranan</label>
        <select name="role" class="form-control" required>
            @foreach($roles as $role)
                <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
