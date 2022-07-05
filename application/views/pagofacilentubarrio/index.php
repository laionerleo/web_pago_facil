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
            <div class="page-header justify-content-between"></div>
                <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Reporte Billeteras </h6>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="nav flex-column nav-pills" role="tablist"
                                         aria-orientation="vertical">
                                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill"
                                           href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                           aria-selected="true">Datos</a>
                                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                           href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                           aria-selected="false">Reportes Movimientos</a>
                                           <?php if ($tipo==1)  {?>
                                                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill"
                                                href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                                aria-selected="false">Reporte Comisiones</a>
                                            <?php }?>
                                        
                                     
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                             aria-labelledby="v-pills-home-tab"> 
                                             <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card" >
                                                            <div class="card-body text-center m-t-10-minus">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                        <center>Datos</center>
                                                                            <div class="row mb-2">
                                                                                    <div class="col-6 text-muted">Nro de Cuenta:</div>
                                                                                    <div class="col-6">  <?= @$Datos->NroCuenta;  ?> </div>
                                                                            </div>
                                                                            <div class="row mb-2">
                                                                                <div class="col-6 text-muted">Nombre:</div>
                                                                                <div class="col-6">  <?= @$Datos->NombreCliente;  ?> </div>
                                                                            </div>
                                                                            <?php if ($tipo==1)  {?>
                                                                            <div class="row mb-2">
                                                                                <div class="col-6 text-muted">Saldo</div>
                                                                                <div class="col-6"> <?= @$Datos->Saldo;  ?></div>
                                                                            </div>
                                                                            <?php }?>
                                                                        </div>
                                                                    </div> 
                                                                    <div style="height: 600px ; width: 100%"  >
                                                                        <div id="map"  style="height: 100%;width: 100%"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>

                                            
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                             aria-labelledby="v-pills-profile-tab"> 

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card" style="height: 100%;">
                                                            <div class="card-body text-center m-t-10-minus">
                                                                <div class="card-body">
                                                              
                                                                    <div class="row">
                                                                                
                                                                                <div class="col-md-4">
                                                                                    <label for="">Elegir Fecha</label>
                                                                                    <input type="text" id="rangofechas"  name="simple-date-range-picker-callback" class="form-control" style="text-align: center;">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <br>
                                                                                    <input type="Button" class="btn btn-primary" id="btnreporte"  value="Generar Reporte" onclick="generarreporte()">
                                                                                    
                                                                                </div>
                                                                            

                                                                           
                                                                                <div class="col-md-12" style="display:none" id="vistareportemovimiento">
                                                                               

                                                                                </div>
                                                                           
                                                                        
                                                                       
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                             aria-labelledby="v-pills-messages-tab">
                                              <?php $this->load->view('pagofacilentubarrio/reportecomisiones', $comisiones); ?>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
        </div>
    </div>

</div>
<input type="hidden" id="url"  value="<?= $url ?>">
<!-- end::main -->
<script src=" https://www.jsdelivr.com/package/npm/pdfjs-dist"></script>
<script src="https://cdnjs.com/libraries/pdf.js"></script>
<script src="https://unpkg.com/pdfjs-dist/"></script>
<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>

<?php $this->load->view('theme/js');  ?>
<script src="<?=  base_url() ?>/application/assets/assets/js/msdropdown/jquery.dd.js" type="text/javascript"></script>

<!-- Plugin scripts -->
<script>
    var map, infoWindow;
    
    var marker;
    var mensaje="";

   // var latitude= 17.852106<?= floatval(@$latitude );   ?>;
   // var longitude= -63.199333<?= floatval(@$longitude);   ?>;
    var latitude= <?= (is_null($Datos->latitud)) ? $Datos->latitud : -17.784729; ?>;
    var longitude= <?= (is_null($Datos->longitud)) ? $Datos->longitud : -63.180577;  ?>;
    function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: latitude, lng: longitude},           
      zoom: 14
    }
    );
     
    if(latitude!= "-17.784729"  && longitude!= "-63.180577" )
    {
        var myLatLng = new google.maps.LatLng(latitude,longitude);
            marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            animation: google.maps.Animation.DROP,
            clickeable:true,
            icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/ic_map_pago_facil.png',
        });   
        infoWindow = new google.maps.InfoWindow;
    }															
      

  }


function  generarreportemovimiento(fechainicial, fechafinal)
{
    $("#vistareportemovimiento").show();
    $("#vistareportemovimiento").empty();
    $("#vistareportemovimiento").prepend( `  <center> <div id="spinercargapdf" class="spinner-border text-primary" role="status">                                                                                                <span class="sr-only">Loading...</span></div></center> `);
    if(screen.width>=1025)
         {
            tipo =1
         }else{
            tipo=2;
         }
    
    var datos= {FechaInicial:fechainicial,FechaFinal:fechafinal ,tipo:tipo  };
    var urlajax=$("#url").val()+"reportemovimiento";   
    $("#vistareportemovimiento").load(urlajax,{datos});                    
  
    
    
}

function generarreporte()
{
    //alert($('#rangofechas').val());
    var str = $('#rangofechas').val();
    var res = str.split("-");
    console.log(res);
  
    //$("#vistareportemovimiento").show();
    generarreportemovimiento(res[0], res[1])
}

  $(document).ready(function () {

        //var fecha_actual = date("Y/M/D");
        //console.log(moment().format("YYYY/MM/DD").subtract(10, 'days').calendar() );

        $('input[name="simple-date-range-picker-callback"]').daterangepicker({
                
                opens: 'left',
                //startDate: moment().subtract(10, 'days').calendar(),
                
                locale: {
                    format: 'YYYY/MM/DD'
                },
               // startDate:  moment().subtract(10, 'D').calendar(),

            }, function (start, end, label) {
                //swal("A new date selection was made", start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'), "success")
                //alert("aqui generara el pdf =" + start.format('YYYY-MM-DD') + "end " + end.format('YYYY-MM-DD'));
                $("#vistareportemovimiento").show();
              //  generarreportemovimiento(start.format('YYYY-MM-DD'),  end.format('YYYY-MM-DD'));
            });
            $('#example1').DataTable({   "ordering": true,"order": [[ 0, "desc" ]]
                                                                                        });  
  });


  
</script>
                                         


</body>


</html>
