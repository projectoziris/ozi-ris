@extends('layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard RIS')

@section('content')
@role('admin')
<p>Anda login sebagai: {{ auth()->user()->name }}</p>
<p>Email: {{ auth()->user()->email }}</p>
<p>Role: {{ auth()->user()->getRoleNames()->join(', ') }}</p>
@endrole

    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $pesakitCount }}</h3>
                    <p>Jumlah Pesakit</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $modalityCount }}</h3>
                    <p>Modality Aktif</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cubes"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $examinationCount }}</h3>
                    <p>Jenis Pemeriksaan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-medical-alt"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $todayAppointmentCount }}</h3>
                    <p>Temujanji Hari Ini</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart Section --}}
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Statistik Status Janji Temu</h3>
                </div>
                <div class="card-body">
                    <canvas id="statusChart" width="100%" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        const ctx = document.getElementById('statusChart').getContext('2d');
        const statusChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Pending', 'Confirmed', 'Done', 'Cancelled'],
                datasets: [{
                    label: 'Status Janji Temu',
                    data: [
                        {{ $statusCounts['pending'] ?? 0 }},
                        {{ $statusCounts['confirmed'] ?? 0 }},
                        {{ $statusCounts['done'] ?? 0 }},
                        {{ $statusCounts['cancelled'] ?? 0 }}
                    ],
                    backgroundColor: ['#ffc107', '#007bff', '#28a745', '#6c757d'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
@endpush
