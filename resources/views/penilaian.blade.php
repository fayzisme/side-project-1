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
      <img class="animation__shake"  src="{{ asset ('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
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
        <div id="penilaian" class="container-fluid">
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
                          <h4 class="modal-title">Penilaian</h4>
                          <button ref="close" id="close_modal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form id="quickFormpenilaian" @submit=submitForm($event)>
                        <div class="modal-body">
                          <div class="card">
                            
                                @csrf()
                                <input v-if="editStatus" type="hidden" name="_method" value="PUT">

                                <div class="card-body">
                                <div class="form-group">
                                  <label for="penyakit">Penyakit</label>
                                  <select style="width: 100%;" id="penyakit" name="id_penyakit" v-model="{{ json_encode(old('id_penyakit')) }} || data.id_penyakit" class="form-select" aria-label=".form-select example">
                                  <option value="" >Pilih Penyakit</option>
                                    @foreach($penyakits as $penyakit)
                                      <option value="{{ $penyakit->id }}">{{ $penyakit->nama_penyakit }} [{{$penyakit->kode_penyakit}}]</option>
                                    @endforeach
                                  </select>
                                  @error('penyakit_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="gejala">Gejala</label>
                                  <select style="width: 100%;" id="gejala" name="id_gejala" v-model="{{ json_encode(old('id_gejala')) }} || data.id_gejala" class="form-select" aria-label=".form-select example">
                                  <option value="">Pilih Gejala</option>  
                                    @foreach($gejalas as $gejala)
                                      <option value="{{ $gejala->id }}">{{ $gejala->nama_gejala }} [{{$gejala->kode_gejala}}]</option>
                                    @endforeach
                                  </select>
                                  @error('gejala_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="bonotnilai">Nilai</label>
                                  <input @keydown="validateNumericInput($event)" type="text" name="bobot_penilaian" class="form-control @error('bobot_penilaian') is-invalid @enderror" id="bonotnilai" placeholder="Isi bobot nilai" v-model="{{ json_encode(old('bobot_penilaian')) }} || data.bobot_penilaian">
                                  @error('bobot_penilaian')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
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
                      <div class="col-md-6"><h3 class="card-title">List Penilaian</h3></div>
                      <div class="col-md-6">
                        {{-- <a href="{{ route('penilaian.create') }}" type="button" class="btn btn-primary float-right">
                          <i class="fas fa-plus"></i><span> Add penilaian</span>
                        </a> --}}
                        <div class="row">
                          <div class="col-md-12">
                            <button @click="addData()" type="button" class="btn btn-primary  float-right text-white bg-blue-700 hover:bg-blue-800 " data-toggle="modal" data-target="#modal-default">
                              <i class="fas fa-plus"></i><span> Add penilaian</span>
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
                        <th>Kode Penyakit</th>
                        <th>Nama Penyakit</th>
                        <th>Kode Gejala</th>
                        <th>Nama Gejala</th>
                        <th>Nilai</th>
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
                    {{-- <div class="pagination">
                      {{ $penilaians->links() }}
                    </div> --}}
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
  var apiUrl = 'api/penilaian/list';
  var columns = [
              {
                  'data': 'DT_RowIndex',
                  'class': 'text-center',
                  'orderable': true
              },
              {
                  'data': 'kode_penyakit',
                  'class': 'text-center',
                  'width' : '200px',
                  'orderable': true
              },
              {
                  'data': 'nama_penyakit',
                  'class': 'text-center',
                  'width' : '200px',
                  'orderable': true
              },
              {
                  'data': 'kode_gejala',
                  'class': 'text-center',
                  'width' : '200px',
                  'orderable': true
              },
              {
                  'data': 'nama_gejala',
                  'class': 'text-center',
                  'width' : '200px',
                  'orderable': true
              },
              {
                  'data': 'bobot_penilaian',
                  'class': 'text-center',
                  'width' : '100px',
                  'orderable': true
              },
              {
                  render: (index, row, data, meta) => {
                    return `
                    <a href="#" type="button" onclick=penilaian.editData(event,${data.id}) class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-default">
                                        <i class="fas fa-pen"></i>
                    </a>
                    <a href="#" type="button" onclick=penilaian.deleteData(event,${data.id}) class="btn btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                    </a>`
                  },
                  'width': '100px',
                  'orderable': false
              }
      ];

  var penilaian = new Vue({
    el: '#penilaian',
    data : {
      // apiUrl: {{ url('api/penilaian/list') }},
      loading:false,
      data: {
        id_penyakit: '',
        id_gejala: ''
      },
      datas: [],
      columns,
      actionUrl: '{{ route('penilaian.store') }}',
      editStatus: false
    },
    mounted: function () {
      this.dataTable();
    },
    created: function () {

    },
    methods: {
      validateNumericInput(event) {
          const keyCode = event.keyCode;

          // Cek apakah keyCode yang ditekan adalah angka, titik, atau tombol navigasi
          if (!((keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105) || keyCode === 110 || keyCode === 190 || keyCode === 8 || keyCode === 37 || keyCode === 39 || keyCode === 46)) {
              // Batalkan event jika bukan angka, titik, atau tombol navigasi
              event.preventDefault();
          }
      },
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
        this.actionUrl = '{{ route('penilaian.store') }}'
        this.data = {
          id_penyakit: '',
          id_gejala: '',
        }
        this.editStatus = false
      },
      editData(event, val){
        console.log(event, val, this.datas);
        this.editStatus = true
        this.data = this.datas.filter(el => el.id == val)[0];
        console.log(this.data);
        this.actionUrl = `{{ url('penilaian') }}/${this.data.id}`
        // $('#modal-default').modal();
      },
      deleteData(event,id){
        this.actionUrl = `{{ url('penilaian') }}/${id}`
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