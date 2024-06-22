<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud sur laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <h1 class="text-center">Ajouter une idée </h1>
        @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
        <form action="ajouter_traitement" method="POST">
            @csrf
          <div class="mb-3">
            <label for="titre">titre</label>
            <input  class="form-control  @error('titre') is-invalid @enderror" type="string" name="titre" id="titre" placeholder="Entrez l'intitulé de votre idée" value="{{ old('titre') }}" >
            @error('titre')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea type="text" class="form-control  @error('description') is-invalid @enderror " name="description"  rows="20" placeholder="Entrez la description de votre idée" value="{{ old('description') }}"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="Nom complet" class="form-label"> Votre nom complet</label>
            <input type="text" class="form-control  @error('auteur_nom_complet') is-invalid @enderror" name="auteur_nom_complet" placeholder="Saisir votre nom " value="{{ old('auteur_nom_complet') }}">
            @error('auteur_nom_complet')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="auteur_email" class="form-label">Votre email</label>
            <input type="text" class="form-control  @error('auteur_email') is-invalid @enderror" name="auteur_email" placeholder="Entrez votre email" value="{{ old('auteur_email') }}">
            @error('auteur_email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="creation" class="form-label">Publié le</label>
            <input type="date" class="form-control @error('date_creation') is-invalid @enderror " name="date_creation" value="{{ old('date_creation') }}">
            @error('date_creation')
          <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="categorie">Preciser la Categorie </label>
            <select class="form-control" id="categorie" name="categorie_id">
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>
          <br />
          <button type="submit" class="btn btn-primary">Ajouter</button>
          <a href="/liste" class="btn btn-danger">Retour a la liste</a>
        </form>

      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
