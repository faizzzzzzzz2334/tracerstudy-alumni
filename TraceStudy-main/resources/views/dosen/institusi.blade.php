@extends('layout.layout')
@section('title','Halaman Dosen | Institusi')
@section('content')
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Institusi</h4>
                    <div class="card-header-action">
                        <a href="{{ route('dosen.institusi.create') }}" class="btn btn-success">
                            <i class="bi bi-plus-circle"></i> Tambah Institusi
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('dosen.institusi') }}" method="get" class="d-flex mb-3">
                        <input type="text" name="search" class="form-control mx-2" placeholder="Cari Institusi...">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach ($institusi as $inst)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 custom-card-bg shadow">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <a href="{{ route('dosen.institusi.show', $inst->id) }}" class="d-flex align-items-center">
                                <img src="{{ asset('dist/assets/images/institusi/' . $inst->logo) }}" alt="{{ $inst->nama }}" style="max-width: 150px; height: auto; object-fit: contain;" class="me-3">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">{{ $inst->nama }}</h5>
                                    <p class="mb-1">Alamat: {{ $inst->alamat }}</p>
                                    <p class="mb-1">Email: {{ $inst->email }}</p>
                                </div>
                            </a>
                            <button class="btn btn-danger" onclick="confirmDelete({{ $inst->id }})">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pagination">
                {{ $institusi->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
    let deleteId;

    function confirmDelete(id) {
        deleteId = id;
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }

    document.getElementById('confirmDeleteButton').addEventListener('click', function() {
        fetch(`/dosen/institusi/${deleteId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (response.ok) {
                location.reload(); // Reload halaman setelah penghapusan
            } else {
                alert('Gagal menghapus data.');
            }
        });
    });
</script>
@endsection