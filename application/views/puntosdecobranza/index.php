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

        <div class="content-body">

            <div class="content">
                <div class="page-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href=index-2.html>Pago facil Bolivia</a>
                            </li>
                            <input type="hidden" id="url" value="<?= base_url();   ?>"  >
                            <li class="breadcrumb-item active" aria-current="page">Puntos De Cobranza</li>
                        </ol>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div style="height: 600px ; width: 100%"  >
                                    <div id="map"  style="height: 100%;width: 100%"></div>
                                </div>
                                <?php  $ubicaciones_nuevo=json_decode($ubicaciones);    //  print_r($ubicaciones_nuevo);?>
                                <div class="row">
                                    <div class="col-md-3"> 
                                        <select class="form-control unicase-form-control selectpicker" name="tipo" id="slc_tipo">
                                                        <option value="0">Todos</option>
                                                        <option value="PF">Puntos de Cobranza</option>
                                                        <option value="TM"> Empresa</option>
                                                        <option value="MP"> Metodo de pago</option>
                                        </select>
                                    </div>
                                        <div class="col-md-3">
                                            <button  class="btn btn-primary checkout-btn" onclick="mi_ubicacion()" > Mi ubicacion</button>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control" name="ubicacion" id="slc_ubicacion">
                                                <?php 
                                                for ($i=0; $i < count($ubicaciones_nuevo); $i++) { 
                                                ?>
                                                    <option value="<?php echo $ubicaciones_nuevo[$i]->latitud ?>/<?php echo $ubicaciones_nuevo[$i]->longitud ?>"   ><?php echo $ubicaciones_nuevo[$i]->nombreEstablecimiento ?></option>
                                                <?php  } ?>
                                            </select>
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
    <script>

    </script>
<!-- Plugin scripts -->
  
  <?php $this->load->view('theme/js');  ?>
  <script>
          function buscar_detalles(id_proceso){

			var url=$("#url").val()+"es/detalle_de_compra";  
					$('html,body').animate({
						scrollTop: $("#proceso_detalle").offset().top
					}, 2000);
                  $("#waitLoading").fadeIn(1000);
				  
                  $("#proceso_detalle").load(url,{id_proceso:id_proceso});                  
                    
		  }


		  $("#btn_buscar").click(
		function () {
			
			buscar_detalles($('#inp_nro_ticket').val());     
    }); 
    



    var map, infoWindow;
    var ubicaciones= <?php   echo $ubicaciones ; ?>;
    var marker;
    var mensaje="";
  
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -17.78315962290801, lng: -63.180976199658176},           
      zoom: 12
    }
    
    
    );
    

      for (var i = 0; i < ubicaciones.length; i++) {
        var latitude=ubicaciones[i]["latitud"];
        var longitude=ubicaciones[i]["longitud"];

       // console.log(ubicaciones[i]["nombreEstablecimiento"]);

        if(ubicaciones[i]["tipo"]=="PF"  )
        {
          var myLatLng = new google.maps.LatLng(latitude,longitude);
          marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/ic_map_pago_facil.png',
          title: ubicaciones[i]["nombreEstablecimiento"],
          animation: google.maps.Animation.DROP,
          clickeable:true,
          });        
        }
        if(ubicaciones[i]["tipo"]=="TM"  )
        {
          var myLatLng = new google.maps.LatLng(latitude,longitude);
          marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image//pin_empresa.png',
          title: ubicaciones[i]["nombreEstablecimiento"],
          animation: google.maps.Animation.DROP,
          clickeable:true,
          });        
        }
        if(ubicaciones[i]["tipo"]=="MP"  )
        {
          var myLatLng = new google.maps.LatLng(latitude,longitude);
          marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/pin_metodo_pago.png',
          title: ubicaciones[i]["nombreEstablecimiento"],
          animation: google.maps.Animation.DROP,
          clickeable:true,

          });        
        }

      
      infowindow = new google.maps.InfoWindow({ content: '' }); 

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() 
                  {
                    map.setZoom(12);
                  
                    map.setCenter(marker.getPosition());
                    console.log(marker);
                    mensaje=marker.getTitle();
                    console.log(marker.getTitle());
                    infowindow.setContent(mensaje);
                    infowindow.open(map, marker);
                    if (marker.getAnimation() !== null) {
                    marker.setAnimation(null);
                    } else {
                      marker.setAnimation(google.maps.Animation.BOUNCE);
                    }
                  }


            
        })(marker, i));
         
      
        
        
      }
      infoWindow = new google.maps.InfoWindow;
      

  }
  
  function filtro_tipo(tipo)
  {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -17.78315962290801, lng: -63.180976199658176},           
      zoom: 12
    });
    

      for (var i = 0; i < ubicaciones.length; i++) {
        var latitude=ubicaciones[i]["latitud"];
        var longitude=ubicaciones[i]["longitud"];

       // console.log(ubicaciones[i]["nombreEstablecimiento"]);

        if(tipo=="PF"  )
        {
          var myLatLng = new google.maps.LatLng(latitude,longitude);
          marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/ic_map_pago_facil.png',
          title: ubicaciones[i]["nombreEstablecimiento"],
          animation: google.maps.Animation.DROP,
          clickeable:true,
          });        
        }
        if(tipo=="TM"  )
        {
          var myLatLng = new google.maps.LatLng(latitude,longitude);
          marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/pin_empresa.png',
          title: ubicaciones[i]["nombreEstablecimiento"],
          animation: google.maps.Animation.DROP,
          clickeable:true,
          });        
        }
        if(tipo=="MP"  )
        {
          var myLatLng = new google.maps.LatLng(latitude,longitude);
          marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/pin_metodo_pago.png',
          title: ubicaciones[i]["nombreEstablecimiento"],
          animation: google.maps.Animation.DROP,
          clickeable:true,

          });        
        }

      
      infowindow = new google.maps.InfoWindow({ content: '' }); 

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() 
                  {
                    map.setZoom(12);
                  
                    map.setCenter(marker.getPosition());
                    console.log(marker);
                    mensaje=marker.getTitle();
                    console.log(marker.getTitle());
                    infowindow.setContent(mensaje);
                    infowindow.open(map, marker);
                    if (marker.getAnimation() !== null) {
                    marker.setAnimation(null);
                    } else {
                      marker.setAnimation(google.maps.Animation.BOUNCE);
                    }
                  }


            
        })(marker, i));
         
      
        
        
      }
      //infoWindow = new google.maps.InfoWindow;

  }
  function filtro_unico(latitudes){
    // Ejemplo www.php.net
//$p  = "porción1 porción2 porción3 porción4 porción5 porción6";
var porciones = latitudes.split('/');

    console.log(porciones);
  var lati= parseFloat(porciones[0]);
   var long= parseFloat(porciones[1]);
   // console.log(lati);
   map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: lati , lng: long},           
      zoom: 12
    });


    var myLatLng = new google.maps.LatLng(lati,long);
          marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/ic_map_pago_facil.png',
          //title: ubicaciones[i]["nombreEstablecimiento"],
          animation: google.maps.Animation.DROP,
          clickeable:true,
          });
          
  }

  $("#slc_tipo").change(function () {
      var opcion=$("#slc_tipo").val();
      if(opcion=="0")
      {
        initMap();
      }else{
      filtro_tipo(opcion);
      }
    }); 


    $("#slc_ubicacion").change(function () {
      var opcion=$("#slc_ubicacion").val();
      filtro_unico(opcion);
      
    }); 




    function mi_ubicacion()
  {
     infoWindow = new google.maps.InfoWindow;
    
  if(navigator.geolocation){

            navigator.geolocation.getCurrentPosition(function(position){

              var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude

            };
            console.log(pos);
            console.log(position);
            
            //console.log(position);
            
                
                  infoWindow.setPosition(pos);
                  map.setCenter(pos);
                  map.setZoom(19);
                  var myLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                  var marker = new google.maps.Marker({
                  position: myLatLng,
                  icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image//hombre.svg',
                  map: map,
                });
                  

            },handleError,{ enableHighAccuracy: true, timeout: 2000, maximumAge: 3600000 });

            function handleError(error){
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        console.log("User denied the request for Geolocation.");
                        alert("User denied the request for Geolocation.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        console.log("Location information is unavailable.");
                        alert("Location information is unavailable.");
                        break;
                    case error.TIMEOUT:
                    console.log("The request to get user location timed out.");
                    alert("The request to get user location timed out.");
                    
                        break;
                    case error.UNKNOWN_ERROR:
                    console.log("An unknown error occurred.");
                    alert("An unknown error occurred.");
                        break;
                }
            }
            }else{
            // container.innerHTML = "Geolocation is not Supported for this browser/OS.";
            alert("Geolocation is not Supported for this browser/OS");
            }
                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    alert("no entre");
                  
                  
                    infoWindow.setPosition(pos);
                    infoWindow.setContent(browserHasGeolocation ?
                                          'tu localizacion no a sido encontrada' :
                                          'Error: Your browser doesn\'t support geolocation.');
                    infoWindow.open(map);
                  
                  }
              
        
  }


  
            </script>
</body>


</html>
