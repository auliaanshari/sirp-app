<?php

namespace App\Http\Controllers;

use App\Models\KRS;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;
use DataTables;

class KRSController extends Controller
{
    public function data()
    {
        $krs = KRS::with('kelas','user');
        return DataTables::of($krs)->toJson();
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
}
