<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_patient',
        'id_medecin',
        'commentaire',
    ];
    public function patient(){
        return $this->belongsTo(Patient::class, 'id');
    }
    public function medecin(){
        return $this->belongsTo(Medecin::class , 'id');
    }
}
