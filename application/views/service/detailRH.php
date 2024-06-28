
<style>
.corpsservice{
	width:90%;
	background-color: #ffeaea;
	}
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
   
    .gauche{
        background-color:#00B074;
    }
    .droite{
        background-color:white;
    }
    h6 {
      color:white;
    }
    h6 a{
      color:white;
    }
    .etat{
      background-color: green; 
      color: #c5c38e;
      font-size: x-large;
    }
    .detail b{
    font-size: 16px;
      font-family: 'Times New Roman', Times, serif;
     color: green;
    }
    .choix div{
        font-size: 17px;
    }
    .valider{
      background-color: blue;
    }
    
    .valider{
      background-color: blue;
      color: white;
      margin-left: 3%;
      
    }
    .attente{
      background-image: linear-gradient(45deg,red,blue);
      color: white;
      
    }
    .refuse{
      background-color: red;
      color: white;
    }
</style>  
    <div class="row tete">
		   <h4>Service : <?= $service[0]['services'] ?></h4>
    <?php $idService=$service[0]['id'] ?>

	</div>
    <div class="corpsservice">
		<div class="row corps">
	      <div class="col-lg-2 gauche"> <br>
			    <h6 class="text-center">Profil</h6>
		    	<h6 class="text-center" style="color:green"> <a href="<?= base_url("index.php/BackOffice/listeAllBesoin_RH?etat=non lue&idservice=$idService") ?>"> Liste Demande </a></h6>
          <h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition_RH?etat=valider&idservice=$idService") ?>"> Valider  </a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition_RH?etat=refuser&idservice=$idService") ?>"> Refusé </a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition_RH?etat=attente&idservice=$idService") ?>"> Liste d'attente </a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition_RH?etat=attente&idservice=$idService") ?>"> Liste passer QCM </a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition_RH?etat=attente&idservice=$idService") ?>">Demande contract</a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/demandeConge_RH?etat=attente&idservice=$idService") ?>">Demande congé</a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/Employer/allEmployer?idservice=$idService") ?>">Payement</a></h6>


			    <h6 class="text-center"><a href="<?= base_url("index.php/BackOffice/deconnexionService") ?>"> Deconnexion </a></h6>
		    </div>
		    <div class="col-lg-10 droite">		    
        <div class="row titre">
				    <h2 class="text-center">Tout les besoins envoyer</h2> 
            <?php $serviceId=$service[0]['id'];?>

        </div>
			  <div class="row"> 
           <?php for($i=0;$i<count($allBesoin); $i++) {?>
				  <div class="col-lg-3 col-xs-12 detail" style="width:30%; background-color: white; cursor: pointer; justify-content: space-between;  margin-left:20px;margin-top:1%">
              <?php $idbesoin=$allBesoin[$i]['id'];?>
              <p><b> Poste : </b> <?= $allBesoin[$i]['poste'] ?> </p>
              <p><b> NbPers : </b> <?= $allBesoin[$i]['pers'] ?> </p>
              <p><b> Diplome : </b> <?= $allBesoin[$i]['diplome'] ?> </p>
              <p><b> Experience : </b> <?= $allBesoin[$i]['experience'] ?> </p>
					    <p><b> Age : </b> <?= $allBesoin[$i]['agemin'] ?>-<?= $allBesoin[$i]['agemax'] ?> </p>
              <p><b> Situation : </b> <?= $allBesoin[$i]['sexe'] ?> <?= $allBesoin[$i]['situation'] ?> </p>
              <p><b> Nationalite : </b> <?= $allBesoin[$i]['nationalite'] ?> </p>
              <div class="row choix">
                <div class="valider text-center col-lg-3"><a href="<?= base_url("index.php/RH/ValidationService?etat=valider&idservice=$serviceId&idbesoin=$idbesoin") ?>"> Valider </a> </div>
                <div class="col-lg-1"></div>
                <div class="attente text-center col-lg-3"><a href="<?= base_url("index.php/RH/ValidationService?etat=attente&idservice=$serviceId&idbesoin=$idbesoin") ?>"> Attente </a> </div>
                <div class="col-lg-1"></div>
                <div class="refuse text-center col-lg-3"><a href="<?= base_url("index.php/RH/ValidationService?etat=refuser&idservice=$serviceId&idbesoin=$idbesoin") ?>"> Refuser </a> </div>
              </div>
  				</div>
				  <?php } ?>
			  </div>
		</div>
	   </div>
     </div>

     <script>
          const etat=document.getElementById("etat");
          if(etat.textContent=="Non lue"){
            etat.style.cssText="color: red";
          }
     </script>
