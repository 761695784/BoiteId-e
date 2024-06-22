<?php

namespace App\Http\Controllers;

use App\Models\Idee;
use App\Models\Categorie;
use Illuminate\Http\Request;

class IdeeController extends Controller
{

    public function liste(){
        $idees = Idee::with('categorie')->get();
        return view('idee.liste', compact('idees'));
    }
    public function accueil(){
        return view('idee.accueil');
    }
    public function details($id){
        $idees = Idee::with('categorie')->find($id);
        return view('idee.details', compact('idees'));
    }
   public function ajouter_idee(){
    $categories = Categorie::all();
       return view('idee.ajouter',compact('categories'));
   }
    public function ajouter_idee_traitement(Request $request){
        $request->validate([
            'titre' =>'required|string|max:255',
            'description' =>'required|string|',
            'auteur_nom_complet' =>'required|string|max:40',
            'auteur_email' =>'required|string|max:255',
            'date_creation' =>'required|date|',
            'categorie_id' =>'required|string|max:255',
        ]);
        $idee = new Idee();
        $idee->titre = $request->titre;
        $idee->description = $request->description;
        $idee->auteur_nom_complet = $request->auteur_nom_complet;
        $idee->auteur_email = $request->auteur_email;
        $idee->date_creation = $request->date_creation;
        $idee->categorie_id = $request->categorie_id;
        $idee->save();
        return redirect()->back()->with('status', 'votre idée a ete enregistré ,nous vous reviendrons pour annoncer l"etat de votre idée.');
    }
}
