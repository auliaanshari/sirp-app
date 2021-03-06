<?php

namespace App\Http\Controllers;

use App\Models\Pertemuan;
use App\Models\Kelas;
use App\Models\Absensi;
use App\Models\KRS;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use DataTables;

class PertemuanController extends Controller
{
    public function data()
    {
        $pertemuan = Pertemuan::with('kelas');
        return DataTables::of($pertemuan)->toJson();
    }

    public function data_absensi($id)
    {
        $data = DB::table('absensi')->leftjoin('pertemuan', 'pertemuan.id', '=', 'absensi.pertemuan_id')
                    ->leftJoin('krs', 'absensi.krs_id', '=', 'krs.id')
                    ->leftJoin('user', 'krs.user_id', '=', 'user.id')
                    ->select('user.*', 'krs.*','absensi.*')
                    ->where('pertemuan.id', $id)
                    ->get();

        return DataTables::of($data)->toJson();
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

    public function updatefile(Request $request, $id){
        $update = Pertemuan::find($id);
        $update->file = $request->file_input;
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

    public function combo_kelas1($id)
    {
        $kelas = Kelas::where('id', $id)->get();
        return $kelas->toJson();
    }
    
}
