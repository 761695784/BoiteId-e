<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails de l'article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif


<div class="container mt-5">
    <a href="/liste" class="#"><i class="fas fa-arrow-left"></i></a><br><br>
    <p>Titre : <strong>{{ $idees->titre }} </strong></p>
    <p>description :  <strong>{{ $idees->description }}</strong></p>
    <p> Proposé par : <strong>{{ $idees->auteur_nom_complet }}</strong></p>
    <p><strong>{{ $idees->auteur_email }} </strong></p>
    <p> Catégorie : <strong>{{ $idees->categorie->nom }}</strong> </p>
    <p> Publié le : <strong>{{ $idees->created_at }}</strong> </p>

    @auth
    <td> <a href="{{route('modifier',$idees->id)}} " class="btn btn-primary btn-sm">

        <i class="fas fa-edit"></i> 
    </a></td>
    <td> <a href="{{route('suppression',$idees->id)}}" class="btn btn-danger btn-sm">

        <i class="fas fa-trash-alt"></i>
    </a></td>
    @endauth
    <br> <br>  <br>

   <h2>Commentaires</h2>
    @foreach($idees->commentaires as $commentaire)
        <div class="card mb-2">
            <div class="card-body">
                <input type="hidden" name="id" value="{{ $commentaire->id}}">
                <p><strong> {{ $commentaire->auteur_nom_complet }}</strong> </p>
                <p>{{ $commentaire->description }}</p>
                <p class="badge text-bg-warning" ><strong>Publié le:</strong> {{ $commentaire->created_at }}</p><br>
            </div>
        </div>
    @endforeach
    <form method="POST" action="{{ route('store') }}">
        @csrf
        <input type="hidden" name="idee_id" value="{{ $idees->id }}">
        <div class="mb-3">
            <label for="auteur_nom_complet" class="form-label">Auteur</label>
            <input type="text" class="form-control" name="auteur_nom_complet" placeholder="Entrer votre nom" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Commentaire</label>
            <textarea class="form-control" name="description" rows="3" placeholder="Entrer votre commentaire" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        <a href="/liste" class="btn btn-danger">Annuler</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
