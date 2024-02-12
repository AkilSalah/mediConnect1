<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use App\Models\Speciality;
use Illuminate\Http\Request;

class medicamentController extends Controller
{
    
    public function index(){ 
        return view('admin.medicament');
    }
    public function allMedicament(){
        $medicaments = Medicament::get();
        return redirect()->route('medicament.allMedicament',compact('medicaments'));
    }
    public function allSpeciality() {
        $specialities = Speciality::get();
        return view('admin.medicament', ['specialities' => $specialities]);
    }
    
    
    public function insertMedicament(Request $request){
        $request->validate([
          'medicamentname' =>'required',
          'medicamentImage' =>'required',
          'medicamentSpeciality' =>'required',

        ]);
        Medicament::create([
          'medicamentName' => $request->medicamentname,
         'medicamentImage' => $request->medicamentImage,
        'medicamentSpeciality' => $request->medicamentSpeciality,
        ]);
        return redirect()->route('medicament.insertMedicament');
    }

    public function updateMedicament( Request $request , $idMedicament){
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
        return redirect()->route('medicament.allMedicament')->with('success', 'Medicament updated successfully');
    }

    public function deleteMedicament(Request $request , $idMedicament ){
        $medicament = Medicament::find($idMedicament);
        if($medicament){
            $medicament->delete();
        }
        return redirect()->route('medicament.allMedicament');
    }

    
}
