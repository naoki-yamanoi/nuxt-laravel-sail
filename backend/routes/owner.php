<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Owner\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Owner\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Owner\Auth\NewPasswordController;
use App\Http\Controllers\Owner\Auth\PasswordResetLinkController;
use App\Http\Controllers\Owner\Auth\RegisteredUserController;
use App\Http\Controllers\Owner\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function() {
    return 'owner------helloworld';
});

// ダッシュボードを表示する場合の設定
Route::get('/dashboard', function() {
    return 'dashboard';
});
// ->middleware(['auth:owners'])->name('dashboard');

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest')
                ->name('register');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest')
                ->name('login');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.store');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth:owners', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth:owners', 'throttle:6,1'])
                ->name('verification.send');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth:owners')
                ->name('logout');
