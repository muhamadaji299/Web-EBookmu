<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan = Laporan::all();
        return view('admin.laporan.index',compact('laporan'));
    }
   
    public function create(){
        return view('user.index');
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'pesan' => 'required|string',
        ]);

        Laporan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan
        ]);
        return redirect()->route('laporan.index')->with('success','Laporan berhasil di tamabahkan');

    }
     

    public function destroy(string $id)
    {
        $laporan = Laporan::find($id);

        if(!$laporan){
            return redirect()->route('laporan.index')->with('error','laporan tidak di temukan');
        }

        $laporan->delete();
            return redirect()->route('laporan.index')->with('success','laporan berhasil di hapus');
    }
}
