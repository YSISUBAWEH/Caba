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
            <a class="nav-link" data-bs-toggle="collapse" href="#nav-item" aria-expanded="false" aria-controls="nav-item">
            <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Items</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="nav-item">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('M.item')}}">Item</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('M.kate')}}">Kategori dan Unit</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#suplay" aria-expanded="false" aria-controls="suplay">
            <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Suplayer</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="suplay">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('M.suplay')}}">Suplayer</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('M.stok')}}">stok</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Data Transaksi dan Laporan</li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('M.R.T')}}" >
            <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Data Transaksi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Laporan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('M.H.L')}}">Laporan Harian</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('M.B.L')}}">Laporan Bulan</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('M.T.L')}}">Laporan Tahun</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">pages</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('M.user')}}"> Data Users </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('logout')}}"> Logout </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>