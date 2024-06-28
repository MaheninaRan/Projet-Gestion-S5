
<style>
        .form-container {
            max-width: 400px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-button:hover {
            background-color: #45a049;
        }
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
  
   
    .gauche{
        background-color:#00B074;
    }
    .droite{
        background-color:white;
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
                <h3 class="text-center">Demande conger</h3>   <br>
                <form action="<?php echo base_url('index.php/BackOffice/Insert_demandeConge')?>" method="post">
                    <div class="form-group">
                        <label class="form-label" for="date_debut">Date de début du congé :</label>
                        <input class="form-input" type="date" id="date_debut" name="date_debut" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="date_fin">Date de fin du congé :</label>
                        <input class="form-input" type="date" id="date_fin" name="date_fin" required>
                    </div>
                    <div class="form-group">
                        <input class="form-input" type="hidden" id="idEmp" name="idEmployer" value="<?= $idEmployer ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="type_conge">Type de congé :</label>
                        <select class="form-input" id="type_conge" name="type_conge" required>
                            <option value="conge_paye">Congé payé</option>
                            <option value="conge_maladie">Congé maladie</option>
                            <option value="autre_conge">Autre congé</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="justification">Justification ou motif du congé :</label>
                        <textarea class="form-input" id="justification" name="justification" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="documents">Attachement de documents pertinents :</label>
                        <input class="form-input" type="file" id="documents" name="documents">
                    </div>
                    <button class="form-button" type="submit">Envoyer la demande</button>
                </form>

		    </div>
	   </div>
     </div>








