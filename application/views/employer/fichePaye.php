
<style>
#payer{
background-color: #00ff1c;
width: 250px;
height: 30px;
margin-left: 40%;
color: green;
}
#net{
color: white;
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

.haut b{   
	font-size: 16px;
    font-family: 'Times New Roman', Times, serif;
    color: green;
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
                <h3 class="text-center">Fiche Paie </h3>   <br>
                <div class="row haut">
                    <div class="col-lg-8">
                        <p><b> Nom : </b> Anarana </p>
                        <p><b>Prenom : </b> Fanampiny </p>
                        <p><b>Fonction : </b> Asa </p>
                        <p><b>Num CNaPS</b> Pers012 </p>
                        <p><b>Date d'embouche</b> 00-00-0000</p>
                        <p><b>Ancienneté : </b> 00 Ans</p>
                    </div>
                    <div class="col-lg-4">
                        <p><b>Classification : </b> HC </p>
                        <p><b>Salaire de base : </b> 40000000 </p>
                        <p><b>Taux journaliers :  </b> 12000 </p>
                        <p><b>Taux horaire : </b> 2300 </p>
                    </div>
                </div>
                <div class="row tableau">
                    <table class="table table-bordered">
                        <th>Designations</th>
                        <th>Nombre</th>
                        <th>Taux</th>
                        <th>Montant</th>
                        <tr>
                            <td>Salaire du 00-00-0000</td>
                            <td>1 mois</td>
                            <td>0000 par jour </td>
                            <td>Karama 000 Ar</td>
                        </tr>
                        <tr>
                            <td>Absences débuctibles</td>
                            <td>2</td>
                            <td>2 000 Ar </td>
                            <td>- 4 000 Ar</td>
                        </tr>
                        <tr>
                            <td>Prime ancienneté</td>
                            <td></td>
                            <td>30 000 Ar</td>
                            <td>30 000 Ar</td>
                        </tr>
                        <tr>
                            <td>Heure supplémentaires</td>
                            <td>3</td>
                            <td>4 000 Ar</td>
                            <td>12 000 Ar</td>
                        </tr>
                        <tr>
                            <td>Droits de congé</td>
                            <td></td>
                            <td>45 000 Ar</td>
                            <td>45 000 Ar</td>
                        </tr>
                        <tr >
                            <td></td>
                            <td></td>
                            <td><b>Salaire Brut : </b></td>
                            <td><b>3 234 000 Ar</b></td>
                        </tr>
                    </table>
                    <br>
                    <table class="table table-bordered">
                        <tr>
                            <td>Retenue CNaPS</td>
                            <td>2%</td>
                            <td>5 000 Ar</td>
                        </tr>
                        <tr>
                            <td>Retenue sanitaire</td>
                            <td>5%</td>
                            <td>12 000 Ar</td>
                        </tr>
                        <tr>
                            <td>Trache IRSA</td>
                            <td>10%</td>
                            <td>100000 Ar</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>Total retenue</b></td>
                            <td><b>23 000Ar</b></td>
                        </tr>   
                    </table>
                    <div id="payer"> <b id="net">Net a payer : </b> 1 000 000 Ar </div>
                </div>
		    </div>
	   </div>
     </div>









