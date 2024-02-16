<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_spaciality',
    ];

    public function spaciality(){
        return $this->belongsTo(Speciality::class,'id');
    }

    public function user(){
        return $this->belongsTo(User::class,'id');
    }

    public function dossiers(){
        return $this->hasMany(DossierMedical::class);
    }

    public function rendez_vous(){
        return $this->hasMany(RendezVous::class);
    }

    public function favoris(){
        return $this->hasMany(Favoris::class,'id');
    }

    public function commentaire(){
        return $this->hasMany(Commentaire::class,'id');
    }

}
