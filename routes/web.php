<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonController;
use App\Models\Alert;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;

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

// Route de base
Route::get('/', function () {
    return view('layout');
});

// Route de dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route de mise à jour du rôle d'un utilisateur
Route::put('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('users.update-role');

// Groupe de routes pour les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Route d'édition du profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route de mise à jour du profil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route de suppression du profil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Inclusion des routes d'authentification
require __DIR__.'/auth.php';

// Route de gestion des projets
Route::resource('projects', ProjectController::class);
// Route de gestion des contenus
Route::resource('contents', ContentController::class);

// Groupe de routes pour les super-admins
Route::middleware(['auth', 'checkRole:super-admin'])->group(function () {
    // Route de liste des utilisateurs
    Route::get('/users', [UserController::class, 'index']);
    // Route de création d'un utilisateur
    Route::post('/users', [UserController::class, 'store']);
    // Route d'édition d'un utilisateur
    Route::get('/users/{id}/edit', [UserController::class, 'edit']);
    // Route de mise à jour d'un utilisateur
    Route::put('/users/{id}', [UserController::class, 'update']);
    // Route de suppression d'un utilisateur
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});

// Groupe de routes pour les admins
Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    // Route d'édition d'un projet
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit']);
    // Route de mise à jour d'un projet
    Route::put('/projects/{id}', [ProjectController::class, 'update']);
    // Route de suppression d'un projet
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);
});

// Route de gestion des dons
Route::post('/dons', [DonController::class, 'store'])->name('dons.store');
Route::get('/dons', [DonController::class, 'index'])->name('dons.index')->middleware('admin');