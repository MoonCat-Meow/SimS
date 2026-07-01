@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Dashboard Management</h2>
    
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card card-stat h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Efisiensi Operasional</h6>
                    <h2 class="card-title mb-0">92%</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-stat bg-success-left h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Kepuasan Layanan</h6>
                    <h2 class="card-title mb-0">4.8/5</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Tinjauan Kinerja Tahunan</h5>
                </div>
                <div class="card-body">
                    <canvas id="kinerjaChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const ctxKinerja = document.getElementById('kinerjaChart').getContext('2d');
    new Chart(ctxKinerja, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'Kinerja Satpam',
                data: [85, 90, 88, 92, 95, 96],
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgb(54, 162, 235)',
                borderWidth: 1
            }]
        }
    });
</script>
@endpush
