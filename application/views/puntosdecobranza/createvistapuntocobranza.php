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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="height: 100%;">
                            <div class="card-body text-left" style="padding-top: revert;"> 
                                <div class="card-header">
                                    <div class="col-md-12">
                            			<h3 class="card-title">Nueva Visita Punto de Cobranza</h3>
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
                                                            <select class="custom-select custom-select-m" name="slcpunto" id="slcpunto" placeholder="Selecione una Opcion" onchange="ocultar();" required>
                                                                <?php 
                                                                    foreach($puntos as $puntos)
                                                                    {?>
                                                                        <option value="<?php echo $puntos->TablSoft; ?>"><?php echo $puntos->Nombre; ?></option>
                                                                   <?php }
                                                                ?>
                                                                <option value="3">PUNTO NUEVO</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4" id="divClienteBilletera">
                                                        <div class="form-group">
                                                            <label for="">Cliente</label>
                                                            <select class="custom-select custom-select-m" name="slcclienteagente" id="slcclienteagente" placeholder="Selecione una Opcion" required>
                                                                <?php 
                                                                    foreach($clientebilletera as $puntosbilletera)
                                                                    {?>
                                                                        <option value="<?php echo $puntosbilletera->idCliente; ?>"><?php echo $puntosbilletera->idCliente." ".$puntosbilletera->nombre; ?></option>
                                                                   <?php }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4" id="divClientePuntoCobranza">
                                                        <div class="form-group">
                                                            <label for="">Cliente</label>
                                                            <select class="custom-select custom-select-m" name="slccliente" id="slccliente" placeholder="Selecione una Opcion" required>
                                                                <?php 
                                                                    foreach($clientepuntocobranza as $puntoscobranza)
                                                                    {?>
                                                                        <option value="<?php echo $puntoscobranza->idCliente; ?>"><?php echo $puntoscobranza->idCliente." ".$puntoscobranza->nombre; ?></option>
                                                                   <?php }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Fecha">Fecha</label>
                                                            <input type="date" class="form-control" name="dtfecha" id="txtfecha" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Direccion</label>
                                                            <input type="text" class="form-control" name="lcDireccion" id="txtdireccion" placeholder="Direccion.." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Descripcion</label>
                                                            <input type="text" class="form-control" name="lcDescripcion" id="txtdescripcion" placeholder="Descripcion.." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label style="color:white" for="Ubicacion">Ubicacion</label> <br>
                                                            <label for=""><input type="checkbox"  name="SeEntregoBanner" id="txtbanner" value=""> Se Entrego Banner</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                        <label style="color:white" for="Ubicacion">Ubicacion</label> <br>
                                                            <label for=""><input type="checkbox"  name="AceptoSerPunto" id="txtpunto" value=""> Acepto ser Punto</label>
                                                        </div>
                                                    </div>
                                                     
 
                                                    <div  class="col-md-1" id="divAgregarPuntoCobranza">
                                						<div class="form-group">
                                							<button type="button" id="btnpuntocobranza" class="btn btn-info">Agregar</button>
                                						</div>
                                					</div>
                                					<div style="padding-left: 25px;" id="divAgente" class="col-md-4">
                                						<div class="form-group">
                                                            <select class="custom-select custom-select-m" name="slcagente" id="slcagente" placeholder="Selecione una Opcion">
                                                                <option value="" selected>Seleccione un Agente Visitante</option>      
                                                                <?php 
                                                                    foreach ($agente as $key) {?>
                                                                        <option value="<?php echo $key->cliente; ?>"><?php echo $key->apellido.' '. $key->nombre; ?></option> 
                                                                    <?php }
                                                                ?>
                                                            </select>
                                						</div>
                                					</div>
                                					<div class="col-md-2">
                                						<div class="form-group">
                                						</div>
                                					</div>
                                					<div class="col-md-4" id="divAtendio" >
                                                        <div class="form-group">
                                                            <select class="custom-select custom-select-m" name="slcpersonalatendiendobilletera" id="slcpersonalatendiendobilletera" placeholder="Selecione una Opcion" required>
                                                                <?php 
                                                                    foreach($clientebilletera as $puntosbilletera)
                                                                    {?>
                                                                        <option value="<?php echo $puntosbilletera->idCliente; ?>"><?php echo $puntosbilletera->apellido." ".$puntosbilletera->nombre; ?></option>
                                                                   <?php }
                                                                ?>
                                                            </select>
                                                            <select class="custom-select custom-select-m" name="slcpersonalatendiendopuntocobranza" id="slcpersonalatendiendopuntocobranza" placeholder="Selecione una Opcion" required>
                                                                <?php 
                                                                    foreach($clientepuntocobranza as $puntoscobranza)
                                                                    {?>
                                                                        <option value="<?php echo $puntoscobranza->idCliente; ?>"><?php echo $puntoscobranza->apellido." ".$puntoscobranza->nombre; ?></option>
                                                                   <?php }
                                                                ?>
                                                            </select>
                                                            <!--<input type="text" class="form-control" name="slcpersonalatendiendo" id="slcpersonalatendiendo" placeholder="Personal que atendio">-->
                                                        </div>
                                                    </div>

                                					<div class="col-md-1" id="divAgregarBilletera" >
                                						<div class="form-group">
                                							<button type="button" id="btnbilletera" class="btn btn-success">Agregar</button>
                                						</div>
                                					</div>
                                                    <div class="col-md-6" id="divTablaAgente" >
                                						<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                							<thead style="background-color:#A9D0F5">
                                								<th>Opciones</th>
                                								<th>Agente</th>
                                								<th>Telefono</th>
                                							</thead>
                                							<tfoot>
                                							    <td></td>
                                								<td></td>
                                								<td></td>
                                							</tfoot>
                                							<tbody>
                                								
                                							</tbody>
                                						</table>
                                					</div>
                                                    <div class="col-md-6" id="divTablaAtendio" >
                                						<table id="detallespersonalatendiendo" class="table table-striped table-bordered table-condensed table-hover">
                                							<thead style="background-color:#80FA43">
                                                                <th>Opciones</th>
                                								<th>Atendio</th>
                                								<th>Telefono</th>
                                							</thead>
                                							<tfoot>
                                								<td></td>
                                								<td></td>
                                								<td></td>
                                							</tfoot>                                						
                                							<tbody>
                                								
                                							</tbody>
                                						</table>
                                						
                                					</div>                                                   
                                               </div>                                                                                                   
                                            </section>
                                           
                                        </div>
                                       
                                            <div class="col-md-3" >
                                                <div class="form-group">
                                                <label style="color: white;" for="Latitud">.</label><br>
                                    			<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
                                                <button type="button" style="display: none;" id="divBtnUbicacion" class="btn btn-warning" onclick="mi_ubicacion();">Cargar Ubicacion Actual</button>
                                    			<button class="btn btn-primary" style="display: none;" id="btnAceptar" onclick="ValidarCliente($('#slccliente').val(), $('#slcclienteagente').val());" type="button">Aceptar</button>
                                    			<button class="btn btn-danger" style="display: none;" id="btnCancelar" type="reset">Cancelar</button>
                                                </div>
                                            </div>
                                            <div class="col-md-3" >
                                                <div class="form-group">
        
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="divLatitud" style="display: none;">
                                                <div class="form-group">
                                                    <label for="Latitud">Latitud</label>
                                                    <input type="text" class="form-control" name="lcLatitud" id="txtlatitud" placeholder="Latitud.." required>
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="divLongitud" style="display: none;">
                                                <div class="form-group">
                                                    <label for="Longitud">Longitud</label>
                                                    <input type="text" class="form-control" name="lcLongitud" id="txtlongitud" placeholder="Longitud.." required>
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="divUbicacionGps" style="display: none;">
                                        		<div class="form-group">
                                                <label for="Ubicacion">Ubicacion GPS</label>
                                                    <input type="text" class="form-control" name="lcUbicacionGps" id="txtubicacion" value="Santa Cruz" placeholder="Ubicacion.." required>
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
<script>
    
    $(document).ready(function(){
		$('#btnpuntocobranza').click(function(){
			AgregarAgente();
		});
	});
	$(document).ready(function(){
		$('#btnbilletera').click(function(){
			AgregarPersonalAtendiendo();
		});
	});
    var idagente = [];
    var idpersonal = [];
	var laCont=0;
	lnTotal=0;
	var laContAtendio=0;
	subtotal=[];
	$("#divGuardar").hide();
    function ValidarCliente(IdCliente, IdClienteBilletera) {
    var lcUrlajax="http://localhost:8080/web_pago_facil/es/ValidarCliente";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });    
    $.ajax({                  
            url: lcUrlajax,
            data: {IdCliente: IdCliente, IdClienteBilletera: IdClienteBilletera},
            type : 'POST',
            dataType: "json",
            beforeSend:function( ) {   
            },                    
            success:function(response) {
                console.log("Exito");
                console.log(response.RESPUESTA);
                if (response.RESPUESTA == "OK") {
                alert("hay");
                   // $('#btnAceptar').trigger('click');	
                }
                if(response.RESPUESTA == "error"){
                    alert("Ya se asigno esta Empresa para este Encargado");
                }
                else{
                    alert("No hay");
                }
            },
            error: function (data) {
                console.log("Error");
                console.log(data.responseText);
            },               
            complete:function( ) {                   
            },
        }
        );         
    }
	function AgregarAgente()
	{
        
		lnidagente=$("#slcagente").val();
		lcagente=$("#slcagente option:selected").text();
		

		if (lnidagente!="") {

			var fila='<tr class="selected" id="fila'+laCont+'"><td><button type="button" id="eliminar" value"'+lnidagente+'" class="btn btn-warning" onclick="Eliminar('+laCont+');">x</button></td><td style="display: none;"><input type="text" name="ClienteAgente[]" value="'+lnidagente+'"></td><td><input type="hidden" id="txtidagente" name="slcagentename[]" value="'+lcagente+'">'+lcagente+'</td><td><input type="number" id="telAgente" name="txttelefonoagente[]" value=""></td></tr>';
			laCont++;
			Limpiar();
			Evaluar();
						
            let resultagente = idagente.filter((item,index)=>{
            return idagente.indexOf(item) === index;
            })
            if (resultagente.includes(lnidagente)) {                   
                alert("ya se encuentra este Agente en el detalle");
                return false;
            }else{
                $('#detalles').append(fila);
                $('#telAgente').focus();
                idagente.push(lnidagente);
            }
            
		}
		else{
			alert("Seleccione un Agente Visitante");
		}
	}

	function AgregarPersonalAtendiendo()
	{
	    var tipopunto = $('#slcpunto').val();
	    if (tipopunto == 13) {
            lnidpersonalatendiendo=$("#slcpersonalatendiendobilletera").val();
		    lcpersonalatendio=$("#slcpersonalatendiendobilletera option:selected").text();
        }else if(tipopunto == 29){
            lnidpersonalatendiendo=$("#slcpersonalatendiendopuntocobranza").val();
		    lcpersonalatendio=$("#slcpersonalatendiendopuntocobranza option:selected").text();
        }
        else{alert("Seleccion un tipo de Punto");}
		
		if (lnidpersonalatendiendo!="") {

			var fila='<tr class="selected" id="filaAtendio'+laContAtendio+'"><td><button type="button" class="btn btn-warning" onclick="EliminarAtendio('+laContAtendio+');">x</button></td><td><input type="hidden" name="slcpersonalatendiendoname[]" value="'+lnidpersonalatendiendo+'">'+lcpersonalatendio+'</td><td><input type="number" id="telAtendio" name="txttelefonoatendiendo[]" value=""></td></tr>';
			laContAtendio++;
          
          
			
			Limpiar();
			Evaluar();
			let resultpersonal = idpersonal.filter((item,index)=>{
            return idpersonal.indexOf(item) === index;
            })
            
            if (resultpersonal.includes(lnidpersonalatendiendo)) {                   
                alert("ya se encuentra este Personal en el detalle");
                return false;
            }else{
                $('#detallespersonalatendiendo').append(fila);
                $('#telAtendio').focus();
                idpersonal.push(lnidpersonalatendiendo);
            }
			

		}
		else{
			alert("Ingrese su Nombre y Apellidos del Personal que esta Atendiendo");
		}
	}
	function Limpiar(){
		//$("#txtCantidad").val("");
		//$("#txtPrecio").val("");
	}
	function Evaluar(){
		if (laCont>0 && laContAtendio>0) {
			$("#divBtnUbicacion").show();
		}
		else{
			$("#divBtnUbicacion").hide();
		}
	}
	function Eliminar(tnId){
		$("#fila" + tnId).remove();
		Evaluar();
	}
	function EliminarAtendio(tnId){
		$("#filaAtendio" + tnId).remove();
		Evaluar();
	}
	function ocultar() {
        var puntos = $('#slcpunto').val();
        if(puntos == 29){ 
            $('#divClienteBilletera').hide();
            $('#divClientePuntoCobranza').show();
            $('#slcpersonalatendiendobilletera').hide();
            $('#slcpersonalatendiendopuntocobranza').show();
        }
        else if(puntos == 13){
            $('#divClientePuntoCobranza').hide();
            $('#divClienteBilletera').show();
            $('#slcpersonalatendiendobilletera').show();
            $('#slcpersonalatendiendopuntocobranza').hide();
        }
        else{
 
        }
    }
    $(document).ready(function(){ ocultar(); }) 
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
function mi_ubicacion() {
    $('#divBtnUbicacion').hide();
    $('#btnAceptar').show();
    $('#btnCancelar').show();
    $('#divLongitud').show();
    $('#divLatitud').show();


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
            var myLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            var marker = new google.maps.Marker({
                position: myLatLng,
                icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/ic_map_pago_facil.png',
                map: map,
            });
            $('#txtlatitud').val(position.coords.latitude);
            $('#txtlongitud').val(position.coords.longitude);
        });
        
    }
    
}
</script>


</html>
