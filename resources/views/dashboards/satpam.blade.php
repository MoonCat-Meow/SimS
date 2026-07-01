@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Dashboard Satpam</h2>
    
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card card-stat h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Jadwal Hari Ini</h6>
                    <h2 class="card-title mb-0">Shift Pagi (08:00 - 16:00)</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card card-stat bg-success-left h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Tugas Selesai</h6>
                    <h2 class="card-title mb-0">5/8</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
