<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'auteur_nom_complet',
        'auteur_email',
        'date_creation',
        'idee_id',
        'description',
    ];
    public function idee() {
        return $this->belongsTo(Idee::class,'idee_id');
    }
}
