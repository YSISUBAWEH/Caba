@extends('manager.layout.layout')
    @push('css')
        <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <!-- End plugin css for this page -->
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
.dataTables_length label{
  font-size: 0;
  }
  </style>
    @endpush
    @section('content')
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Filter Data</h4>
          <form id="filter-form" action="{{route('M.F.LT')}}" method="POST">
            @csrf
            <div class="row">
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
                <h4 class="card-title">Data Laporan Per Tahun</h4>
                <p class="card-description">
                  
                </p>
                <div class="table-responsive" id="loadLB">
                	<table id="tait" class="table table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th class="text-center">Barang yang terjual</th>
                              <th class="text-center">Total</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($tahunan as $rs)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
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
  <!-- plugins:js -->
  <script src="{{asset('arsip/admin/vendors/js/vendor.bundle.base.js')}}"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('arsip/admin/js/off-canvas.js')}}"></script>
  <script src="{{asset('arsip/admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('arsip/admin/js/template.js')}}"></script>
  <script src="{{asset('arsip/admin/js/settings.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script type="text/javascript">
  	$("#tait").DataTable({
              order: [0, 'asc']
            });
  </script>
  @endpush