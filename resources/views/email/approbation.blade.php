<!DOCTYPE html>
<html>
<head>
    <title>Boite a Idée Communautaire</title>
</head>
<body>
    <p>Bonjour, {{ $idee->auteur_nom_complet}} !</p>
    <h1>Félicitation</h1>
        <p>Nous sommes ravis de vous annoncer que votre Idée portant sur le (la)
            <strong> {{ $idee->titre}} </strong> que vous avez proposé le <strong>{{$idee->created_at}}</strong>
            dans notre plateforme a été <strong>Approuvé</strong>.
        </p>
        <p>Nous vous enverrons dans les plus brefs delai, un mail pour vous communiquer la date prévu pour l'entretien</p>

        <p>Merci et à bientot</p>

        <p>Cordialement</p>

</body>
</html>
