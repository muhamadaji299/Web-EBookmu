<?php
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\KelolaBukuController;
use App\Http\Controllers\admin\LaporanController;
use App\Http\Controllers\admin\PenggunaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
// Login GET
Route::get('/login', function () {
    if (Auth::check()) {
        $user = Auth::user();

        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard.index');
        } elseif ($user->role == 'user') {
            return redirect()->route('user.index');
        } else {
            return redirect()->route('user.dashboard.index');
        }
    }
    return app(AuthController::class)->showLoginForm();
})->name('login');

// Login POST
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register GET
Route::get('/register', function () {
    if (Auth::check()) {
        $user = Auth::user();

        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard.index');
        } elseif ($user->role == 'user') {
            return redirect()->route('user.index');
        } else {
            return redirect()->route('user.dashboard.index');
        }
    }
    return app(AuthController::class)->showRegisterForm();
})->name('register');

// Register POST
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth', 'admin'])->group(function (){
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard.index');
    Route::resource('kelolabuku', KelolaBukuController::class);
    Route::resource('pengguna', PenggunaController::class)->only(['index','destroy']);
    Route::get('bukularis', [AdminController::class, 'bukuTerpopuler'])->name('admin.bukularis.index');
    Route::resource('laporan', LaporanController::class);
});

Route::middleware(['auth', 'user'])->group(function (){
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/baca/{id}', [UserController::class, 'baca'])->name('user.baca');
});


