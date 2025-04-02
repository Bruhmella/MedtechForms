<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BasicPatController;
use App\Http\Controllers\UrinalysisController;
use App\Http\Controllers\FecalysisController;
use App\Http\Controllers\HematologyController;


// Show login form (GET request to / or /login)
Route::get('/', [LoginController::class, 'login'])->name('login');

// Handle login form submission (POST request to /login)
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Register route
Route::get('/register', [LoginController::class, 'register'])->name('register');

// Home route after login
Route::get('/home', [LoginController::class, 'home'])->name('home');	

// when login has incorrect credentials
Route::get('/loginerror', function () { return view('loginerror'); })->name('loginerror');

//uploads data from'register' to database, and redirects back to login page
Route::post('/upload', [LoginController::class, 'upload'])->name('upload');

//logout route
Route::get('/logout', function () {
    session()->forget('user'); // Clear session
    return redirect()->route('login'); // Redirect to the login page (named route)
})->name('logout');
	

//view patient archives
Route::get('/Parchives', [HomeController::class, 'Parchives'])->name('Parchives');

//Manage Patient Data
Route::get('/PatDataManage', [BasicPatController::class, 'managePatients'])->name('PatDataManage');


//redirect to "add patient data" page
Route::get('/AddPatData', [HomeController::class, 'AddPatData'])->name('AddPatData');
Route::get('/add-patient', [BasicPatController::class, 'create'])->name('add_patient');
Route::post('/add-patient', [BasicPatController::class, 'store'])->name('store_patient');

//redirect to "Update patient data" page
Route::get('/UptPatData', [HomeController::class, 'UptPatData'])->name('UptPatData');


//search bar
Route::get('/search-patient', [BasicPatController::class, 'search'])->name('search.patient');


Route::get('/PatEdit/{id}', [BasicPatController::class, 'edit'])->name('edit_patient');
Route::post('/PatEdit/{id}', [BasicPatController::class, 'update'])->name('update_patient');
Route::delete('/archive-patient/{id}', [BasicPatController::class, 'archive'])->name('archive_patient');

Route::delete('/permanent-delete-patient/{id}', [BasicPatController::class, 'permanentDelete'])
    ->name('permanent_delete_patient');
    
Route::get('/Parchives', [BasicPatController::class, 'archivedPatients'])
    ->name('Parchives'); // ✅ Match the new name



Route::put('/restore-patient/{id}', [BasicPatController::class, 'restore'])->name('restore_patient');

Route::get('/logout', function () {
    session()->forget('user'); // Clear session
    return redirect()->route('login')->with('success', 'Logged out successfully.');
})->name('logout');

Route::get('/Urinalysis/create', [UrinalysisController::class, 'create'])->name('Urinalysis.create');

Route::get('/urinalysis', [UrinalysisController::class, 'create'])->name('urinalysis.create');
Route::post('/urinalysis', [UrinalysisController::class, 'store'])->name('urinalysis.store');

Route::get('/Fecalysis/create', [FecalysisController::class, 'create'])->name('Fecalysis.create');
Route::post('/fecalysis/store', [FecalysisController::class, 'store'])->name('fecalysis.store');

Route::get('/Hematology/create', [HematologyController::class, 'create'])->name('hematology.create');
Route::post('/Hematology/store', [HematologyController::class, 'store'])->name('hematology.store');