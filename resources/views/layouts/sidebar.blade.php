<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset ('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="{{ asset ('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('home.index') }}" class="nav-link {{ request()->is('home') || request()->is('/') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @role(['admin','petugas'])
          <!-- <li class="nav-item">
            <a href="{{ route('riwayat.index') }}" class="nav-link {{ request()->is('riwayat') || request()->is('riwayat/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Riwayat
              </p>
            </a>
          </li> -->
          @endrole
          @role('admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('penyakit.index') }}" class="nav-link {{ request()->is('penyakit') || request()->is('penyakit/*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Penyakit
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('gejala.index') }}" class="nav-link {{ request()->is('gejala') || request()->is('gejala/*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Gejala
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.index') }}" class="nav-link {{ request()->is('admin') || request()->is('admin/*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Admin
                  </p>
                </a>
              </li>
            </ul>
          </li>
          @endrole
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>