<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    public function index(){ 
        return view('doctor.dashboard');
    }
    
    public function allSpeciality(){
        $specialities = Speciality::get();
        return view ('/auth/register' , compact('specialities'));  
    }}
