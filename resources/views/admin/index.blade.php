@extends('layouts.admin')
@section('dashboard', 'active')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg- col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Guru</h4>
                </div>
                <div class="card-body">
                    {{ count($guru) }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg- col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Siswa</h4>
                </div>
                <div class="card-body">
                    {{ count($siswa) }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-12">
        <div class="card">
            <div class="card-header">
                <h4>Persentase per Minggu</h4>
            </div>
            <div class="card-body">
                <canvas id="chart_week" width="200" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4>Persentase Hari Ini</h4>
            </div>
            <div class="card-body">
                <canvas id="chart_day" width="100" height="100"></canvas>
            </div>
            <div id="chart_desc" class="card-footer d-flex justify-content-between p-0 px-4">
                <p>Total Siswa: <b>0</b></p>
                <p>Siswa Hadir: <b>0</b></p>
                <p>Siswa Tidak Hadir: <b>0</b></p>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4>Persentase Kelas X</h4>
            </div>
            <div class="card-body">
                <canvas id="chart_weekX" width="200" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4>Persentase Kelas XI</h4>
            </div>
            <div class="card-body">
                <canvas id="chart_weekXI" width="200" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4>Persentase Kelas XII</h4>
            </div>
            <div class="card-body">
                <canvas id="chart_weekXII" width="200" height="100"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    // data from laravel
    const data = <?= $jurnal_guru_per_hari ?>;
    const data_week = <?= $jurnal_guru_per_minggu ?>;

    // siswa data for today
    let siswaHadirDay = 0;
    let siswaTidakHadirDay = 0;
    let totalSiswaDay = 0;

    // siswa data for last 1 week
    let lastWeek = [];
    let siswaHadirWeek = [];
    let siswaTidakHadirWeek = [];

    let siswaHadirWeekX = [];
    let siswaTidakHadirWeekX = [];

    let siswaHadirWeekXI = [];
    let siswaTidakHadirWeekXI = [];

    let siswaHadirWeekXII = [];
    let siswaTidakHadirWeekXII = [];



    // init data
    const setData = () => {
        data.map((x, i) => {
            siswaHadirDay += parseInt(x.siswa_hadir);
            siswaTidakHadirDay += parseInt(x.siswa_tidak_hadir);
            totalSiswaDay += ( parseInt(x.siswa_hadir) + parseInt(x.siswa_tidak_hadir) );
        })

        data_week.map((x, i) => {
            lastWeek.push(x[0]?.tanggal ? x[0]?.tanggal : '-');
            
            siswaHadirWeek.push(0)
            siswaTidakHadirWeek.push(0)

            siswaHadirWeekX.push(0)
            siswaTidakHadirWeekX.push(0)

            siswaHadirWeekXI.push(0)
            siswaTidakHadirWeekXI.push(0)

            siswaHadirWeekXII.push(0)
            siswaTidakHadirWeekXII.push(0)

            x.map((x) => {    
                const kelas = x.kelas.split(' / ');

                siswaHadirWeek[i] += parseInt(x.siswa_hadir);
                siswaTidakHadirWeek[i] += parseInt(x.siswa_tidak_hadir);

                if(kelas[0] == 'X') {
                    siswaHadirWeekX[i] += parseInt(x.siswa_hadir);
                    siswaTidakHadirWeekX[i] += parseInt(x.siswa_tidak_hadir);
                } else if(kelas[0] == 'XI') {
                    siswaHadirWeekXI[i] += parseInt(x.siswa_hadir);
                    siswaTidakHadirWeekXI[i] += parseInt(x.siswa_tidak_hadir);
                } else if(kelas[0] == 'XII') {
                    siswaHadirWeekXII[i] += parseInt(x.siswa_hadir);
                    siswaTidakHadirWeekXII[i] += parseInt(x.siswa_tidak_hadir);
                }
            })
        })

    }

    window.onload = setData();
    
    // element chart
    const elDoughnutChart = document.getElementById('chart_day');
    const elBarChart = document.getElementById('chart_week');
    const elBarChartX = document.getElementById('chart_weekX');
    const elBarChartXI = document.getElementById('chart_weekXI');
    const elBarChartXII = document.getElementById('chart_weekXII');

    
    // journal per day
    const journalDay = {
        labels: [
            "Siswa Hadir",
            "Siswa Tidak Hadir",
        ],
        datasets: [
            {
                data: [siswaHadirDay, siswaTidakHadirDay],
                backgroundColor: [
                    "#63ed7a",
                    "#fc544b",
                ]
            }]
    };

    const doughnutChart = new Chart(elDoughnutChart, {
        type: 'pie',
        data: journalDay
    });

    // journal per week
    const journalWeek = {
        labels: lastWeek,
        datasets: [
            {
                label: "Siswa Hadir",
                backgroundColor: "#63ed7a",
                data: siswaHadirWeek
            },
            {
                label: "Siswa Tidak Hadir",
                backgroundColor: "#fc544b",
                data: siswaTidakHadirWeek
            }
        ]
    };

    const barChart = new Chart(elBarChart, {
        type: 'bar',
        data: journalWeek,
        options: {
            barValueSpacing: 20,
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                    }
                }]
            }
        }
    });

    // journal per week X
    const journalWeekX = {
        labels: lastWeek,
        datasets: [
            {
                label: "Siswa Hadir",
                backgroundColor: "#63ed7a",
                data: siswaHadirWeekX
            },
            {
                label: "Siswa Tidak Hadir",
                backgroundColor: "#fc544b",
                data: siswaTidakHadirWeekX
            }
        ]
    };

    const barChartX = new Chart(elBarChartX, {
        type: 'bar',
        data: journalWeekX,
        options: {
            barValueSpacing: 20,
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                    }
                }]
            }
        }
    });

    // journal per week XI
    const journalWeekXI = {
        labels: lastWeek,
        datasets: [
            {
                label: "Siswa Hadir",
                backgroundColor: "#63ed7a",
                data: siswaHadirWeekXI
            },
            {
                label: "Siswa Tidak Hadir",
                backgroundColor: "#fc544b",
                data: siswaTidakHadirWeekXI
            }
        ]
    };

    const barChartXI = new Chart(elBarChartXI, {
        type: 'bar',
        data: journalWeekXI,
        options: {
            barValueSpacing: 20,
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                    }
                }]
            }
        }
    });

    // journal per week XI
    const journalWeekXII = {
        labels: lastWeek,
        datasets: [
            {
                label: "Siswa Hadir",
                backgroundColor: "#63ed7a",
                data: siswaHadirWeekXII
            },
            {
                label: "Siswa Tidak Hadir",
                backgroundColor: "#fc544b",
                data: siswaTidakHadirWeekXII
            }
        ]
    };

    const barChartXII = new Chart(elBarChartXII, {
        type: 'bar',
        data: journalWeekXII,
        options: {
            barValueSpacing: 20,
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                    }
                }]
            }
        }
    });

    const elCartDesc = document.getElementById('chart_desc');

    elCartDesc.innerHTML = `<p>Total: <b>${totalSiswaDay}</b></p>
                    <p>Hadir: <b>${siswaHadirDay}</b></p>
                    <p>Tidak Hadir: <b>${siswaTidakHadirDay}</b></p>`

</script>

@endsection