@extends('layout.layout')
@section('title', 'Halaman Dosen | Detail Lowongan')
@section('content')
<div class="page-content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dosen.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dosen.loker') }}">Lowongan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Lowongan</li>
        </ol>
    </nav>
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Lowongan Kerja</h4>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset('dist/assets/images/lowongan/' . $loker->poster) }}" alt="{{ $loker->nama_perusahaan }}" style="max-width: 150px; height: auto; object-fit: contain;" class="mb-3">
                    <h5 class="mb-1">{{ $loker->nama_perusahaan }}</h5>
                    <p class="mb-1">Posisi: {{ $loker->posisi }}</p>
                    <p class="mb-1">Persyaratan: {{ $loker->persyaratan }}</p>
                    <p class="mb-1">Lokasi: {{ $loker->lokasi }}</p>
                    <p class="mb-1">Kontak: {{ $loker->kontak }}</p>
                    <p class="mb-1">Deskripsi: {{ $loker->deskripsi }}</p>
                    <a href="{{ route('loker.edit', $loker->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('dosen.loker') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection 