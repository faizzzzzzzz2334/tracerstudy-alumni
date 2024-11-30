@extends('layout.layout')
@section('title','Halaman Mahasiswa')
@section('content')
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row" style="display:flex; justify-content: space-evenly">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Alumni</h6>
                                    <h6 class="font-extrabold mb-0">{{ $totalAlumni }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="bi bi-building"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Institusi</h6>
                                    <h6 class="font-extrabold mb-0">{{ $totalInstitusi }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="bi bi-briefcase-fill"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Lowongan</h6>
                                    <h6 class="font-extrabold mb-0">{{ $totalLoker }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="background-color: none;">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lowongan Kerja</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($loker as $item)
                                <div class="col-12 mb-4">
                                    <div class="card h-100 custom-card-bg shadow">
                                        <div class="card-body d-flex align-items-center">
                                            <a href="{{ route('mahasiswa.loker') }}" class="flex-grow-1 text-decoration-none d-flex align-items-center">
                                                <img src="{{ asset('dist/assets/images/lowongan/' . $item->poster) }}" alt="{{ $item->nama_perusahaan }}" style="max-width: 150px; height: auto; object-fit: contain;" class="me-3">
                                                <div>
                                                    <h5 class="mb-1">{{ $item->nama_perusahaan }}</h5>
                                                    <p class="mb-1">Posisi: {{ $item->posisi }}</p>
                                                    <p class="mb-1">Persyaratan: {{ $item->persyaratan }}</p>
                                                    <p class="mb-1">Lokasi: {{ $item->lokasi }}</p>
                                                    <p class="mb-1">Kontak: {{ $item->kontak }}</p>
                                                    <p class="mb-1">Deskripsi: {{ $item->deskripsi }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="pagination">
                                {{ $loker->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Alumni</h4>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>NAMA</th>
                                            <th>NIM</th>
                                            <th>PRODI</th>
                                            <th>ANGKATAN</th>
                                            <th>STATUS</th>
                                            <th>INSTITUSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alumni as $alumni)
                                            <tr onclick="window.location='{{ route('mahasiswa.alumni')}}'" style="cursor: pointer;">
                                                <td>{{ $alumni->name }}</td>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{ asset('storage/app/public/' . Auth()->user()->photo) }}" alt="User Photo" style="width: 100%; object-fit: cover;">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">{{ Auth()->user()->name }}</h5>
                            <h6 class="text-muted mb-0">{{ Auth()->user()->email }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div id="institusi" class="card">
                <div class="card-header">
                    <h4>Institusi</h4>
                </div>
                <div class="card-content pb-4">
                    @foreach ($institusi as $inst)
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="{{ asset('dist/assets/images/institusi/' . $inst->logo) }}" style="max-width: 100%; height: auto; object-fit: contain;">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">{{ $inst->nama }}</h5>
                            <h6 class="text-muted mb-0">{{ $inst->email }}</h6>
                        </div>
                    </div>
                    @endforeach
                    <div class="px-4">
                        <a href="{{ route('mahasiswa.institusi') }}" class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Lihat lainnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection


