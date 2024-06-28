
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
		    	<h6 class="text-center" style="color:green"> <a href="<?= base_url("index.php/BackOffice/listeBesoinCondition_RH?etat=non lue&idservice=$idService") ?>"> Liste Demande </a></h6>
          <h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition_RH?etat=valider&idservice=$idService") ?>"> Valider  </a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition_RH?etat=refuser&idservice=$idService") ?>"> Refusé </a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition_RH?etat=attente&idservice=$idService") ?>"> Liste d'attente </a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition_RH?etat=attente&idservice=$idService") ?>"> Liste passer QCM </a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition_RH?etat=attente&idservice=$idService") ?>">Demande contract</a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/listeBesoinCondition_RH?etat=attente&idservice=$idService") ?>">Demande congé</a></h6>
		    	<h6 class="text-center" ><a href="<?= base_url("index.php/BackOffice/Payement?idservice=$idService") ?>">Payement</a></h6>

			    <h6 class="text-center"><a href="<?= base_url("index.php/BackOffice/deconnexionService") ?>"> Deconnexion </a></h6>
		    </div>
		    <div class="col-lg-10 droite">		    
                <div class="row titre">
				    <h2 class="text-center">Demande conge</h2> 
                    <?php $serviceId=$service[0]['id'];?>
                    <table class="table table-bordered">
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Date embouche</th>
                        <th>Debut</th>
                        <th>Fin</th>
                        <th>Option</th>
                        <?php for ($i=0; $i < count($conge); $i++) {   ?>
                          <tr>
                              <td><?= $conge[$i]['nom'] ?></td>
                              <td><?= $conge[$i]['prenom'] ?></td>
                              <td><?= $conge[$i]['dateEmbouche'] ?></td>
                              <td><?= $conge[$i]['dateDebut'] ?></td>
                              <td><?= $conge[$i]['dateFin'] ?></td>
                              <?php $idConge= $conge[$i]['id'];  ?>
                              <td><a href="<?= base_url("index.php/BackOffice/changeDemande_Valider?idConge=$idConge") ?>">Valider</a> <a href="<?= base_url("index.php/BackOffice/changeDemande_Refuser?idConge=$idConge") ?>">refuser</a></td>
                          </tr>
                      
                      <?php }  ?>
                    </table>
                </div>
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
