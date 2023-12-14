<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaModel;

class AnggotaController extends Controller
{
    // method untuk tampil data anggota
    public function anggotatampil()
    {
        $dataanggota = AnggotaModel::orderby('id_anggota', 'ASC')
            ->paginate(5);

        return view('halaman/view_anggota', ['anggota' => $dataanggota]);
    }

    // method untuk tambah data anggota
    public function anggotatambah(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama_anggota' => 'required',
            'prodi' => 'required',
            'hp' => 'required'
        ]);

        AnggotaModel::create([
            'nim' => $request->nim,
            'nama_anggota' => $request->nama_anggota,
            'prodi' => $request->prodi,
            'hp' => $request->hp
        ]);

        return redirect('/anggota');
    }

    // method untuk hapus data anggota
    public function anggotahapus($id_anggota)
    {
        $dataanggota = AnggotaModel::find($id_anggota);
        $dataanggota->delete();

        return redirect()->back();
    }

    // method untuk edit data anggota
    public function anggotaedit($id_anggota, Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama_anggota' => 'required',
            'prodi' => 'required',
            'hp' => 'required'
        ]);

        $anggota = AnggotaModel::find($id_anggota);
        $anggota->nim = $request->nim;
        $anggota->nama_anggota = $request->nama_anggota;
        $anggota->prodi = $request->prodi;
        $anggota->hp = $request->hp;

        $anggota->save();

        return redirect()->back();
    }
}
