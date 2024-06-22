<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails de l'article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif


<div class="container mt-5">
    <a href="/liste" class="btn btn-danger ">Retour à la liste</a>
    <p>Titre : <strong>{{ $idees->titre }} </strong></p>
    <p>description :  <strong>{{ $idees->description }}</strong></p>
    <p> Proposé par : <strong>{{ $idees->auteur_nom_complet }}</strong></p>
    <p><strong>{{ $idees->auteur_email }} </strong></p>
    <p> Catégorie : <strong>{{ $idees->categorie->nom }}</strong> </p>
    <p> Publié le : <strong>{{ $idees->created_at }}</strong> </p>


    {{-- <p  class="badge text-bg-dark"  ><strong>Publié le :</strong> {{ $articles->PublicationDate }}</p>
    @if($articles->statut)
        <span class="badge bg-success">À la une</span><br>
    @endif<br> --}}
    {{-- <h2>Commentaires</h2>
    @foreach($articles->comments as $comment)
        <div class="card mb-2">
            <div class="card-body">
                <input type="hidden" name="id" value="{{ $comment->id}}">
                <p><strong> {{ $comment->nom_complet_auteur }}</strong> </p>
                <p>{{ $comment->contenu }}</p>
                <p class="badge text-bg-warning" ><strong>Publié le:</strong> {{ $comment->date_heure_creation }}</p><br>

                <a href="{{route('comments.edit',$comment->id)}}" class="btn btn-primary">Modifier</a>
                <a href="{{route('comments.destroy',$comment->id)}}" class="btn btn-danger">Supprimer</a>
            </div>
        </div>
    @endforeach --}}
    <form method="POST" action="">
        {{-- {{ route('comments.store') }} --}}
        @csrf
        <input type="hidden" name="idee_id" value="{{ $idees->id }}">
        <div class="mb-3">
            <label for="Auteur" class="form-label">Auteur</label>
            <input type="text" class="form-control" name="nom_complet_auteur" placeholder="Entrer votre nom" required>
        </div>
        <div class="mb-3">
            <label for="commentaire" class="form-label">Commentaire</label>
            <textarea class="form-control" name="contenu" rows="3" placeholder="Entrer votre commentaire" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        <a href="/liste" class="btn btn-danger">Annuler</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
