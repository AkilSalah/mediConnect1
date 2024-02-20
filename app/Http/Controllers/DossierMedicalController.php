<?php

namespace App\Http\Controllers;

use App\Models\DossierMedical;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DossierMedicalController extends Controller
{
    public function doctorIndex()
    {
        $id_medecin = Auth::user()->id;
        $dossiers = DossierMedical::select('patients.*','users.*','dossier_medicals.*')
        ->join('patients', 'dossier_medicals.id_patient', '=', 'patients.id')
        ->join('users', 'patients.id_user', '=', 'users.id')
        ->where('dossier_medicals.id_medecin', $id_medecin)
        ->get();
        return view('doctor.dashboard',compact('dossiers'));
    }

    public function DossierStore(Request $request , $id_patient){
        $id_medecin = Auth::user()->id;

        $request->validate([
            'Ddate' => 'required',
            'Ddescription' => 'required',
        ]);

        $user = DossierMedical::create([
            'id_patient' =>$id_patient,
            'id_medecin'=> $id_medecin,
            'details' => $request->Ddescription,
        ]);

        return redirect()->back()->with('success', 'Appointment booked successfully.');
    }

}
