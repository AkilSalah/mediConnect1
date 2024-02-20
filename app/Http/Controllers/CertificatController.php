<?php

namespace App\Http\Controllers;

use App\Models\Certificat;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $id_user = Auth::user()->id;
            $patient = Patient::where('id_user', $id_user)->first();
            // $medicalCertificate = Certificat::select('patients.*', 'patients.name as patient_name', 'patients.email as patient_email', 'users.*', 'medecins.*')
            // ->join('patients', 'certificats.id_patient', '=', 'patients.id')
            // ->join('users as patient_user', 'patients.id_user', '=', 'patient_user.id')
            // ->join('medecins', 'certificats.id_medecin', '=', 'medecins.id')
            // ->join('users as medecin_user', 'medecins.id_user', '=', 'medecin_user.id')
            // ->where('certificats.id_medecin', 3)
            // ->get();
            $medicalCertificate = Certificat::with(['patient.user', 'medecin.user'])
            ->where('id_patient',$patient->id_user )
            ->get();

            return view('patient.certif',compact('medicalCertificate'));
        } else {
            return redirect()->route('login');
        }
    }

    
    public function CertifStore(Request $request , $id_patient){
        $id_medecin = Auth::user()->id;

        $request->validate([
            'joursRepos' => 'required',
            'details' => 'required',
        ]);

        $user = Certificat::create([
            'id_patient' =>$id_patient,
            'id_medecin'=> $id_medecin,
            'joursRepos' =>$request->joursRepos,
            'details' => $request->details,
        ]);

        return redirect()->back()->with('success', 'Appointment booked successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificat $certificat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificat $certificat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificat $certificat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificat $certificat)
    {
        //
    }
}
