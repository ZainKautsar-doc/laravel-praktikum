<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function index()
    {
        // Mengambil semua data mahasiswa dari database
        $matkul = Matkul::all();
        // Mengirim data ke view
        return view('matkul.index', compact('matkul'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'jurusan' => 'required',
        ]);

        // Membuat data baru
        Matkul::create($validate);

        // Mengirim data ke view
        return redirect()->route('matkul.index');
    }
}
