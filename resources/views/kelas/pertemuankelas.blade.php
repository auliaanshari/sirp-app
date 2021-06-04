@extends('layout.main')
@extends('layout.side-bar')

@section('content')



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
                            <select class="form-control" id="kelas" name="kelas" required>
                                    <option value=""> Pilih Kode Kelas </option>
                                </select>
                        </div>
                        <div class="form-group" id="div_nim">
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
                 "ajax": "{{ url('/pertemuan/data') }}",
                        "columns": [
                            { "data": "kelas.kode_kelas" },
                            { "data": "pertemuan_ke" },
                            { "data": "tanggal" },
                            { "data": "materi" },

                            {
                                data: 'id',
                                sClass: 'text-center',
                                render: function(data) {
                                    return'<a href="{{ url('/detail/data') }}" data-id="'+data+'" id="detail" class="text-success" title="detail"><i class="anticon anticon-eye"></i> </a> &nbsp;'+
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
                $('#form').attr('action', '{{ url('pertemuan/create') }}');
        });


        $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                    type: 'post',
                    data: {
                        'kelas_input': $('#kelas').val(),
                        'pertemuan_input': $('#pertemuan_input').val(),
                        'tanggal_input': $('#tanggal_input').val(),
                        'materi_input': $('#materi_input').val(),
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
                $('#kelas').val(data.kode_kelas).change();
                $('#pertemuan_input').val(data.pertemuan_ke).change();
                $('#tanggal_input').val(data.tanggal).change();
                $('#materi_input').val(data.materi).change();
                $('#form').attr('action', '{{ url('pertemuan/update') }}/'+data.id);
        });


        $('#modal').on('hidden.bs.modal', function(e) {
                $(this).find('#form')[0].reset();
        });

        $(document).on('click', '#delete', function() {
                var id = $(this).data('id');
                if (confirm("Yakin ingin menghapus data?")){
                    $.ajax({
                        url : "{{ url('pertemuan/delete') }}/"+id,
                        success :function () {
                            $('#table').DataTable().destroy();
                            loadData();
                        }
                    })
                }
        });

        $.ajax({
                url: '{{ url('pertemuan/combo_kelas') }}',
                dataType: "json",
                success: function(data) {
                    var kelas = jQuery.parseJSON(JSON.stringify(data));
                    $.each(kelas, function(k, v) {
                        $('#kelas').append($('<option>', {value:v.id}).text(v.kode_kelas))
                    })
                }
            });

    } );



</script>
@endsection
