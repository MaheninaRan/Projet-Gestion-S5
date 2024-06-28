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
        <div class="product-status mg-b-30" >
            <div class="container-fluid">
              <div class="row tete">
                <div class="col-lg-4"></div>
                 <div class="col-lg-4"><h4>Liste service</h4></div>
                 <div class="col-lg-3"></div>
                 <div class="col-lg-1"> <a href="<?php echo base_url("index.php/Admin/deconnexion") ?>">Deconnexion</a> </div>
              </div>
                <div class="row" >
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <div class="product-status-wrap" id="boiteService">
                           
                            <div class="add-product ajouter">
                                <a href="<?= base_url("index.php/Admin/ajoutService") ?>">Ajouter</a>
                            </div>
                            <table>
                                <tr>
                                    <th><i class="fas fa-list-ul"></i></th>
                                    <th>Id</th>
                                    <th>Service</th>
                                    <th>Responsable</th>
                                    <th>Password</th>
                                </tr>
                                <?php for ($i=0; $i < count($servicedetail); $i++) { ?>
                                <tr>
                                    <td><img src="img/new-product/5-small.jpg" alt="" /></td>
                                    <td><?= $servicedetail[$i]['id']?></td>
                                    <td><?= $servicedetail[$i]['services'] ?></td>
                                    <td><?= $servicedetail[$i]['responsable'] ?></td>
                                    <td><?= $servicedetail[$i]['motdepasse'] ?></td>
                                    <td>
                                      <!-- eto mandefa anle izy any am page modifier izay vao foronina -->
                                        <button onclick="misokatra('edit',<?= $servicedetail[$i]['id'] ?>)" id="icona" data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o"></i></button>
                                        <button onclick="misokatra('delete',<?= $servicedetail[$i]['id'] ?>)" id="icona" data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                <?php } ?>
                    
                            </table>
                            <div class="custom-pagination">
                                <ul class="pagination">
                                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

<div id="popup" class="popup">
  <div class="popup-content">
    <div class="row login">
      <div class="col-lg-3" id="anarana">Connexion</div>
      <div class="col-lg-7"></div>
      <div class="col-lg-2 close" id="close" onclick="manidy()">X</div>
    </div> <br>
    <form action="" method="post">
      <div class="col-lg-2 close" id="close" onclick="manidy()">NON</div>
      <input type="hidden" name="idservice" id="idservice">
      <div class="row valide">
        <input type="submit" value="Oui">
      </div>
    </form>
  </div>
</div>

<script>
 function misokatra(actionType,data) {
    var popup = document.getElementById("popup");
    var anarana = document.getElementById("anarana");
    var form = popup.querySelector("form");
    if (actionType === 'edit') {
        anarana.textContent = "EditerService";
        form.action = "<?= base_url("index.php/Admin/editService") ?>";
    } else if (actionType === 'delete') {
        anarana.textContent = "EffacerService";
        form.action = "<?= base_url("index.php/Admin/deleteService") ?>";
    }
    var inputHidden = document.getElementById("idservice");
    inputHidden.value = data;
    popup.style.display = "flex";
}


  function manidy() {
    var popup = document.getElementById("popup");
    popup.style.display="none";
  }

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
