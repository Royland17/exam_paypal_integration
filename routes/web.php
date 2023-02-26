<?php
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Paypal\PaypalController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post("login",[AuthController::class,'login'])->name('login.user');
Route::post("register",[AuthController::class,'register'])->name('register.user');

Route::group(['middleware'=> 'authenticated.middleware'], function(){
    Route::get("login",[AuthController::class,'loginView'])->name('login.view');
    Route::get("/",[AuthController::class,'loginView'])->name('login.view');
    Route::get('register',[AuthController::class,'registerView'])->name('register.view');

});
Route::group(['middleware'=> 'auth'], function(){
    Route::get("logout",[AuthController::class,'logout'])->name('logout.user');
    //paypal
    Route::get("paypal",[PaypalController::class,'index'])->name('paypal.index');
    Route::post("request-payment", [PaypalController::class, 'RequestPayment'])->name('request.payment');
    Route::get('payment-success',[PaypalController::class,'PaymentSuccess'])->name('payment.success');
    Route::get('cancel-payment',[PaypalController::class,'cancelPayment'])->name('payment.cancel');

});
