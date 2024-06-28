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
    .error {
        border-color: red; 
        background-color: #ffeaea;
    }
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
</style>
        <div class="product-status mg-b-30" >
            <div class="container-fluid">
              <div class="row tete">
                <div class="col-lg-4"></div>
                 <div class="col-lg-4"><h4>Ajouter service</h4></div>
                 <div class="col-lg-3"></div>
                 <div class="col-lg-1"> <a href="<?php echo base_url("index.php/Welcome/index") ?>"><i class="fas fa-angle-double-left "></i></a> </div>
              </div>
                <div class="row" >
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <div class="product-status-wrap" id="boiteService">
                        <form action="<?php echo site_url('index.php/ValidationService/ajoutService');?>" method="post">
                         
                            <div class="row">
                                <div class="col-lg-6"> 
                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-2 col-xs-3">Service : </div>
                                        <input class="col-lg-7 col-xs-7" type="text" name="nomService" value="<?= set_value('nomService')?>" <?php if (form_error('nomService')) echo 'class="error"'; ?>>
                                    </div> <br>
                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-2 col-xs-3">Responsable : </div>
                                        <input class="col-lg-7 col-xs-7" type="text" name="responsable" value="<?= set_value('responsable')?>" <?php if (form_error('responsable')) echo 'class="error"'; ?>>
                                    </div> <br>
                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-2 col-xs-3">Password : </div>
                                        <input class="col-lg-7 col-xs-7" type="password" name="motdepasse" value="<?= set_value('motdepasse')?>" <?php if (form_error('motdepasse')) echo 'class="error"'; ?>>
                                        <b style="color:red"> <?= form_error('motdepasse')?></b>
                                    </div> <br>
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
            </div>
        </div>
        
    </div>

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
    <script src="<?php echo site_url("asset/js/jsPerso/ajouterInput.js"); ?>"></script>
</body>

</html>

