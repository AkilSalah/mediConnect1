<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Speciality;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){ 
        $medecinCount = Medecin::count();
        $patientCount = Patient::count();
        $specialitiesCount = Speciality::count();
        return view('admin.dashboard', compact('medecinCount', 'patientCount', 'specialitiesCount'));
    }
   
    
    




}
