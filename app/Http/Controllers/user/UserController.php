<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\KelolaBuku;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $userCount = User::count();
    $buku = KelolaBuku::count();

    $query = KelolaBuku::query();

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('judul', 'like', '%' . $search . '%')
              ->orWhere('deskripsi', 'like', '%' . $search . '%');
        });
    }

    $kelolabuku = $query->paginate(6)->appends(['search' => $search]);

    return view('user.index', compact('kelolabuku', 'userCount', 'buku', 'search'));
}
  public function baca($id)
  {
      $buku = KelolaBuku::findOrFail($id);
      $buku->increment('dibaca');  //+1 setiap di kunjungi
      return redirect(asset('storage/'.$buku->file));
  }

}

