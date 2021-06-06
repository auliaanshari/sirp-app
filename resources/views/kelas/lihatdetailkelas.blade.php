@extends('layout.main')
@extends('layout.side-bar')

@section('content')


<a href="/home">Home</a> > <a href="/lihatkelas">Kelas</a> > <a href="">Detail Kelas</a> 
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">
                    Detail Kelas : {{$kelas[0]->kode_kelas}}
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
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-12"> 

            <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">
                            Data Kehadiran Mahasiswa
                        </h4>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tablepeserta">
                        <thead>
                        <tr class="text-sm-center">
                        <th>Pertemuan</th>
                        <th>Tanggal</th>
                        <th>Materi</th>
                        <th>Status Kehadiran</th>
                        <th>Durasi</th>
                        </tr>
                        </thead>
                    </table>
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
                 "ajax": "{{ url('/lihatkelas/data2') }}",
                        "columns": [
                            { "data": "pertemuan.pertemuan_ke" },
                            { "data": "pertemuan.tanggal" },
                            { "data": "pertemuan.materi" },
                            { "data": "status_kehadiran" },
                            { "data": "durasi" },
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
