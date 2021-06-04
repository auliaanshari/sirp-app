<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    public function data()
    {
        $user = User::all();
        return DataTables::of($user)->toJson();
    }

    public function create(Request $request){
        $create = new User();
        $create->nama = $request->nama_input;
        $create->nim = $request->nim_input;
        $create->email = $request->email_input;
        $create->password = $request->password_input;
        $create->tipe = $request->tipe_input;
        $create->save();
    }

    public function update(Request $request, $id){
        $update = User::find($id);
        $update->nama = $request->nama_input;
        $update->nim = $request->nim_input;
        $update->email = $request->email_input;
        $update->password = $request->password_input;
        $update->tipe = $request->tipe_input;
        $update->save();
    }

    public function delete($id){
        User::where('id', $id)->delete();
    }
}
