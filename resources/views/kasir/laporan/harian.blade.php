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

        <!-- Daterangepicker css -->
        <link rel="stylesheet" href="{{asset('arsip/template/assets/vendor/daterangepicker/daterangepicker.css')}}">
  <!-- Theme Config Js -->
   <script src="{{asset('arsip/template/assets/js/hyper-config.js')}}"></script>
  <!-- App css -->
   <link href="{{asset('arsip/template/assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
  <!-- Icons css -->
    <link href="{{asset('arsip/template/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />   <link rel="shortcut icon" href="{{asset('arsip/template/assets/images/favicon.ico')}}">
  <!-- Theme Config Js -->
   <script src="{{asset('arsip/template/assets/js/hyper-config.js')}}"></script>
  <!-- App css -->
   <link href="{{asset('arsip/template/assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
  <!-- Icons css -->
    <link href="{{asset('arsip/template/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    @endpush
    @section('content')
     <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <div class="page-title-right">
              <form class="d-flex" action="{{route('K.F.LH')}}" method="POST">
            @csrf
                  <div class="input-group">
                      <input type="text" class="form-control form-control-light" id="dash-daterange">
                      <span class="input-group-text bg-primary border-primary text-white">
                          <i class="mdi mdi-calendar-range font-13"></i>
                      </span>
                  </div>
                  <button class="btn btn-primary ms-2">
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
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Filter Data</h4>
          <form id="filter-form" action="{{route('K.F.LH')}}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-3">
                <select id="hariDropdown" name="hari" class="form-select">
                  @foreach($haril as $key => $value)
                    <option value="{{ $key }}" @if($selectH == $key) selected @endif>{{ $key }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3">
                <select id="bulanDropdown" name="bulan" class="form-select">
                  @foreach($bulanl as $key => $value)
                    <option value="{{ $key }}" @if($selectB == $key) selected @endif>{{ $value }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3">
                <select id="tahunDropdown" name="tahun" class="form-select">
                  @foreach($tahunl as $key => $value)
                    <option value="{{ $key }}" @if($selectT == $key) selected @endif>{{ $key }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3">
                  <button type="submit" id="filter-btn" class="btn btn-primary">Filter</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
          <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                <h4 class="card-title">Data Laporan Per Hari</h4>
                <p class="card-description">
                  
                </p>
                <div class="table-responsive" id="loadLB">
                	<table id="tait" class="table table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th class="text-center">Barang yang terjual</th>
                              <th class="text-center">Total</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($harian as $rs)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $rs->tanggal . ' ' . $rs->nama_bulan }}</td>
                              <td class="text-center">
                                {{ $rs->total_quantity }}
                              </td>
                              <td class="text-end">{{number_format($rs->total_pembayaran,0,',','.') }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>


                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- partial --> 
  @endsection
  @push('script')
 
  <!-- Vendor js -->
  <script src="{{asset('arsip/template/assets/js/vendor.min.js')}}"></script>  

  <!-- Daterangepicker js -->
  <script src="{{asset('arsip/template/assets/vendor/daterangepicker/moment.min.js')}}"></script>
  <script src="{{asset('arsip/template/assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
  
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
  
  <!-- Datatable Demo Aapp js -->
  <script src="{{asset('arsip/template/assets/js/pages/demo.datatable-init.js')}}"></script>  

        <!-- Dashboard App js -->
        <script src="{{asset('arsip/template/assets/js/pages/demo.dashboard.js')}}"></script>
  <!-- App js -->
  <script src="{{asset('arsip/template/assets/js/app.min.js')}}"></script>
  <!-- Custom js for this page-->
  <script type="text/javascript">
  	$("#tait").DataTable({
              order: [0, 'asc']
            });
  </script>
  @endpush