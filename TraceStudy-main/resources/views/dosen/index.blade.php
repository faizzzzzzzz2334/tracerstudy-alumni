@extends('layout.layout')
@section('title','Halaman Dosen | Dashboard')
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
                                    <h6 class="text-muted font-semibold">Total Institusi</h6>
                                    <h6 class="font-extrabold mb-0">{{ $totalInstitusi }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6" style="width: 19rem">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Alumni Aktif Bekerja</h6>
                                    <h6 class="font-extrabold mb-0">{{ $alumniBekerja }}</h6>
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
                                    <div class="stats-icon red" style="display:flex; align-items: center"> 
                                        <span><i class="bi bi-building"></i></span>
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
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lulusan Per Tahun</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div id="chart-graduation-year"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Chart Profile Visit -->
            <div class="card">
                <section class="section">
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Daftar Alumni</h4>
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
                                                    <tr onclick="window.location='{{ route('dosen.alumni')}}' "style="cursor: pointer;">
                                                        <td>{{ $alumni->nama }}</td>
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
                </section>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{ asset('storage/' . Auth()->user()->photo) }}" alt="User Photo">
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
                        <a href="{{ route('dosen.institusi') }}" class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Lihat lainnya</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Profil Alumni</h4>
                </div>
                <div class="card-body">
                    <div id="chartpie-alumni"></div>
                    <div class="mt-3">
                        <p><span style="color: #008b75;">&#9679;</span> Alumni Aktif Bekerja</p>
                        <p><span style="color: #dc3545;">&#9679;</span> Alumni Tidak Bekerja</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // Chart Lulusan Per Tahun
    var graduationYearData = {
        labels: {!! json_encode($lulusanPerTahun->keys()) !!},
        series: [{ 
            name: 'Jumlah Lulusan',
            data: {!! json_encode($lulusanPerTahun->values()) !!}
        }]
    };

    var optionsGraduationYear = {
        chart: {
            type: 'bar',
            height: 300
        },
        series: graduationYearData.series,
        xaxis: {
            categories: graduationYearData.labels
        }
    };

    var chartGraduationYear = new ApexCharts(document.querySelector("#chart-graduation-year"), optionsGraduationYear);
    chartGraduationYear.render();

    // Data untuk chart pie
    var totalBekerja = {{ $totalBekerja }};
    var totalTidakBekerja = {{ $totalTidakBekerja }};
    
    var optionsPie = {
        chart: {
            type: 'donut',
            height: '350px'
        },
        series: [totalBekerja, totalTidakBekerja],
        labels: ['Bekerja', 'Tidak Bekerja'],
        colors: ['#008b75', '#dc3545'],
        legend: {
            position: 'bottom'
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '30%'
                }
            }
        }
    };

    var chartPie = new ApexCharts(document.querySelector("#chartpie-alumni"), optionsPie);
    chartPie.render();
</script>
@endsection


