@extends('layouts.app')

@section('title', 'Senarai Pengguna')
@section('header', 'Pengurusan Pengguna')

@section('content')

<a href="{{ route('users.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah Pengguna
</a>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-bordered table-striped m-0">
            <thead class="thead-dark">
                <tr>
                    <th width="30">#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Peranan</th>
                    <th width="150">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Padam pengguna ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Tiada pengguna direkodkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
