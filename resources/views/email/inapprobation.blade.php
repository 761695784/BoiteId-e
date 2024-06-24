<!DOCTYPE html>
<html>
<head>
    <title>Boite a Idée Communautaire</title>
</head>
<body>
    <p>Bonjour, {{ $idee->auteur_nom_complet}} !</p>
        <p>Nous sommes désolé de vous annoncer que votre Idée portant sur le (la)
            <strong> {{ $idee->titre}} </strong> que vous avez proposé le <strong>{{$idee->created_at}}</strong>
            dans notre plateforme a été <strong>Inapprouvé</strong>.
        </p>
        <p>Nous vous encourageons a emettres d'autre idées la prochaine fois</p>

        <p>Merci et à bientot</p>

        <p>Cordialement</p>

</body>
</html>
