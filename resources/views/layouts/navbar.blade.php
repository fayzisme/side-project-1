<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      {{-- <li v-if="loading" class="spinner-border nav-item" role="status" style="position: relative; top: 10px;">
        <span class="sr-only">Loading...</span>
      </li>
      <li v-else class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">@{{ total }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">@{{ total }} Notifications</span>
          <div v-for="data in datas" :key="data.id">
            <div class="dropdown-divider"></div>
            <a :href="`{{ url('transaction') }}/${data.id}`" class="dropdown-item" style="display: flex; justify-content:space-between;">
             <strong>
              @{{ data.member.name.slice(0, 10) }}
            </strong>
            <span>
              terlambat
            </span>
              <span class="float-right text-muted text-sm">@{{ data.terlambat || 0 }} hari</span>
            </a>
          </div>
          <div class="card-tools" style="padding-bottom: 8px;">
            <ul class="pagination pagination-md" style="justify-content: space-around;">
              <li class="page-item"><button @click="handlePage($event,'false')" :disabled="page==1">Previous</button></li>
              <li class="page-item"><button @click="handlePage($event,'true')" :disabled="page==lastPage">Next</button></li>
            </ul>
          </div>
        </div>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
      </li>
    </ul>
  </nav>