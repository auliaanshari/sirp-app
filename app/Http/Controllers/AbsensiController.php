<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\KRS;
use App\Models\Pertemuan;
use Illuminate\Http\Request;
use DataTables;

class AbsensiController extends Controller
{
    public function data()
    {
        $absensi = Absensi::with('krs.kelas', 'krs.user', 'pertemuan');
        return DataTables::of($absensi)->toJson();
    }

    public function create(Request $request){
        $create = new Pertemuan();
        $create->kelas_id = $request->kelas_input;
        $create->pertemuan_ke = $request->pertemuan_input;
        $create->tanggal = $request->tanggal_input;
        $create->materi = $request->materi_input;
        $create->save();
    }

    public function update(Request $request, $id){
        $update = Pertemuan::find($id);
        $update->kelas_id = $request->kelas_input;
        $update->pertemuan_ke = $request->pertemuan_input;
        $update->tanggal = $request->tanggal_input;
        $update->materi = $request->materi_input;
        $update->save();
    }

    public function delete($id){
        Pertemuan::where('id', $id)->delete();
    }

    public function combo_kelas()
    {
        $kelas = Kelas::all();
        return $kelas->toJson();
    }
}
