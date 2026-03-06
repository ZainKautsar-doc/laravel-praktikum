<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'kode' => 'required|unique:matkuls,kode',
            'nama' => 'required',
            'jurusan' => 'required',
        ]);

        // Membuat data baru
        Matkul::create($validate);

        // Mengirim data ke view
        return redirect()->route('matkul.index');
    }

    public function edit(Matkul $matkul)
    {
        return view('matkul.edit', compact('matkul'));
    }

    public function update(Request $request, Matkul $matkul)
    {
        $validate = $request->validate([
            'kode' => [
                'required',
                Rule::unique('matkuls', 'kode')->ignore($matkul->id),
            ],
            'nama' => 'required',
            'jurusan' => 'required',
        ]);

        $matkul->update($validate);

        return redirect()->route('matkul.index');
    }

    public function destroy(Matkul $matkul)
    {
        $matkul->delete();

        return redirect()->route('matkul.index');
    }
}
