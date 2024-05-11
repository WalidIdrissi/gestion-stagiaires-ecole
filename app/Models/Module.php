<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = ['libelle', 'mh', 'coef','filiere_id'];
    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'filiere_id');
    }
}
