
<style>
  
  .popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: none;
    justify-content: center;
    align-items: center;
  }
  
  .popup-content {
    background-color: #fff;
    padding: 20px;
  }
  .valide input{
    width: 50%;
    margin: auto;
    margin-top: 5%;
    margin-left: 22%;
  }
  .close{
    cursor: pointer;
    background-color: red;
    color: white;
  }
  #password{
    margin: auto;
    border-radius: 5px 5px 5px 5px;
  }
  .login{
    background-color: green;
  }
  .login div{
    color: white;
  }

  .button {
    background-color: rgb(101, 188, 101);
    width: 200px;
    height: 50px;
    margin-top: 10px;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    bottom: 2;
  }
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
        background-color:#00B074;
    }
    .droite{
        background-color:white;
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
    h6 {
      color:white;
    }
    h6 a{
      color:white;
    }
    
</style>
    <div class="row tete">
		   <h4>Service : <?= $service[0]['services'] ?></h4>
		</div>
    <?php $idService=$service[0]['id'] ?>
    <div class="corpsservice">
		<div class="col-lg-2 gauche"> <br>
			    <h6 class="text-center">Profil</h6>
			    <h6 class="text-center">Employer</h6>
		    	<h6 class="text-center" style="color:green" ><a href="<?= base_url("index.php/BackOffice/listeAllBesoin_RH?idservice=$idService") ?>"> Liste Besoin </a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition_RH?etat=valider&idservice=$idService") ?>"> Besoin Validé </a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition_RH?etat=refuser&idservice=$idService") ?>"> Besoin Refusé </a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition_RH?etat=attente&idservice=$idService") ?>"> Besoin En attente </a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition_RH?etat=non lue&idservice=$idService") ?>"> Non lue </a></h6>
                <h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/demandeContract?etat=attente&idservice=$idService") ?>">Demande contract</a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/Payement?idservice=$idService") ?>">Payement</a></h6>
			    <h6 class="text-center">Contract</h6>
			    <h6 class="text-center"><a href="<?= base_url("index.php/BackOffice/deconnexionService") ?>"> Deconnexion </a></h6>
		    </div>
		    <div class="col-lg-10 droite">		    
        <div class="row titre">
				    <h2 class="text-center">Tout les besoins envoyer</h2> 
            <?php $serviceId=$service[0]['id'];?>
            <a href="<?= base_url("index.php/Backoffice/BesoinService?idService=$serviceId") ?>"><Button>Ajouter</Button></a>
        </div>
			  <div class="row"> 
           <?php for($i=0;$i<count($allBesoin); $i++) {?>
				  <div class="col-lg-3 col-xs-12 detail" style="width:30%; background-color: white; cursor: pointer; justify-content: space-between;  margin-left:20px;margin-top:1%">
              <p><b> Poste : </b> <?= $allBesoin[$i]['poste'] ?> </p>
              <p><b> NbPers : </b> <?= $allBesoin[$i]['pers'] ?> </p>
              <p><b> Diplome : </b> Info </p>
              <p><b> Experience : </b> Info </p>
			 <p><b> Age : </b> <?= $allBesoin[$i]['agemin'] ?>-<?= $allBesoin[$i]['agemax'] ?> </p>
              <p><b> Situation : </b> <?= $allBesoin[$i]['sexe'] ?> <?= $allBesoin[$i]['situation'] ?> </p>
              <p><b> Nationalite : </b> <?= $allBesoin[$i]['nationalite'] ?> </p>
                <div class="etat text-center" data-type-etat="<?= $allBesoin[$i]['etat'] ?>"> <?= $allBesoin[$i]['etat'] ?> </div>
  				</div>
				  <?php } ?>
			  </div>
		</div>
	   </div>
     </div>

     <script>
        var etats = document.querySelectorAll(".etat");
        etats.forEach(function(etat) {
        var typeEtat = etat.getAttribute("data-type-etat");
        if (typeEtat === "Non lue") {
            etat.style.backgroundColor = "#c18351";
          }
        if (typeEtat === "valider") {
            etat.style.backgroundColor = "blue";
        }
        if (typeEtat === "refuser") {
            etat.style.backgroundColor = "red";
        }
        if (typeEtat === "attente"){
            etat.style.backgroundImage = "linear-gradient(45deg,#ff3c3c, #969fff)";
        }
          etat.style.color = "white";
    });
     </script>
