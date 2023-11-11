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
                <h4 class="card-title">Riwayat Transaksi</h4>
                <p class="card-description">
                    sgahdgs
                </p>
                <div class="table-responsive" id="loadI">
                	<table id="tait" class="table table-stripped">
			            <thead>
			              <tr>
			                <th>No</th>
			                <th>Nota</th>
			                <th>Item</th>
			                <th>Total</th>
			                <th>Tanggal</th>
			                <th>-</th>
			              </tr>
			            </thead>
			            <tbody>
            				@foreach ($data as $rs)
            					<tr>
					                <td>{{ $loop->iteration }}</td>
					                <td>{{$rs->id}}</td>
                          <td>
                           @foreach ($rs->menus as $menu)
                          <li>{{$menu->name }}
                          ({{ number_format($menu->pivot->harga, 0, ',', '.') }}x
                          {{ $menu->pivot->quantity }})</li>
                            @endforeach</td>
					                <td class="text-end">{{ number_format($rs->total_pembayaran, 0, ',', '.')}}</td>
					                <td>{{ $rs->tanggal_pembayaran}}</td>
					                <td><a href="#" id="{{$rs->id }}" class="btn btn-outline-secondary align-items-center mx-1" data-bs-toggle="modal" data-bs-target="#DetailModal"><i class="ti-eye"></i></a>
                            <button type="submit"  value="print" class="btn btn-outline-secondary align-items-center" id="print-button"><i class="icon-printer"></i></button></td>
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
    <a href="#" id="{{ $rs->id }}" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#DetailModal">
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
                            <p>Id Transaksi</p>
                            <p>{{ $rs->id }}</p>
                        </div>
                       <div class="my-2">
                          <p>Item</p>
                          <ul>
                              @foreach ($rs->menus as $menu)
                                  <li>
                                      {{ $menu->name }}
                                      ({{ number_format($menu->pivot->harga, 0, ',', '.') }}x{{ $menu->pivot->quantity }})
                                  </li>
                              @endforeach
                          </ul>
                      </div>

                        <div class="my-2 d-flex justify-content-between">
                            <p>Tanggal Transaksi</p>
                            <p>{{ $rs->tanggal_pembayaran }}</p>
                        </div>
                        <div class="my-2 d-flex justify-content-between">
                            <p>Total</p>
                            <p>{{ $rs->total_pembayaran }}</p>
                        </div>
                        <div class="my-2 d-flex justify-content-between">
                            <p>Metode Pembayaran</p>
                            <p>{{ $rs->metode_pembayaran }}</p>
                        </div>
                        <div class="my-2 d-flex justify-content-between">
                            <p>Dibayar</p>
                            <p>{{ $rs->uang_pembayaran }}</p>
                        </div>
                        <div class="my-2 d-flex justify-content-between">
                            <p>Kembalian</p>
                            <p>{{ $rs->kembalian }}</p>
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
  <script src="{{asset('arsip/admin/js/settings.js')}}"></script>
  <script src="{{asset('arsip/admin/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script type="text/javascript">
  	$("#taka").DataTable({
              order: [0, 'asc']
            });
  	$("#taun").DataTable({
              order: [0, 'asc']
            });
  	$("#tait").DataTable({
              order: [0, 'asc']
            });
  </script>
  @endpush