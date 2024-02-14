<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request) { 
        $specialities = Speciality::all();
    
        $doctorsQuery = Medecin::with('user', 'spaciality')
            ->join('users', 'medecins.id_user', '=', 'users.id')
            ->join('specialities', 'medecins.id_spaciality', '=', 'specialities.id')
            ->where('specialities.specialityName', 'Généraliste');
    
        $speciality = $request->input('speciality');
        if ($speciality && $speciality !== 'Généraliste') {
            $doctorsQuery->orWhere('specialities.specialityName', $speciality);
        }
    
        $doctors = $doctorsQuery->get();
    
        return view('patient.home', compact('specialities', 'doctors'));  
    }
    

   

}
