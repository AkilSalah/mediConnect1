<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_patient',
        'id_medecin',
        'date',
        'isUrgent',
    ];
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function medecin(){
        return $this->belongsTo(Medecin::class);
    }
}
