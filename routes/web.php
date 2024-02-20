<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CertificatController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\DossierMedicalController;
use App\Http\Controllers\favorisController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\medicamentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\rendezVousController;
use App\Http\Controllers\specialityController;
use App\Models\DossierMedical;
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
Route::get('/doctor/dashboard' ,[MedecinController::class,'index'])->name('doctor');


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


// -------------------------ADMIN-----------------------------------------------
Route::get('/admin.dashboard', [AdminController::class,'index']);
Route::get('/admin.medicament', [medicamentController::class, 'allSpecialityM'])->name('medicament.allSpecialityM');
Route::post('/admin.medicament', [medicamentController::class, 'insertMedicament'])->name('medicament.insertMedicament');
Route::put('/admin.medicament/{idMedicament}', [medicamentController::class, 'updateMedicament'])->name('medicament.updateMedicament');
Route::delete('/admin.medicament/{idMedicament}', [medicamentController::class, 'deleteMedicament'])->name('delete');

Route::put('/admin.speciality/{idSpeciality}', [specialityController::class,'updateSpeciality'])->name('speciality.updateSpeciality');
Route::post('/admin.speciality', [SpecialityController::class, 'insertSpeciality'])->name('speciality.insertSpeciality');
Route::get('/admin.speciality', [specialityController::class,'index']);
Route::get('/admin.speciality', [specialityController::class,'allSpeciality'])->name('speciality.allSpeciality');
Route::delete('/admin.speciality/{specialityId}', [SpecialityController::class, 'deleteSpeciality'])->name('speciality.delete');
// ----------------------------------------------------------------------------------

// ----------------------------DOCTOR--------------------------------------------------
Route::get('/doctor.dashboard', [DossierMedicalController::class,'doctorIndex']);
Route::get('/doctor.medicament', [MedecinController::class, 'allSpecialityM'])->name('Medicament.allSpecialityM');
Route::post('/doctor.medicament', [MedecinController::class, 'insertMedicament'])->name('Medicament.insertMedicament');
Route::put('/doctor.medicament/{idMedicament}', [MedecinController::class, 'updateMedicament'])->name('Medicament.updateMedicament');
Route::delete('/doctor.medicament/{idMedicament}', [MedecinController::class, 'deleteMedicament'])->name('Delete');
Route::get('/doctor.rendezvous', [rendezVousController::class, 'index']);
Route::post('/doctor.rendezvous/{id}', [DossierMedicalController::class,'DossierStore'])->name('doctor.dossier');

Route::post('/doctor.rendezvouss/{id}', [CertificatController::class,'CertifStore'])->name('doctor.certif');
Route::get('/patient.certificat', [CertificatController::class,'index']);


// ----------------------------------------------------------------------------------------

// -------------------------------PATIENT--------------------------------------------------------

Route::get('/patient.home', [PatientController::class, 'index'])->name('index');
Route::get('/patient.doctorProfil/{id_user}',[PatientController::class,'doctorProfil'])->name('doctorProfil');
Route::get('/patient.favoris',[favorisController::class,'index'])->name('favoris');
Route::post('/patient.favoris/{id_medecin}', [favorisController::class, 'favoriStore'])->name('favoriStore');
Route::post('/patient.doctorProfil/{id_medecin}', [CommentaireController::class, 'store'])->name('commentaire');
Route::get('/patient.reserve/{idDoctor}', [rendezVousController::class,'indexPatient'])->name('patient.reserve');
Route::post('/patient.reserve', [rendezVousController::class,'rendezVousStore'])->name('rendezVousStore');

// -------------------------------------------------------------------------------------------------
require __DIR__.'/auth.php';
