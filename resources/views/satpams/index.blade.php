@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Data Satpam</h2>
        <div>
            <a href="{{ route('satpams.trash') }}" class="btn btn-secondary">
                <i class="fas fa-trash me-1"></i> Tong Sampah
            </a>
            <a href="{{ route('satpams.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Tambah Personel
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('satpams.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan NIK atau Nama..." value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    @if(request('search'))
                        <a href="{{ route('satpams.index') }}" class="btn btn-outline-danger">Reset</a>
                    @endif
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Foto</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Pos Jaga</th>
                            <th>Shift</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($satpams as $satpam)
                            <tr>
                                <td>
                                    @if($satpam->foto)
                                        <img src="{{ Storage::url($satpam->foto) }}" alt="Foto" width="50" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">No Foto</span>
                                    @endif
                                </td>
                                <td>{{ $satpam->nik }}</td>
                                <td>{{ $satpam->nama }}</td>
                                <td>{{ $satpam->no_hp }}</td>
                                <td>{{ $satpam->pos_jaga }}</td>
                                <td>{{ $satpam->shift }}</td>
                                <td>
                                    @if($satpam->status == 'Aktif')
                                        <span class="badge bg-success">Aktif</span>
                                    @elseif($satpam->status == 'Cuti')
                                        <span class="badge bg-warning">Cuti</span>
                                    @else
                                        <span class="badge bg-danger">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('satpams.edit', $satpam->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('satpams.destroy', $satpam->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini? (Data masuk ke Tong Sampah)');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Belum ada data Satpam.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                {{ $satpams->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
