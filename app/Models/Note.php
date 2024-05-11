<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use App\Models\Module;
// use App\Models\Stagiaire;

class Note extends Model
{
    use HasFactory;
    protected $fillable = ['note', 'module_id', 'stagiaire_id'];
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }
}
