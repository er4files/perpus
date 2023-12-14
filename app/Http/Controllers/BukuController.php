<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BukuModel;
class BukuController extends Controller
{
    public function bukutampil()
    {
        $databuku = BukuModel::orderby('kode_buku', 'ASC')
        ->paginate(5);

        return view('halaman/view_buku', ['buku'=> $databuku]);
    }
    public function bukutambah(Request $request)
    {
        $this->validate($request, [
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'kategori' => 'required'
        ]);
        BukuModel::create([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'kategori' => $request->kategori,
        ]);
        return redirect('/buku');
    }
    public function bukuhapus($id_buku)
    {
        $databuku=BukuModel::find($id_buku);
        $databuku->delete();
        return redirect()->back();
    }
    public function bukuedit($id_buku, Request $request)
    {
        $this->validate($request, [
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'kategori' => 'required',
        ]);

        // Find the book by ID
        $book = BukuModel::find($id_buku);

        // Check if the book exists
        if (!$book) {
            return redirect()->back()->with('error', 'Book not found.');
        }

        // Update the book data
        $book->kode_buku = $request->kode_buku;
        $book->judul = $request->judul;
        $book->pengarang = $request->pengarang;
        $book->kategori = $request->kategori;
        $book->save();

        return redirect('/buku')->with('success', 'Book updated successfully.');
    }

}
