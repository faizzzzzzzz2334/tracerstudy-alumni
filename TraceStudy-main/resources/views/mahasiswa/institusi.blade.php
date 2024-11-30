@extends('layout.layout')
@section('title','Halaman Mahasiswa | Institusi')
@section('content')
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Institusi</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($institusi as $inst)
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 custom-card-bg shadow">
                                <div class="card-body d-flex align-items-center">
                                    <a href="{{ route('mahasiswa.institusi.show', $inst->id) }}" class="d-flex align-items-center">
                                        <img src="{{ asset('dist/assets/images/institusi/' . $inst->logo) }}" alt="{{ $inst->nama }}" style="max-width: 150px; height: auto; object-fit: contain;" class="me-3">
                                        <div class="flex-grow-1">
                                            <h5 class="mb-1">{{ $inst->nama }}</h5>
                                            <p class="mb-1">Alamat: {{ $inst->alamat }}</p>
                                            <p class="mb-1">Email: {{ $inst->email }}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="pagination">
                        {{ $institusi->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection