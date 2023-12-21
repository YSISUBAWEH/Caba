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
  <link rel="stylesheet" href="{{asset('arsip/template/assets/vendor/daterangepicker/daterangepicker.css')}}" type="text/css" />
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
              <form class="d-flex" id="date_form">
            @csrf
                  <div class="input-group" id="datepicker5">
                      <input type="text" class="form-control date" id="singledaterange" name="date" data-toggle="date-picker" data-cancel-class="btn-warning">

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
        <h4 class="page-title">Profit</h4>
      </div>
    </div>
  </div>
    <div class="row">
      <div class="col-3">
        <div class="card widget-flat">
          <div class="card-body">
            <div class="float-end">
              <i class="ri-currency-fill widget-icon bg-success-lighten text-success"></i>
            </div>
            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Total Pendapatan</h5>
            <h3 class="mt-3 mb-3" id="totalP">{{$totalP}}</h3>
            
          </div> <!-- end card-body-->
        </div> <!-- end card-->
      </div>
      <div class="col-3">
        <div class="card widget-flat">
          <div class="card-body">
            <div class="float-end">
              <i class="ri-shopping-bag-fill widget-icon bg-success-lighten text-success"></i>
            </div>
            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Item Terjual</h5>
            <h3 class="mt-3 mb-3" id="itemT">{{$itemT}}</h3>
            
          </div> <!-- end card-body-->
        </div> <!-- end card-->
      </div>
    </div>
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
  

        <!-- Apex Charts js -->
        <script src="{{asset('arsip/template/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Datatable Demo Aapp js -->
  <script src="{{asset('arsip/template/assets/js/pages/demo.datatable-init.js')}}"></script>  
  <!-- App js -->
  <script src="{{asset('arsip/template/assets/js/app.min.js')}}"></script>
  <!-- Custom js for this page-->
  <script type="text/javascript">
    $("#date_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        console.log(fd);

        $.ajax({
            url: '{{ route('K.F.LP') }}',
            method: 'post',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                // Menampilkan data ke dalam elemen HTML yang sesuai
                $("#totalP").text(response.totalP);
                $("#itemT").text(response.itemT);
            },
            error: function(data) {
                var errors = data.responseJSON;
                console.log(errors);
            }
        });
    });
</script>

  @endpush