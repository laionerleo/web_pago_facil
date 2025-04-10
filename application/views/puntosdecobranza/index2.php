<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PagoFacil Bolivia Puntos</title>
    <meta content="Pagina para poder visualizar nuestros puntos de pago " name="description">

    <meta property="og:image" content="<?php echo base_url(); ?>application/assets/assets/media/image/ic_map_pago_facil.png">
        <meta property="og:image:secure_url" content="<?php echo base_url(); ?>application/assets/assets/media/image/ic_map_pago_facil.png">
        <meta property="og:image" itemprop="image" content="<?php echo base_url(); ?>application/assets/assets/media/image/ic_map_pago_facil.png"> 
        <meta property="og:image:type" content="image/jpg">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>application/assets/assets/media/image/ic_map_pago_facil.png">

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="<?=  base_url() ?>/application/assets/assets/media/image/logo-pagofacil.png"/>  -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>application/assets/assets/media/image/ic_map_pago_facil.png"/>
    

    <!-- Plugin styles -->
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/bundle.css" type="text/css">

        <!-- Slick -->
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick-theme.css" type="text/css">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/datepicker/daterangepicker.css" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/dataTable/datatables.min.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/assets/css/app.min.css" type="text/css">
    
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick-theme.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/prism/prism.css" type="text/css">
</head>
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
    <div class="header d-print-none">

<div class="header-left">
    <div class="navigation-toggler">
        <a href="#" data-action="navigation-toggler">
            <i data-feather="menu"></i>
        </a>
    </div>
    <div class="header-logo">
        <a href="<?= base_url() ?>" >
            <img style="width:200px;height:60px" class="logo" src="<?=  base_url() ?>/application/assets/assets/media/image/logopagofacil.png" alt="logo">
            <img class="logo-light" src="<?=  base_url() ?>/application/assets/assets/media/image/logo-light.png" alt="light logo">
        </a>
    </div>
</div>

<div class="header-body">
    <div class="header-body-left">
        <div class="page-title">
            <h4></h4>
        </div>
    </div>
    <div class="header-body-right">
        <ul class="navbar-nav">

           

            <!-- begin::user menu -->
         
            <!-- end::user menu -->

        </ul>

        <!-- begin::mobile header toggler -->
        <ul class="navbar-nav d-flex align-items-center">
            <li class="nav-item header-toggler">
                <a href="#" class="nav-link">
                    <i data-feather="arrow-down"></i>
                </a>
            </li>
        </ul>
        <!-- end::mobile header toggler -->
    </div>
</div>

</div>
    <!-- end::header -->

    <div class="content-wrapper">

        <!-- begin::navigation -->
   
        <!-- end::navigation -->

        <div class="content-body">

            <div class="content" style="padding-left: 0px;">
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
                                <?php  $ubicaciones_nuevo= json_decode($ubicaciones);     ?>
                                <div class="row">
                                    <div class="col-md-3"> 
                                        <select class="form-control unicase-form-control selectpicker" name="tipo" id="slc_tipo">
                                                        <option value="0">Todos</option>
                                                        <option value="PF">Puntos de Cobranza</option>
                                                        <option value="EM"> Empresa</option>
                                                        <option value="MP"> Metodo de pago</option>
                                        </select>
                                    </div>
                                        <div class="col-md-3">
                                            <button  class="btn btn-primary checkout-btn" onclick="mi_ubicacion()" > Mi ubicacion</button>
                                        </div>
                                        <div class="col-md-3">
                                            <button  class="btn btn-primary checkout-btn" onclick="clip()" >Calcular</button>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control" name="ubicacion" id="slc_ubicacion">
                                                <?php 
                                                for ($i=0; $i < count($ubicaciones_nuevo); $i++) { 
                                                ?>
                                                    <option value="<?php echo $ubicaciones_nuevo[$i]->latitud ?>/<?php echo $ubicaciones_nuevo[$i]->longitud ?>/<?php echo $ubicaciones_nuevo[$i]->tipo ?>"   ><?php echo $ubicaciones_nuevo[$i]->nombreEstablecimiento ?></option>
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
  
  <?php $this->load->view('theme/js2');  ?>
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
    //console.log(ubicaciones);
    var marker;
    var mensaje="";
    var swPuntoReferencia=0;
  function initMap() {
    console.log("ingreso a inimap");
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -17.78315962290801, lng: -63.180976199658176},           
      zoom: 13
    }
    
    
    );
    

      for (var i = 0; i < ubicaciones.length; i++) {
        console.log(ubicaciones[i]);
        var latitude=ubicaciones[i]["latitud"];
        var longitude=ubicaciones[i]["longitud"];
     

        console.log(ubicaciones[i]["nombreEstablecimiento"]);

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
        if(ubicaciones[i]["tipo"]=="EM"  )
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
    

        if(ubicaciones[i]["tipo"]=="REF"  )
        {
         // alert("alskjdalkj");
          swPuntoReferencia=1;
          var myLatLng = new google.maps.LatLng(latitude,longitude);
          marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
        //  icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/pin_metodo_pago.png',
          title: ubicaciones[i]["nombreEstablecimiento"],
          animation: google.maps.Animation.DROP,
         // clickeable:true,

          });  
          
          map.setCenter(marker.getPosition());
          map.setZoom(15);

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
    
    var cadenainsertarselect=``;
      for (var i = 0; i < ubicaciones.length; i++) {
        var latitude=ubicaciones[i]["latitud"];
        var longitude=ubicaciones[i]["longitud"];
        $("#slc_ubicacion").empty();
       
        console.log(ubicaciones[i]);

        if(tipo==ubicaciones[i]["tipo"]   &&  tipo=="PF" )
        {
           // console.log(ubicaciones[i].tipo);
            console.log("pf");
          var myLatLng = new google.maps.LatLng(latitude,longitude);
          marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/ic_map_pago_facil.png',
          title: ubicaciones[i]["nombreEstablecimiento"],
          animation: google.maps.Animation.DROP,
          clickeable:true,
          });        
          
          var lclatitude=ubicaciones[i]['latitud'];
          var lclongitude=ubicaciones[i]["longitud"];
          var lcnombre=ubicaciones[i]["nombreEstablecimiento"];

          cadenainsertarselect=cadenainsertarselect+ "<option value='"+lclatitude+"/"+lclongitude+ "/PF'    >   "+lcnombre+" </option> " ;
          console.log(cadenainsertarselect);        
        }
        if(tipo==ubicaciones[i]["tipo"]  &&  tipo=="EM" )
        {
           
            //console.log(ubicaciones[i]);
          var myLatLng = new google.maps.LatLng(latitude,longitude);
          marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/pin_empresa.png',
          title: ubicaciones[i]["nombreEstablecimiento"],
          animation: google.maps.Animation.DROP,
          clickeable:true,
          });        
          cadenainsertarselect=cadenainsertarselect+ `<option value="`+ubicaciones[i]["latitud"]+` /`+ubicaciones[i]["longitud"]+`/`+ubicaciones[i]["tipo"]+`"   > `+ ubicaciones[i]["tipo"]+`  </option>`;
        }
        if(tipo==ubicaciones[i]["tipo"] &&  tipo=="MP" )
        {
            //console.log(ubicaciones[i]);
            console.log("mp");
          var myLatLng = new google.maps.LatLng(latitude,longitude);
          marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/pin_metodo_pago.png',
          title: ubicaciones[i]["nombreEstablecimiento"],
          animation: google.maps.Animation.DROP,
          clickeable:true,

          });        
          cadenainsertarselect=cadenainsertarselect+ `<option value="`+ubicaciones[i]["latitud"]+` /`+ubicaciones[i]["longitud"]+`/`+ubicaciones[i]["tipo"]+`"   > `+ ubicaciones[i]["tipo"]+`  </option>`;
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
      $("#slc_ubicacion").append(cadenainsertarselect);
      //infoWindow = new google.maps.InfoWindow;

  }
  function filtro_unico(latitudes){
    // Ejemplo www.php.net
//$p  = "porción1 porción2 porción3 porción4 porción5 porción6";
var porciones = latitudes.split('/');

    console.log(porciones);
var lati= parseFloat(porciones[0]);
var long= parseFloat(porciones[1]);
var icono =porciones[2];
   // console.log(lati);
   map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: lati , lng: long},           
      zoom: 12
    });
    var pin="";

    if(icono=="PF"  )
    {
        pin=  '<?php echo base_url(); ?>'+'application/assets/assets/media/image/ic_map_pago_facil.png';

    }
    if(icono=="EM"  )
    {
        pin= '<?php echo base_url(); ?>'+'application/assets/assets/media/image/pin_empresa.png';

    }
    if(icono=="MP"  )
    {
        pin= '<?php echo base_url(); ?>'+'application/assets/assets/media/image/pin_metodo_pago.png';

    }


    var myLatLng = new google.maps.LatLng(lati,long);
          marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: pin,
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
            map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: -17.78315962290801, lng: -63.180976199658176},           
              zoom: 12
            });
            for (var i = 0; i < ubicaciones.length; i++) {
            
                var cadenainsertarselect=``;
                var latitude=ubicaciones[i]["latitud"];
                var longitude=ubicaciones[i]["longitud"];
                var distancia = getDistanciaMetros(position.coords.latitude, position.coords.longitude, latitude, longitude);
                //var distancia = getDistanciaMetros(position.coords.latitude, position.coords.longitude, latitude, longitude);
               // console.log(distancia +'--'+ ubicaciones[i]["nombreEstablecimiento"]);
                if (distancia < 20000) {
                    var myLatLng = new google.maps.LatLng(latitude,longitude);
                    marker = new google.maps.Marker({
                        position: myLatLng,
                        map: map,
                        icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/ic_map_pago_facil.png',
                        title: ubicaciones[i]["nombreEstablecimiento"],
                        animation: google.maps.Animation.DROP,
                        clickeable:true,
                    });        
                      
                    var lclatitude=ubicaciones[i]['latitud'];
                    var lclongitude=ubicaciones[i]["longitud"];
                    var lcnombre=ubicaciones[i]["nombreEstablecimiento"];
            
                    cadenainsertarselect=cadenainsertarselect+ "<option value='"+lclatitude+"/"+lclongitude+ "/PF'    >   "+lcnombre+" </option> " ;
                    console.log(cadenainsertarselect);
                    
                    $("#slc_ubicacion").append(cadenainsertarselect);
                }
                
                
            }
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
    function getDistanciaMetros(lat1, lon1, lat2, lon2)
    {
      rad = function(x) {return x*Math.PI/180;}
      var R = 6378.137; //Radio de la tierra en km 
      var dLat = rad( lat2 - lat1 );
      var dLong = rad( lon2 - lon1 );
      var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(rad(lat1)) * 
      Math.cos(rad(lat2)) * Math.sin(dLong/2) * Math.sin(dLong/2);
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
      
      //aquí obtienes la distancia en metros por la conversion 1Km =1000m
      var d = R * c * 1000; 
      return d;

    }

  /*  
    function initMap() {
      // Creamos la instacia bounds
      var bounds = new google.maps.LatLngBounds();
    
      // Extraemos las coordenadas
      var coords = '-90.833910,13.994037 -90.833918,13.994095 -90.833924,13.994152 -90.833930,13.994207 -90.833936,13.994263 -90.833943,13.994322 -90.833951,13.994382 -90.833959,13.994440 -90.833965,13.994494 -90.833971,13.994548 -90.833978,13.994608 -90.833984,13.994671 -90.833993,13.994741 -90.834001,13.994811 -90.834010,13.994877 -90.834019,13.994940 -90.834028,13.995003 -90.834036,13.995060 -90.834044,13.995110 -90.834052,13.995162 -90.834061,13.995222 -90.834067,13.995281 -90.834074,13.995336 -90.834080,13.995390 -90.834086,13.995442 -90.834092,13.995495 -90.834100,13.995553 -90.834105,13.995610 -90.834110,13.995665 -90.834116,13.995718 -90.834122,13.995769 -90.834127,13.995820 -90.834134,13.995871 -90.834141,13.995924 -90.834146,13.995974 -90.834149,13.996008 -90.834192,13.996161 -90.834732,13.996091 -90.835519,13.995989 -90.836038,13.995931 -90.836696,13.995846 -90.836677,13.995819 -90.836660,13.995674 -90.836610,13.995123 -90.836480,13.994146 -90.836461,13.994126 -90.836370,13.994036 -90.836287,13.994044 -90.836194,13.994035 -90.836012,13.993789 -90.836003,13.993753 -90.835995,13.993581 -90.836245,13.993529 -90.836375,13.993521 -90.836386,13.993516 -90.836394,13.993512 -90.836394,13.993503 -90.836395,13.993404 -90.836309,13.992635 -90.836266,13.992318 -90.836207,13.991926 -90.836192,13.991927 -90.836170,13.991932 -90.836125,13.991938 -90.836074,13.991943 -90.836010,13.991951 -90.835936,13.991961 -90.835862,13.991968 -90.835791,13.991976 -90.835722,13.991980 -90.835658,13.991985 -90.835597,13.991994 -90.835533,13.992003 -90.835471,13.992011 -90.835408,13.992018 -90.835346,13.992025 -90.835285,13.992033 -90.835228,13.992040 -90.835173,13.992045 -90.835118,13.992051 -90.835062,13.992057 -90.835002,13.992063 -90.834936,13.992071 -90.834868,13.992078 -90.834800,13.992086 -90.834733,13.992094 -90.834663,13.992102 -90.834588,13.992111 -90.834523,13.992120 -90.834474,13.992123 -90.834421,13.992129 -90.834361,13.992133 -90.834298,13.992140 -90.834229,13.992149 -90.834160,13.992161 -90.834092,13.992171 -90.834022,13.992180 -90.833954,13.992185 -90.833889,13.992191 -90.833824,13.992198 -90.833761,13.992205 -90.833709,13.992212 -90.833680,13.992216 -90.833683,13.992242 -90.833693,13.992300 -90.833704,13.992370 -90.833712,13.992445 -90.833720,13.992518 -90.833727,13.992591 -90.833736,13.992661 -90.833745,13.992730 -90.833755,13.992795 -90.833764,13.992855 -90.833772,13.992913 -90.833779,13.992971 -90.833786,13.993033 -90.833792,13.993092 -90.833799,13.993149 -90.833807,13.993202 -90.833815,13.993251 -90.833823,13.993302 -90.833830,13.993358 -90.833837,13.993410 -90.833843,13.993462 -90.833849,13.993518 -90.833857,13.993579 -90.833864,13.993641 -90.833870,13.993700 -90.833876,13.993760 -90.833881,13.993817 -90.833887,13.993871 -90.833894,13.993927 -90.833902,13.993982 -90.833910,13.994037'
        .split(' ') // Separamos por espacio
        .map(function(data) {
          var info = data.split(','), // Separamos por coma
            coord = { // Creamos el obj de coordenada
              lat: parseFloat(info[1]),
              lng: parseFloat(info[0])
            };
          // Agregamos la coordenada al bounds
          bounds.extend(coord);
          return coord;
        });
    
    
      // Creamos el poligono
      var area = new google.maps.Polygon({
        paths: coords,
        strokeColor: '#6C3483',
        strokeOpacity: 0.8,
        strokeWeight: 3,
        fillColor: '#6C3483',
        fillOpacity: 0.35
      });
    
      // Creamos el mapa
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: bounds.getCenter(), // Centramos el mapa al area
        mapTypeId: 'terrain'
      });
    
      // Agregamos el area al mapa
      area.setMap(map);
      }
*/
/*

    function clip() {
        var map, lat, lng;
    $(document).ready(function(){

      /*
      var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: -17.78315962290801, lng: -63.180976199658176},           
              zoom: 12
            });

            map.geolocate({
        success: function(position){
          lat = position.coords.latitude;  
          lng = position.coords.longitude;
          map.setCenter(lat, lng);
          map.addMarker({ lat: lat, lng: lng});  
        },
        error: function(error){
          alert('Geolocation failed: '+error.message);
        },
        not_supported: function(){
          alert("Your browser does not support geolocation");
        }
      });

      map.addListener('click', function(e) {
          map.renderRoute({
          origin: [lat, lng],  
          destination: [e.latLng.lat(), e.latLng.lng()],
          travelMode: 'driving',
          strokeColor: '#000000',
          strokeOpacity: 0.6,
          strokeWeight: 5
          }, {
        panel: '#directions',
        draggable: true
        });
          lat = e.latLng.lat();   
        lng = e.latLng.lng();
        //Crea un marcador en el punto final automaticamente

        });

    });
    }
*/  
            </script>
</body>


</html>
