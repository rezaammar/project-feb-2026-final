<?php

// use App\Http\Controllers\ProfileController;
// use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserStatusController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AverageController;
use App\Http\Controllers\TeoritisController;
use App\Http\Controllers\TebusRIController;


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


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

Route::resource('/products', ProductController::class)->middleware('auth');
Route::get('/dashboard2', [DashboardController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [SubscriptionController::class, 'index'])->name('dashboard');
    Route::post('/subscribe/{id}', [SubscriptionController::class, 'subscribe']);
});

Route::resource('/profile', UserStatusController::class)->middleware('auth');



//Route lihat riwayat transaksi
Route::middleware(['auth'])->group(function () {

    Route::get('/transactions', 
        [TransactionController::class, 'index'])
        ->name('transactions');

});

//route setelah login, pengecekan membership dan expayed dgn midleware
Route::middleware(['auth','expired','premium'])->group(function(){

    Route::get('/dashboard/premium',[DashboardController::class,'premium']);

});

Route::middleware(['auth','expired','free'])->group(function(){

    Route::get('/dashboard/free',[DashboardController::class,'free']);

});

//route AVERAGE page FREE
Route::get('/averagefree', [AverageController::class,'index']);
Route::post('/hitung-average', [AverageController::class,'hitungAverage'])->name('hitungAverage');
//route AVERAGE page PREMIUM
Route::get('/chart-data', [AverageController::class,'getChartData']);
Route::post('/price-store', [AverageController::class,'store'])->name('price.store');

//route TEORITIS
Route::post('/teoritis-store', [TeoritisController::class,'store'])->name('teoritis.store');
//route TEBUS RI
Route::post('/tebusri-store', [TebusRIController::class,'store'])->name('tebusri.store');

Route::middleware(['auth','cegahinject'])->group(function(){


    Route::get('/average', [AverageController::class,'indexpremium']);
    Route::get('/teoritis', [TeoritisController::class,'index']);
        Route::delete('/teoritis/delete/{id}', [TeoritisController::class, 'destroy'])->name('teoritis.delete');
    Route::get('/menutebusri', [TebusRIController::class,'index']);
    Route::get('/index1', [TebusRIController::class,'index1']);
        Route::post('/hitungLotTebus', [TebusRIController::class,'hitungLotTebus'])->name('hitungLotTebus');
    Route::get('/index2', [TebusRIController::class,'index2']);
        Route::post('/hitungBiayaTebus', [TebusRIController::class,'hitungBiayaTebus'])->name('hitungBiayaTebus');
    Route::get('/index3', [TebusRIController::class,'index3']);
        Route::post('/hitungLotFinal', [TebusRIController::class,'hitungLotFinal'])->name('hitungLotFinal');
    Route::get('/index4', [TebusRIController::class,'index4']);
        Route::post('/hitungAverageFinal', [TebusRIController::class,'hitungAverageFinal'])->name('hitungAverageFinal');
        Route::delete('/index4/delete/{id}', [TebusRIController::class, 'destroy'])->name('tebusri.delete');
    // Route::get('/tebusri', [TebusRIController::class,'index']);
    // Route::get('/tebusri', [TebusRIController::class,'index']);


});



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

