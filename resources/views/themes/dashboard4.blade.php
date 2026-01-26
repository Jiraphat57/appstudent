@extends('themes.index')

@section('content')
    <!-- Main content -->
    
    <div class="container-fluid" >
        {{-- <h5 class="mb-3">Small Box</h5> --}}
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner text-center ">
                    <p style="font-family: 'THSarabun'; font-size: 36px; font-weight: bold;">นักเรียนระดับชั้น ม.4 ทั้งหมด(2569)</p>
                    <h1 style="font-family: 'THSarabun'; font-size: 70px; font-weight: bold;">{{ number_format($countM4) }} คน</h1>
                    {{-- <p>นักเรียนระดับชั้น ม.1 ทั้งหมด</p> --}}
                </div>
                <div class="icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <a href="#" class="small-box-footer" style="font-family: 'THSarabun'; font-size: 20px; font-weight: bold;">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        {{-- <h3>53<sup style="font-size: 20px">{{ number_format($countInM1) }}</sup></h3> --}}
        <div class="col-lg-2 col-6">
            <div class="small-box bg-success">
                <div class="inner text-center">
                    <p style="font-family: 'THSarabun'; font-size: 36px; font-weight: bold">นักเรียนจบ ม.3 พานพิทยาคม(2569)</p>            
                    <h1 style="font-family: 'THSarabun'; font-size: 70px; font-weight: bold;">{{ number_format($countInM4) }} คน</h1>
                </div>
                <div class="icon">
                    <i class="fas fa-users "></i>
                </div>
                <a href="#" class="small-box-footer" style="font-family: 'THSarabun'; font-size: 20px; font-weight: bold;">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <div class="inner text-center">
                    <p style="font-family: 'THSarabun'; font-size: 36px; font-weight: bold">นักเรียนจบ ม.3 โรงเรียนอื่นในจังหวัดเชียงราย(2569)</p>            
                    <h1 style="font-family: 'THSarabun'; font-size: 70px; font-weight: bold;">{{ number_format($countOutM4) }} คน</h1>
                </div>

                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer" style="font-family: 'THSarabun'; font-size: 20px; font-weight: bold;">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <div class="inner text-center">
                    <p style="font-family: 'THSarabun'; font-size: 36px; font-weight: bold">นักเรียนจบ ม.3 โรงเรียนอื่นต่างจังหวัด(2569)</p>            
                    <h1 style="font-family: 'THSarabun'; font-size: 70px; font-weight: bold;">{{ number_format($countOut_M4) }} คน</h1>
                </div>

                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer" style="font-family: 'THSarabun'; font-size: 20px; font-weight: bold;">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-2 col-6">
            <div class="small-box bg-danger">
                <div class="inner text-center">
                    <p style="font-family: 'THSarabun'; font-size: 36px; font-weight: bold">จำนวนนักเรียน ม.4 ปีเก่า 2568 </p>            
                    <h1 style="font-family: 'THSarabun'; font-size: 70px; font-weight: bold;"> 303 คน</h1>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer" style="font-family: 'THSarabun'; font-size: 20px; font-weight: bold;">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Donut Chart</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
            <!-- /.col (LEFT) -->
            <div class="col-md-6">
                <!-- LINE CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title" style="font-family: 'THSarabun'; font-size: 26px; font-weight: bold">สรุปนักเรียนระดับชั้น ม.4 ทั้งหมด</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>    
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title" style="font-family: 'THSarabun'; font-size: 26px; font-weight: bold">ตำบลของ อำเภอพานและพื้นที่ใกล้เคียง</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="lineChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <a href="{{ route('exportM4.students') }}"
                class="btn btn-success btn-lg"
                style="font-family:'THSarabun'; font-size:22px; font-weight:bold">
                    <i class="fas fa-file-excel"></i> ดาวน์โหลดข้อมูลนักเรียน ม.4 ทั้งหมด
                </a>
            </div>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>



    </div>

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../../plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
            var areaChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                        label: 'Digital Goods',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: 'Electronics',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                ]
            }
            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }
            // This will get the first returned node in the jQuery collection.
            // new Chart(areaChartCanvas, {
            //     type: 'line',
            //     data: areaChartData,
            //     options: areaChartOptions
            // })

            // //-------------
            // //- LINE CHART -
            // //--------------
            // var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            // var lineChartOptions = $.extend(true, {}, areaChartOptions)
            // var lineChartData = $.extend(true, {}, areaChartData)
            // lineChartData.datasets[0].fill = false;
            // lineChartData.datasets[1].fill = false;
            // lineChartOptions.datasetFill = false

            // var lineChart = new Chart(lineChartCanvas, {
            //     type: 'line',
            //     data: lineChartData,
            //     options: lineChartOptions
            // })

            //-------------
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            // var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            // var donutData = {
            //     labels: [
            //         'Chrome',
            //         'IE',
            //         'FireFox',
            //         'Safari',
            //         'Opera',
            //         'Navigator',
            //     ],
            //     datasets: [{
            //         data: [700, 500, 400, 600, 300, 100],
            //         backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            //     }]
            // }
            // var donutOptions = {
            //     maintainAspectRatio: false,
            //     responsive: true,
            // }
            // //Create pie or douhnut chart
            // // You can switch between pie and douhnut using the method below.
            // new Chart(donutChartCanvas, {
            //     type: 'doughnut',
            //     data: donutData,
            //     options: donutOptions
            // })
            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = donutData;
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })
            //-------------
            //- BAR CHART -
            //-------------
            // var barChartCanvas = $('#barChart').get(0).getContext('2d')
            // var barChartData = $.extend(true, {}, areaChartData)
            // var temp0 = areaChartData.datasets[0]
            // var temp1 = areaChartData.datasets[1]
            // barChartData.datasets[0] = temp1
            // barChartData.datasets[1] = temp0

            // var barChartOptions = {
            //     responsive: true,
            //     maintainAspectRatio: false,
            //     datasetFill: false
            // }
            // new Chart(barChartCanvas, {
            //     type: 'bar',
            //     data: barChartData,
            //     options: barChartOptions
            // })
            // //---------------------
            // //- STACKED BAR CHART -
            // //---------------------
            // var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            // var stackedBarChartData = $.extend(true, {}, barChartData)
            // var stackedBarChartOptions = {
            //     responsive: true,
            //     maintainAspectRatio: false,
            //     scales: {
            //         xAxes: [{
            //             stacked: true,
            //         }],
            //         yAxes: [{
            //             stacked: true
            //         }]
            //     }
            // }
            // new Chart(stackedBarChartCanvas, {
            //     type: 'bar',
            //     data: stackedBarChartData,
            //     options: stackedBarChartOptions
            // })

        })
    </script>
    <script>
        $(function () {

            var barChartCanvas = $('#barChart').get(0).getContext('2d')

            var barChartData = {
                labels: [
                    'นักเรียน ม.4 ทั้งหมด',
                    'นร.เดิม พานพิทยาคม',
                    'รร. อื่นในจังหวัดเชียงราย',
                    'รร. อื่นต่างจังหวัด',
                ],
                datasets: [{
                    label: 'จำนวนนักเรียน (คน)',
                    data: [
                        {{ $countM4 }},
                        {{ $countInM4 }},
                        {{ $countOutM4 }},
                        {{ $countOut_M4 }}
                    ],
                    backgroundColor: [
                        '#28a745',
                        '#17a2b8',
                        '#ffc107',
                        '#f56954'
                    ],
                }]
            }

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    display: false
                }
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
        })
    </script>
    <script>
        $(function () {
            var ctx = $('#lineChart').get(0).getContext('2d')
            var districtBarData = {
                labels: [
                    'สันมะเค็ด','แม่อ้อ','ธารทอง','สันติสุข','ดอยงาม',
                    'หัวง้ม','เจริญเมือง','ป่าหุ่ง','ม่วงคำ','ทรายขาว',
                    'สันกลาง','แม่เย็น','เมืองพาน','ทานตะวัน','และเวียงห้าว',
                    'ป่าแงะ อ.ป่าแดด','ป่าแดด อ.ป่าแดด','ป่าแฝก อ.แม่ใจ','อำเภอ อื่นๆ'
                ],
                datasets: [{
                    label: 'จำนวนนักเรียนระดับชั้น ม.4 (คน)',
                    data: [
                        {{ $countdistric1 }},
                        {{ $countdistric2 }},
                        {{ $countdistric3 }},
                        {{ $countdistric4 }},
                        {{ $countdistric5 }},
                        {{ $countdistric6 }},
                        {{ $countdistric7 }},
                        {{ $countdistric8 }},
                        {{ $countdistric9 }},
                        {{ $countdistric10 }},
                        {{ $countdistric11 }},
                        {{ $countdistric12 }},
                        {{ $countdistric13 }},
                        {{ $countdistric14 }},
                        {{ $countdistric15 }},
                        {{ $countdistric16 }},
                        {{ $countdistric17 }},
                        {{ $countdistric18 }},
                        {{ $countdistric19 }}
                    ],
                    backgroundColor: '#17a2b8'
                }]
            }

            var districtBarOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    display: true
                }
            }

            new Chart(ctx, {
                type: 'bar',
                data: districtBarData,
                options: districtBarOptions
            })

        })
        </script>
        <script>
            $(document).ready(function () {

                const ctx = document.getElementById('donutChart');
                if (!ctx) {
                    console.error('ไม่พบ canvas donutChart');
                    return;
                }

                const labels = [
                    'สันมะเค็ด','แม่อ้อ','ธารทอง','สันติสุข','ดอยงาม',
                    'หัวง้ม','เจริญเมือง','ป่าหุ่ง','ม่วงคำ','ทรายขาว',
                    'สันกลาง','แม่เย็น','เมืองพาน','ทานตะวัน','และเวียงห้าว',
                    'ป่าแงะ อ.ป่าแดด','ป่าแดด อ.ป่าแดด','ป่าแฝก อ.แม่ใจ','อำเภอ อื่นๆ'
                ];

                const dataValues = [
                    {{ $countdistric1 }},
                    {{ $countdistric2 }},
                    {{ $countdistric3 }},
                    {{ $countdistric4 }},
                    {{ $countdistric5 }},
                    {{ $countdistric6 }},
                    {{ $countdistric7 }},
                    {{ $countdistric8 }},
                    {{ $countdistric9 }},
                    {{ $countdistric10 }},
                    {{ $countdistric11 }},
                    {{ $countdistric12 }},
                    {{ $countdistric13 }},
                    {{ $countdistric14 }},
                    {{ $countdistric15 }},
                    {{ $countdistric16 }},
                    {{ $countdistric17 }},
                    {{ $countdistric18 }},
                    {{ $countdistric19 }}
                ];

                /* ✅ สร้างสีให้ครบตามจำนวนข้อมูล */
                const backgroundColors = labels.map((_, i) =>
                    `hsl(${i * 20}, 70%, 55%)`
                );

                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: dataValues,
                            backgroundColor: backgroundColors
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }
                });
            });
        </script>

@endsection
