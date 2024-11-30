@extends('layout.layout')
@section('title', 'Halaman Mahasiswa | Lowongan')
@section('content')
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Lowongan Kerja</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('mahasiswa.loker') }}" method="get" class="d-flex mb-3">
                        <input type="text" name="search" class="form-control mx-2" placeholder="Cari Lowongan...">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach ($lowongan as $loker)
                <div class="col-12 mb-4">
                    <div class="card h-100 custom-card-bg shadow">
                        <div class="card-body d-flex align-items-center">
                            <a href="{{ route('mahasiswa.loker.show', $loker->id) }}" class="flex-grow-1 text-decoration-none d-flex align-items-center">
                                <img src="{{ asset('dist/assets/images/lowongan/' . $loker->poster) }}" alt="{{ $loker->nama_perusahaan }}" style="max-width: 150px; height: auto; object-fit: contain;" class="me-3">
                                <div>
                                    <h5 class="mb-1">{{ $loker->nama_perusahaan }}</h5>
                                    <p class="mb-1">Posisi: {{ $loker->posisi }}</p>
                                    <p class="mb-1">Persyaratan: {{ $loker->persyaratan }}</p>
                                    <p class="mb-1">Lokasi: {{ $loker->lokasi }}</p>
                                    <p class="mb-1">Kontak: {{ $loker->kontak }}</p>
                                    <p class="mb-1">Deskripsi: {{ $loker->deskripsi }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pagination">
                {{ $lowongan->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
</div>
@endsection