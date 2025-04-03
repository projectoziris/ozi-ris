@extends('layouts.app')
@section('title', 'Senarai Pemeriksaan')
@section('header', 'Senarai Pemeriksaan - ' . $modality->name)

@section('content')
<a href="{{ route('modalities.examinations.create', $modality->id) }}" class="btn btn-primary mb-3">
    + Tambah Pemeriksaan
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Kod</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($examinations as $e)
        <tr>
            <td>{{ $e->name }}</td>
            <td>{{ $e->code }}</td>
            <td>
                <a href="{{ route('examinations.edit', $e->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('examinations.destroy', $e->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Padam pemeriksaan?')">Padam</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
