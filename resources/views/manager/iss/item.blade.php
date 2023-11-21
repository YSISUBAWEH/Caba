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
          <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                <h4 class="card-title">Tabel Item</h4>
                <p class="card-description">
                    sgahdgs
                </p>
                <div class="table-responsive" id="loadI">
                	<table id="tait" class="table table-stripped">
			            <thead>
			               <tr>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Stok</th>
                      <th>Harga</th>
                      <th></th>
                    </tr>
			            </thead>
			            <tbody>
            				@foreach ($item as $li)
            					<tr>
					                <td>{{$li->id}}</td>
                          <td>{{$li->name}}</td>
					                <td>{{ $li->stok}}</td>
					                <td class="text-end">{{ number_format($li->harga, 0, ',', '.')}}</td>
					                <td class="text-center"><a href="#" id="{{$li->id }}" class="btn btn-lg btn-outline-secondary mx-1" data-bs-toggle="modal" data-bs-target="#DetailModal"><i class="ti-eye"></i></a>
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
 <td>
    <a href="#" id="{{ $li->id }}" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#DetailModal">
        <i class="ti-eye"></i>
    </a>

    <div class="modal fade" id="DetailModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 bg-light">
                    <div class="row">
                        <div class="my-2 d-flex justify-content-between">
                            <p>Kode Item</p>
                            <p>{{ $li->id }}</p>
                        </div>

                        <div class="my-2 d-flex justify-content-between">
                            <p>Name</p>
                            <p>{{ $li->name }}</p>
                        </div>
                        <div class="my-2 d-flex justify-content-between">
                            <p>stok</p>
                            <p>{{ $li->stok }}</p>
                        </div>
                        <div class="my-2 d-flex justify-content-between">
                            <p>Harga</p>
                            <p>{{ number_format($li->harga, 0, ',', '.') }}</p>
                        </div>
                        <div class="my-2 d-flex justify-content-between">
                            <p>stok</p>
                            <p>{{ $li->kate->name }}</p>
                        </div>
                        <div class="my-2 d-flex justify-content-between">
                            <p>stok</p>
                            <p>{{ $li->uk->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</td>

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