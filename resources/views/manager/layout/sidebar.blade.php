<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('M.index')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Data Items</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Data Items</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('M.item')}}">Item</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('M.stok')}}">
            <i class="menu-icon mdi mdi-alpha-s-box-outline"></i>
              <span class="menu-title">Data Stok</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('M.suplay')}}">
            <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">Data Suplayer</span>
            </a>
          </li>
          <li class="nav-item nav-category">Data Laporan</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Laporan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('M.R.T')}}">Riwayat Penjualan</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('M.H.L')}}">Laporan Harian</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('M.B.L')}}">Laporan Bulan</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('M.T.L')}}">Laporan Tahun</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">pages</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('M.user')}}"> Users </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('logout')}}"> Logout </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>