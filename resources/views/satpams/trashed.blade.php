@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Tong Sampah (Data Satpam)</h2>
        <a href="{{ route('satpams.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Data Aktif
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Pos Jaga</th>
                            <th>Waktu Dihapus</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($satpams as $satpam)
                            <tr>
                                <td>{{ $satpam->nik }}</td>
                                <td>{{ $satpam->nama }}</td>
                                <td>{{ $satpam->no_hp }}</td>
                                <td>{{ $satpam->pos_jaga }}</td>
                                <td>{{ $satpam->deleted_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('satpams.restore', $satpam->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin memulihkan (restore) data ini?');">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-trash-restore me-1"></i> Restore
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Tong sampah kosong.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                {{ $satpams->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
