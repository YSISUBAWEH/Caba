@extends('kasir.layout.layout')
   @push('css')
<!-- App favicon -->
   <link rel="shortcut icon" href="{{asset('arsip/template/assets/images/favicon.ico')}}">
  <!-- Datatables css -->
   <link href="{{asset('arsip/template/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{asset('arsip/template/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{asset('arsip/template/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{asset('arsip/template/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{asset('arsip/template/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{asset('arsip/template/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- Bootstrap Datepicker css -->
  <link href="{{asset('arsip/template/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- Theme Config Js -->
   <script src="{{asset('arsip/template/assets/js/hyper-config.js')}}"></script>
  <!-- App css -->
   <link href="{{asset('arsip/template/assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
  <!-- Icons css -->
    <link href="{{asset('arsip/template/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />   
    <link rel="shortcut icon" href="{{asset('arsip/template/assets/images/favicon.ico')}}">
    @endpush
    @section('content')
     <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <div class="page-title-right">
              <form class="d-flex" action="{{route('K.F.LB')}}" method="POST">
            @csrf
                  <div class="input-group" id="datepicker5">
                      <input type="text" class="form-control" name="date" data-provide="datepicker" data-date-format="mm yyyy" data-date-min-view-mode="1" data-date-container="#datepicker5">
                      <span class="input-group-text bg-primary border-primary text-white">
                          <i class="mdi mdi-calendar-range font-13"></i>
                      </span>
                  </div>
                  <button type="submit" class="btn btn-primary ms-2">
                      <i class="mdi mdi-autorenew"></i>
                  </button>
                  <a href="javascript: void(0);" class="btn btn-primary ms-1">
                      <i class="mdi mdi-filter-variant"></i>
                  </a>
              </form>
          </div>
        <h4 class="page-title">Laporan</h4>
      </div>
    </div>
  </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="d-flex card-header justify-content-between align-items-center">
            <h4 class="card-title">Data Laporan Per Bulan</h4>
            <div class="dropdown">
              <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a href="." id="chartB" class="dropdown-item">Chart</a>
                <a href="." id="tabelB" style="display: none;" class="dropdown-item">Tabel</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive" id="loadLB">
              <table id="tait" class="table table-striped">
                <thead>
                  <tr>
                    <th>Bulan</th>
                    <th class="text-center">Barang yang terjual</th>
                    <th class="text-center">Total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $rs)
                    <tr>
                      <td>{{ $rs->nama_bulan . ' ' . $rs->tahun }}</td>
                      <td class="text-center">
                        {{ $rs->total_quantity }}
                      </td>
                      <td class="text-end">{{number_format($rs->total_pembayaran,0,',','.') }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div dir="ltr">
              <div id="high-performing-product" style="display: none;" class="apex-charts" data-colors="#fa6767,#e3eaef"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
  @push('script')
 
  <!-- Vendor js -->
  <script src="{{asset('arsip/template/assets/js/vendor.min.js')}}"></script>  
  
  <!-- Bootstrap Datepicker js -->
  <script src="{{asset('arsip/template/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
  <!-- Code Highlight js -->
  <script src="{{asset('arsip/template/assets/vendor/highlightjs/highlight.pack.min.js')}}"></script>
  <script src="{{asset('arsip/template/assets/vendor/clipboard/clipboard.min.js')}}"></script>
  <script src="{{asset('arsip/template/assets/js/hyper-syntax.js')}}"></script>  
  <!-- Datatables js -->
  <script src="{{asset('arsip/template/assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('arsip/template/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
  <script src="{{asset('arsip/template/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('arsip/template/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
  <script src="{{asset('arsip/template/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js')}}"></script>
  <script src="{{asset('arsip/template/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
  <script src="{{asset('arsip/template/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('arsip/template/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
  <script src="{{asset('arsip/template/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('arsip/template/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
  <script src="{{asset('arsip/template/assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('arsip/template/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
  <script src="{{asset('arsip/template/assets/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>
  

        <!-- Apex Charts js -->
        <script src="{{asset('arsip/template/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Datatable Demo Aapp js -->
  <script src="{{asset('arsip/template/assets/js/pages/demo.datatable-init.js')}}"></script>  
  <!-- App js -->
  <script src="{{asset('arsip/template/assets/js/app.min.js')}}"></script>
  <!-- Custom js for this page-->
  <script type="text/javascript">
    $(document).ready(function() {
        // Tangani klik pada elemen dengan id chartB
        $("#chartB").click(function(e) {
            e.preventDefault(); // Mencegah tindakan default link

            // Sembunyikan elemen dengan id loadB
            $("#loadLB").hide();
            $("#chartB").hide();

            // Tampilkan elemen dengan id high-performing-product
            $("#high-performing-product").show();
            $("#tabelB").show();
        });
        $("#tabelB").click(function(e) {
            e.preventDefault(); // Mencegah tindakan default link

            // Sembunyikan elemen dengan id loadB
            $("#high-performing-product").hide();
            $("#tabelB").hide();

            // Tampilkan elemen dengan id high-performing-product
            $("#loadLB").show();
            $("#chartB").show();
        });
    });
  	$("#tait").DataTable({
              order: [0, 'asc']
            });
  </script>

<script>
        // Mendefinisikan class e
        !function(o) {
            "use strict";

            function e() {
                this.$body = o("body"), this.charts = []
            }

            // Method untuk inisialisasi grafik
            e.prototype.initCharts = function(data) {
                window.Apex = {
                    chart: {
                        parentHeightOffset: 0,
                        toolbar: { show: !1 }
                    },
                    grid: { padding: { left: 0, right: 0 } },
                    colors: ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"]
                };

                var e = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"],
                    t = o("#high-performing-product").data("colors"),
                    r = {
                        chart: { height: 256, type: "bar", stacked: !0 },
                        plotOptions: { bar: { horizontal: !1, columnWidth: "20%" } },
                        dataLabels: { enabled: !1 },
                        stroke: { show: !0, width: 2, colors: ["transparent"] },
                        series: [
                            { name: "Total Pendapatan", data: data.map(entry => entry.total_pembayaran) }
                        ],
                        zoom: { enabled: !1 },
                        legend: { show: !1 },
                        colors: e = t ? t.split(",") : e,
                        xaxis: { categories: data.map(entry => entry.nama_bulan), axisBorder: { show: !1 } },
                        yaxis: {
                          labels: {
                            formatter: function(e) {
                              return  e.toLocaleString('id-ID', { style: 'currency', currency: 'IDR',minimumFractionDigits: 0 });
                             },
                               offsetX: -15
                          }
                        },
                        fill: { opacity: 1 },
                        tooltip: {
                            y: {
                                formatter: function(e) {
                                    return  e.toLocaleString('id-ID', { style: 'currency', currency: 'IDR',minimumFractionDigits: 0 });
                                }
                            }
                        }
                    };

                // Render grafik menggunakan ApexCharts
                new ApexCharts(document.querySelector("#high-performing-product"), r).render();
            };

            e.prototype.initMaps = function() {
                // Inisialisasi peta (jika diperlukan)
            };

            e.prototype.init = function() {
                // Inisialisasi rentang tanggal menggunakan daterangepicker (jika diperlukan)
                
                // Panggil initCharts dengan data dari controller
                var data = {!! json_encode($data) !!};
                this.initCharts(data);

                // Panggil initMaps jika diperlukan
                this.initMaps();
            };

            o.Dashboard = new e, o.Dashboard.Constructor = e
        }(window.jQuery), function(t) {
            "use strict";
            t(document).ready(function(e) {
                // Inisialisasi dashboard saat dokumen siap
                t.Dashboard.init();
            });
        }(window.jQuery);
    </script>
  @endpush