<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Réclamation annulée</title>
</head>

<body>
    <h1>Réclamation annulée</h1>

    <p>Votre réclamation a été annulée.</p>

    @if (!empty($commentaire))
    <p>Commentaire : {{ $commentaire }}</p>
    @endif

    <p>Merci.</p>

</body>

</html>