<style>
.favory{
    color:#00B074;
}
.favory:hover{
    color: green;
    font-size: 20px;
}
</style>
<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <input type="text" class="form-control border-0" placeholder="Keyword" />
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0">
                                    <option selected>Category</option>
                                    <option value="1">Category 1</option>
                                    <option value="2">Category 2</option>
                                    <option value="3">Category 3</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0">
                                    <option selected>Location</option>
                                    <option value="1">Location 1</option>
                                    <option value="2">Location 2</option>
                                    <option value="3">Location 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s"> Liste employe</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <?php 
                                for ($i=0; $i < count($servicedetail); $i++) {  
                                    $idService=$servicedetail[$i]['id'];
                            ?>
                                <div class="job-item p-4 mb-4">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded" src="<?php echo base_url('assets/img/com-logo-1.jpg')?>" alt="" style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4">
                                                <h5 class="mb-3"><?php  echo $servicedetail[$i]['services']; ?> : <?php  echo $servicedetail[$i]['poste']; ?></h5>
                                                <span class="text-truncate me-3"><i style="color:#00B074" class="fas fa-map-marker-alt"></i> <?php  echo $servicedetail[$i]['prov']; ?></span>
                                                <span class="text-truncate me-3"><i style="color:#00B074 !important"  class="fas fa-user-plus"></i> <?php  echo $servicedetail[$i]['pers']; ?> personnes</span>
                                                <span class="text-truncate me-0"><i class="fas fa-calendar-check text-primary me-2"></i><?php  echo $servicedetail[$i]['agemin']; ?> - <?php  echo $servicedetail[$i]['agemax']; ?> ans </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">
                                                <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart favory"></i></a>
                                                <a class="btn btn-primary" href="<?php echo base_url("index.php/FrontOffice/cvClient?idService=$idService")?>">Voir détail et postuler</a>
                                            </div>
                                            <small class="text-truncate"><i class="fas fa-user-graduate text-primary me-2"></i><?= $servicedetail[$i]['diplome'] ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <a class="btn btn-primary py-3 px-5" href="<?php echo base_url('index.php/Welcome/cv')?>">Browse More Jobs</a>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fas fa-angle-double-up"></i></a>
    </div>

