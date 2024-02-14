<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierMedical extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_patient',
        'id_medecin',
        'details',
    ];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function medecin(){
        return $this->belongsTo(Medecin::class);
    }
}
