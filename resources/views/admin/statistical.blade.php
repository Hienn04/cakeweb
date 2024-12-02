@extends('admin.layouts.app')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../import_js/fontawesome-free/css/all.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="../import_js/daterangepicker/daterangepicker.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="../import_js/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="../import_js/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="../import_js/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="../import_js/select2/css/select2.min.css">
<link rel="stylesheet" href="../import_js/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="../import_js/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- BS Stepper -->
<link rel="stylesheet" href="../import_js/bs-stepper/css/bs-stepper.min.css">
<!-- dropzonejs -->
<link rel="stylesheet" href="../import_js/dropzone/min/dropzone.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../import_js/dist/css/adminlte.min.css">
<link href="../import_js/PagedList.css" rel="stylesheet" />
</head>


<body>



    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thống kê</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thống kê</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" id="app">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thống kê doanh thu</h3>
                <div class="alert alert-danger mx-auto" role="alert"></div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ngày</th>
                                    <th>Doanh thu</th>
                                    <th>Lợi nhuận</th>
                                </tr>
                            </thead>
                            <tbody id="load_data"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">Footer</div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        <div class="card ">
            <h3 class="card-title p-3">Trong kho: {{$countProducts}}</h3>
            <div class="card-header">
                <h3 class="card-title">Trong kho</h3>
                <div class="alert alert-danger mx-auto" role="alert"></div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                       <h3 class="card-title p-3 alert alert-danger mx-auto">Thống kê sản phẩm hết hàng</h3>

                    <div class="col-md-12">
                        <table class="table-auto border-collapse border border-gray-300 w-full text-sm mb-10">
                            <thead>
                                <tr class="bg-gray-100 text-left">
                                    <th class="border border-gray-300 px-4 py-2">STT</th>
                                    <th class="border border-gray-300 px-4 py-2">Tên sản phẩm hết hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($outOfstock as $index => $item)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $item['name'] }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="border border-gray-300 px-4 py-2 text-center">Không có dữ liệu</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                       <h3 class="card-title p-3 alert alert-success mx-auto mt-10">Thống kê sản phẩm bán chạy</h3>
                    <div class="col-md-12">
                        <table class="table-auto border-collapse border border-gray-300 w-full text-sm">
                            <thead>
                                <tr class="bg-gray-100 text-left">
                                    <th class="border border-gray-300 px-4 py-2">STT</th>
                                    <th class="border border-gray-300 px-4 py-2">Tên sản phẩm</th>
                                    {{-- <th class="border border-gray-300 px-4 py-2">ID sản phẩm</th> --}}
                                    <th class="border border-gray-300 px-4 py-2">Số lượt mua</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bestSeller as $index => $item)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $item->name }}</td>
                                    {{-- <td class="border border-gray-300 px-4 py-2">{{ $item->product_id }}</td> --}}
                                    <td class="border border-gray-300 px-4 py-2">{{ $item->frequency }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="border border-gray-300 px-4 py-2 text-center">
                                        Không có dữ liệu
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="../import_js/moment/moment.min.js"></script>
    <script src="../import_js/chart.js/Chart.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../import_js/moment/moment.min.js"></script>
    <script src="../import_js/chart.js/Chart.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>


    <script>
        new Vue({
            el: '#app'
            , data: {
                arrDoanhThu: []
                , arrLoiNhuan: []
                , arrDate: []
            }
            , mounted() {
                this.loadData();

            }
            , methods: {
                getData() {
                    axios.get('/getBlog')
                        .then(response => {
                            this.listBlog = response.data;
                            console.log(this.listBlog);
                        })
                        .catch(error => {
                            console.error('Error fetching blog data:', error);
                        });
                },

                loadData() {
                    // Use axios to fetch data from the API endpoint
                    axios.get('/admin/accountant')
                        .then(response => {
                            // Assuming the API response has a similar structure to your simulated data
                            var data = response.data;
                            console.log(data)

                            data.forEach(item => {
                                var strDate = moment(item.day).format('DD/MM/yyyy');
                                this.arrDate.push(strDate);
                                this.arrDoanhThu.push(item.revenue);
                                this.arrLoiNhuan.push(item.profit);
                            });

                            this.drawChart();
                            this.loadTableData();
                        })
                        .catch(error => {
                            console.error('Error fetching data from API:', error);
                        });
                }
                , drawChart() {
                    var areaChartData = {
                        labels: this.arrDate
                        , datasets: [{
                                label: 'Lợi nhuận'
                                , backgroundColor: 'rgba(60,141,188,0.9)'
                                , borderColor: 'rgba(60,141,188,0.8)'
                                , pointRadius: false
                                , pointColor: '#3b8bba'
                                , pointStrokeColor: 'rgba(60,141,188,1)'
                                , pointHighlightFill: '#fff'
                                , pointHighlightStroke: 'rgba(60,141,188,1)'
                                , data: this.arrLoiNhuan
                            }
                            , {
                                label: 'Doanh thu'
                                , backgroundColor: 'rgba(210, 214, 222, 1)'
                                , borderColor: 'rgba(210, 214, 222, 1)'
                                , pointRadius: false
                                , pointColor: 'rgba(210, 214, 222, 1)'
                                , pointStrokeColor: '#c1c7d1'
                                , pointHighlightFill: '#fff'
                                , pointHighlightStroke: 'rgba(220,220,220,1)'
                                , data: this.arrDoanhThu
                            }
                        , ]
                    };

                    var barChartCanvas = document.getElementById('barChart').getContext('2d');
                    var barChartData = JSON.parse(JSON.stringify(areaChartData)); // Deep clone the object

                    var barChartOptions = {
                        responsive: true
                        , maintainAspectRatio: false
                        , datasetFill: false
                    };

                    new Chart(barChartCanvas, {
                        type: 'bar'
                        , data: barChartData
                        , options: barChartOptions
                    });
                }
                , loadTableData() {
                    var strHtml = "";
                    const formatVND = new Intl.NumberFormat('vi-VN'); 
                    this.arrDate.forEach((date, i) => {
                        strHtml += "<tr>";
                        strHtml += "<td>" + (i + 1) + "</td>";
                        strHtml += "<td>" + date + "</td>";
                        strHtml += "<td>" + formatVND.format(this.arrDoanhThu[i]) + "đ" + "</td>";
                        strHtml += "<td>" + formatVND.format(this.arrLoiNhuan[i]) + "đ" + "</td>";
                        strHtml += "</tr>";
                    });
                    document.getElementById('load_data').innerHTML = strHtml;
                }
            }
        });

    </script>
</body>

@endsection
