<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\KrsDetailController;
use App\Http\Controllers\MahasiswaKrsController;
use App\Http\Controllers\DosenKrsController;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\Krs;

Route::get('/', function () {
    $stats = [];

    if (auth()->check()) {
        $role = auth()->user()->role;

        if ($role === 'admin') {
            $stats = [
                'total_dosen'      => Dosen::count(),
                'total_mahasiswa'  => Mahasiswa::count(),
                'total_kelas'      => Kelas::count(),
                'total_krs'        => Krs::count(),
                'krs_pending'      => Krs::where('status', 'pending')->count(),
                'krs_approved'     => Krs::where('status', 'approved')->count(),
                'krs_declined'     => Krs::where('status', 'declined')->count(),
            ];
        }

        if ($role === 'mahasiswa') {
            $mahasiswa = auth()->user()->mahasiswa;

            if ($mahasiswa) {
                $krsList = Krs::where('kode_mahasiswa', $mahasiswa->id)->latest()->get();
                $krsTerakhir = $krsList->first();

                $stats = [
                    'total_krs'      => $krsList->count(),
                    'krs_terakhir'   => $krsTerakhir,
                ];
            }
        }

        if ($role === 'dosen') {
            $stats = [
                'krs_pending'  => Krs::where('status', 'pending')->count(),
                'krs_approved' => Krs::where('status', 'approved')->count(),
                'krs_declined' => Krs::where('status', 'declined')->count(),
            ];
        }
    }

    return view('homepage', compact('stats'));
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'registerView'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| MAHASISWA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:mahasiswa'])
    ->prefix('mahasiswa')
    ->name('mahasiswa.')
    ->group(function () {
        Route::get('/krs', [MahasiswaKrsController::class, 'index'])->name('krs.index');
        Route::get('/krs/create', [MahasiswaKrsController::class, 'create'])->name('krs.create');
        Route::post('/krs', [MahasiswaKrsController::class, 'store'])->name('krs.store');
        Route::get('/krs/{id}', [MahasiswaKrsController::class, 'show'])->name('krs.show');
    });

/*
|--------------------------------------------------------------------------
| DOSEN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:dosen'])
    ->prefix('dosen-panel')
    ->name('dosen.')
    ->group(function () {
        Route::get('/krs', [DosenKrsController::class, 'index'])->name('krs.index');
        Route::get('/krs/{id}', [DosenKrsController::class, 'show'])->name('krs.show');
        Route::put('/krs/{id}/approve', [DosenKrsController::class, 'approve'])->name('krs.approve');
        Route::put('/krs/{id}/reject', [DosenKrsController::class, 'reject'])->name('krs.reject');
    });

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('dosen', DosenController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('jurusan', JurusanController::class);
    Route::resource('matakuliah', MataKuliahController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('krs', KrsController::class);
    Route::resource('krsdetail', KrsDetailController::class);
});