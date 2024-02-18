<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class rendezVousController extends Controller
{
    public function index()
    {
        return view('doctor.rendezVous');
    }
    public function indexPatient($idDoctor)
    {
        $existingDates = RendezVous::pluck('date')->toArray();
        return view('/patient/reseve',["idDoctor"=>$idDoctor , "existingDates"=>$existingDates ]);

    }

    public function rendezVousStore(Request $request)
{
    if (Auth::check()) {
        $patient_id = Auth::user()->id;
        $patient = Patient::where("id_user", $patient_id)->first();

        $medecin_id = $request->input('iddoctor');
        $medecin = Medecin::where('id_user', $medecin_id)->first();

        if ($medecin) {
            $validation = $request->validate([
                'date' => 'required',
            ]);

            $existingRendezVous = RendezVous::where('medecin_id', $medecin->id)
                                              ->where('date', $request->date)
                                              ->exists();

            if (!$existingRendezVous) {
                $rendezVous = RendezVous::create([
                    'patient_id' => $patient->id,
                    'medecin_id' => $medecin->id,
                    'date' => $request->date,
                ]);

                return redirect()->back()->with('success', 'Appointment booked successfully.');
            } else {
                return redirect()->back()->with('error', 'Selected time is already booked. Please choose another time.');
            }
        }
    }
}

    
}
