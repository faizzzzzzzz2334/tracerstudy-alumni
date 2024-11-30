@extends('layout.layout')
@section('title', 'Detail Lowongan')
@section('content')
<div class="page-content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('mahasiswa.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('mahasiswa.loker') }}">Lowongan</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $loker->nama_perusahaan }}</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $loker->nama_perusahaan }}</h4>
        </div>
        <div class="card-body text-center">
            <img src="{{ asset('dist/assets/images/lowongan/' . $loker->poster) }}" alt="{{ $loker->nama_perusahaan }}" style="max-width: 500px; height: auto; object-fit: contain;" class="mb-3">
            <p>Posisi: {{ $loker->posisi }}</p>
            <p>Persyaratan: {{ $loker->persyaratan }}</p>
            <p>Lokasi: {{ $loker->lokasi }}</p>
            <p>Kontak: {{ $loker->kontak }}</p>
            <p>Deskripsi: {{ $loker->deskripsi }}</p>
        </div>
    </div>
</div>
@endsection 