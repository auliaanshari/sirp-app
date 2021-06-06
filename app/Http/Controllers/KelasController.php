<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\KRS;
use App\Models\Pertemuan;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Auth;
use DataTables;

class KelasController extends Controller
{
    public function data()
    {
        $kelas = Kelas::all();
        return DataTables::of($kelas)->toJson();
    }

    public function data1()
    {
        $id = Auth::id(); 
        $kelas = KRS::where('user_id',$id)->with('kelas','user')->get();
        return DataTables::of($kelas)->toJson();
    }

    public function detail($id)
    {
        $kelas = Kelas::where('id',$id)->get();
        $kelas_id = $kelas[0]->id;
        return view('kelas.detailkelas', compact('kelas','kelas_id'));
    }

    public function detail1($id)
    {
        $kelas = Kelas::where('id',$id)->get();
        $kelas_id = $kelas[0]->id;
        return view('kelas.lihatdetailkelas', compact('kelas','kelas_id'));
    }

    public function data2()
    {
        $id = Auth::id();
        $id1 = KRS::where('user_id',$id)->with('kelas','user')->get(); 
        $kelas = Absensi::where('krs_id',$id1[0]->id)->with('krs','pertemuan')->get();
        return DataTables::of($kelas)->toJson();
    }

    public function data_mahasiswa($id)
    {
        $user = KRS::where('kelas_id',$id)->with('kelas','user')->get();
        return DataTables::of($user)->toJson();
    }

    public function data_pertemuan($id)
    {
        $user = Pertemuan::where('kelas_id',$id)->with('kelas')->get();
        return DataTables::of($user)->toJson();
    }

    public function create(Request $request){
        $create = new Kelas();
        $create->kode_kelas = $request->kelas_input;
        $create->kode_matkul = $request->matkul_input;
        $create->nama_matkul = $request->nama_input;
        $create->tahun = $request->tahun_input;
        $create->semester = $request->semester_input;
        $create->sks = $request->sks_input;
        $create->save();
    }

    public function update(Request $request, $id){
        $update = Kelas::find($id);
        $update->kode_kelas = $request->kelas_input;
        $update->kode_matkul = $request->matkul_input;
        $update->nama_matkul = $request->nama_input;
        $update->tahun = $request->tahun_input;
        $update->semester = $request->semester_input;
        $update->sks = $request->sks_input;
        $update->save();
    }

    public function delete($id){
        Kelas::where('id', $id)->delete();
    }

    

}
