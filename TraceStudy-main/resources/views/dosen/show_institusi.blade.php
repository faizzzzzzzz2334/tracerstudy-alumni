@extends('layout.layout')
@section('title', 'Halaman Dosen | Detail Institusi')
@section('content')
<div class="page-content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dosen.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dosen.institusi') }}">Institusi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Institusi</li>
        </ol>
    </nav>
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Institusi</h4>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset('dist/assets/images/institusi/' . $institusi->logo) }}" alt="{{ $institusi->nama }}" style="max-width: 150px; height: auto; object-fit: contain;" class="mb-3">
                    <h5 class="mb-1">{{ $institusi->nama }}</h5>
                    <p class="mb-1">Alamat: {{ $institusi->alamat }}</p>
                    <p class="mb-1">Email: {{ $institusi->email }}</p>
                    <a href="{{ route('dosen.institusi.edit', $institusi->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('dosen.institusi') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection 