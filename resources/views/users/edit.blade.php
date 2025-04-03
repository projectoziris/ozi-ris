@extends('layouts.app')
@section('title', 'Edit Pengguna')
@section('header', 'Kemaskini Pengguna')

@section('content')
<form method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf @method('PUT')

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Role</label>
        <select name="role" class="form-control" required>
            @foreach($roles as $role)
                <option value="{{ $role }}" {{ $user->hasRole($role) ? 'selected' : '' }}>
                    {{ ucfirst($role) }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Kemaskini</button>
</form>
@endsection
@extends('layouts.app')
@section('title', 'Kemaskini Pengguna')
@section('header', 'Kemaskini Pengguna')

@section('content')
<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
    </div>

    <div class="form-group">
        <label>Katalaluan <small>(biarkan kosong jika tidak tukar)</small></label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label>Sahkan Katalaluan</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <div class="form-group">
        <label>Peranan</label>
        <select name="role" class="form-control" required>
            @foreach($roles as $role)
                <option value="{{ $role->name }}" {{ $userRole == $role->name ? 'selected' : '' }}>
                    {{ ucfirst($role->name) }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Kemaskini</button>
</form>
@endsection
