<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
</head>
<body>
<h1 style="text-align: center;">Annonce pour les clients</h1>
    <?php 
        for ($i=0; $i < count($servicedetail); $i++) {  
            $idService=$servicedetail[$i]['id'];
    ?>
    <a href="<?php echo site_url("index.php/FrontOffice/cvClient?idService=$idService");?>">
        <div style="background-color: red; width:200px">
            <h3> <?php  echo $servicedetail[$i]['titre']; ?></h3>
            <p>Nombre personne : <?php  echo $servicedetail[$i]['pers']; ?></p>
            <p>Lieu : <?php  echo $servicedetail[$i]['prov']; ?></p>
        </div>
    </a>
<?php } ?>
</body>
</html>