<?php

use App\Http\Controllers\AddForumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\biodataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\forumController;

// ROUTE USER
Route::get('/', [DashboardUserController::class, 'index'])->name('dashboard.user');

Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('register/post', [RegisteredUserController::class, 'store'])->name('register.store');

Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('login/store', [AuthenticatedSessionController::class, 'store'])
    ->name('login.store');

Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->name('password.store');

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/tambah-forum', [AddForumController::class,'index'])->name('addForum-user');
    Route::post('/profile/tambah-forum/store', [AddForumController::class, 'store'])->name('tambahforum-store');
});

// admin Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard.admin');

Route::get('/user', [UserController::class, 'index'])->name('user-admin');

Route::get('/data-Alumni', [biodataController::class, 'index'])->name('dataAlumni-admin');
Route::get('/detail-alumni/{id}', [biodataController::class, 'show'])->name('detailAlumni-admin');
// Route::get('/edit-alumni/{id}', [biodataController::class, 'edit'])->name('editAlumni-admin');
// Route::put('/update-alumni/{id}', [biodataController::class, 'update'])->name('updateAlumni-admin');
Route::delete('/hapus-alumni/{id}', [biodataController::class, 'destroy'])->name('hapusAlumni-admin');

Route::prefix('admin')->name('angkatan.')->group(function () {
    Route::controller(AngkatanController::class)->group(function () {
        Route::get('/angkatan', 'index')->name('index');
        Route::post('/angkatan', 'store')->name('store');
        Route::put('/angkatan/{id}', 'update')->name('update');
        Route::delete('/angkatan/{id}', 'destroy')->name('destroy');
    });
});

// Route::get('/data-Angkatan', function () {
//     return view('dataAngkatan');
// })->name('dataAngkatan-admin');

Route::get('/data-Forum', [forumController::class, 'index'])->name('dataForum-admin');
Route::post('/data-Forum', [forumController::class, 'store'])->name('dataForum-admin-store');
Route::get('/edit-Forum', [forumController::class, 'edit'])->name('dataForum-admin-edit');
Route::get('/detail-Forum/{id}', [forumController::class, 'show'])->name('detailForum-admin');
Route::delete('/hapus-Forum/{id}', [forumController::class, 'destroy'])->name('dataForum-admin-delete');



//User Route

Route::get('/user-data-alumni', function () {
    return view('users.userAlumni');
})->name('userAlumni-user');

Route::get('/user-data-forum', function () {
    return view('users.userForum');
})->name('userForum-user');

// Route::get('/user-tambah-forum', function () {
//     return view('users.profile.addForum');
// })->name('addForum-user');


// route Verifikasi
// Route::get('/pengisian-data', function () {
//     return view('verifikasi');
// })->name('verifikasi-user');


// require __DIR__.'/auth.php';
