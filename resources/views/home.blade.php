@extends('adminlte::page')

@section('title', 'Laman Utama')

@section('content_header')
    <h1>Selamat Datang ke Radiology Information System</h1>
@endsection

@section('content')
    <div class="row">

        {{-- Modality --}}
        <div class="col-md-4">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>Modality</h3>
                    <p>Urus jenis modality radiologi</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cubes"></i>
                </div>
                <a href="{{ route('modalities.index') }}" class="small-box-footer">
                    Teruskan <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Pesakit --}}
        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>Pesakit</h3>
                    <p>Rekod dan pengurusan pesakit</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('pesakit.index') }}" class="small-box-footer">
                    Teruskan <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Pemeriksaan (direct ke modality 1 buat masa ni) --}}
        <div class="col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Pemeriksaan</h3>
                    <p>Jenis pemeriksaan ikut modality</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-medical"></i>
                </div>
                <a href="{{ route('modalities.examinations.index', 1) }}" class="small-box-footer">
                    Teruskan <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>
@endsection
