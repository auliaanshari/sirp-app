@extends('layout.main')
@extends('layout.side-bar')

@section('content')


<a href="/home">Home</a> > <a href="/kelas">Kelas</a> > <a href="">Detail Kelas</a>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">
                    Detail Kelas : {{$kelas[0]->kode_kelas}}
                </h4>
            </div>
            <!-- <div class="col-6 text-sm-right">
                <h4 class="card-title">
                    <button class="btn btn-success m-r-5" id="edit">
                        <i class="anticon anticon-edit"></i>
                       Edit Data
                    </button>
                </h4>
            </div> -->
        </div>
    </div>

    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="mb-3"><b>Kode Matakuliah</b></div>
                <div class="mb-3"><b>Nama Matakuliah</b></div>
                <div class="mb-3"><b>Tahun</b></div>
                <div class="mb-3"><b>Semester</b></div>
                <div class="mb-3"><b>SKS</b></div>
            </div>
            <div class="col-md-2">
                <div class="mb-3"><span>:</span></div>
                <div class="mb-3"><span>:</span></div>
                <div class="mb-3"><span>:</span></div>
                <div class="mb-3"><span>:</span></div>
                <div class="mb-3"><span>:</span></div>
            </div>
            <div class="col-md-3">
                <div class="mb-3"><span>{{$kelas[0]->kode_matkul}}</span></div>
                <div class="mb-3"><span>{{$kelas[0]->nama_matkul}}</span></div>
                <div class="mb-3"><span>{{$kelas[0]->tahun}}</span></div>
                <div class="mb-3"><span>{{$kelas[0]->semester}}</span></div>
                <div class="mb-3"><span>{{$kelas[0]->sks}}</span></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modaldetail">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form">
                        {{ csrf_field() }}
                        <div class="form-group" id="div_nim">
                            <label>Kode Kelas</label>
                            <input required type="text" class="form-control" id="kelasdetail_input" name="kelasdetail_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_nim">
                            <label>Kode Matakuliah</label>
                            <input required type="text" class="form-control" id="matkul_input" name="matkul_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_nama">
                            <label>Nama Matakuliah</label>
                            <input required type="text" class="form-control" id="nama_input" name="nama_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_tahun">
                            <label>Tahun</label>
                            <input required type="number" class="form-control" id="tahun_input" name="tahun_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_semester">
                            <label>Semester</label>
                            <select class="form-control" id="semester" name="semester" required>
                                    <option value=""> Pilih Semester </option>
                                    <option value="1"> Ganjil </option>
                                    <option value="2"> Genap </option>
                                </select>
                        </div>
                        <div class="form-group" id="div_sks">
                            <label>SKS</label>
                            <input required type="number" class="form-control" id="sks_input" name="sks_input" placeholder="...." >
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default mr-3" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-6"> 

            <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">
                            Data Peserta Kelas
                        </h4>
                    </div>
                    <div class="col-6 text-sm-right">
                        <h4 class="card-title">
                            <button class="btn btn-success m-r-5" id="addpeserta">
                                <i class="anticon anticon-plus"></i>
                            Tambah Peserta Kelas
                            </button>
                        </h4>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tablepeserta">
                        <thead>
                        <tr class="text-sm-center">
                            <th>Kode Kelas</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="modal fade" id="modalpeserta">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Peserta Kelas</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="anticon anticon-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formpeserta">
                                {{ csrf_field() }}
                                <div class="form-group" id="div_kelaspeserta">
                                    <label>Kode Kelas</label>
                                    <select class="form-control" id="kelaspeserta" name="kelaspeserta" required>
                                            <option value=""> Pilih Kode Kelas </option>
                                        </select>
                                </div>
                                <div class="form-group" id="div_nim">
                                    <label>NIM</label>
                                    <select class="form-control" id="nim" name="nim" required>
                                            <option value=""> Pilih NIM </option>
                                        </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default mr-3" data-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6"> 
        
            <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">
                            Data Pertemuan Kelas
                        </h4>
                    </div>
                    <div class="col-6 text-sm-right">
                        <h4 class="card-title">
                            <button class="btn btn-success m-r-5" id="addpertemuan">
                                <i class="anticon anticon-plus"></i>
                            Tambah Pertemuan Kelas
                            </button>
                        </h4>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tablepertemuan">
                        <thead>
                        <tr class="text-sm-center">
                            <th>Kode Kelas</th>
                            <th>Pertemuan Ke</th>
                            <th>Tanggal</th>
                            <th>Materi</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="modal fade" id="modalpertemuan">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Kelas</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="anticon anticon-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formpertemuan">
                                {{ csrf_field() }}
                                <div class="form-group" id="div_kelaspertemuan">
                                    <label>Kode Kelas</label>
                                    <select class="form-control" id="kelaspertemuan" name="kelaspertemuan" required>
                                            <option value=""> Pilih Kode Kelas </option>
                                        </select>
                                </div>
                                <div class="form-group" id="div_pertemuan">
                                    <label>Pertemuan Ke</label>
                                    <input required type="number" class="form-control" id="pertemuan_input" name="pertemuan_input" placeholder="...." >
                                </div>
                                <div class="form-group" id="div_nama">
                                    <label>Tanggal</label>
                                    <input required type="date" class="form-control" id="tanggal_input" name="tanggal_input" placeholder="...." >
                                </div>
                                <div class="form-group" id="div_tahun">
                                    <label>Materi</label>
                                    <input required type="text" class="form-control" id="materi_input" name="materi_input" placeholder="...." >
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default mr-3" data-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
<script type="text/javascript">

    $(document).ready( function () {

        $.extend( $.fn.dataTable.defaults, {
                autoWidth: false,
                language: {
                    search: '<span>Cari:</span> _INPUT_',
                    searchPlaceholder: 'Cari...',
                    lengthMenu: '<span>Tampil:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                }
            });

        function loadData() {
            $('#tablepeserta').dataTable({
                 "ajax": "{{ url('/kelas/detail/data_mahasiswa', $kelas_id) }}",
                        "columns": [
                            { "data": "kelas.kode_kelas" },
                            { "data": "user.nim" },
                            { "data": "user.nama" },

                            {
                                data: 'id',
                                sClass: 'text-center',
                                render: function(data) {
                                    return'<a href="#" data-id="'+data+'" id="deletepeserta" class="text-danger" title="hapus"><i class="anticon anticon-delete"></i> </a>';
                                },
                            }
                        ],
                        // columnDefs: [
                        //     {
                        //         width: "30px",
                        //         targets: [0]
                        //     },
                        //     {
                        //         width: "150px",
                        //         targets: [1]
                        //     },
                        //     {
                        //         width: "50px",
                        //         targets: [2],
                        //         orderable: false
                        //     },
                            
                        // ],

                });

            } loadData();

                function loadData1() {

                $('#tablepertemuan').dataTable({
                 "ajax": "{{ url('/kelas/detail/data_pertemuan', $kelas_id) }}",
                        "columns": [
                            { "data": "kelas.kode_kelas" },
                            { "data": "pertemuan_ke" },
                            { "data": "tanggal" },
                            { "data": "materi" },

                            {
                                data: 'id',
                                sClass: 'text-center',
                                render: function(data) {
                                    return'<a href="{{ url('/kelas/pertemuan/detail') }}/'+data+'" data-id="'+data+'" id="detail" class="text-success" title="detail"><i class="anticon anticon-eye"></i> </a> &nbsp;'+
                                        '<a href="#" data-id="'+data+'" id="deletepertemuan" class="text-danger" title="hapus"><i class="anticon anticon-delete"></i> </a>';
                                },
                            }
                        ],
                        // columnDefs: [
                        //     {
                        //         width: "30px",
                        //         targets: [0]
                        //     },
                        //     {
                        //         width: "150px",
                        //         targets: [1]
                        //     },
                        //     {
                        //         width: "50px",
                        //         targets: [2],
                        //         orderable: false
                        //     },
                            
                        // ],

                });
        } loadData1();




        $(document).on('click', '#addpeserta', function() {
                $('#modalpeserta').modal('show');
                $('#kelaspeserta').find('option').remove().end();
                $('#nim').find('option').remove().end();
                $('#formpeserta').attr('action', '{{ url('peserta/create') }}');

                $.ajax({
                    url: '{{ url('peserta/combo_kelas1', $kelas_id) }}',
                    dataType: "json",
                    success: function(data) {
                        var kelas = jQuery.parseJSON(JSON.stringify(data));
                        $.each(kelas, function(k, v) {
                            $('#kelaspeserta').append($('<option>', {value:v.id}).text(v.kode_kelas + " - " + v.nama_matkul))
                        })
                    }
                });
                
                $.ajax({
                    url: '{{ url('peserta/combo_user1', $kelas_id) }}',
                    dataType: "json",
                    success: function(data) {
                        var user = jQuery.parseJSON(JSON.stringify(data));
                        $.each(user, function(k, v) {
                            $('#nim').append($('<option>', {value:v.id}).text(v.nim + " - " + v.nama))
                        })
                    }
                });
        });


        $('#formpeserta').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                    type: 'post',
                    data: {
                        'kelas_input': $('#kelaspeserta').val(),
                        'nim_input': $('#nim').val(),
                    },
                    success :function () {
                        $('#tablepeserta').DataTable().destroy();
                        loadData();
                        $('#modalpeserta').modal('hide');
                    },

                });
        });

        $('#modalpeserta').on('hidden.bs.modal', function(e) {
                $(this).find('#formpeserta')[0].reset();
        });

        $(document).on('click', '#deletepeserta', function() {
                var id = $(this).data('id');
                if (confirm("Yakin ingin menghapus data?")){
                    $.ajax({
                        url : "{{ url('peserta/delete') }}/"+id,
                        success :function () {
                            $('#tablepeserta').DataTable().destroy();
                            loadData();
                        }
                    })
                }
        });

        $(document).on('click', '#addpertemuan', function() {
                $('#modalpertemuan').modal('show');
                $('#formpertemuan').attr('action', '{{ url('pertemuan/create') }}');
        });


        $('#formpertemuan').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                    type: 'post',
                    data: {
                        'kelas_input': $('#kelaspertemuan').val(),
                        'pertemuan_input': $('#pertemuan_input').val(),
                        'tanggal_input': $('#tanggal_input').val(),
                        'materi_input': $('#materi_input').val(),
                    },
                    success :function () {
                        $('#tablepertemuan').DataTable().destroy();
                        loadData1();
                        $('#modalpertemuan').modal('hide');
                    },

                });
        });

        $('#modalpertemuan').on('hidden.bs.modal', function(e) {
                $(this).find('#formpertemuan')[0].reset();
        });

        $.ajax({
                url: '{{ url('pertemuan/combo_kelas1', $kelas_id) }}',
                dataType: "json",
                success: function(data) {
                    var kelas = jQuery.parseJSON(JSON.stringify(data));
                    $.each(kelas, function(k, v) {
                        $('#kelaspertemuan').append($('<option>', {value:v.id}).text(v.kode_kelas + " - " + v.nama_matkul))
                    })
                }
            });

        $(document).on('click', '#deletepertemuan', function() {
                var id = $(this).data('id');
                if (confirm("Yakin ingin menghapus data?")){
                    $.ajax({
                        url : "{{ url('pertemuan/delete') }}/"+id,
                        success :function () {
                            $('#tablepertemuan').DataTable().destroy();
                            loadData1();
                        }
                    })
                }
        });

    } );



</script>
@endsection
