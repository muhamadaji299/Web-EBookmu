<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::query();  // Inisialisasi query
    
        // Cek apakah ada input pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
    
            // Cari berdasarkan nama atau email
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
    
        // Ambil data hasil query
        $users = $query->get();  // Gunakan nama variabel yang benar dan konsisten
    
        return view('admin.pengguna.index', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);  // Menemukan user berdasarkan ID

        if (!$user) {
            return redirect()->route('pengguna.index')->with('error', 'Pengguna tidak ditemukan!');
        }

        $user->delete();
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus');
    }
}
