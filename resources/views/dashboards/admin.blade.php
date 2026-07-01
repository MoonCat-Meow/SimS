@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Dashboard Admin</h2>
    
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card card-stat h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Total Personel Satpam</h6>
                    <h2 class="card-title mb-0">124</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-stat bg-success-left h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Laporan Hari Ini</h6>
                    <h2 class="card-title mb-0">45</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-stat bg-warning-left h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Insiden Tertunda</h6>
                    <h2 class="card-title mb-0">3</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-stat bg-danger-left h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Patroli Terlewat</h6>
                    <h2 class="card-title mb-0">1</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="card h-100">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Statistik Laporan Mingguan</h5>
                </div>
                <div class="card-body">
                    <canvas id="laporanChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Status Personel</h5>
                </div>
                <div class="card-body">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Laporan Chart
    const ctxLaporan = document.getElementById('laporanChart').getContext('2d');
    new Chart(ctxLaporan, {
        type: 'line',
        data: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            datasets: [{
                label: 'Jumlah Laporan',
                data: [65, 59, 80, 81, 56, 55, 40],
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        }
    });

    // Status Chart
    const ctxStatus = document.getElementById('statusChart').getContext('2d');
    new Chart(ctxStatus, {
        type: 'doughnut',
        data: {
            labels: ['Hadir', 'Izin', 'Sakit', 'Alpha'],
            datasets: [{
                data: [100, 10, 10, 4],
                backgroundColor: [
                    '#198754',
                    '#ffc107',
                    '#0dcaf0',
                    '#dc3545'
                ]
            }]
        }
    });
</script>
@endpush
