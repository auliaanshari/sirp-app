@extends('layout.main')
@extends('layout.side-bar')

@section('content')



<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">
                    Detail Kelas : {{$kelas[0]->kode_kelas}}
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
        <!-- <div class="table-responsive">
            <table class="table table-bordered" id="table">
                <thead>
                <tr class="text-sm-center">
                    <th>Kode Kelas</th>
                    <th>Kode Matakuliah</th>
                    <th>Nama Matakuliah</th>
                    <th>Tahun</th>
                    <th>Semester</th>
                    <th>SKS</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div> -->
    </div>

    <div class="modal fade" id="modal">
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
                            <input required type="text" class="form-control" id="kelas_input" name="kelas_input" placeholder="...." >
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
                            <input required type="text" class="form-control" id="tahun_input" name="tahun_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_semester">
                            <label>Semester</label>
                            <input required type="text" class="form-control" id="semester_input" name="semester_input" placeholder="...." >
                        </div>
                        <div class="form-group" id="div_sks">
                            <label>SKS</label>
                            <input required type="text" class="form-control" id="sks_input" name="sks_input" placeholder="...." >
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

    // $(document).ready( function () {

    //     $.extend( $.fn.dataTable.defaults, {
    //             autoWidth: false,
    //             language: {
    //                 search: '<span>Cari:</span> _INPUT_',
    //                 searchPlaceholder: 'Cari...',
    //                 lengthMenu: '<span>Tampil:</span> _MENU_',
    //                 paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
    //             }
    //         });

    //     function loadData() {
    //         $('#table').dataTable({
    //              "ajax": "{{ url('/kelas/data') }}",
    //                     "columns": [
    //                         { "data": "kode_kelas" },
    //                         { "data": "kode_matkul" },
    //                         { "data": "nama_matkul" },
    //                         { "data": "tahun" },
    //                         { "data": "semester" },
    //                         { "data": "sks" },

    //                         {
    //                             data: 'id',
    //                             sClass: 'text-center',
    //                             render: function(data) {
    //                                 return'<a href="#" data-id="'+data+'" id="edit" class="text-warning" title="edit"><i class="anticon anticon-edit"></i> </a> &nbsp;'+
    //                                     '<a href="#" data-id="'+data+'" id="delete" class="text-danger" title="hapus"><i class="anticon anticon-delete"></i> </a>';
    //                             },
    //                         }
    //                     ],
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

        //         });
        // } loadData();


        $(document).on('click', '#add', function() {
                $('#modal').modal('show');
                $('#form').attr('action', '{{ url('kelas/create') }}');
        });


        $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                    type: 'post',
                    data: {
                        'kelas_input': $('#kelas_input').val(),
                        'matkul_input': $('#matkul_input').val(),
                        'nama_input': $('#nama_input').val(),
                        'tahun_input': $('#tahun_input').val(),
                        'semester_input': $('#semester_input').val(),
                        'sks_input': $('#sks_input').val(),
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
                $('#kelas_input').val(data.kode_kelas).change();
                $('#matkul_input').val(data.kode_matkul).change();
                $('#nama_input').val(data.nama_matkul).change();
                $('#tahun_input').val(data.tahun).change();
                $('#semester_input').val(data.semester).change();
                $('#sks_input').val(data.sks).change();
                $('#form').attr('action', '{{ url('kelas/update') }}/'+data.id);
        });


        $('#modal').on('hidden.bs.modal', function(e) {
                $(this).find('#form')[0].reset();
        });

        $(document).on('click', '#delete', function() {
                var id = $(this).data('id');
                if (confirm("Yakin ingin menghapus data?")){
                    $.ajax({
                        url : "{{ url('kelas/delete') }}/"+id,
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
