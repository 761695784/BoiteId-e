<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard de l'administrateur</title>
    <!-- Inclusion de Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Inclusion de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .table thead th {
            background-color: #1d5ce5;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
                <h1 class="mt-4">Liste des Idées</h1>
                @if ($idees->isEmpty())
                    <p>Aucune idée n'a été proposée.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Titre</th>
                                    <th>Auteur</th>
                                    <th>Date de Création</th>
                                    <th>Catégorie</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($idees as $idee)
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

                                            <form action="{{ route('email.action', ['id' => $idee->id, 'action' => 'approuvée']) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>

                                            <form action="{{ route('email.action', ['id' => $idee->id, 'action' => 'inapprouvée']) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </main>
        </div>
    </div>

    <!-- Inclusion de Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
