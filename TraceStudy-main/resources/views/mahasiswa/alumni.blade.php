@extends('layout.layout')
@section('title','Halaman Mahasiswa | Alumni')
@section('content')
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Alumni</h4>
                </div>
                <div class="card-body">
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
                                @if($alumni->isNotEmpty())
                                    @foreach ($alumni as $alumniItem)
                                        @if ($alumniItem && is_object($alumniItem))
                                            <tr>
                                                <td>{{ $alumniItem->nama }}</td>
                                                <td>{{ $alumniItem->nim }}</td>
                                                <td>{{ $alumniItem->prodi }}</td>
                                                <td>{{ $alumniItem->angkatan }}</td>
                                                <td>
                                                    @if ($alumniItem->status == 'bekerja')
                                                        <span class="badge bg-success">Bekerja</span>
                                                    @else
                                                        <span class="badge bg-danger">Tidak bekerja</span>
                                                    @endif
                                                </td>
                                                <td>{{ $alumniItem->institusi }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data alumni.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{ $alumni->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection