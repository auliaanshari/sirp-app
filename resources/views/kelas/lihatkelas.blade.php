@extends('layout.main')
@extends('layout.side-bar')

@section('content')


<a href="/home">Home</a> > <a href="/lihatkelas">Kelas</a> 
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">
                    Data Kelas
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
                    <th>Kode Matakuliah</th>
                    <th>Nama Matakuliah</th>
                    <th>Tahun</th>
                    <th>Semester</th>
                    <th>SKS</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
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
                 "ajax": "{{ url('/lihatkelas/data1') }}",
                        "columns": [
                            { "data": "kelas.kode_kelas" },
                            { "data": "kelas.kode_matkul" },
                            { "data": "kelas.nama_matkul" },
                            { "data": "kelas.tahun" },
                            { "data": "kelas.semester" },
                            { "data": "kelas.sks" },

                            {
                                data: 'id',
                                sClass: 'text-center',
                                render: function(data) {
                                    return'<a href="{{ url('/kelas/detail1') }}/'+data+'" data-id="'+data+'" id="detail" class="text-success" title="detail"><i class="anticon anticon-eye"></i> </a>'
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
    } );



</script>
@endsection
