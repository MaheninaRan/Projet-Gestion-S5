<style>
.titre{
    background-color: #00B074;
    height: 70px;
}
.titre h2{
    color: white;
}
.reponse input[type=checkbox]{
    width: 80px;
}
</style>
<div class="container">
    <div class="row titre">
        <div class="col-lg-2"></div>
        <h2 class="text-center">Examen QCM à passer</h2>  
    </div> <br>
    <div class="row" style="background-color: white;">
        <h4>Voici quelque question pour votre poste : <?= $detailcv[0]['poste'] ?> </h4>
    </div> 
<form action="<?= base_url("index.php/FrontOffice/insertReponse") ?>" method="post">    
    <?php for ($i=0; $i <$maxQuest; $i++) { ?>
        <div class="boucle" style="background-color: white;">
            <div class="row question" style="background-color: white;">
                <div class="col-lg-2">Quesion <?= $i + 1 ?> : </div>
                <div class="col-lg-9"><?= $question[$i]['question'] ?> </div>
                <div class="col-lg-1"><b><?= $points[$i][0]['points'] ?></b></div>
            </div>
            <input type="hidden" name="maxquestion" value="<?= $maxQuest ?>">
            <input type="hidden" name="idbesoin" value="<?= $detailcv[0]['idBesoin'] ?>">
            <input type="hidden" name="idcv" value="<?= $detailcv[0]['id'] ?>">

            <?php for($j=0;$j<$maxReponse[$i];$j++){ ?>
                    <div class="row reponse" style="background-color: white;">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-8"> <input type="checkbox" name="reponse[<?= $i ?>][<?= $j ?>]" value="<?= $reponse[$i][$j]['reponse'] ?>" id=""><?= $reponse[$i][$j]['reponse'] ?></div>
                    </div>
                    <input type="hidden" name="maxreponse" value="<?= $maxReponse[$i] ?>">
                    <input type="hidden" name="teste" value="Teste a afficher">
            <?php } ?>
        </div> <br> 
    <?php } ?>
        <div class="row valider">
            <div class="col-lg-3"></div>
            <button type="submit" class="col-lg-5">Valider</button>
        </div>
</form>
</div>