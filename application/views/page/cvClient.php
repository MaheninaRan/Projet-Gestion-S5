<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cv Client</title>
</head>
<body>
    <h1 style="text-align: center;">CV Client</h1>
    <h2><?= $servicedetail[0]['titre'] ?></h2>
    <p>Lieu : <?= $servicedetail[0]['prov'] ?></p>
    <p>Personne chercher : <?= $servicedetail[0]['pers'] ?> </p>
    <p>Diplome : <?= $diplome[0]['diplome'] ?></p>
    <p>Experience : <?= $experience[0]['experience'] ?> ans et plus </p>
    <b>Preference : </b>
    <p style="margin-left: 5%;">Genre : <?= $genre ?></p>
    <p style="margin-left: 5%;">Situation : <?= $situation ?></p>
    <p style="margin-left: 5%;">Nationalite : <?= $servicedetail[0]['nationalite'] ?></p>

    <h2>Formulaire Cv client</h2>
</body>
</html>