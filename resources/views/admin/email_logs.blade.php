<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs des Emails</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Historique des Emails </h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Idée</th>
                    <th>Email</th>
                    <th>Action</th>
                    <th>Date d'envoi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emailLogs as $log)
                    <tr>
                        <td>{{ $log->id }}</td>
                        <td>{{ $log->idee ? $log->idee->titre : 'Idée non trouvée' }}</td>
                        <td>{{ $log->auteur_email }}</td>
                        <td>{{ $log->action }}</td>
                        <td>{{ $log->sent_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
