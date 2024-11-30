@extends('layout.layout')
@section('title', 'Halaman Dosen | Tambah Institusi')
@section('content')
<div class="page-content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dosen.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dosen.institusi') }}">Institusi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data Institusi</li>
        </ol>
    </nav>
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Data Institusi</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('dosen.institusi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Institusi</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo Institusi</label>
                            <input type="file" class="form-control" id="logo" name="logo" accept="image/*" onchange="previewImage(event)">
                            <img id="logoPreview" src="#" alt="Logo Preview" style="display:none; max-width: 150px; margin-top: 10px;">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('dosen.institusi') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function previewImage(event) {
        const logoPreview = document.getElementById('logoPreview');
        logoPreview.src = URL.createObjectURL(event.target.files[0]);
        logoPreview.style.display = 'block';
    }
</script>
@endsection
