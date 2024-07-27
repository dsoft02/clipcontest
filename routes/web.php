<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContestantController as AdminContestantController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VoteController as AdminVoteController;
use App\Http\Controllers\Admin\VoteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/leaderboard', [HomeController::class, 'leaderboard'])->name('leaderboard');
Route::get('/winner', [HomeController::class, 'winner'])->name('winner');


Route::get('/contestants', [HomeController::class, 'contestants'])->name('contestants');
Route::get('/contestants/{id}', [HomeController::class, 'contestants'])->name('contestant.show');
Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');

Route::get('/ajax/contestants/{id}', [AdminContestantController::class, 'getContestant'])->name('contestant.ajax.show');
Route::get('/ajax/contestants', [AdminContestantController::class, 'getContestants'])->name('contestant.ajax.index');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/admin/leaderboard', [AdminController::class, 'leaderboard'])->name('admin.leaderboard');

    Route::get('/admin/contestants', [AdminContestantController::class,'index'])->name('contestants.index');
    Route::get('/admin/contestants/create', [AdminContestantController::class,'create'])->name('contestant.create');
    Route::post('/admin/contestants/store', [AdminContestantController::class,'store'])->name('contestant.store');
    Route::get('/admin/contestants/{id}', [AdminContestantController::class, 'show'])->name('contestant.show');
    Route::get('/admin/contestants/{id}/edit', [AdminContestantController::class, 'edit'])->name('contestant.edit');
    Route::put('/admin/contestants/{id}', [AdminContestantController::class, 'update'])->name('contestant.update');
    Route::delete('/admin/contestants/{id}', [AdminContestantController::class, 'destroy'])->name('contestant.destsroy');

    Route::get('/admin/votes', [AdminVoteController::class, 'index'])->name('votes.index');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings/update', [SettingController::class, 'update'])->name('settings.update');


    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';
