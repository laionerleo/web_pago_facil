<!doctype html>
<html lang="en">
<?php $this->load->view('theme/head'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
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
        <!--<?php $this->load->view('theme/menu_lateral_izquierdo');   ?>-->
        <!-- end::navigation -->
        <div class="content-body">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="height: 100%;">
                            <div class="card-body text-left" style="padding-top: revert;"> 
                                <div class="card-header">
                                    <div class="col-md-12">
                            			<h3 class="card-title">Visita Punto de Cobranza</h3>
                            		</div>
                                </div>
                                <form class="needs-validation" novalidate action="InsertarVisita" method="post">
                                    <div class="form-row">
                                        <div class="card-body">
                                        
                                            <section>
                                               <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Tipo Punto</label>
                                                            <select class="custom-select custom-select-m" name="slcpunto" id="slcpunto" placeholder="Selecione una Opcion" required>
                                                                <option value="<?php echo $consultaragente[0]->IdCliente; ?>" selected><?php echo $consultaragente[0]->Cliente; ?></option>                                  
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Cliente</label>
                                                            <select class="custom-select custom-select-m" name="slccliente" id="slccliente" placeholder="Selecione una Opcion" required>
                                                            <option value="<?php echo $consultaragente[0]->PuntoCobranzaBilletera ?>" selected><?php echo $consultaragente[0]->Nombre ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Fecha">Fecha</label>
                                                            <input type="date" class="form-control" value="<?php echo $consultaragente[0]->Fecha ?>" name="dtfecha" id="txtfecha" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Direccion</label>
                                                            <input type="text" class="form-control" value="<?php echo $consultaragente[0]->Direccion ?>" name="lcDireccion" id="txtdireccion" placeholder="Direccion.." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Descripcion</label>
                                                            <input type="text" class="form-control" value="<?php echo $consultaragente[0]->Descripcion ?>" name="lcDescripcion" id="txtdescripcion" placeholder="Descripcion.." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label style="color:white" for="Ubicacion">Ubicacion</label> <br>
                                                            <label for=""><input type="checkbox" value="<?php echo $consultaragente[0]->SeEntregoBanner ?>"  name="SeEntregoBanner" id="txtbanner" value=""> Se Entrego Banner</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                        <label style="color:white" for="Ubicacion">Ubicacion</label> <br>
                                                            <label for=""><input type="checkbox" value="<?php echo $consultaragente[0]->AceptoSerPunto ?>"  name="AceptoSerPunto" id="txtpunto" value=""> Acepto ser Punto</label>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-6">
                                						<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                							<thead style="background-color:#A9D0F5">
                                								
                                								<th>Agente</th>
                                								<th>Telefono</th>
                                								<th>Opciones</th>
                                							</thead>
                                							<tfoot>
                                								<th></th>
                                								<th></th>
                                								<th></th>
                                							</tfoot>
                                							<tbody>
                                                            <?php foreach ($consultaragente as $key) {?>
                                                                <tr>
                                                                    <td><?php echo $key->Visitante ?></td>
                                    								<td><?php echo $key->TelefonoAgente ?></td>
                                    								<td><a class="modal-effect"  href="#modal-update" data-bs-effect="effect-just-me"
                                                                        data-toggle="modal" ><button onclick="cargarAgente('<?php echo $key->VisitaPuntoCobranza ?>','<?php echo $key->IdCliente ?>','<?php echo $key->Serial ?>','<?php echo $key->Visitante ?>','<?php echo $key->TelefonoAgente ?>');"  class="btn btn-info">Editar</button></a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                							</tbody>                                							
                                							<?php include 'editarvisitapuntocobranza.php'; ?>
                                						</table>
                                					</div>
                                                    <div class="col-md-6">
                                						<table id="detallespersonalatendiendo" class="table table-striped table-bordered table-condensed table-hover">
                                							<thead style="background-color:#80FA43">
                                                                
                                								<th>Atendio</th>
                                								<th>Telefono</th>
                                								<th>Opciones</th>
                                							</thead>
                                							<tbody>
                                							<?php foreach ($consultarpersonal as $key) {?>
                                                                <tr>
                                                                    <td><?php echo $key->PersonalAtendio ?></td>
                                    								<td><?php echo $key->TelefonoAtendio ?></td>
                                    								<td><a href="#modal-update-personal" data-bs-effect="effect-just-me"
                                                                        data-toggle="modal"><button onclick="cargarPersonalAtendio('<?php echo $key->VisitaPuntoCobranza ?>','<?php echo $key->Serial ?>','<?php echo $key->PersonalAtendio ?>','<?php echo $key->TelefonoAtendio ?>');" class="btn btn-info">Editar</button></a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                								
                                							</tbody>                                						
                                							<tfoot>
                                								
                                							</tfoot>
                                							<?php include 'editarpersonalatendiovisita.php'; ?>
                                						</table>
                                					</div>
                                                   
                                               </div>
                                               
                                            </section>
                                            
                                        </div>
                                        <div class="col-md-3" id="divGuardar">
                            				<div class="form-group">
                            				    <label style="color: white;" for="Latitud">.</label><br>
                            					<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
                            					<button class="btn btn-primary" id="btnaceptar" onclick="EditarVisitaPuntoCobranza('<?php echo $key->VisitaPuntoCobranza ?>',$('#txtfecha').val(),$('#txtdireccion').val(),$('#txtdescripcion').val(),$('#txtbanner').val(),$('#txtpunto').val());" type="button">Aceptar</button>
                            					<button class="btn btn-danger" id="btncancelar" type="reset">Cancelar</button>	
                            				</div>
                            			</div>  
                            			<div class="col-md-3">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="Latitud">Latitud</label>
                                                <input type="text" class="form-control" value="<?php echo $consultaragente[0]->Latitud ?>" name="lcLatitud" id="txtlatitud" placeholder="Latitud.." required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="Longitud">Longitud</label>
                                                <input type="text" class="form-control" value="<?php echo $consultaragente[0]->Longitud ?>" name="lcLongitud" id="txtlongitud" placeholder="Longitud.." required>
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="display: none;">
                                            <div class="form-group">
                                                <label for="Ubicacion">Ubicacion GPS</label>
                                                <input type="text" class="form-control" value="<?php echo $consultaragente[0]->UbicacionGps ?>" name="lcUbicacionGps" id="txtubicacion" placeholder="Ubicacion.." required>
                                            </div>
                                        </div>    
                                        <div style="height: 200px ; width: 100%"  >
                                            <div id="map"  style="height: 100%;width: 100%"></div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end::main -->
<?php $this->load->view('theme/js');  ?>
<!-- Plugin scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>

<script>
    function cargarAgente(IdPuntoCobranza, IdCliente, Serial, Cliente, Telefono) {
        $('#txtIdPuntoCobranza').val(IdPuntoCobranza);  
        $('#txtIdCliente').val(IdCliente);
        $('#txtSerial').val(Serial);
        $('#txtAgente').val(Cliente);
        $('#txtTelefonoAgente').val(Telefono);       
    }
    function cargarPersonalAtendio(IdPuntoCobranza, Serial, Cliente, Telefono) {
        $('#txtIdPuntoCobranzaAtendio').val(IdPuntoCobranza);  
        $('#txtSerialAtendio').val(Serial);
        $('#txtAtendio').val(Cliente);
        $('#txtTelefonoAtendio').val(Telefono);       
    }
    function EditarAgente(IdPuntoCobranza, IdCliente, Serial, Agente, TelefonoAgente) {
   // var goFormularioCliente=$("#FormAgente").serialize();
    var lcUrlajax="http://localhost:8080/web_pago_facil/es/EditarVisitaAgente";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     
    $.ajax({                  
            url: lcUrlajax,
            data: {IdPuntoCobranza: IdPuntoCobranza, IdCliente: IdCliente, Serial: Serial, Agente: Agente, TelefonoAgente: TelefonoAgente},
            type : 'POST',
            dataType: "json",
            beforeSend:function( ) {   
            },                    
            success:function(response) {
                console.log("Exito");
                console.log(response);
                swal({
                  title: "Exitoso!",
                  text: "Rediriguiendo.",
                  type: "success",
                  timer: 2000,
                  showConfirmButton: false
                }, function(){
                      window.location.href = "http://localhost:8080/web_pago_facil/es/ConsultarVisita/<?php echo $key->VisitaPuntoCobranza ?>";
                });
            },
            error: function (data) {
                console.log("Error");
                console.log(data.responseText);  
                swal({
                  title: "Error!",
                  text: "Rediriguiendo.",
                  type: "error",
                  timer: 2000,
                  showConfirmButton: false
                }, function(){
                      window.location.href = "http://localhost:8080/web_pago_facil/es/ConsultarVisita/<?php echo $key->VisitaPuntoCobranza ?>";
                });
            },               
            complete:function( ) {
                    
            },
        }
        ); 
        
    }
    function EditarPersonalAtendio(IdPuntoCobranza, Serial, Atendio, TelefonoAtendio) {
   // var goFormularioCliente=$("#FormAgente").serialize();
    var lcUrlajax="http://localhost:8080/web_pago_facil/es/EditarVisitaPersonalAtendio";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     
    $.ajax({                  
            url: lcUrlajax,
            data: {IdPuntoCobranza: IdPuntoCobranza, Serial: Serial, Atendio: Atendio, TelefonoAtendio: TelefonoAtendio},
            type : 'POST',
            dataType: "json",
            beforeSend:function( ) {   
            },                    
            success:function(response) {
                console.log("Exito");
                console.log(response);
                swal({
                  title: "Exitoso!",
                  text: "Rediriguiendo.",
                  type: "success",
                  timer: 2000,
                  showConfirmButton: false
                }, function(){
                      window.location.href = "http://localhost:8080/web_pago_facil/es/ConsultarVisita/<?php echo $key->VisitaPuntoCobranza ?>";
                });
            },
            error: function (data) {
                console.log("Error");
                console.log(data.responseText);
                swal({
                  title: "Error!",
                  text: "Rediriguiendo.",
                  type: "error",
                  timer: 2000,
                  showConfirmButton: false
                }, function(){
                      window.location.href = "http://localhost:8080/web_pago_facil/es/ConsultarVisita/<?php echo $key->VisitaPuntoCobranza ?>";
                });
            },               
            complete:function( ) {
                    
            },
        }
        );         
    }
    function mi_ubicacion() {
        var checkboxBanner = document.getElementById('txtbanner');
        var checkboxPunto = document.getElementById('txtpunto');
          if($('#txtbanner').val() == 1){
            $('#txtbanner').prop('checked', true);
          }else{
            $('#txtbanner').prop('checked', false);
          }
          if($('#txtpunto').val() == 1){
            $('#txtpunto').prop('checked', true);       
          }else{
            $('#txtpunto').prop('checked', false);     
          }       
    
        infoWindow = new google.maps.InfoWindow;
        
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -17.78315962290801, lng: -63.180976199658176},           
            zoom: 19
        });
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position){
                var pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude           
                };
                infoWindow.setPosition(pos);
                map.setCenter(pos);
                var myLatLng = new google.maps.LatLng($('#txtlatitud').val(), $('#txtlongitud').val());
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/ic_map_pago_facil.png',
                    map: map,
                });
                
                
            });
            
        }
        
    }
    $(document).ready(function(){ mi_ubicacion(); }) 
    $(document).on('change','input[type="checkbox"]' ,function(e) {
	    var checkboxBanner = document.getElementById('txtbanner');
        var checkboxPunto = document.getElementById('txtpunto');
        if(checkboxBanner.checked == true){
            $('#txtbanner').val(1);
        }else{
            $('#txtbanner').val('0');
        }
        if(checkboxPunto.checked == true){
            $('#txtpunto').val(1);
        }else{
            $('#txtpunto').val('0');
        }
	});
    function EditarVisitaPuntoCobranza(IdPuntoCobranza, dtFecha, lcDireccion, lcDescripcion, lnBanner, lnSerPunto) {
   // var goFormularioCliente=$("#FormAgente").serialize();
    var lcUrlajax="http://localhost:8080/web_pago_facil/es/EditarVisitaPuntoCobranza";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var checkboxBanner = document.getElementById('txtbanner');
    var checkboxPunto = document.getElementById('txtpunto');
    if(checkboxBanner.checked == true){
        $('#txtbanner').val(1);
    }else{
        $('#txtbanner').val('0');
    }
    if(checkboxPunto.checked == true){
        $('#txtpunto').val(1);
    }else{
        $('#txtpunto').val('0');
    }
    $.ajax({                  
            url: lcUrlajax,
            data: {IdPuntoCobranza: IdPuntoCobranza, dtFecha: dtFecha, lcDireccion: lcDireccion, lcDescripcion: lcDescripcion, lnBanner: lnBanner, lnSerPunto: lnSerPunto},
            type : 'POST',
            dataType: "json",
            beforeSend:function( ) {   
            },                    
            success:function(response) {
                console.log("Exito");
                console.log(response);
                swal({
                  title: "Exitoso!",
                  text: "Rediriguiendo.",
                  type: "success",
                  timer: 2000,
                  showConfirmButton: false
                }, function(){
                      window.location.href = "http://localhost:8080/web_pago_facil/es/visitapuntosdecobranza";
                });
            },
            error: function (data) {
                console.log("Error");
                console.log(data.responseText);
                swal({
                  title: "Error!",
                  text: "Rediriguiendo.",
                  type: "error",
                  timer: 2000,
                  showConfirmButton: false
                }, function(){
                      window.location.href = "http://localhost:8080/web_pago_facil/es/visitapuntosdecobranza";
                });
            },               
            complete:function( ) {
                    
            },
        }
        );         
    }
</script>
</html>
