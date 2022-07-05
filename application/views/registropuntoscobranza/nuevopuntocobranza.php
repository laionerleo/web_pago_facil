<!doctype html>
<html lang="en">

<?php $this->load->view('theme/head'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
<body  class="">

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<div class="layout-wrapper">
    <div class="content-wrapper">
        <div class="content-body">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="height: 100%;">
                            <div class="card-body text-left" style="padding-top: revert;"> 
                                <div class="card-header">
                                    <div class="col-md-12">
                            			<h3 class="card-title">Nuevo Punto Cobranza</h3>
                            		</div>
                                </div>
                                <form class="needs-validation" novalidate action="insertar/puntocobranza" method="post" id="FormInsertar">
                                    <div class="form-row">
                                        <div class="card-body">
                                        
                                            <section>
                                               <div class="row">
                                                    <!--<div class="col-md-4">
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
                                                    <div class="col-md-6" id="divClientePuntoCobranza">
                                                        <div class="form-group">
                                                            <label for="">BuscarCliente</label>
                                                            <select class="custom-select custom-select-m" onclick="mi_ubicacion($('#txtlatitud').val(),$('#txtlongitud').val());" name="idCliente" id="idCliente" placeholder="Selecione una Opcion" required>
                                                                <?php 
                                                                    foreach($clientepuntocobranza as $puntoscobranza)
                                                                    {?>
                                                                        <option value="<?php echo $puntoscobranza->idCliente.'_'.$puntoscobranza->latitud.'_'.$puntoscobranza->longitud; ?>"><?php echo $puntoscobranza->idCliente." ".$puntoscobranza->nombre; ?></option>
                                                                   <?php }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>  -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="cliente2" placeholder="Nombres">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="clienteapellido" placeholder="Apellidos">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="clientetelefono" placeholder="Telefono">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4" id="divClientePuntoCobranza1">
                                                        <div class="form-group">
                                                            <label for="">Resultado Busqueda Cliente</label>
                                                            <select  name="cliente" id="cliente"  placeholder="Selecione una Opcion" required>
                                                                        <!--<?php 
                                                       
                                                                            foreach($cliente as $puntoscobranza)
                                                                            {?>
                                                                                <option value="<?php echo $puntoscobranza->cliente.'_'.$puntoscobranza->latitud.'_'.$puntoscobranza->longitud;?>"><?php echo $puntoscobranza->cliente." ".$puntoscobranza->nombre; ?></option>
                                                                           <?php }
                                                                        ?>-->
                                                                   
                                                                  
                                                            </select>
                                                        </div>
                                                    </div>  
                                                    <!--<div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Cliente</label>
                                                            <input type="text" class="form-control" name="cliente" id="cliente" placeholder="Cliente.." required>
                                                        </div>
                                                    </div>  -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Direccion</label>
                                                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion.." required>
                                                        </div>
                                                    </div>                                                    
                                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Horario Lunes Viernes 1</label>
                                                            <input type="text" class="form-control" name="horarioLunVieTurno1" id="horarioLunVieTurno1" placeholder="Horario Atencion.." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Horario Lunes Viernes 2</label>
                                                            <input type="text" class="form-control" name="horarioLunVieTurno2" id="horarioLunVieTurno2" placeholder="Horario Atencion.." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Horario Sabado</label>
                                                            <input type="text" class="form-control" name="horaSabado" id="horaSabado" placeholder="Horario Sabado.." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Horario Domingo</label>
                                                            <input type="text" class="form-control" name="horaDomingo" id="horaDomingo" placeholder="Horario Domingo.." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Nombre Establecimiento</label>
                                                            <input type="text" class="form-control" name="NombreEstablecimiento" id="NombreEstablecimiento" value="Peluquería Don Aldo" placeholder="Nombre Establecimiento.." required>
                                                        </div>
                                                    </div>
                                					<div style="padding-left: 25px;" id="divAgente" class="col-md-4">
                                						<div class="form-group">
                                						    <label for="Ubicacion">Personal Propietario</label>
                                                            <input type="text" class="form-control" name="nombrePropietario" id="nombrePropietario" value="Oswaldo Rojas" placeholder="Nombre Propietario">
                                                            <!--<select class="custom-select custom-select-m" name="nombrePropietario" id="nombrePropietario" placeholder="Selecione una Opcion">
                                                                <option value="" selected>Seleccione al Propietario</option>      
                                                                <?php 
                                                                    foreach ($agente as $key) {?>
                                                                        <option value="<?php echo $key->cliente; ?>"><?php echo $key->apellido.' '. $key->nombre; ?></option> 
                                                                    <?php }
                                                                ?>
                                                            </select>-->
                                						</div>
                                					</div>
                                					<div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Telefono Propietario</label>
                                                            <input type="text" class="form-control" name="nroTelefonoProp" id="nroTelefonoProp" value="77804316" placeholder="Telefono Propietario.." required>
                                                        </div>
                                                    </div>
                                					<div class="col-md-4">
                                						<div class="form-group">
                                						    <label for="Ubicacion">Horario Propietario</label>
                                                            <input type="text" class="form-control" name="horarioProp" id="horarioProp" placeholder="Horario Propietario.." required>
                                						</div>
                                					</div>
                                					<div class="col-md-4" id="divAtendio" >
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Persona que Atendio</label>
                                                            <input type="text" class="form-control" name="personaQueAtendio" id="personaQueAtendio" placeholder="Personal que atendio">
                                                            <!--<select class="custom-select custom-select-m" name="personaQueAtendio" id="personaQueAtendio" placeholder="Selecione una Opcion" required>
                                                                <option value="" selected>Seleccione la persona que atendio</option>   
                                                                <?php 
                                                                    foreach($clientepuntocobranza as $puntoscobranza)
                                                                    {?>
                                                                        <option value="<?php echo $puntoscobranza->idCliente; ?>"><?php echo $puntoscobranza->apellido." ".$puntoscobranza->nombre; ?></option>
                                                                   <?php }
                                                                ?>
                                                            </select>-->
                                                            
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Telefono Atendio</label>
                                                            <input type="text" class="form-control" name="nroTelefonoPersonaAtendio" id="nroTelefonoPersonaAtendio" placeholder="Telefono Atendio.." required>
                                                        </div>
                                                    </div>
                                					<div class="col-md-3">
                                                        <div class="form-group">
                                                            <label style="color:white" for="Ubicacion">Se entrego banner</label> <br>
                                                            <label for=""><input type="checkbox"  name="txtbanner" id="txtbanner" value=""> Se Entrego Banner</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label style="color:white" for="Ubicacion">Acepto ser punto</label> <br>
                                                            <label for=""><input type="checkbox"  name="txtpunto" id="txtpunto" value=""> Acepto ser Punto</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3" id="divLatitud" >
                                                        <div class="form-group">
                                                            <label for="Latitud">Latitud</label>
                                                            <input type="text" class="form-control" name="latitud" id="txtlatitud" placeholder="Latitud.." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3" id="divLongitud" >
                                                        <div class="form-group">
                                                            <label for="Longitud">Longitud</label>
                                                            <input type="text" class="form-control" name="longitud" id="txtlongitud" placeholder="Longitud.." required>
                                                        </div>
                                                    </div>
                                        	   </div> 
                                            </div>                                                                                                   
                                            </section>
                                           
                                        </div>
                                       
                                            <div class="col-md-3" >
                                                <div class="form-group">
                                                <label style="color: white;" for="Latitud">.</label><br>
                                    			<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
                                                <button type="button"  id="divBtnUbicacion" class="btn btn-warning" onclick="mi_ubicacion($('#txtlatitud').val(),$('#txtlongitud').val());" >Visualizar Ubicacion</button>
                                                <button class="btn btn-primary" id="btnValidar" style="display: none;"  type="submit">Aceptar</button><!--function ValidarCliente(TelefonoPro, Latitud, Longitud, Cliente, NombreAtendio, TelefonoAte)-->
                                    			
                                    			<button class="btn btn-danger" id="btnCancelar" type="button" onclick="ValidarCliente($('#nroTelefonoProp').val(),$('#txtlatitud').val(),$('#txtlongitud').val(),$('#nombrePropietario').val(),$('#personaQueAtendio').val(),$('#nroTelefonoPersonaAtendio').val(),$('#NombreEstablecimiento').val());">Validar</button>                                              
                                                
                                    			<a style="display: none;" href="#modal-update-punto-cobranza1" data-bs-effect="effect-just-me"
                                                    data-toggle="modal"><button class="btn btn-danger" id="btnModal" type="button">Modal</button></a>                                                
                                                </div>
                                            </div>
                                            <div class="col-md-3" >
                                                <div class="form-group">
        
                                                </div>
                                            </div>
                                            
                                            <!--<div style="height: 200px ; width: 100%"  >-->
                                            <div style="height: 500px ; width: 100%"  >
                                                <div id="map"  style="height: 100%;width: 100%"></div>
                                            </div>	
                                            <?php include 'ModalDetallePuntoCobranza.php'; ?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
<!-- Plugin scripts -->
<script>

    $(document).ready(function() {
        var sportslist=[
            //"cricket","volibol","ruby","basquet"
        ];
        $("#cliente").select2({
            
            data: sportslist
        })
    });
    var ubicaciones= <?php   echo $ubicaciones ; ?>;
    var idagente = [];
    var idpersonal = [];
	var laCont=0;
	lnTotal=0;
	var laContAtendio=0;
	subtotal=[];
	var Cliente = $('#buscarTelefono').val();
    function ValidarCliente(TelefonoPro, Latitud, Longitud, Cliente, NombreAtendio, TelefonoAte, NombreComercial) {
    $('#txtPuntoCobranza').val('');
    $('#txtBilletera').val('');
    $('#TotalFacturas').val('');
    var lcUrlajax="https://pagofacil.com.bo/online/es/validar/puntocobranza";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });    
    $.ajax({                  
            url: lcUrlajax,
           // data: {TelefonoPro: TelefonoPro},
            data: {TelefonoPro: TelefonoPro, Latitud: Latitud,Longitud: Longitud, Cliente: Cliente,NombreAtendio: NombreAtendio, TelefonoAte: TelefonoAte, NombreComercial: NombreComercial},
            type : 'POST',
            dataType: "json",
            beforeSend:function( ) {   
            },                    
            success:function(response) {
                console.log(response);
                console.log("Exito");
                if (response == "") {
                    alert("Puede registrar sus datos");
                    $('#btnValidar').show();
                    $('#btnCancelar').hide();
                }else{
                    ValidarDetallePuntoCobranza(response[0].idCliente);
                    $('#btnModal').trigger('click');
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
   
	$("#divGuardar").hide();
	//$('#cliente').change(MonstrarValores);
	document.querySelector('#cliente').addEventListener('input', () => {
        document.querySelector('#cliente2').value  = 'fghhg';
    });
	cliente2.oninput = function() {
        
        CargarCliente(cliente2.value, $('#clienteapellido').val(), $('#clientetelefono').val());
    };
    clienteapellido.oninput = function() {
        
        CargarCliente($('#cliente2').val(), $('#clienteapellido').val(), $('#clientetelefono').val());
    };
    clientetelefono.oninput = function() {
        
        CargarCliente($('#cliente2').val(), $('#clienteapellido').val(), $('#clientetelefono').val());
    };
    function CargarCliente(cliente, apellido, telefono){

<<<<<<< Updated upstream
        var lcUrlajax="https://pagofacil.com.bo/online/es/mostrarcliente";
=======
        var lcUrlajax="http://localhost:8080/web_pago_facil/es/mostrarcliente";
>>>>>>> Stashed changes
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });    
        $.ajax({                  
            url: lcUrlajax,
           // data: {TelefonoPro: TelefonoPro},
            data: {cliente: cliente, apellido: apellido, telefono: telefono},
            type : 'POST',
            dataType: "json",
            beforeSend:function( ) {   
            },                    
            success:function(response) {
                console.log("Exito");
                $('#cliente').empty();
                for (var i = 0; i < response.length; i++){
                   $('#cliente').append(`<option value="${response[i].cliente}">${ response[i].nombre}</option>`);
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
	function MonstrarValores() {
	    alert("Hola Mundo");
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
function mi_ubicacion(Latitud, Longitud) {
<<<<<<< Updated upstream
=======
    /*$('#divBtnUbicacion').hide();
    $('#btnAceptar').show();
    $('#btnCancelar').show();
    $('#divLongitud').show();
    $('#divLatitud').show();*/
>>>>>>> Stashed changes
    var pos = {
              lat: parseFloat(Latitud),
              lng: parseFloat(Longitud)

            };
    console.log(pos);
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -17.78315962290801, lng: -63.180976199658176},           
      zoom: 14
    });
    
    
        var myLatLng = new google.maps.LatLng(Latitud,Longitud);
          marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/ic_map_pago_facil.png',
         // icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image//hombre.svg',
         // icon: 'https://cdn-icons-png.flaticon.com/512/62/62351.png',
          animation: google.maps.Animation.DROP,
          clickeable:true,
          
          
        }); 
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
<<<<<<< Updated upstream
         // icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/ic_map_pago_facil.png',
=======
       //   icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/ic_map_pago_facil.png',
>>>>>>> Stashed changes
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
      //    icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image//pin_empresa.png',
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
       //   icon: '<?php echo base_url(); ?>'+'application/assets/assets/media/image/pin_metodo_pago.png',
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
    infoWindow.setPosition(pos);
      map.setCenter(pos);
      map.setZoom(16);
<<<<<<< Updated upstream
=======
     

>>>>>>> Stashed changes
}
function ValidarDetallePuntoCobranza(IdCliente) {

    var lcUrlajax="https://pagofacil.com.bo/online/es/validar/Detallepuntocobranza";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });    
    $.ajax({                  
            url: lcUrlajax,
            data: {IdCliente: IdCliente},
            type : 'POST',
            dataType: "json",
            beforeSend:function( ) {   
            },                    
            success:function(response) {
                console.log("Exito");
                console.log(response);
                
                $('#txtPuntoCobranza').val(response.PuntoCobranza);
                $('#txtBilletera').val(response.Billetera);
                $('#TotalFacturas').val(response.TotalFacturas);
            },
            error: function (data) {
                console.log("Erroraa");
                console.log(data.responseText);
            },               
            complete:function( ) {                   
            },
        }
        );       
    }

</script>


</html>
