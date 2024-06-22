<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{

    public function ajouter_categorie(){
        return view('categorie.ajout_categorie');
       }


       public function ajouter_categorie_traitement(Request $request){

        $request->validate([
            'nom' => 'required|string|max:25|',

        ]);
        $categorie = new Categorie();
        $categorie->nom = $request->nom;
        $categorie->save();
        return redirect()->back()->with('status', 'Categorie ajoutée avec succès');

    }

    public function afficher_categorie(){
        $categories = Categorie::all();
        return view('categorie.kategorie', compact('categories'));
    }
    public function supprimer_categorie($id){
        $categorie = Categorie::find($id);
        $categorie->delete();
        return redirect()->back()->with('status', 'Categorie supprimée avec succès');
    }

    public function modifier_categorie($id){
        $categorie = Categorie::find($id);
        return view('categorie.modifier_categorie', compact('categorie'));
    }

    public function modifier_categorie_traitement (Request $request){
        $categorie = Categorie::find($request->id);
        $categorie->nom = $request->nom;
        $categorie->save();
        return redirect('/kategorie')->with('status', 'Categorie modifiée avec succès');

    }
}
