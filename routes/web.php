<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\medicamentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\specialityController;
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


Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin');
Route::get('/patient/home' ,[PatientController::class,'index'])->name('patient'); 
Route::get('/doctor/home' ,[MedecinController::class,'index'])->name('doctor');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin.dashboard', [AdminController::class,'index']);
Route::get('/admin.dashboard', [AdminController::class,'statics']);

Route::get('/admin.medicament', [medicamentController::class,'index']);
Route::get('/admin.medicament', [medicamentController::class,'allSpeciality'])->name('medicament.allSpeciality');
Route::post('/admin.medicament', [medicamentController::class, 'insertMedicament'])->name('medicament.insertMedicament');
Route::put('/admin.medicament/{idMedicament}', [medicamentController::class,'updateMedicament'])->name('medicament.updateMedicament');
// Route::get('/admin.medicament', [medicamentController::class,'allMedicament'])->name('medicament.allMedicament');
Route::delete('/admin.medicament/{idMedicament}', [medicamentController::class, 'deletMedicament'])->name('medicament.delete');


Route::put('/admin.speciality/{idSpeciality}', [specialityController::class,'updateSpeciality'])->name('speciality.updateSpeciality');
Route::post('/admin.speciality', [SpecialityController::class, 'insertSpeciality'])->name('speciality.insertSpeciality');
Route::get('/admin.speciality', [specialityController::class,'index']);
Route::get('/admin.speciality', [specialityController::class,'allSpeciality'])->name('speciality.allSpeciality');
Route::delete('/admin.speciality/{specialityId}', [SpecialityController::class, 'deleteSpeciality'])->name('speciality.delete');




require __DIR__.'/auth.php';
