@extends('layout.layout')
@section('title', 'Detail Institusi')
@section('content')
<div class="page-content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('mahasiswa.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('mahasiswa.institusi') }}">Institusi</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $institusi->nama }}</li>
        </ol>
    </nav>
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $institusi->nama }}</h4>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset('dist/assets/images/institusi/' . $institusi->logo) }}" alt="{{ $institusi->nama }}" style="max-width: 150px; height: auto; object-fit: contain;" class="mb-3">
                    <p class="mb-1">Alamat: {{ $institusi->alamat }}</p>
                    <p class="mb-1">Email: {{ $institusi->email }}</p>
                    <a href="{{ route('mahasiswa.institusi') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection 