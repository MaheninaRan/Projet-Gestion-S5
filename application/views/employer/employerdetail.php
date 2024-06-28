
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

    b{
    
	font-size: 16px;

    font-family: 'Times New Roman', Times, serif;
 
   color: green;

  }
    
</style>
    <div class="row tete">
		</div>
    <div class="corpsservice">
		<div class="row corps">
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
		    <div class="col-lg-10 droite">		
                <h3 class="text-center">Option employer</h3>   <br>
                <h5> <?= $employer[0]['nom'] ?> <?= $employer[0]['prenom'] ?></h5> <br>
                <p><b> Poste : </b> <?= $employer[0]['poste'] ?> </p>
                <p><b> Age : </b><?= $employer[0]['naissance'] ?></p>
                <p><b> Sexe : </b><?= $employer[0]['sexe'] ?></p>
                <p><b> Province : </b> <?= $employer[0]['province'] ?> </p>
                <p><b> Nationalite : </b> <?= $employer[0]['nation'] ?></p>
                <p><b> Date embouche : </b><?= $employer[0]['dateEmbouche'] ?> </p>  
                <?php $idEmp= $employer[0]['id']; ?>
                <br>
                <div class="row" style="margin-left:5%">
                    <div class="col-lg-3"><a href="<?= base_url("index.php/Employer/heureSupplementaire?idEmp=$idEmp") ?>"><button type="button">Heure suplplementaire</button></a></div>
                    <div class="col-lg-3" onclick="misokatraChoix()"><button type="button">Absent(e)</button></a></div>
                    <div class="col-lg-3"><a href="<?= base_url("index.php/Employer/demandeConge?idEmp=$idEmp") ?>"><button type="button">Congé</button></a></div>
                   
                </div> <br>
                <div id="popup" class="popup">
                  <div class="popup-content">
                    <div class="row login">
                      <div class="col-lg-12">
                        <h4>Voulez vous mettre cette personne absent aujourd'hui</h4>
                      </div>
                    </div> <br>
                    <div class="row close" id="close" onclick="manidy()">
                    <div class="col-lg-3"></div>
                    <button class="col-lg-6" style="margin-left:-2%">NON</button></div>
                    <form action="<?= base_url("index.php/Employer/InsertAbsence") ?>" method="post">
                          <input type="hidden" name="idEmp" id="idCv"  value="<?= $employer[0]['id'] ?>">
                          <div class="row valide">
                              <input  type="submit" value="OUI">
                          </div>
                      </form>
                    </div>
                </div>
                <script>
                    function misokatraChoix() {
                        var popup = document.getElementById("popup");
                        var idCvBoite= document.getElementById("dataIdcv");
                        popup.style.display = "flex";
                    }
                    function manidy() {
                         var popup = document.getElementById("popup");
                         popup.style.display="none";
                    }
                    
                </script>
                <div class="row">
                    <h3 class="text-center">Heure suplplementaire</h3>
                    <table style="width:70%;  margin:auto" class="table table-bordered">
                        <th>Date</th>
                        <th>Debut</th>
                        <th>Heure</th>
                        <?php for ($i=0; $i < count($heure); $i++) { ?>
                          <tr>
                              <td><?= $heure[$i]['dates'] ?></td>
                              <td><?= $heure[$i]['heureDebut'] ?></td>
                              <td><?= $heure[$i]['heure'] ?></td>
                          </tr>
                        <?php }?>
                    </table>
                </div> <br>
                <div class="row">
                    <h3 class="text-center">Absence</h3>
                    <table style="width:70%;  margin:auto" class="table table-bordered">
                        <th>Date</th>
                        <th>Heure Pointage</th>
                        <tr>
                            <td>Date</td>
                            <td>Date</td>
                        </tr>
                    </table>
                </div> <br>

                <div class="row">
                    <h3 class="text-center">Conge</h3>
                    <table style="width:70%;  margin:auto" class="table table-bordered">
                        <th>Date debut</th>
                        <th>Date Fin</th>
                        <th>Type</th>
                        <th>Etat</th>
                        <?php for ($i=0; $i < count($conge); $i++) { ?>
                          <tr>
                              <td><?= $conge[$i]['dateDebut'] ?></td>
                              <td><?= $conge[$i]['dateFin'] ?></td>
                              <td><?= $conge[$i]['typeConge'] ?></td>
                              <td><?= $conge[$i]['etat'] ?></td>
                          </tr>
                        <?php } ?>
                    </table>
                </div> <br>
		    </div>
	   </div>
     </div>








