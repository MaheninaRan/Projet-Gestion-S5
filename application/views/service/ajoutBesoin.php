
<style>
    .error {
        border-color: red; 
        background-color: #ffeaea;
    }
    .tete{
      background-color: #00B074;
      width: 100%;
    
    }
    .tete h4{
      color: white;
      text-align: center;
      margin-top: 3%;
      font-size: 30px;
    }
    .tete i{
      color: white;
      font-size: 40px;
      margin-top: 22%;
      float: left;
    }
    #boiteService{
      background-color: white;    
    }
    #boiteService th,#boiteService td{
      color:#00B074;
      font-size: 15px;
    }
    .ajouter a{
      background-color: #00B074;
      margin-top: 1%;
    }
    #icona{
      background-color: white;
    }
    .buttonValider{
    background-color: green;
    border-radius: 55px 2px 55px 2px;
    width: 30%;
    margin-left: 1%;
    font-style: italic;
    text-align: center;
    color: white;
    border: none;
}

.gauche{
        background-color:yellow;
    }
    .droite{
        background-color:pink;
    }
</style>
       
    <div class="row tete">
    <h4>Service : <?= $service[0]['services'] ?></h4>
    <h4>Service : <?= $service[0]['id'] ?></h4>
		</div>
    <div class="corpsservice">
          <div class="row corps" >
          <div class="col-lg-2 gauche"> <br>
			    <h6 class="text-center">Profil</h6>
			    <h6 class="text-center">Employer</h6>
		    	<h6 class="text-center" style="color:green" ><a href="<?= base_url("index.php/BackOffice/listeAllBesoin?idservice=$idService") ?>"> Liste Besoin </a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition?etat=valider&idservice=$idService") ?>"> Besoin Validé </a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition?etat=refuser&idservice=$idService") ?>"> Besoin Refusé </a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition?etat=attente&idservice=$idService") ?>"> Besoin En attente </a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition?etat=non lue&idservice=$idService") ?>"> Non lue </a></h6>
          <h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition?etat=non lue&idservice=$idService") ?>"> Contract </a></h6>
          <h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/employerSelect") ?>"> Employer </a></h6>

			    <h6 class="text-center">Contract</h6>
			    <h6 class="text-center"><a href="<?= base_url("index.php/BackOffice/deconnexionService") ?>"> Deconnexion </a></h6>
		    </div>

            <div class="col-lg-10 droite"><br>
                <form action="<?php echo site_url('index.php/ValidationService/register');?>" method="post">
                  <input type="hidden" name="idService" value="<?= $service[0]['id'] ?>">
                  
                          <div class="row">
                                <div class="col-lg-6"> 
                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-2 col-xs-3">Poste : </div>
                                        <input class="col-lg-7 col-xs-7" type="text" name="titre" value="<?= set_value('titre')?>" <?php if (form_error('titre')) echo 'class="error"'; ?>>
                                      </div> <br>
                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-2 col-xs-3">Person : </div>
                                        <input class="col-lg-7 col-xs-7" type="number" name="nbrPers" value="<?= set_value('nbrPers')?>" <?php if (form_error('nbrPers')) echo 'class="error"'; ?>>
                                        <b style="color:red"> <?= form_error('nbrPers')?></b>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-2 col-xs-3">Age : </div>
                                        <input type="number" class="col-lg-3 col-xs-3" min="18" max="40" name="agemin" id="" <?php if (form_error('agemin')) echo 'class="error"'; ?> placeholder="age minimum" value="<?= set_value('agemin')?>">
                                        <div class="col-lg-1 col-xs-1"></div>
                                        <input type="number" class="col-lg-3 col-xs-3" min="30" max="40" name="agemax" id="" <?php if (form_error('agemax')) echo 'class="error"'; ?> placeholder="age maximum" value="<?= set_value('agemax')?>">
                                    </div> <br>
                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-2 col-xs-3">Lieu : </div>
                                        <select class="col-lg-3 col-xs-3" name="lieu" id="" style="height: 25px;">
                                            <?php for ($i=0; $i < count($provinces); $i++) { ?>
                                                <option value="<?php echo $provinces[$i]['id'];?>"> <?php echo $provinces[$i]['nom'];?> </option>
                                            <?php } ?>
                                        </select>
                                        <div class="col-lg-1 col-xs-1"></div>
                                        <input type="number" class="col-lg-3 col-xs-3" min="0"  name="ptProvinces" id="" value="<?= set_value('ptProvinces')?>" <?php if (form_error('ptProvinces')) echo 'class="error"'; ?> placeholder="points"> <b style="color:red"> <?= form_error('ptProvinces')?></b>   
                                    </div><br>
                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-2 col-xs-3">Nation :  </div>
                                        <select class="col-lg-3 col-xs-3" name="nation" id="" style="height: 25px;">
                                            <?php for ($i=0; $i < count($nation); $i++) { ?>
                                                <option value="<?php echo $nation[$i]['id'];?>"> <?php echo $nation[$i]['nom'];?> </option>
                                            <?php } ?>
                                        </select>
                                        <div class="col-lg-1 col-xs-1"></div>
                                        <input type="number" class="col-lg-3 col-xs-3" min="0"  name="ptNation" id="" value="<?= set_value('ptNation')?>" <?php if (form_error('ptNation')) echo 'class="error"'; ?> placeholder="points"> <b style="color:red"> <?= form_error('ptNation')?></b>   
                                    </div><br>
                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-2 col-xs-3">Situation  </div>
                                        <select class="col-lg-7 col-xs-7" name="situation" id="" style="height: 25px;">
                                            <?php for ($i=0; $i < count($situation); $i++) { ?>
                                                <option value="<?php echo $situation[$i]['nom'];?>"> <?php echo $situation[$i]['nom'];?> </option>
                                            <?php } ?>
                                        </select>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-2 col-xs-3">Genre :   </div>
                                        <select class="col-lg-7 col-xs-7" name="genre" id="" style="height: 25px;">
                                            <option value="Homme">Homme</option>
                                            <option value="Homme">Femme</option>
                                        </select>
                                    </div><br>
                                </div>
                                
                                <div class="col-lg-6"> 
                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-2 col-xs-3">Diplome  </div>
                                        <div class="col-lg-1"></div>
                                        <select class="col-lg-6 col-xs-6" name="diplome" id="" style="height: 25px;">
                                            <?php for ($i=0; $i < count($diplome); $i++) { ?>
                                                <option value="<?php echo $diplome[$i]['id'];?>"> <?php echo $diplome[$i]['nom'];?> </option>
                                            <?php } ?>
                                        </select>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-2 col-xs-3">Experience  </div>
                                        <div class="col-lg-1"></div>
                                        <select class="col-lg-6 col-xs-6" name="experience" id="" style="height: 25px;">
                                            <?php for ($i=0; $i < count($experience); $i++) { ?>
                                                <option value="<?php echo $experience[$i]['id'];?>"> <?php echo $experience[$i]['nom'];?> </option>
                                            <?php } ?>
                                        </select>
                                    </div><br>
                                    
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4"></div>
                              <input type="submit"  class="col-lg-4 buttonValider" value="Valider service">
                              <div class="col-lg-4"></div>
                            </div>
                        </form>
                    </div>
              
        </div>
    </div>
              
<script src="<?= base_url("asset/js/jsPerso/ajouterInput.js") ?>"></script>
