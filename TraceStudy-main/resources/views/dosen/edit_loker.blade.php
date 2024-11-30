@extends('layout.layout')
@section('title', 'Halaman Dosen | Edit Lowongan')
@section('content')
<div class="page-content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dosen.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dosen.loker') }}">Lowongan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Lowongan</li>
        </ol>
    </nav>
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Lowongan Kerja</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('loker.update', $loker->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ $loker->nama_perusahaan }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="posisi" class="form-label">Posisi</label>
                            <input type="text" class="form-control" id="posisi" name="posisi" value="{{ $loker->posisi }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="persyaratan" class="form-label">Persyaratan</label>
                            <textarea class="form-control" id="persyaratan" name="persyaratan" required>{{ $loker->persyaratan }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $loker->lokasi }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="kontak" class="form-label">Kontak</label>
                            <input type="text" class="form-control" id="kontak" name="kontak" value="{{ $loker->kontak }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $loker->deskripsi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="poster" class="form-label">Poster</label>
                            <input type="file" class="form-control" id="poster" name="poster" accept="image/*">
                            <img src="{{ asset('dist/assets/images/lowongan/' . $loker->poster) }}" alt="Poster Preview" style="max-width: 150px; margin-top: 10px;">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('dosen.loker') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection 