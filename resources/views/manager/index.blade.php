@extends('manager.layout.layout')
@push('css')
  <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('arsip/template/assets/images/favicon.ico')}}">

        <!-- Daterangepicker css -->
        <link rel="stylesheet" href="{{asset('arsip/template/assets/vendor/daterangepicker/daterangepicker.css')}}">

        <!-- Vector Map css -->
        <link rel="stylesheet" href="{{asset('arsip/template/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}">

        <!-- Theme Config Js -->
        <script src="{{asset('arsip/template/assets/js/hyper-config.js')}}"></script>

        <!-- App css -->
        <link href="{{asset('arsip/template/assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="{{asset('arsip/template/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">              
          <h4 class="page-title">Dashboard</h4>
      </div>
    </div>
  </div>

                        <div class="row">
                            <div class="col-12">

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-account-multiple widget-icon bg-success-lighten text-success"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Item</h5>
                                                <h3 class="mt-3 mb-3">{{$item->count()}}</h3>
                                                
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-sm-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-cart-plus widget-icon bg-danger-lighten text-danger"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Penjualan</h5>
                                                <h3 class="mt-3 mb-3">{{$transaksi->count()}}</h3>
                                                
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                    
                                    <div class="col-sm-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="ri-team-line widget-icon bg-info-lighten text-info"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">User</h5>
                                                <h3 class="mt-3 mb-3">{{$user->count()}}</h3>
                                                
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-sm-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="ri-user-2-line widget-icon bg-warning-lighten text-warning"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Growth">Suplayer</h5>
                                                <h3 class="mt-3 mb-3">{{$suplayer->count()}}</h3>
                                                
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                            </div> <!-- end col -->

                        </div>

                    </div>
@endsection

  @push('script')
  
        <!-- Vendor js -->
        <script src="{{asset('arsip/template/assets/js/vendor.min.js')}}"></script>

        <!-- Daterangepicker js -->
        <script src="{{asset('arsip/template/assets/vendor/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
        
        <!-- Apex Charts js -->
        <script src="{{asset('arsip/template/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>

        <!-- Vector Map js -->
        <script src="{{asset('arsip/template/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('arsip/template/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>

        <!-- Dashboard App js -->
        <script src="{{asset('arsip/template/assets/js/pages/demo.dashboard.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('arsip/template/assets/js/app.min.js')}}"></script>
  @endpush