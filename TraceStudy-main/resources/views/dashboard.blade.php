@extends('layout.layout')
@section('title','dashboard')
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
                                    <h6 class="font-extrabold mb-0">5500</h6>
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
                                    <h6 class="font-extrabold mb-0">3400</h6>
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
                                    <h6 class="font-extrabold mb-0">150</h6>
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
                                            <!-- table hover -->
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
                                                        <tr>
                                                            <td class="text-bold-500">Michael Right</td>
                                                            <td>22567839</td>
                                                            <td class="text-bold-500">Teknik Kimia</td>
                                                            <td>2022</td>
                                                            <td><span class="badge bg-success">Bekerja</span></td>
                                                            <td>PT Kimia Farma Tbk</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Morgan Vanblum</td>
                                                            <td>22634583</td>
                                                            <td class="text-bold-500">Teknik Kimia</td>
                                                            <td>2022</td>
                                                            <td><span class="badge bg-success">Bekerja</span></td>
                                                            <td>PT Kimia Farma Tbk</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Tiffani Blogz</td>
                                                            <td>23094761</td>
                                                            <td class="text-bold-500">Teknik Sipil</td>
                                                            <td>2023</td>
                                                            <td><span class="badge bg-success">Bekerja</span></td>
                                                            <td>PT Biofarma</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Ashley Boul</td>
                                                            <td>22819465</td>
                                                            <td class="text-bold-500">DKV</td>
                                                            <td>2022</td>
                                                            <td><span class="badge bg-danger">Tidak Bekerja</span></td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-bold-500">Mikkey Mice</td>
                                                            <td>23941132</td>
                                                            <td class="text-bold-500">Teknik Informatika</td>
                                                            <td>2023</td>
                                                            <td><span class="badge bg-success">Bekerja</span></td>
                                                            <td>Petrokimia Gresik</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
                            <img src={{asset('storage/photo/' . Auth()->user()->photo)}}>
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">{{Auth()->user()->name}}</h5>
                            <h6 class="text-muted mb-0">{{Auth()->user()->email}}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div id="institusi" class="card">
                <div class="card-header">
                    <h4>Institusi</h4>
                </div>
                <div class="card-content pb-4">
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src={{"dist/assets/images/institusi/kimiafarma.png"}} style="max-width: 100%; height: auto; object-fit: contain;">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">PT Kimia Farma Tbk</h5>
                            <h6 class="text-muted mb-0">50 Alumni</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src={{"dist/assets/images/institusi/biofarma.png"}} style="min-width: 100%; height: auto; object-fit: contain;">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">PT Biofarma</h5>
                            <h6 class="text-muted mb-0">27 Alumni</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src={{"dist/assets/images/institusi/petrokimia.png"}} style="max-width: 100%; height: auto; object-fit: contain;">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Petrokimia Gresik</h5>
                            <h6 class="text-muted mb-0">15 Alumni</h6>
                        </div>
                    </div>
                    <div class="px-4">
                        <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Lihat lainnya</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Profil Alumni</h4>
                </div>
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var optionsGraduationYear = {
        chart: {
            type: 'bar',
            height: 300
        },
        series: [{
            name: 'Jumlah Lulusan',
            data: [500, 600, 700, 800] // Jumlah lulusan per tahun
        }],
        xaxis: {
            categories: ['2020', '2021', '2022', '2023'] // Tahun lulusan
        }
    };

    var chartGraduationYear = new ApexCharts(document.querySelector("#chart-graduation-year"), optionsGraduationYear);
    chartGraduationYear.render();

    var optionsProfileVisit = {
        chart: {
            type: 'bar',
            height: 300
        },
        series: [{
            name: 'Profile Visit',
            data: [862, 375, 1025] // Data untuk profile visit
        }],
        xaxis: {
            categories: ['Europe', 'America', 'Indonesia'] // Kategori untuk profile visit
        }
    };

    var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
    chartProfileVisit.render();
</script>
@endsection


