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
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Profile 2</li>
                    </ol>
                </div>
                <h4 class="page-title">Profile 2</h4>
            </div>
        </div>
    </div>

                        <div class="row">
                            <div class="col-xl-4 col-lg-5">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="{{asset('arsip/template/assets/images/users/'. $auth->foto)}}" class="rounded-circle avatar-lg img-thumbnail"
                                        alt="profile-image">

                                        <h4 class="mb-0 mt-2">{{$auth->username}}</h4>
                                        @if('{{$auth->status}}' == 1)
                                          <p class="text-muted font-14"> Owner</p>
                                        @else
                                          <p class="text-muted font-14"> Kasir</p>
                                        @endif

                                        <button type="button" class="btn btn-success btn-sm mb-2">Follow</button>
                                        <button type="button" class="btn btn-danger btn-sm mb-2">Message</button>

                                        <div class="text-start mt-3">
                                            <h4 class="font-13 text-uppercase">About Me :</h4>
                                            <p class="text-muted font-13 mb-3">
                                                Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                                1500s, when an unknown printer took a galley of type.
                                            </p>
                                            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{$auth->name}}</span></p>

                                            <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">(123)
                                                    123 1234</span></p>

                                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2 ">user@email.domain</span></p>

                                            <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p>
                                        </div>

                                        <ul class="social-list list-inline mt-3 mb-0">
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i
                                                        class="mdi mdi-facebook"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                                        class="mdi mdi-google"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                                        class="mdi mdi-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i
                                                        class="mdi mdi-github"></i></a>
                                            </li>
                                        </ul>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->

                                <!-- Messages-->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h4 class="header-title">Messages</h4>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="inbox-widget">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle" alt=""></div>
                                                <p class="inbox-item-author">Tomaslau</p>
                                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                                <p class="inbox-item-date">
                                                    <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                                </p>
                                            </div>
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg" class="rounded-circle" alt=""></div>
                                                <p class="inbox-item-author">Stillnotdavid</p>
                                                <p class="inbox-item-text">This theme is awesome!</p>
                                                <p class="inbox-item-date">
                                                    <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                                </p>
                                            </div>
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg" class="rounded-circle" alt=""></div>
                                                <p class="inbox-item-author">Kurafire</p>
                                                <p class="inbox-item-text">Nice to meet you</p>
                                                <p class="inbox-item-date">
                                                    <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                                </p>
                                            </div>

                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg" class="rounded-circle" alt=""></div>
                                                <p class="inbox-item-author">Shahedk</p>
                                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                                <p class="inbox-item-date">
                                                    <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                                </p>
                                            </div>
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="assets/images/users/avatar-6.jpg" class="rounded-circle" alt=""></div>
                                                <p class="inbox-item-author">Adhamdannaway</p>
                                                <p class="inbox-item-text">This theme is awesome!</p>
                                                <p class="inbox-item-date">
                                                    <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                                </p>
                                            </div>
                                        </div> <!-- end inbox-widget -->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->

                            </div> <!-- end col-->

                            <div class="col-xl-8 col-lg-7">
                                <div class="card">
                                    <div class="card-body">
                                                <form>
                                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="firstname" class="form-label">First Name</label>
                                                                <input type="text" class="form-control" id="firstname" placeholder="Enter first name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="lastname" class="form-label">Last Name</label>
                                                                <input type="text" class="form-control" id="lastname" placeholder="Enter last name">
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->
    
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="userbio" class="form-label">Bio</label>
                                                                <textarea class="form-control" id="userbio" rows="4" placeholder="Write something..."></textarea>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->
    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="useremail" class="form-label">Email Address</label>
                                                                <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                                                <span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="userpassword" class="form-label">Password</label>
                                                                <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                                                <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->
    
                                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i> Company Info</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="companyname" class="form-label">Company Name</label>
                                                                <input type="text" class="form-control" id="companyname" placeholder="Enter company name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="cwebsite" class="form-label">Website</label>
                                                                <input type="text" class="form-control" id="cwebsite" placeholder="Enter website url">
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->
    
                                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Social</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="social-fb" class="form-label">Facebook</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
                                                                    <input type="text" class="form-control" id="social-fb" placeholder="Url">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="social-tw" class="form-label">Twitter</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i class="mdi mdi-twitter"></i></span>
                                                                    <input type="text" class="form-control" id="social-tw" placeholder="Username">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->
    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="social-insta" class="form-label">Instagram</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i class="mdi mdi-instagram"></i></span>
                                                                    <input type="text" class="form-control" id="social-insta" placeholder="Url">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="social-lin" class="form-label">Linkedin</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i class="mdi mdi-linkedin"></i></span>
                                                                    <input type="text" class="form-control" id="social-lin" placeholder="Url">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->
    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="social-sky" class="form-label">Skype</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i class="mdi mdi-skype"></i></span>
                                                                    <input type="text" class="form-control" id="social-sky" placeholder="@username">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="social-gh" class="form-label">Github</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i class="mdi mdi-github"></i></span>
                                                                    <input type="text" class="form-control" id="social-gh" placeholder="Username">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->
                                                    
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                    </div>
                                                </form>
                                            <!-- end settings content-->
                                    </div> <!-- end card body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    
  @endsection
  @push('script')
 
  <!-- Vendor js -->
  <script src="{{asset('arsip/template/assets/js/vendor.min.js')}}"></script>  
  
<!-- Code Highlight js -->
  <script src="{{asset('arsip/template/assets/vendor/highlightjs/highlight.pack.min.js')}}"></script>
  <script src="{{asset('arsip/template/assets/vendor/clipboard/clipboard.min.js')}}"></script>
  <script src="{{asset('arsip/template/assets/js/hyper-syntax.js')}}"></script>  
  
  <!-- Datatable Demo Aapp js -->
  <script src="{{asset('arsip/template/assets/js/pages/demo.datatable-init.js')}}"></script>  
  <!-- App js -->
  <script src="{{asset('arsip/template/assets/js/app.min.js')}}"></script>

  @endpush