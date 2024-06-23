<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idee extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',
        'auteur_nom_complet',
        'auteur_email',
        'date_creation',
        'categorie_id',
        'statut',
    ];
    public function categorie() {
        return $this->belongsTo(Categorie::class,'categorie_id');
    }
    public function commentaires() {
        return $this->hasMany(Commentaire::class,'idee_id');
    }
}
