@extends('layouts.app')

@push('css')
  <link rel="stylesheet" href="{{ asset ('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">

  <style>
    div.dataTables_wrapper div.dataTables_length select {
      min-width: 50px;
    }
  </style>
@endpush

@section('content')
    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Sidebar Container -->
    @include('partials.sidebar')

<div class="wrapper ">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('assets/img/logo.png') }}" alt="FlowBite Logo" height="60"
            width="60">
    </div>
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mt-14">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{ $data['title'] }}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div id="admin" class="container-fluid">
          <div class="row">
            <div class="col">
              @if ($errors->any())
                  <div class="alert alert-danger">
                    <div><strong>Failed</strong></div>
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              @if (session()->has('pesan'))
                  {!!  session('pesan') !!}
              @endif
              <div class="card">
                  {{-- modal --}}
                  <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Admin</h4>
                          <button ref="close" id="close_modal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form id="quickFormadmin" @submit=submitForm($event)>
                        <div class="modal-body">
                          <div class="card">
                            
                                @csrf()
                                <input v-if="editStatus" type="hidden" name="_method" value="PUT">

                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="exampleInputNama1">Nama Admin</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputNama1" placeholder="Masukkan Nama" v-model="{{ json_encode(old('name')) }} || data.name" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" v-model="{{ json_encode(old('email')) }} || data.email" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" v-model="{{ json_encode(old('password')) }} || data.password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="password-confirm">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password-confirm" placeholder="Retype password" v-model="{{ json_encode(old('password_confirmation')) }} || data.password_confirmation" required autocomplete="new-password">
                                    <!-- @error('password-confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror -->
                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary bg-blue-700">
                                <div v-if=loading class="spinner-border" role="status">
                                  <span class="sr-only">Loading...</span>
                                </div>
                                Submit
                              </button>
                            </div>
                        </div>
                      </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <div class="card-header">
                    <div class="row">
                      <div class="col-md-6"><h3 class="card-title">List Admin</h3></div>
                      <div class="col-md-6">
                        {{-- <a href="{{ route('admin.create') }}" type="button" class="btn btn-primary float-right">
                          <i class="fas fa-plus"></i><span> Add admin</span>
                        </a> --}}
                        <div class="row">
                          <div class="col-md-12">
                            <button @click="addData()" type="button" class="btn btn-primary  float-right text-white bg-blue-700 hover:bg-blue-800 " data-toggle="modal" data-target="#modal-default">
                              <i class="fas fa-plus"></i><span> Add admin</span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="myTable2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Admin</th>
                        <th>Email</th>
                        <th>Tanggal dibuat</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <!-- {{-- <tfoot>
                      <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                      </tr>
                      </tfoot> --}} -->
                    </table>
                    <!-- {{-- <div class="pagination">
                      {{ $admins->links() }}
                    </div> --}} -->
                  </div>
                  <!-- /.card-body -->
              </div>
            </div>
          </div>
          <!-- Small boxes (Stat box) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2024 <a href="#">Sipakar Rinitis</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
      </div>
    </footer>
  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>

@endsection

@push('js')
{{-- vue --}}
<script type="text/javascript">
  var apiUrl = 'api/admin/list?id=' + "{{ json_encode(Auth::user()->id)}}";
  var columns = [
              {
                  'data': 'DT_RowIndex',
                  'class': 'text-center',
                  'orderable': true
              },
              {
                  'data': 'name',
                  'class': 'text-center',
                  'width' : '200px',
                  'orderable': true
              },
              {
                  'data': 'email',
                  'class': 'text-center',
                  'orderable': true
              },
              {
                  'data': 'created_at',
                  'class': 'text-center',
                  'orderable': true
              },
              {
                  render: (index, row, data, meta) => {
                    return `
                    <a href="#" type="button" onclick=admin.editData(event,${data.id}) class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-default">
                                        <i class="fas fa-pen"></i>
                    </a>
                    <a href="#" type="button" onclick=admin.deleteData(event,${data.id}) class="btn btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                    </a>`
                  },
                  'width': '100px',
                  'orderable': false
              }
      ];

  var admin = new Vue({
    el: '#admin',
    data : {
      // apiUrl: {{ url('api/admin/list') }},
      loading:false,
      data: {
        name: '',
        email: '',
        password: ''
      },
      datas: [],
      columns,
      actionUrl: '{{ route('admin.store') }}',
      editStatus: false
    },
    mounted: function () {
      this.dataTable();
    },
    created: function () {

    },
    methods: {
      dataTable(){
       const _this = this
       _this.table =  $('#myTable2').DataTable({
                    "processing": true,
                    "serverSide": true,
                    ajax: {
                        type: "get",
                        url:  apiUrl,
                        error: function (xhr, error, thrown) {
                            console.log('Kesalahan AJAX:', error);
                            console.log('Detail Kesalahan:', thrown);
                            // Tindakan yang sesuai, misalnya menampilkan pesan kesalahan kepada pengguna
                        }
                    },
                    columns:  _this.columns
                    }).on('xhr', function () {
                      // console.log(_this.table.ajax.json().data);
                      _this.datas = _this.table.ajax.json().data;
                    })
      },
      addData(){
        this.actionUrl = '{{ route('admin.store') }}'
        this.data = {
          name: '',
          email: '',
          password: ''
        }
        this.editStatus = false
      },
      editData(event, val){
        // console.log(event, val, this.datas);
        this.editStatus = true
        this.data = this.datas.filter(el => el.id == val)[0];
        // console.log(this.data);
        this.actionUrl = `{{ url('admin') }}/${this.data.id}`
        // $('#modal-default').modal();
      },
      deleteData(event,id){
        this.actionUrl = `{{ url('admin') }}/${id}`
        if (confirm('Apakah anda yakin akan menghapus data ini ?')) {
          axios.post(this.actionUrl, {_method : 'DELETE'}).then(response => {
            alert('Data has been removed')
            this.table.ajax.reload()
          })
        }
      },
      submitForm(event){
        event.preventDefault();
        this.loading = true;
        axios.post(this.actionUrl, new FormData($(event.target)[0])).then( response => {
          this.table.ajax.reload()
          this.loading = false
          const element = this.$refs.close;
          // Check if the element exists and trigger the click event close modal
          if (element) {
            element.click();
          }
          
        })
      }
    }
  })

</script>
    
@endpush