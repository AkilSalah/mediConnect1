<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use App\Models\RendezVous;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedecinController extends Controller
{
    public function index(){ 
        return view('doctor.dashboard');
    }
    public function allSpeciality(){
        $specialities = Speciality::get();
        return view ('/auth/register' , compact('specialities'));  
    }

    public function allSpecialityM() {
        $medicaments = Medicament::all();
        $specialities = Speciality::all();
        return view('doctor.medicament', compact('medicaments', 'specialities'));
    }
    
    public function insertMedicament(Request $request)
    {
        $request->validate([
            'medicamentName' => 'required',
            'medicamentImage' => 'required|image',
            'medicamentSpeciality' => 'required',
        ]);
    
        $imagePath = $request->file('medicamentImage')->store('public/images/medicaments');
    
        $relativeImagePath = str_replace('public/', 'storage/', $imagePath);
      
        Medicament::create([
            'medicamentName' => $request->medicamentName,
            'medicamentImage' => $relativeImagePath,
            'speciality_id' => $request->medicamentSpeciality,
        ]);
    
        return redirect()->route('Medicament.insertMedicament');
    }
    
    public function updateMedicament(Request $request, $idMedicament){
        $request->validate([
            'medicamentName' =>'required',
            'medicamentImage' =>'required',
            'medicamentSpeciality' =>'required',
        ]);

        $medicament = Medicament::findOrFail($idMedicament);

        $medicament->update([
            'medicamentName' => $request->medicamentName,
            'medicamentImage' => $request->medicamentImage,
            'medicamentSpeciality' => $request->medicamentSpeciality,
        ]);

        return redirect()->route('Medicament.allSpecialityM');
    }

    public function deleteMedicament($idMedicament){
        $medicament = Medicament::find($idMedicament);
        if($medicament){
            $medicament->delete();
        }
        return redirect()->route('Medicament.allSpecialityM');
    }

    




}
