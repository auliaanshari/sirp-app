<?php

namespace App\Http\Controllers;

use App\Models\KRS;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Absensi;
use Illuminate\Http\Request;
use DataTables;

class KRSController extends Controller
{
    public function data()
    {
        $krs = KRS::with('kelas','user');
        return DataTables::of($krs)->toJson();
    }

    public function data_absensi($id)
    {
        $user = Absensi::where('pertemuan_id',$id)->with('krs')->get();
        $krs = KRS::where('id', $user)->with('user')->get();
        return DataTables::of($user)->toJson();
    }

    public function create(Request $request){
        $create = new KRS();
        $create->kelas_id = $request->kelas_input;
        $create->user_id = $request->nim_input;
        $create->save();
    }

    public function update(Request $request, $id){
        $update = KRS::find($id);
        $update->kelas_id = $request->kelas_input;
        $update->user_id = $request->nim_input;
        $update->save();
    }

    public function delete($id){
        KRS::where('id', $id)->delete();
    }

    public function combo_kelas()
    {
        $kelas = Kelas::all();
        return $kelas->toJson();
    }

    public function combo_user()
    {
        $user = User::all();
        return $user->toJson();
    }

    public function combo_kelas1($id)
    {
        $kelas = Kelas::where('id', $id)->get();
        // echo($kelas);
        return $kelas->toJson();
    }

    public function combo_user1($id)
    {
        $user1 = KRS::select('user_id')->where('kelas_id', $id)->get();
        
        // $user2 = $user1->user_id;
        
        $user = User::whereNotIn('id', $user1)->with('krs')->get();
        return $user->toJson();
    }
}
