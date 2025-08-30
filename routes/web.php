<?php

use App\Http\Controllers\HomeController;
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
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ActualiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/

// Route de base avec contrôleur
Route::get('/', [HomeController::class, 'index'])->name('home');

// Page de dons
Route::get('/dons', [DonController::class, 'index'])->name('dons.index');
Route::post('/dons', [DonController::class, 'store'])->name('dons.store');

// Groupe de routes pour l'administration des utilisateurs
Route::middleware(['auth', 'checkRole:super-admin'])->group(function () {
    // Route pour changer le rôle d'un utilisateur
    Route::post('/admin/users/{user}/toggle-role', [UserController::class, 'toggleRole'])
        ->name('admin.toggle-role');
    
    // Route pour supprimer un utilisateur
    Route::delete('/admin/users/{user}', [UserController::class, 'deleteUser'])
        ->name('admin.delete-user');
});

// Routes pour la gestion des contenus/actualités
Route::resource('contents', ContentController::class);

// Routes pour la gestion des projets
Route::resource('projects', ProjectController::class);

// Routes pour la gestion des utilisateurs (admin seulement)
Route::middleware(['auth', 'checkRole:admin,super-admin'])->group(function () {
    // Routes pour toggle role et delete user
    Route::post('/admin/users/{user}/toggle-role', [DashboardController::class, 'toggleRole'])
        ->name('admin.toggle-role');
    
    Route::delete('/admin/users/{user}', [DashboardController::class, 'deleteUser'])
        ->name('admin.delete-user');
});

// Routes pour les actualités
Route::get('/actualites', [ActualiteController::class, 'index'])->name('actualites.index');
Route::get('/actualites/{id}', [ActualiteController::class, 'show'])->name('actualites.show');

// Routes d'authentification Laravel Breeze
require __DIR__.'/auth.php';

// Route de dashboard - UNE SEULE DÉFINITION
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'checkRole:admin,super-admin'])
    ->name('dashboard');

// Route pour l'envoi de messages de contact
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

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

// Route pour afficher le formulaire de contact
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Route pour les notifications CinetPay
Route::post('/cinetpay/notification', [DonController::class, 'handleNotification'])->name('cinetpay.notification');

// Route pour le retour après paiement
Route::get('/don/merci', [DonController::class, 'thankYou'])->name('don.merci');
Route::get('/don/erreur', [DonController::class, 'error'])->name('don.error');