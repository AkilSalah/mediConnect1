<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class specialityController extends Controller
{
    public function index(){ 
        return view('admin.speciality');
    }
    public function allSpeciality(){
        $specialities = Speciality::all();
        return view('admin.speciality',compact('specialities'));
    }
    public function insertSpeciality(Request $request){
        $request->validate([
            'specialityname' => 'required',   
        ]);
        Speciality::create([
            'specialityName' => $request->specialityname,
        ]);
        return redirect()->route('speciality.insertSpeciality');
        
    }

    public function updateSpeciality(Request $request, $idSpeciality)
{
    $request->validate([
        'specialityName' => 'required',
    ]);

    $speciality = Speciality::findOrFail($idSpeciality);

    $speciality->update([
        'specialityName' => $request->specialityName,
    ]);
    return redirect()->route('speciality.allSpeciality')->with('success', 'Speciality updated successfully');
}

    

    public function deleteSpeciality(Request $request, $specialityId){
        $speciality = Speciality::find($specialityId);
        if($speciality){
            $speciality->delete();
        }
        return redirect()->route('speciality.allSpeciality');
    }
    


}
