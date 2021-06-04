<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use DataTables;

class KelasController extends Controller
{
    public function data()
    {
        $kelas = Kelas::all();
        return DataTables::of($kelas)->toJson();
    }

    public function detail($id)
    {
        $kelas = Kelas::where('id',$id)->get();
        
        // var_dump($kelas);
        return view('kelas.detailkelas', compact('kelas'));
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
