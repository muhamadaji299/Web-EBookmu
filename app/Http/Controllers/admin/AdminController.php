<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KelolaBuku;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
       $jumlahbuku = KelolaBuku::count();
       $jumlahpengguna = User::count();
       $totaldibaca = KelolaBuku::sum('dibaca');
        return view('admin.dashboard.index',compact('jumlahbuku','jumlahpengguna','totaldibaca'));
    }

    public function bukuTerpopuler(){
        $bukuTerbaca = KelolaBuku::orderByDesc('dibaca')->paginate(10); // atau ->take(5)
        return view('admin.bukularis.index', compact('bukuTerbaca'));
    }
}
