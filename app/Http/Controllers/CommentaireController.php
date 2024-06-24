<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'auteur_nom_complet' => 'required|string|max:40',
            'idee_id' => 'required|integer|exists:idees,id',
        ]);

        $commentaire = new Commentaire();
        $commentaire->description = $request->description;
        $commentaire->auteur_nom_complet = $request->auteur_nom_complet;
        $commentaire->date_heure_creation = now(); // Assurez-vous que cette colonne existe dans votre table commentaires
        $commentaire->idee_id = $request->idee_id;
        $commentaire->save();

        return redirect()->back()->with('status', 'Votre commentaire a été enregistré avec succès.');
    }
}
