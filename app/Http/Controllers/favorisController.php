<?php

namespace App\Http\Controllers;

use App\Models\Favoris;
use App\Models\Medecin;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class favorisController extends Controller
{
    public function index()
    {
        $id_user = Auth::user()->id;
        $patient = Patient::where('id_user', $id_user)->first();
        
        if ($patient) {
            $favorites = $patient->favoris()
                ->join('medecins', 'favoris.id_medecin', '=', 'medecins.id')
                ->join('users', 'medecins.id_user', '=', 'users.id')
                ->get();
            return view('patient.favoris', compact('favorites')); 
        }
    }
    

    public function favoriStore($idMedecin)
{
    $id_user = Auth::user()->id;
    $patient = Patient::where('id_user', $id_user)->first();
    dump($patient);     
    if ($patient) {
        Favoris::create([
            'id_patient' => $patient->id,
            'id_medecin' => $idMedecin,
        ]);
    }
    return redirect()->route('favoris');
}

    
    
//     public function showFavorites() {
//         $id_user = Auth::user()->id;
//         $patient = Patient::where('id_user', $id_user)->first();
//         $favorites = Patient::findOrFail($patient)
//         ->favoris()
//         ->join('medecins', 'favoris.id_medecin', '=', 'medecins.id')
//         ->join('users', 'medecins.id_user', '=', 'users.id')
//         ->get();

//     return view('patient.favoris', compact('favorites'));
// }


}
