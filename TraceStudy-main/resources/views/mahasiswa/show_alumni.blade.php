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
                                @foreach ($alumni as $alumni)
                                    <tr onclick="window.location='{{ route('mahasiswa.alumni.show', $alumni->id) }}'" style="cursor: pointer;">
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
    </section>
</div>
@endsection 