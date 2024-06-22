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
        <h1 class="text-center">Modifier une Categorie</h1>

        <form action="/modifier_categorie_traitement/{{$categorie->id}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$categorie->id}}">
          <div class="mb-3">
            <label for="nom" class="form-label">nom</label>
            <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" value="{{$categorie->nom}}">
            @error('nom')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Modifier</button>
          <a href="/kategorie" class="btn btn-danger">Annuler</a>
        </form>

      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
