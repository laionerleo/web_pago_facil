<!doctype html>
<html lang="en">
<?php $this->load->view('theme/head'); ?>

<body  class="">

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<!-- BEGIN: Sidebar Group -->
<div class="sidebar-group">

    <!-- BEGIN: User Menu -->
  <?php  $this->load->view('theme/menu_lateral_derecho');   ?>
    <!-- END: User Menu -->

    <!-- BEGIN: Settings -->
    <?php  $this->load->view('theme/menu_lateral_configuraciones');   ?>
   
    <!-- END: Settings -->

</div>
<!-- END: Sidebar Group -->

<!-- begin::main -->
<div class="layout-wrapper">

    <!-- begin::header -->
    <?php  $this->load->view('theme/header'); ?>
    <!-- end::header -->

    <div class="content-wrapper">

        <!-- begin::navigation -->
        <?php $this->load->view('theme/menu_lateral_izquierdo');   ?>
        <!-- end::navigation -->
        <input type="hidden" id="url"  value="<?= $url ?>">
        <div class="content-body" id="vista_general"  >
        

        <div class="content" >
        <div class="page-header justify-content-between">
  
        </div>
          
        <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-body text-center m-t-10-minus">
                            <div class="card-body">
                                <div class="row">
                                <div style="height: 280px ; width: 100%"  >
                                    <div id="map"  style="height: 100%;width: 100%"></div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-2">
                                            <div class="col-12 text-muted"><H1> <?=  $Descripcion;  ?> </H1> </div>
                                            
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">Direccion:</div>
                                            <div class="col-6"> <?= @$direccionempresa;  ?> </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">Telefono:</div>
                                            <div class="col-6"> <?= @$telefonoempresa;  ?> </div>
                                        </div>
                                        
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">  Direccion Web :</div>
                                            <div class="col-6"><?= @$direccionwebempresa;  ?></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">Direccion de  Facebook:</div>
                                            <div class="col-6"><?= @$direccionfacebook;  ?></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">Direccion de Twitter:</div>
                                            <div class="col-6"><?= @$direcciontwitter;  ?></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">Direccion de Youtube:</div>
                                            <div class="col-6"><?= @$direccionyoutube;  ?></div>
                                        </div>
                                    </div>
                
                                </div>  
                            </div>
                           
                        </div>
                    </div>
                </div>
                </div>
        </div>

          <!-- begin::footer -->
       
          <!-- end::footer -->

    </div>

    </div>

</div>
<!-- end::main -->
<?php $this->load->view('theme/js');  ?>
<!-- Plugin scripts -->
<script>
    var map, infoWindow;
    
    var marker;
    var mensaje="";

    var latitude=  <?= floatval(@$latitude );   ?>;
        var longitude=<?= floatval(@$longitude);   ?>;
    function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: latitude, lng: longitude},           
      zoom: 12
    }
    
    
    );
     

        var myLatLng = new google.maps.LatLng(latitude,longitude);
            marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            animation: google.maps.Animation.DROP,
            clickeable:true,

            });   
        infoWindow = new google.maps.InfoWindow;
																	
      

  }
  
</script>
                                         


</body>


</html>
