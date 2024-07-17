<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administration - Gestion des Idées</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1">


</head>
<style>
    .btn-add {
        background-color: #1d5ce5;
        color: white;
        font-size: 1.2em;
        padding: 10px 20px;
        border-radius: 30px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-add:hover {
        background-color: #1543a5;
        transform: scale(1.05);
    }
</style>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestion des Idées</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="container mt-5 text-center">
            <a href="/ajouter" class="btn btn-add mb-4">Ajouter</a>
        </div> @auth
        <div class="container text-end">
            <a href="/index" class="btn btn-add me-2">Index</a>
            <a href="/kategorie" class="btn btn-add me-2">categorie</a>
            <a href="/email-logs" class="btn btn-add">Historique des états</a>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">@csrf
                @method('DELETE')
                <button class="btn btn-danger me-2" type="submit">Déconnexion</button>
            </form>
        </div>@else
        <div class="container text-center">
            <a href="/login" class="btn btn-add">Connexion</a>
        </div>
        @endauth <br>
        <table class="table table-bordered">
            <thead><tr>
                    <th>Id</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Date de Création</th>
                    <th>Catégorie</th>
                    <th>Actions</th> </tr>
            </thead>
            <tbody>
                @foreach($idees as $idee)
                    <tr>
                        <td>{{ $idee->id }}</td>
                        <td>{{ $idee->titre }}</td>
                        <td>{{ $idee->auteur_nom_complet }}</td>
                        <td>{{ $idee->created_at }}</td>
                        <td>{{ $idee->categorie->nom }}</td>
                        <td>
                            <a href="{{ route('details', $idee->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
