<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BasicPatController;
use App\Http\Controllers\UrinalysisController;
use App\Http\Controllers\FecalysisController;
use App\Http\Controllers\HematologyController;
use App\Http\Controllers\ChemistryController;
use App\Http\Controllers\RbsController;
use App\Http\Controllers\Hba1cController;
use App\Http\Controllers\ThyroidController;
use App\Http\Controllers\HbsagController;
use App\Http\Controllers\TropiController;
use App\Http\Controllers\TropiiController;
use App\Http\Controllers\StyphiController;
use App\Http\Controllers\DengueController;
use App\Http\Controllers\HavController;
use App\Http\Controllers\TpController;
use App\Http\Controllers\Misc1Controller;
use App\Http\Controllers\Misc2Controller;
use App\Http\Controllers\Misc3Controller;
use App\Http\Controllers\Misc4Controller;
use App\Http\Controllers\Misc5Controller;





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

Route::get('/Chemistry/create', [ChemistryController::class, 'create'])->name('chemistry.create');
Route::post('/Chsmistry/store', [ChemistryController::class, 'store'])->name('chemistry.store');

Route::get('/rbs/create', [RbsController::class, 'create'])->name('rbs.create');
Route::post('/rbs/store', [RbsController::class, 'store'])->name('rbs.store');

Route::get('/hba1c/create', [Hba1cController::class, 'create'])->name('hba1c.create');
Route::post('/hba1c/store', [Hba1cController::class, 'store'])->name('hba1c.store');

Route::get('/thyroid/create', [ThyroidController::class, 'create'])->name('thyroid.create');
Route::post('/thyroid/store', [ThyroidController::class, 'store'])->name('thyroid.store');

Route::get('/hbsag/create', [HbsagController::class, 'create'])->name('hbsag.create');
Route::post('/hbsag/store', [HbsagController::class, 'store'])->name('hbsag.store');

Route::get('/tropi/create', [TropiController::class, 'create'])->name('tropi.create');
Route::post('/tropi/store', [TropiController::class, 'store'])->name('tropi.store');

Route::get('/tropii/create', [TropiiController::class, 'create'])->name('tropii.create');
Route::post('/tropii/store', [TropiiController::class, 'store'])->name('tropii.store');

Route::get('/styphi/create', [StyphiController::class, 'create'])->name('styphi.create');
Route::post('/styphi/store', [StyphiController::class, 'store'])->name('styphi.store');

Route::get('/dengue/create', [DengueController::class, 'create'])->name('dengue.create');
Route::post('/dengue/store', [DengueController::class, 'store'])->name('dengue.store');

Route::get('/hav/create', [HavController::class, 'create'])->name('hav.create');
Route::post('/hav/store', [HavController::class, 'store'])->name('hav.store');

Route::get('/tp/create', [TpController::class, 'create'])->name('tp.create');
Route::post('/tp/store', [TpController::class, 'store'])->name('tp.store');

Route::get('/misc1/create', [Misc1Controller::class, 'create'])->name('misc1.create');
Route::post('/misc1/store', [Misc1Controller::class, 'store'])->name('misc1.store');

Route::get('/misc2/create', [Misc2Controller::class, 'create'])->name('misc2.create');
Route::post('/misc2/store', [Misc2Controller::class, 'store'])->name('misc2.store');

Route::get('/misc3/create', [Misc3Controller::class, 'create'])->name('misc3.create');
Route::post('/misc3/store', [Misc3Controller::class, 'store'])->name('misc3.store');

Route::get('/misc4/create', [Misc4Controller::class, 'create'])->name('misc4.create');
Route::post('/misc4/store', [Misc4Controller::class, 'store'])->name('misc4.store');

Route::get('/misc5/create', [Misc5Controller::class, 'create'])->name('misc5.create');
Route::post('/misc5/store', [Misc5Controller::class, 'store'])->name('misc5.store');