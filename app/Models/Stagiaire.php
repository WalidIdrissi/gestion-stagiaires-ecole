<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom', 'adresse', 'ville', 'email', 'photo', 'groupe_id'];

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
    public function filiere()
    {
        return $this->hasMany(Filiere::class);
    }
}
