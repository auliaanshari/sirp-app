@extends('layout.main')
@extends('layout.side-bar')

@section('content')


<a href="/home">Home</a> > <a href="/kelas">Kelas</a> > <a href="">Detail Kelas</a> > <a href="">Detail Pertemuan</a>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">
                    Detail Pertemuan : {{$pertemuan[0]->pertemuan_ke}}<br>
                    Tanggal : {{$pertemuan[0]->tanggal}}
                </h4>
            </div>
            <!-- <div class="col-6 text-sm-right">
                <h4 class="card-title">
                    <button class="btn btn-success m-r-5" id="add">
                        <i class="anticon anticon-plus"></i>
                       Tambah Data
                    </button>
                </h4>
            </div> -->
        </div>
    </div>

    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="mb-3"><b>Kode Kelas</b></div>
                <div class="mb-3"><b>Kode Matakuliah</b></div>
                <div class="mb-3"><b>Nama Matakuliah</b></div>
                <div class="mb-3"><b>Tahun</b></div>
                <div class="mb-3"><b>Semester</b></div>
                <div class="mb-3"><b>SKS</b></div>
                <div class="mb-3"><b>File</b></div>
            </div>
            <div class="col-md-2">
                <div class="mb-3"><span>:</span></div>
                <div class="mb-3"><span>:</span></div>
                <div class="mb-3"><span>:</span></div>
                <div class="mb-3"><span>:</span></div>
                <div class="mb-3"><span>:</span></div>
                <div class="mb-3"><span>:</span></div>
                <div class="mb-3"><span>:</span></div>
            </div>
            <div class="col-md-3">
                <div class="mb-3"><span>{{$pertemuan[0]->kelas->kode_kelas}}</span></div>
                <div class="mb-3"><span>{{$pertemuan[0]->kelas->kode_matkul}}</span></div>
                <div class="mb-3"><span>{{$pertemuan[0]->kelas->nama_matkul}}</span></div>
                <div class="mb-3"><span>{{$pertemuan[0]->kelas->tahun}}</span></div>
                <div class="mb-3"><span>{{$pertemuan[0]->kelas->semester}}</span></div>
                <div class="mb-3"><span>{{$pertemuan[0]->kelas->sks}}</span></div>
                <div class="mb-3"><a href=""><span>{{$pertemuan[0]->file}}</span></a></div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    
    <div class="col-md-12"> 
        
    <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">
                    Data Absensi Kelas
                </h4>
            </div>
            <div class="col-6 text-sm-right">
                <h4 class="card-title">
                    <button class="btn btn-success m-r-5" id="add">
                        <i class="anticon anticon-plus"></i>
                       Tambah Data
                    </button>
                    <button class="btn btn-success m-r-5" id="addfile">
                        <i class="anticon anticon-plus"></i>
                       Upload File
                    </button>
                </h4>
            </div>
        </div>
            <div class="modal fade" id="modalfile">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Upload File</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="anticon anticon-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formfile">
                            {{ csrf_field() }}
                            <div class="form-group" id="div_file">
                                <label>File</label>
                                <input required type="file" class="form-control" id="file_input" name="file_input" placeholder="...." >
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

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="table">
                <thead>
                <tr class="text-sm-center">
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Status Kehadiran</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Durasi</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Peserta Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form">
                        {{ csrf_field() }}
                        <div class="form-group" id="div_pertemuan">
                            <label>Pertemuan</label>
                            <select class="form-control" id="pertemuan" name="pertemuan" required>
                                    <option value=""> Pilih Pertemuan </option>
                                </select>
                        </div>
                        <div class="form-group" id="div_nim">
                            <label>NIM</label>
                            <select class="form-control" id="nim" name="nim" required>
                                    <option value=""> Pilih NIM </option>
                                </select>
                        </div>
                        <div class="form-group" id="div_status">
                            <label>Status Kehadiran</label>
                            <select class="form-control" id="status" name="status" required>
                                    <option value=""> Pilih Status </option>
                                    <option value="0"> Tidak Hadir </option>
                                    <option value="1"> Hadir </option>
                                    <option value="2"> Izin/Sakit </option>
                                </select>
                        </div>
                        <div class="form-group" id="div_masuk">
                            <label>Jam Masuk</label>
                            <input required type="integer" class="form-control" id="masuk_input" name="masuk_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_keluar">
                            <label>Jam Keluar</label>
                            <input required type="integer" class="form-control" id="keluar_input" name="keluar_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_durasi">
                            <label>Durasi</label>
                            <input required type="integer" class="form-control" id="durasi_input" name="durasi_input" placeholder="...." >
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default mr-3" data-dismiss="modal">Keluar</button>
                            <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
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
<script>

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
            $('#table').dataTable({
                 "ajax": "{{ url('pertemuan/detail/data_absensi', $pertemuan_id) }}",
                        "columns": [
                            { "data": "nim" },
                            { "data": "nama" },
                            { "data": "status_kehadiran" },
                            { "data": "jam_masuk" },
                            { "data": "jam_keluar" },
                            { "data": "durasi" },
                            { "data": "email" },

                            {
                                data: 'id',
                                sClass: 'text-center',
                                render: function(data) {
                                    return'<a href="#" data-id="'+data+'" id="detail" class="text-success" title="detail"><i class="anticon anticon-eye"></i> </a> &nbsp;'+
                                        '<a href="#" data-id="'+data+'" id="edit" class="text-warning" title="edit"><i class="anticon anticon-edit"></i> </a> &nbsp;'+
                                        '<a href="#" data-id="'+data+'" id="delete" class="text-danger" title="hapus"><i class="anticon anticon-delete"></i> </a>';
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


        $(document).on('click', '#add', function() {
                $('#modal').modal('show');
                $('#form').attr('action', '{{ url('absensi/create') }}');
        });

        $(document).on('click', '#addfile', function() {
                $('#modalfile').modal('show');
                $('#formfile').attr('action', '{{ url('pertemuan/updatefile', $pertemuan_id) }}');
        });


        $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                    type: 'post',
                    data: {
                        'pertemuan_input': $('#pertemuan').val(),
                        'krs_input': $('#nim').val(),
                        'status_input': $('#status').val(),
                        'masuk_input': $('#masuk_input').val(),
                        'keluar_input': $('#keluar_input').val(),
                        'durasi_input': $('#durasi_input').val(),
                    },
                    success :function () {
                        $('#table').DataTable().destroy();
                        loadData();
                        $('#modal').modal('hide');
                    },

                });
        });

        $('#formfile').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                    type: 'post',
                    data: {
                        'file_input': $('#file_input').val(),
                    },
                    success :function () {
                        $('#modalfile').modal('hide');
                        location.reload();
                    },

                });
        });

        $(document).on('click', '#edit', function() {
                enable_field();
                var data = $('#table').DataTable().row($(this).parents('tr')).data();
                $('#modal').modal('show');
                $('#pertemuan').val(data.pertemuan_id).change();
                $('#nim').val(data.krs_id).change();
                $('#status').val(data.status_kehadiran).change();
                $('#masuk_input').val(data.jam_masuk).change();
                $('#keluar_input').val(data.jam_keluar).change();
                $('#durasi_input').val(data.durasi).change();
                $('#form').attr('action', '{{ url('absensi/update') }}/'+data.id);
        });

        $(document).on('click', '#detail', function() {
                disable_field();
                var data = $('#table').DataTable().row($(this).parents('tr')).data();
                $('#modal').modal('show');
                $('#pertemuan').val(data.pertemuan_id).change();
                $('#nim').val(data.krs_id).change();
                $('#status').val(data.status_kehadiran).change();
                $('#masuk_input').val(data.jam_masuk).change();
                $('#keluar_input').val(data.jam_keluar).change();
                $('#durasi_input').val(data.durasi).change();
                $('#form').attr('action', '{{ url('absensi/update') }}/'+data.id);
        });

        function disable_field() {
            document.getElementById("pertemuan").disabled = true;
            document.getElementById("nim").disabled = true;
            document.getElementById("status").disabled = true;
            document.getElementById("masuk_input").disabled = true;
            document.getElementById("keluar_input").disabled = true;
            document.getElementById("durasi_input").disabled = true;
            document.getElementById('simpan').style.visibility = 'hidden';
        }

        function enable_field() {
            document.getElementById("pertemuan").disabled = false;
            document.getElementById("nim").disabled = false;
            document.getElementById("status").disabled = false;
            document.getElementById("masuk_input").disabled = false;
            document.getElementById("keluar_input").disabled = false;
            document.getElementById("durasi_input").disabled = false;
            document.getElementById('simpan').style.visibility = 'visible';
        }


        $('#modal').on('hidden.bs.modal', function(e) {
                $(this).find('#form')[0].reset();
        });

        $(document).on('click', '#delete', function() {
                var id = $(this).data('id');
                if (confirm("Yakin ingin menghapus data?")){
                    $.ajax({
                        url : "{{ url('absensi/delete') }}/"+id,
                        success :function () {
                            $('#table').DataTable().destroy();
                            loadData();
                        }
                    })
                }
        });

        $.ajax({
                url: '{{ url('absensi/combo_pertemuan1', $pertemuan_id) }}',
                dataType: "json",
                success: function(data) {
                    var pertemuan = jQuery.parseJSON(JSON.stringify(data));
                    $.each(pertemuan, function(k, v) {
                        $('#pertemuan').append($('<option>', {value:v.id}).text(" Pertemuan ke - " + v.pertemuan_ke))
                    })
                }
            });
        
        $.ajax({
                url: '{{ url('absensi/combo_user1') }}',
                dataType: "json",
                success: function(data) {
                    var user = jQuery.parseJSON(JSON.stringify(data));
                    $.each(user, function(k, v) {
                        $('#nim').append($('<option>', {value:v.id}).text(v.nim + " - " + v.nama))
                        
                    })
                }
            });

    } );



</script>
@endsection
