@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Dashboard Koordinator</h2>
    
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card card-stat h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Regu Aktif</h6>
                    <h2 class="card-title mb-0">8</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card card-stat bg-warning-left h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Jadwal Kosong</h6>
                    <h2 class="card-title mb-0">2</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card card-stat bg-success-left h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">CCTV Online</h6>
                    <h2 class="card-title mb-0">48/50</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Distribusi Regu</h5>
                </div>
                <div class="card-body">
                    <canvas id="reguChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const ctxRegu = document.getElementById('reguChart').getContext('2d');
    new Chart(ctxRegu, {
        type: 'pie',
        data: {
            labels: ['Gedung A', 'Gedung B', 'Parkir', 'Gerbang Utama'],
            datasets: [{
                data: [30, 25, 20, 25],
                backgroundColor: [
                    '#0d6efd',
                    '#198754',
                    '#ffc107',
                    '#dc3545'
                ]
            }]
        }
    });
</script>
@endpush
