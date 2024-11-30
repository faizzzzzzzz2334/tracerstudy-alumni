@extends('layout.layout')
@section('title','Halaman Dosen | Alumni')
@section('content')
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Alumni</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <form action="{{ route('dosen.alumni') }}" method="get" class="d-flex mb-2">
                            @csrf
                            <input type="text" name="search" class="form-control mx-2" placeholder="Cari Alumni...">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </form>
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>NAMA</th>
                                    <th>NIM</th>
                                    <th>PRODI</th>
                                    <th>ANGKATAN</th>
                                    <th>STATUS</th>
                                    <th>INSTITUSI</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alumni as $alumni)
                                    <tr style="cursor: pointer;">
                                        <td onclick="window.location='{{ route('dosen.alumni.show', $alumni->id) }}'">{{ $alumni->nama }}</td>
                                        <td>{{ $alumni->nim }}</td>
                                        <td>{{ $alumni->prodi }}</td>
                                        <td>{{ $alumni->angkatan }}</td>
                                        <td>
                                            @if ($alumni->status == 'bekerja')
                                                <span class="badge bg-success">Bekerja</span>
                                            @else
                                                <span class="badge bg-danger">Tidak bekerja</span>
                                            @endif
                                        </td>
                                        <td>{{ $alumni->institusi }}</td>
                                        <td>
                                            <button class="btn btn-danger" onclick="confirmDelete({{ $alumni->id }})">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">
                                @php 
                                    use App\Models\User;
                                    $alumni = User::query();
                                    $alumni = $alumni->paginate(5);
                                @endphp
                            {{ $alumni->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                <div class="card-header-action text-end" style="margin: 1rem;">
                    <a href="{{ route('dosen.alumni.create') }}" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i> Tambah Alumni
                    </a>
                </div>
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
        fetch(`/dosen/alumni/${deleteId}`, {
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