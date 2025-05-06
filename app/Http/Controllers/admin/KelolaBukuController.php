<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KelolaBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KelolaBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = KelolaBuku::query();  // Inisialisasi query
    
    // Cek apakah ada input pencarian
    if ($request->has('search') && $request->search != '') {
        $search = $request->search;

        // Cari berdasarkan judul atau deskripsi
        $query->where(function($q) use ($search) {
            $q->where('judul', 'like', "%{$search}%")
              ->orWhere('deskripsi', 'like', "%{$search}%");
        });
    }

    // Ambil data hasil query
    $kelolabuku = $query->get();

    return view('admin.kelolabuku.index', compact('kelolabuku'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kelolabuku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png',
            'file' => 'required|mimes:pdf|max:10000', // Pastikan file pdf yang diupload
        ]);
    
        $coverName = null;
        if ($request->hasFile('cover')) {
            $coverName = $request->file('cover')->store('covers', 'public');  // Menyimpan file cover
        }
    
        // Menyimpan file PDF
        $fileName = $request->file('file')->store('kelola_bukus', 'public');  // Menyimpan file PDF
    
        // Menyimpan data ke database
        KelolaBuku::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'cover' => $coverName,
            'file' => $fileName,
        ]);
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kelolabuku.index')->with('success', 'Ebook Berhasil Ditambahkan');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buku = KelolaBuku::findorfail($id);
        return view('admin.kelolabuku.edit',compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $buku = KelolaBuku::findOrFail($id); // Cari manual

    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required',
        'cover' => 'nullable|image|mimes:jpg,jpeg,png',
        'file' => 'nullable|mimes:pdf|max:10000',
    ]);

    $data = [
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
    ];

    if ($request->hasFile('cover')) {
        if ($buku->cover) {
            Storage::delete('public/' . $buku->cover);
        }
        $data['cover'] = $request->file('cover')->store('cover', 'public');
    }

    if ($request->hasFile('file')) {
        if ($buku->file) {
            Storage::delete('public/' . $buku->file);
        }
        $data['file'] = $request->file('file')->store('kelola_bukus', 'public');
    }

    $buku->update($data);

    return redirect()->route('kelolabuku.index')->with('success', 'Ebook berhasil diubah');
}

    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KelolaBuku $kelolabuku)
    {
        $kelolabuku->delete();
        return redirect()->route('kelolabuku.index')->with('Success','Ebook berhasil di hapus.');
    }
}
