<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
    ];


    public function user(){
        return $this->belongsTo(User::class, 'id');
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
    
}
