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
  
  

 .container b{
    
	font-size: 16px;

    font-family: 'Times New Roman', Times, serif;
 
   color: green;

  }
  
.container h5{
    
	font-size: 20px;

       font-family: 'Times New Roman', Times, serif;
   
	 text-align: center;

  }

  .titre{
  
  background-color: #00B074;
    height: 70px;
 
 }
 
.titre h2{
    color: white;
  }

</style>


<div class="row titre">
  
<div class="col-lg-2"></div>
 
<h2 class="text-center">Resultat cv valider</h2> 

</div>


<div class="row block-content" id="bloc">

<?php for ($i=0; $i < count($cv); $i++){ ?>
  <?php if ($cv[$i]['etat']!="qcm") {
    
   ?>
<div class="col-lg-3 block" id="dataIdcv" data-idCv="<?= $i ?>" style="background-color: white; cursor: pointer; justify-content: space-between;  margin-top:30px;  display: inline-flex; flex-wrap: wrap;">
    <div class="container">    
  	    <h5> <?= $cv[$i]['nom'] ?>-<?= $cv[$i]['prenom'] ?></h5> <br>
        <p><b> Etat : </b> <?= $cv[$i]['etat'] ?> </p>

        <p><b> Societe : </b> <?= $cv[$i]['societe'] ?> </p>
        <p><b> Poste : </b> <?= $cv[$i]['poste'] ?> </p>
     	  <p><b> Naissance : </b> <?= $cv[$i]['naissance'] ?></p>
        <p><b> Lieu : </b> <?= $cv[$i]['province'] ?></p>
        <p><b> Genre : </b> <?= $cv[$i]['sexe'] ?> - <?= $cv[$i]['situation'] ?></p>
        <p><b> Diplome : </b><?= $cv[$i]['diplome'] ?> </p>  
     	  <p><b> Experience : </b> <?= $cv[$i]['experience'] ?></p>
 
        <div class="row" style="background-color: green; color:white; ">
            <p class="text-center" onclick="misokatra(<?= $cv[$i]['id'] ?>)" style="font-size:20px; margin-top:3%">Passer le QCM</p>
        </div>
    </div>
</div>
<?php } ?>



<div class="col-lg-1"></div> 
<?php }?>

<div id="popup" class="popup">
  
    <div class="popup-content">

    <div class="row login">
    
    <div class="col-lg-3" id="anarana">Connexion</div>

    <div class="col-lg-7"></div>

    <div class="col-lg-2 close" id="close" onclick="manidy()">X</div>

    </div> <br>
 <form action="" method="post">
 
    <input type="password" id="password" placeholder="password" name="password"> <br>
   
    <input type="hidden" name="idCv" id="idCv">

    <div class="row valide">
 
	<input type="submit" value="connecter">
</div>

	</form>
  </div>
</div>

  
</div> <br>


<script>
 function misokatra(data) {
    var popup = document.getElementById("popup");
    var idCvBoite= document.getElementById("dataIdcv");
    var idCv = idCvBoite.getAttribute("data-idCv");
    var anarana = document.getElementById("anarana");
    var form = popup.querySelector("form");
    form.action = "<?= base_url("index.php/FrontOffice/qcmExam") ?>";
  
    var inputHidden = document.getElementById("idCv");
    inputHidden.value = data;
    popup.style.display = "flex";
}


  function manidy() {
    var popup = document.getElementById("popup");
    popup.style.display="none";
  }

</script>
