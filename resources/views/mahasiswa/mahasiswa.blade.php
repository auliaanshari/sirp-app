@extends('layout.main')
@extends('layout.side-bar')

@section('content')


<a href="/home">Home</a> > <a href="/mahasiswa">Data Mahasiswa</a>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">
                    Data Mahasiswa
                </h4>
            </div>
            <div class="col-6 text-sm-right">
                <h4 class="card-title">
                    <button class="btn btn-success m-r-5" id="add">
                        <i class="anticon anticon-plus"></i>
                       Tambah Data
                    </button>
                </h4>
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
                    <h5 class="modal-title" id="exampleModalLabel">Form Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form">
                        {{ csrf_field() }}
                        <div class="form-group" id="div_nim">
                            <label>NIM</label>
                            <input required type="text" class="form-control" id="nim_input" name="nim_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_nama">
                            <label>Nama</label>
                            <input required type="text" class="form-control" id="nama_input" name="nama_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_mahasiswa">
                            <label>Email</label>
                            <input required type="text" class="form-control" id="email_input" name="email_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_mahasiswa">
                            <label>Password</label>
                            <input required type="text" class="form-control" id="password_input" name="password_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_tipe">
                            <label>Tipe</label>
                            <select class="form-control" id="tipe" name="tipe" required>
                                    <option value=""> Pilih Tipe </option>
                                    <option value="0"> Admin </option>
                                    <option value="1"> Mahasiswa </option>
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
                 "ajax": "{{ url('/mahasiswa/data') }}",
                        "columns": [
                            { "data": "nim" },
                            { "data": "nama" },
                            { "data": "email" },

                            {
                                data: 'id',
                                sClass: 'text-center',
                                render: function(data) {
                                    return'<a href="#" data-id="'+data+'" id="edit" class="text-warning" title="edit"><i class="anticon anticon-edit"></i> </a> &nbsp;'+
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
                $('#form').attr('action', '{{ url('mahasiswa/create') }}');
        });


        $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                    type: 'post',
                    data: {
                        'nim_input': $('#nim_input').val(),
                        'nama_input': $('#nama_input').val(),
                        'email_input': $('#email_input').val(),
                        'password_input': $('#password_input').val(),
                        'tipe_input': $('#tipe').val(),
                    },
                    success :function () {
                        $('#table').DataTable().destroy();
                        loadData();
                        $('#modal').modal('hide');
                    },

                });
        });

        $(document).on('click', '#edit', function() {
                var data = $('#table').DataTable().row($(this).parents('tr')).data();
                $('#modal').modal('show');
                $('#nim_input').val(data.nim).change();
                $('#nama_input').val(data.nama).change();
                $('#email_input').val(data.email).change();
                $('#password_input').val(data.password).change();
                $('#tipe').val(data.tipe).change();
                $('#form').attr('action', '{{ url('mahasiswa/update') }}/'+data.id);
        });


        $('#modal').on('hidden.bs.modal', function(e) {
                $(this).find('#form')[0].reset();
        });

        $(document).on('click', '#delete', function() {
                var id = $(this).data('id');
                if (confirm("Yakin ingin menghapus data?")){
                    $.ajax({
                        url : "{{ url('mahasiswa/delete') }}/"+id,
                        success :function () {
                            $('#table').DataTable().destroy();
                            loadData();
                        }
                    })
                }
        });

    } );



</script>
@endsection
