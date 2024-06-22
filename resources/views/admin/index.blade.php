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
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            background-color: #f8f9fa;
            border-right: 1px solid #e0e0e0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            height: 100vh;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
        }

        .sidebar .logo img {
            width: 150px;
        }

        .sidebar .nav-link {
            color: #333;
        }

        .sidebar .nav-link.active {
            color: #e51d3e;
            font-weight: bold;
        }

        .sidebar .nav-link:hover {
            color: #e51d3e;
        }

        .sidebar .logout {
            position: absolute;
            bottom: 20px;
            width: 100%;
        }

        .card img {
            height: 200px;
            object-fit: cover;
        }

        .card-body p {
            margin: 0;
        }

        .btn-outline-secondary {
            color: #e51d3e;
            border-color: #e51d3e;
        }

        .btn-outline-secondary:hover {
            background-color: #e51d3e;
        }

        .table thead th {
            background-color: #e51d3e;
            color: white;
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <div class="logo text-center my-4">
                        <img src="logo.png" alt="Simplon Senegal" class="img-fluid">
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="fas fa-home"></i>
                                Tableau de bord
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/liste">
                                <i class="fas fa-file"></i>
                                Formations
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/candidatures">
                                <i class="fas fa-users"></i>
                                Liste des Candidats
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-bell"></i>
                                Notifications
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-cogs"></i>
                                Apparence
                            </a>
                        </li>
                    </ul>
                    <div class="logout text-center my-4">
                        <form action="/personnel/deconnexion" method="POST">
                            @csrf
                            @method('DELETE')
                        <button class="btn btn-danger">
                            <i class="fas fa-sign-out-alt"></i> Déconnexion
                        </button>
                    </form>
                    </div>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <h1 class="mt-4">Liste des Idées</h1>
                @if ($candidatures->isEmpty())
                    <p>Aucune candidature n'a été soumise.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Nom du candidat </th>
                                    <th>Email</th>
                                    <th>Nom de la formation</th>
                                    <th>Date de soumission</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($candidatures as $candidature)
                                    <tr>
                                        <td>{{ $candidature->candidat->prenom }} {{ $candidature->candidat->nom }}  </td>
                                        <td>{{ $candidature->candidat->email }}</td>
                                        <td>{{ $candidature->formation->libelle }}</td>
                                        <td>{{ $candidature->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('candidatures.detail', ['id' => $candidature->id]) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>


                                            <form action="{{ route('candidatures.action', ['id' => $candidature->id, 'action' => 'validee']) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>

                                            <form action="{{ route('candidatures.action', ['id' => $candidature->id, 'action' => 'rejetee']) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>

                                            <form action="{{ route('candidatures.action', ['id' => $candidature->id, 'action' => 'delete']) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i>
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
