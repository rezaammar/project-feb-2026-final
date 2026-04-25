<?php

// use App\Http\Controllers\ProfileController;
// use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Auth\PasswordController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserStatusController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AverageController;
use App\Http\Controllers\TeoritisController;
use App\Http\Controllers\TebusRIController;
use App\Http\Controllers\RasioRIController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\SosialController;
use App\Http\Controllers\PwaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Beranda Stock Realize"
    ]);
});


Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerProcess']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// OTP
// Route::get('/verify-otp/{data}/page', [OtpController::class, 'showOtp'])->name('verify.page');
Route::get('/verify-otp', [OtpController::class, 'showOtp']);
Route::post('/verify-otp', [OtpController::class, 'verifyOtp']);

// Forgot Password
Route::get('/forgot-password', [PasswordController::class, 'showForgot']);
Route::post('/forgot-password', [PasswordController::class, 'sendResetLink']);

// Reset Password
Route::get('/reset-password/{token}', [PasswordController::class, 'showReset']);
Route::post('/reset-password', [PasswordController::class, 'resetPassword']);


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

Route::resource('/products', ProductController::class)->middleware('auth');
Route::get('/payment', [DashboardController::class, 'payment'])->name('payment');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [SubscriptionController::class, 'index']);
    Route::post('/subscribe/{id}', [SubscriptionController::class, 'subscribe']);
});

//Route PROFIL
Route::resource('/profile', UserStatusController::class)->middleware('auth');
    Route::get('/editprofile',[UserStatusController::class,'edit'])->name('editprofile');
    Route::put('/updateprofile/{id}',[UserStatusController::class,'update'])->name('update.profile');
    Route::get('/fotoprofile',[UserStatusController::class,'editfoto'])->name('fotoprofile');
    Route::post('/user-status/{id}/update-photo', [UserStatusController::class, 'updatePhoto'])->name('user-status.update-photo');



//Route lihat riwayat transaksi
Route::middleware(['auth'])->group(function () {

    Route::get('/transactions', 
        [TransactionController::class, 'index'])
        ->name('transactions');

});

//route ADMIN
Route::middleware(['admin'])->group(function () {
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/admin/upload', [ImageController::class, 'create']);
        Route::post('/admin/upload', [ImageController::class, 'store'])->name('admin.upload.store');

    Route::get('/admin/buku', [AdminController::class, 'buku']);
        Route::post('/admin/toggle-collapse', [AdminController::class, 'toggleCollapse']);
        // Route::get('/admin/settings/{id}/edit-link', [AdminController::class, 'editLink']);
        Route::post('/admin/buku/{id}/update-link', [AdminController::class, 'updateLink']);
    Route::get('/admin/datauser', [AdminController::class, 'tabelUser'])->name('admin.datauser');
        Route::get('/admin/{id}/edit',[AdminController::class,'edit'])->name('admin.edit.user');
        Route::put('/admin/update/user/{id}',[AdminController::class,'updateUser'])->name('admin.update.user');
    Route::get('/admin/laporan', [AdminController::class, 'dashboard'])->name('admin.laporan');
        Route::post('/admin/dashboard/grafik-user-monitor', [AdminController::class, 'tampilGrafik'])->name('admin.dashboard.grafik');
});

//route setelah login, pengecekan membership dan expayed dgn midleware
Route::middleware(['auth','expired','premium'])->group(function(){

    Route::get('/dashboard/premium',[DashboardController::class,'premium'])->name('dashboardpremium');

});

Route::middleware(['auth','expired','free'])->group(function(){

    Route::get('/dashboard/free',[DashboardController::class,'free'])->name('dashboard');

});

//route AVERAGE page FREE
Route::get('/averagefree', [AverageController::class,'index'])->name('averagefree');
Route::post('/hitung-average', [AverageController::class,'hitungAverage'])->name('hitungAverage');
//route AVERAGE page PREMIUM
Route::get('/chart-data', [AverageController::class,'getChartData']);


//route TEORITIS
Route::post('/teoritis-store', [TeoritisController::class,'store'])->name('teoritis.store');
//route TEBUS RI
Route::post('/tebusri-store', [TebusRIController::class,'store'])->name('tebusri.store');

Route::middleware(['auth','cegahinject'])->group(function(){


    Route::get('/average', [AverageController::class,'indexpremium'])->name('average');
        Route::post('/price-store', [AverageController::class,'store'])->name('price.store');
        Route::delete('/average/delete/{id}', [AverageController::class, 'destroy'])->name('average.delete');
    Route::get('/teoritis', [TeoritisController::class,'index'])->name('teoritis');;
        Route::delete('/teoritis/delete/{id}', [TeoritisController::class, 'destroy'])->name('teoritis.delete');
    Route::get('/menutebusri', [TebusRIController::class,'index'])->name('menutebusri');
        Route::get('/index1', [TebusRIController::class,'index1'])->name('index1');
            Route::post('/hitungLotTebus', [TebusRIController::class,'hitungLotTebus'])->name('hitungLotTebus');
        Route::get('/index2', [TebusRIController::class,'index2'])->name('index2');
            Route::post('/hitungBiayaTebus', [TebusRIController::class,'hitungBiayaTebus'])->name('hitungBiayaTebus');
        Route::get('/index3', [TebusRIController::class,'index3'])->name('index3');
            Route::post('/hitungLotFinal', [TebusRIController::class,'hitungLotFinal'])->name('hitungLotFinal');
        Route::get('/index4', [TebusRIController::class,'index4'])->name('index4');
            Route::post('/hitungAverageFinal', [TebusRIController::class,'hitungAverageFinal'])->name('hitungAverageFinal');
            Route::delete('/index4/delete/{id}', [TebusRIController::class, 'destroy'])->name('tebusri.delete');
    Route::get('/rasio', [RasioRIController::class,'index'])->name('rasio');
        Route::post('/hitungrasio', [RasioRIController::class,'hitungRasio'])->name('hitungrasio');
        Route::delete('/rasio/delete/{id}', [RasioRIController::class, 'destroy'])->name('rasio.delete');
    Route::get('/berita', [ImageController::class, 'index'])->name('berita');
        Route::delete('/admin/image/{id}', [ImageController::class, 'destroy'])->name('admin.image.delete');

    // navigasi mobile
    Route::get('/tools', [ToolsController::class, 'index'])->name('tools');
});

//Route Grup Sosial
Route::get('/sosial', [SosialController::class, 'index'])->name('sosial');

//Route Install PWA Aplikasi
Route::get('/pwa/install', [PwaController::class, 'install'])->name('pwa.install');
Route::view('/offline', 'offline');

// Route::middleware(['auth'])->group(function () {

//     Route::get('/dashboard/premium', [DashboardController::class, 'premium'])
//         ->name('dashboard.premium');

//     Route::get('/dashboard/free', [DashboardController::class, 'free'])
//         ->name('dashboard.free');

// });

// Route::middleware(['auth','check.subscription'])
//     ->get('/premium-feature', function () {
//         return "Halaman khusus pelanggan aktif";
// });

// require __DIR__.'/auth.php';

