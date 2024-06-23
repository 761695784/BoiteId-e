<?php

namespace App\Http\Controllers;

use App\Models\Idee;
use App\Mail\approbation;
use App\Models\Categorie;
use App\Mail\inapprobation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IdeeController extends Controller
{
    public function index(){
        $idees = Idee::with('categorie')->get();
        return view('admin.index', compact('idees'));
    }

    public function liste(){
        $idees = Idee::with('categorie')->get();
        return view('idee.liste', compact('idees'));
    }
    public function accueil(){
        return view('idee.accueil');
    }
    public function details($id){
        $idees = Idee::with('categorie','commentaires')->find($id);
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
        return redirect('/liste')->with('status', 'votre idée a ete enregistré ,nous vous reviendrons pour annoncer l"etat de votre idée.');
    }

    public function supprimer_idee($id){
        $idee = Idee::find($id);
        $idee->delete();
        return redirect('/liste')->with('status', 'votre idée a ete supprimé');
    }

    public function modifier_idee($id){
        $idees = Idee::find($id);
        $categories = Categorie::all();
        return view('idee.mod', compact('idees','categories'));
    }

    public function modifier_idee_traitement(Request $request){
        $idee = Idee::findOrFail($request->id);
        $idee->titre = $request->titre;
        $idee->description = $request->description;
        $idee->auteur_nom_complet = $request->auteur_nom_complet;
        $idee->auteur_email = $request->auteur_email;
        $idee->categorie_id = $request->categorie_id;
        $idee->save();
        return redirect('/liste')->with('status', 'votre idée a ete modifié');
    }


    public function ideeAction(Request $request, $id, $action)
    {
        $idee = Idee::find($id);

        if (!$idee) {
            return back()->with('error', 'Idée non trouvée');
        }

        if ($action == 'approuvée') {
            Mail::to($idee->auteur_email)->send(new approbation($idee));
            return back()->with('success', 'Idée approuvée et email envoyé');
        } elseif ($action == 'inapprouvée') {
            Mail::to($idee->auteur_email)->send(new inapprobation($idee));
            return back()->with('success', 'Idée rejetée et email envoyé');
        }

        return back()->with('error', 'Action non reconnue');
    }

    // public function detail($id)
    // {
    //     // Récupération de la candidature par son ID avec les relations
    //     $candidature = Candidature::with('candidat')->findOrFail($id);

    //     // Affichage de la vue 'candidatures.detail' avec les détails de la candidature
    //     return view('candidatures.detail', compact('candidature'));
    // }


}
