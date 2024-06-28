<!doctype html>
  <html class="no-js" lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Stellar Admin</title>
      <link rel="stylesheet" href="<?php echo base_url('css/all.min.css') ?>">
      <link rel="stylesheet" href="<?php echo base_url('css/all.css') ?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>" />
      <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" />
      <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>">

      <!-- Bootstrap CSS
      ============================================ -->
      <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/bootstrap.min.css')?>">
      <!-- Bootstrap CSS
      ============================================ -->
      <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/font-awesome.min.css')?>">
    <!-- nalika Icon CSS
      ============================================ -->
      <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/nalika-icon.css')?>">
      <!-- owl.carousel CSS
      ============================================ -->

      <link rel="stylesheet" href="<?php echo base_url('assets/styles/style.css')?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/styles/all.css')?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/styles/font-awesome.min.css')?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/styles/all.min.css')?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/responsive.css')?>">
      <script src="<?php echo base_url('assets/styles/js/vendor/modernizr-2.8.3.min.js')?>"></script>

            </head>

  <body>
<style>
    .tete{
      background-color: #00B074;
      width: 100%;
      margin: auto;
      height: 80px;
    }
    .tete h4{
      color: white;
      text-align: center;
      margin-top: 5%;
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

  form{
      background-color: white;
  }
  .autre, .terminer{
    background-color: green;
    border-radius: 55px 2px 55px 2px;
    width: 20%;
    margin-left: 1%;
    font-style: italic;
    text-align: center;
    color: white;
    border: none; 
  }
  .autre a,.terminer a{
    color: white;
  }
</style>
        <div class="product-status mg-b-30" >
            <div class="container-fluid">
              <div class="row tete">
                <div class="col-lg-4"></div>
                 <div class="col-lg-4"><h4>Formulaire QCM </h4></div>
              </div>
                <div class="row" >
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" >
                    <form  id="qcmForm" action="<?php echo site_url('index.php/ValidationQcm/insertQcm');?>" method="post">
                        <input type="hidden" name="idService" value="<?= $idService ?>">
                        <input type="hidden" name="idBesoin" value="<?= $idbesoinfarany ?>">
                        <div class="row"> <br>
                            <div class="col-lg-2 col-xs-2">Question : </div>
                            <input type="text" class="col-lg-6 col-xs-6"  name="Question" <?php if (form_error('Question')) echo 'class="error"'; ?>> <div class="col-lg-1 col-xs-1"></div>
                            <input type="number" class="col-lg-2 col-xs-2" name="Points"  <?php if (form_error('Points')) echo 'class="error"'; ?> id="">
                            <b style="color:red"> <?= form_error('Question')?></b>
                            <b style="color:red"> <?= form_error('Points')?></b>
                        </div> <br>
                        <div class="row" id="reponse-container">
                            <div class="col-lg-2 col-xs-2">Reponse  </div>
                            <input type="text" class="col-lg-6 col-xs-6" name="Reponse1"> <div class="col-lg-1 col-xs-1"></div>
                            <select name="TypeReponse1" style="height: 25px;" class="col-lg-2 col-xs-2" id="">
                                <option value="1" >Vrai</option>
                                <option value="0">Faux</option>
                            </select>
                        </div> <br>
                        <div class="row">
                            <div class="col-lg-5 col-xs-5"></div>
                            <div class="col-lg-4 col-xs-4"><Button type="button" onclick="ajouterReponse()">Autre reponse</Button></div> 
                        </div>
                        <div class="row">
                              <div class="col-lg-2"></div>
                              <div class="col-lg-3 autre"><a href="#" data-action="<?= base_url("index.php/ValidationQcm/register") ?>" id="autreQuest"> Autre Question </a></div>
                              <div class="col-lg-3"></div> 
                              <div class="col-lg-3 terminer"><a href="#" data-action="<?= base_url("index.php/ValidationQcm/terminer") ?>" id="terminer">Terminer </a></div>
                        </div>
              
                        <script src="<?php echo site_url("asset/js/jsPerso/ajouterInput.js"); ?>"></script>
                    </form>
                    </div>
                </div>
            </div>
        </div>
     
    </div>
    <script>
   document.addEventListener('DOMContentLoaded', function () {
       const autreLink = document.getElementById('autreQuest');
       const terminerLink = document.getElementById('terminer');
       const form = document.getElementById('qcmForm');

       autreLink.addEventListener('click', function (event) {
           form.action = autreLink.getAttribute('data-action');
           form.submit(); 
       });

       terminerLink.addEventListener('click', function (event) {
           form.action = terminerLink.getAttribute('data-action');
           form.submit(); 
       });
   });
</script>


    <!-- jquery
		============================================ -->
    <script src="<?php echo base_url('assets/styles/js/vendor/jquery-1.12.4.min.js')?>"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?php echo base_url('assets/styles/js/bootstrap.min.js')?>"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?php echo base_url('assets/styles/js/wow.min.js')?>"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?php echo base_url('assets/styles/js/jquery-price-slider.js')?>"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?php echo base_url('assets/styles/js/jquery.meanmenu.js')?>"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?php echo base_url('assets/styles/js/owl.carousel.min.js')?>"></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?php echo base_url('assets/styles/js/jquery.sticky.js')?>"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?php echo base_url('assets/styles/js/jquery.scrollUp.min.js')?>"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo base_url('assets/styles/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/scrollbar/mCustomScrollbar-active.js')?>"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?php echo base_url('assets/styles/js/metisMenu/metisMenu.min.js')?>"></script>
    <script src="<?php echo base_url('assets/styles/js/metisMenu/metisMenu-active.js')?>"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="<?php echo base_url('assets/styles/js/sparkline/jquery.sparkline.min.js')?>"></script>
    <script src="<?php echo base_url('assets/styles/js/sparkline/jquery.charts-sparkline.js')?>"></script>
    <!-- calendar JS
		============================================ -->
    <script src="<?php echo base_url('assets/styles/js/calendar/moment.min.js')?>"></script>
    <script src="<?php echo base_url('assets/styles/js/calendar/fullcalendar.min.js')?>"></script>
    <script src="<?php echo base_url('assets/styles/js/calendar/fullcalendar-active.js')?>"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo base_url('assets/styles/js/plugins.js')?>"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo base_url('assets/styles/js/main.js')?>"></script>
</body>

</html>
