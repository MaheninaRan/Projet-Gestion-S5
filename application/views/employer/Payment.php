
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
.ajouter a{
  background-color: #00B074;
  margin-top: 1%;
}
#icona{
  background-color: white;
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
                <h3 class="text-center">Tous les employer</h3>   <br>
                    <table class="table table-bordered">
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Age</th>
                        <th>Sexe</th>
                        <th>Situation</th>
                        <th>Nationalite</th>
                        <th>Date embouche </th>
                        <th>Option </th>
                        <?php for ($i=0; $i < count($employer); $i++) { ?>
                            <tr>
                                <td><?= $employer[$i]['nom'] ?></td>
                                <td><?= $employer[$i]['prenom'] ?></td>
                                <td><?= $employer[$i]['naissance'] ?></td>
                                <td><?= $employer[$i]['sexe'] ?></td>
                                <td><?= $employer[$i]['situation'] ?></td>
                                <td><?= $employer[$i]['nation'] ?></td>
                                <td><?= $employer[$i]['dateEmbouche'] ?></td>
                                <?php $idEmp= $employer[$i]['id'] ?>
                                <td><a href="<?= base_url("index.php/Employer/FichePaye?idEmployer=$idEmp") ?>"><i><b>Plus</b></i></a> </td>
                            </tr>
                        <?php } ?>
                    </table>

		    </div>
	   </div>
     </div>








