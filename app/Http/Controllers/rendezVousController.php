<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Medicament;
use App\Models\Patient;
use App\Models\RendezVous;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class rendezVousController extends Controller
{
    public function index()
    {
        $medecini = Auth::user()->id;
        // dd($medecini);
        // $medecin = Medecin::where('id_user',$medecini)->with('user')->get();
        $medecin = Medecin::select('users.*','medecins.*')
        ->join('users','medecins.id_user', '=', 'users.id')
        ->where('medecins.id_user', $medecini)
        ->first();
        // dd($medecin->name);
        $rendezvous = RendezVous::select('rendez_vouses.*','patients.*', 'users.*')
        ->join('patients', 'rendez_vouses.patient_id', '=', 'patients.id')
        ->join('users', 'patients.id_user', '=', 'users.id')
        ->where('rendez_vouses.medecin_id', $medecin->id)
        ->get();
        // dd($rendezvous);
        $medicaments = Medecin::select('specialities.*', 'medecins.*', 'medicaments.*')
        ->join('specialities', 'medecins.id_spaciality', '=', 'specialities.id')
        ->join('medicaments', 'medicaments.speciality_id', '=', 'specialities.id')
        ->where('medecins.id_user', $medecini)
        ->get();
        // dd($medicaments);
        return view('doctor.rendezVous', compact('rendezvous','medecin','medicaments'));
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
