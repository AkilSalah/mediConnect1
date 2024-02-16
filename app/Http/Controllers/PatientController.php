<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request ) { 
        $specialities = Speciality::all();
    
        $doctorsQuery = Medecin::with('user', 'spaciality')
            ->join('users', 'medecins.id_user', '=', 'users.id')
            ->join('specialities', 'medecins.id_spaciality', '=', 'specialities.id');
            
        $speciality = $request->input('speciality');
        if ($speciality && $speciality !== 'Tout') {
            $doctorsQuery->where('specialities.id', $speciality);
            }
    
        $doctors = $doctorsQuery->get();
    
        return view('patient.home', compact('specialities', 'doctors'));  
    }

    public function doctorProfil(Request $request, $id_user) {
        $medecin = Medecin::where('id_user', $id_user)->first();
    
        if ($medecin) {
            $id_medecin = $medecin->id;
            $medecinDetails = Medecin::with('user', 'spaciality')
                ->join('users', 'medecins.id_user', '=', 'users.id')
                ->join('specialities', 'medecins.id_spaciality', '=', 'specialities.id')
                ->where('medecins.id', $id_medecin) 
                ->first();
    
            return view('patient.doctorProfil', compact('medecinDetails','id_medecin'));
        } 
    }
    

 
    
    
    

   

}
