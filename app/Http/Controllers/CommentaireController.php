<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    
    public function store(Request $request ,$id_medecin){
        $id_user = Auth::user()->id;
        $patient = Patient::where('id_user', $id_user)->first();

        if ($patient) {
            $validation = $request->validate([
               'commentaire' => 'required',
            ]);
           $comment = Commentaire::create([
                'id_patient' => $patient->id,
                'id_medecin' => $id_medecin,
                'commentaire' => $request->commentaire,
            ]);
        }
        return redirect()->route('commentaire', ['id_medecin' => $id_medecin]);
        

    }

    // public function index($idMedecin)
    // {
    //     $commentaires = Commentaire::select('commentaires.*', 'patients.*', 'users.*')
    //         ->join('patients', 'commentaires.id_patient', '=', 'patients.id')
    //         ->join('users', 'patients.id_user', '=', 'users.id')
    //         ->where('commentaires.id_medecin', $idMedecin)
    //         ->get();
    
    //     return view('patient.doctorProfil', compact('commentaires'));
    // }
    




    

}
