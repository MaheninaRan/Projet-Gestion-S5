<style>
.favory{
    color:#00B074;
}
.favory:hover{
    color: green;
    font-size: 20px;
}
.titre{
    background-color: #00B074;
}
.titre h2{
    color: white;
    padding: 1%;
}
.detail{
    background-image: linear-gradient(#f5faff,#ffffff);
    padding: 2%;
    border-right: solid 7px green;
    border-radius: 5px 5px 100% 100px;
    
}
.detail b{
    font-size: 16px;
    font-family: 'Times New Roman', Times, serif;
    color: green;
}
.preff{ 
    background-color: green;
    border-radius: 55px 2px 55px 2px;
    width: 30%;
    margin-left: 1%;
    font-style: italic;
    text-align: center;
}

.buttonCv{
    background-color: green;
    border-radius: 55px 2px 55px 2px;
    width: 30%;
    margin-left: 1%;
    font-style: italic;
    text-align: center;
    color: white;
    border: none;
}
.formulaire{
    background-image: linear-gradient(#f5faff,#ffffff);
    border-left: solid 7px green;
    border-radius: 5px 5px 5% 100px;
}
.formulaire {

}
</style>
<div class="container">
    <div class="row titre">
        <h2 class="text-center"> <?= $servicedetail[0]['services'] ?> : <?= $servicedetail[0]['poste'] ?></h2>
    </div> <br>
        <div class="row">
            <div class="col-lg-5 detail">
            <p> <b> Societe : </b> <?= $servicedetail[0]['societe'] ?></p>
            <p> <b> Lieu : </b> <?= $servicedetail[0]['prov'] ?></p>
            <p> <b> Personne chercher : </b> <?= $servicedetail[0]['pers'] ?> </p>
            <p> <b> Diplome : </b> <?= $servicedetail[0]['diplome'] ?></p>
            <p><b> Experience : </b> <?= $servicedetail[0]['experience'] ?> ans et plus </p>
            
            <div class="preff"><b style="color:white">Preference : </b></div>
            <p style="margin-left: 8%;"> <b> Genre : </b><?= $servicedetail[0]['sexe'] ?></p>
            <p style="margin-left: 8%;"><b> Situation : </b><?= $servicedetail[0]['situation'] ?></p>
            <p style="margin-left: 8%;"> <b> Nationalite : </b><?= $servicedetail[0]['nationalite'] ?></p>
        </div>
        <div class="col-lg-7 formulaire">
            <form action="<?php echo site_url('index.php/ValidationCv/insertCv') ?>" method="post">
                <legend class="text-center">Formulaire</legend>
                <input type="hidden" name="idBesoin" value="<?= $servicedetail[0]['id'] ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-4">Nom : </div> 
                            <input class="col-lg-8" type="text" name="nom">
                            <?= form_error('nom') ?>
                        </div> <br>
                        <div class="row">
                            <div class="col-lg-4">Prenom : </div> 
                            <input class="col-lg-8" type="text" name="prenom">
                        </div> <br>
                        <div class="row">
                            <div class="col-lg-4">Naissance : </div> 
                            <input class="col-lg-8" type="date" name="naissance">
                        </div> <br>
                        <div class="row">
                            <div class="col-lg-4">Lieu : </div> 
                           <select class="col-lg-8" name="province" id="">
                                <?php for ($i=0; $i < count($province); $i++) {  ?>
                                    <option value="<?= $province[$i]['nom'] ?>"><?= $province[$i]['nom'] ?></option>
                                <?php }?>
                           </select>
                        </div> <br>
                        <div class="row">
                            <div class="col-lg-4">Genre : </div> 
                           <select class="col-lg-8" name="genre" id="">
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                           </select>
                        </div> <br>
                     
                       

                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-4">Situation: </div> 
                            <select class="col-lg-8" name="situation" id="">
                                    <?php for ($i=0; $i < count($situation); $i++) { ?>
                                        <option value="<?php echo $situation[$i]['nom'];?>"> <?php echo $situation[$i]['nom'];?> </option>
                                    <?php } ?>
                            </select>
                        </div><br>
                        <div class="row">
                                <div class="col-lg-4">Nationalite : </div> 
                               <select class="col-lg-8" name="nation" id="">
                                    <?php for ($i=0; $i < count($nation); $i++) { ?>
                                        <option value="<?= $nation[$i]['nom']?>"><?= $nation[$i]['nom']?></option>
                                    <?php }?>
                               </select>
                        </div> <br>
                        <div class="row">
                                <div class="col-lg-4">Diplome : </div> 
                               <select class="col-lg-8" name="diplome" id="">
                                    <?php for ($i=0; $i < count($alldiplome); $i++) { ?>
                                        <option value="<?= $alldiplome[$i]['nom']?>"><?= $alldiplome[$i]['nom']?></option>
                                    <?php }?>
                               </select>
                        </div> <br>
                        <div class="row">
                                <div class="col-lg-4">Exper : </div>  
                               <select class="col-lg-8" name="experience" id="">
                                    <?php for ($i=0; $i < count($allExper); $i++) { ?>
                                        <option value="<?= $allExper[$i]['nom']?>"><?= $allExper[$i]['nom']?></option>
                                    <?php }?>
                               </select>
                        </div> <br>
                        <div class="row">
                                <div class="col-lg-4">Password : </div>  
                                <input class="col-lg-8" type="password" name="motdepasse">       
                        </div><br>
                        <div class="row">
                            <div class="col-lg-4">Diplome : </div> 
                            <input type="file" class="col-lg-8" >
                        </div> <br>
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4"></div>
                 <input type="submit"  class="col-lg-4 buttonCv" value="Envoyer le cv">
                </div>
            </form>
            
        </div>
       
    </div>
</div>