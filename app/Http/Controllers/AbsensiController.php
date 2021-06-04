<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\KRS;
use App\Models\Pertemuan;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class AbsensiController extends Controller
{
    public function data()
    {
        $absensi = Absensi::with('krs.kelas', 'krs.user', 'pertemuan');
        return DataTables::of($absensi)->toJson();
    }
    
    public function detail($id)
    {
        $pertemuan = Pertemuan::where('id',$id)->with('kelas')->get();
        $pertemuan_id = $pertemuan[0]->id;
        return view('kelas.detailpertemuan', compact('pertemuan','pertemuan_id'));
    }

    public function create(Request $request){
        $create = new Absensi();
        $create->krs_id = $request->krs_input;
        $create->pertemuan_id = $request->pertemuan_input;
        $create->status_kehadiran = $request->status_input;
        $create->jam_masuk = $request->masuk_input;
        $create->jam_keluar = $request->keluar_input;
        $create->durasi = $request->durasi_input;
        $create->save();
    }

    public function update(Request $request, $id){
        $update = Absensi::find($id);
        $update->krs_id = $request->krs_input;
        $update->pertemuan_id = $request->pertemuan_input;
        $update->status_kehadiran = $request->status_input;
        $update->jam_masuk = $request->masuk_input;
        $update->jam_keluar = $request->keluar_input;
        $update->durasi = $request->durasi_input;
        $update->save();
    }

    public function delete($id){
        Absensi::where('id', $id)->delete();
    }

    public function combo_pertemuan1($id)
    {
        $kelas = Pertemuan::where('id', $id)->get();
        return $kelas->toJson();
    }

    public function combo_user1($id)
    {
        $user1 = KRS::select('user_id')->where('kelas_id', $id)->get();
        $user = User::whereNotIn('id', $user1)->get();
        return $user->toJson();
    }
}
