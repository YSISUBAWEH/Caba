@extends('kasir.layout.layout')
@push('css')
        <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('arsip/admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('arsip/admin/images/favicon.png')}}" />
  <style type="text/css">
    .dataTables_wrapper {
    font-size: 10px;
    position: relative;
    clear: both;
    *zoom: 1;
    zoom: 1;
}
</style>
@endpush
@section('content')
<div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center justify-content-between">
                          <div>
                            <p class="statistics-title">Jumlah Item</p>
                            <h3 class="rate-percentage">{{$item->count()}}</h3>
                            <p><a href="{{route('K.item')}}"class="text-danger d-flex text-decoration-none"><i class="mdi mdi-menu-right"></i>Selengkapnya</a></p>
                          </div>
                          <div>
                            <p class="statistics-title">Jumlah Transaksi</p>
                            <h3 class="rate-percentage">{{$transaksi->count()}}</h3>
                            <p><a href="{{route('K.V.T')}}"class="text-danger d-flex text-decoration-none"><i class="mdi mdi-menu-right"></i>Selengkapnya</a></p>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">Pendapatan Minggu Ini</p>
                            <h3 class="rate-percentage">Rp . {{ number_format($pendapatanH->first()->total_pembayaran,0,',','.') ?? 0 }}</h3>
                            <p><a href="{{route('K.H.L')}}"class="text-danger d-flex text-decoration-none"><i class="mdi mdi-menu-right"></i>Selengkapnya</a></p>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">Pendapatan Bulan Ini</p>
                            <h3 class="rate-percentage">Rp . {{ number_format($pendapatanB->first()->total_pembayaran,0,',','.') ?? 0 }}</h3>
                            <p><a href="{{route('K.B.L')}}"class="text-danger d-flex text-decoration-none"><i class="mdi mdi-menu-right"></i>Selengkapnya</a></p>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">Pendapatan Tahun Ini</p>
                            <h3 class="rate-percentage">Rp . {{ number_format($pendapatanY->first()->total_pembayaran,0,',','.') ?? 0 }}</h3>
                            <p><a href="{{route('K.T.L')}}"class="text-danger d-flex text-decoration-none"><i class="mdi mdi-menu-right"></i>Selengkapnya</a></p>
                          </div>
                        </div>
                      </div>
                    </div> 
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

  @push('script')
  <!-- plugins:js -->
  <script src="{{asset('arsip/admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('arsip/admin/js/off-canvas.js')}}"></script>
  <script src="{{asset('arsip/admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('arsip/admin/js/template.js')}}"></script>
  <script src="{{asset('arsip/admin/js/settings.js')}}"></script>
  <!-- endinject -->

  <script src="{{asset('arsip/admin/js/jquery.cookie.js')}}" type="text/javascript"></script>
  <script src="{{asset('arsip/admin/js/dashboard.js')}}"></script>
  <!-- Custom js for this page-->
  @endpush