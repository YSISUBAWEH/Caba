<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('K.index')}}">
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
                <li class="nav-item"> <a class="nav-link" href="{{route('K.item')}}">Item</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('K.kate')}}">Kategori & Unit</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#suplay" aria-expanded="false" aria-controls="suplay">
            <i class="menu-icon mdi mdi-alpha-s-box-outline"></i>
              <span class="menu-title">Inventory Stok</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="suplay">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('K.suplay')}}">Suplayer</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('K.stok')}}">stok</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Transaksi dan Laporan</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#transaksi" aria-expanded="false" aria-controls="transaksi">          
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Transaksi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="transaksi">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('K.V.T')}}">Transaksi</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('K.R.T')}}">Riwayat</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Laporan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('K.H.L')}}">Laporan Harian</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('K.B.L')}}">Laporan Bulan</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('K.T.L')}}">Laporan Tahun</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="{{route('logout')}}"> Logout </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>