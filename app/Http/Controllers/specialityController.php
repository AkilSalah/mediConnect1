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

}
