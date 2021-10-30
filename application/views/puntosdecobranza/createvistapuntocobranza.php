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
                                <form class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="card-body">
                                        
                                            <section>
                                               <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Tipo Punto</label>
                                                            <select class="custom-select custom-select-m" name="slcpunto" id="slcpunto" placeholder="Selecione una Opcion" required>
                                                                <option value="" selected>Seleccione una Opcion</option>
                                                                <option value="1">Punto Pago Facil</option>
                                                                <option value="2">Billetera</option>
                                                                <option value="3">Nuevo Punto</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Cliente</label>
                                                            <select class="custom-select custom-select-m" name="slccliente" id="slccliente" placeholder="Selecione una Opcion" required>
                                                                <option value="" selected>Seleccione una Opcion</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Fecha">Fecha</label>
                                                            <input type="date" class="form-control" name="" id="txtfecha" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Latitud">Latitud</label>
                                                            <input type="text" class="form-control" name="" id="txtlatitud" placeholder="Latitud.." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Longitud">Longitud</label>
                                                            <input type="text" class="form-control" name="" id="txtlongitud" placeholder="Longitud.." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Ubicacion GPS</label>
                                                            <input type="text" class="form-control" name="" id="txtubicacion" placeholder="Ubicacion.." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Direccion</label>
                                                            <input type="text" class="form-control" name="" id="txtdireccion" placeholder="Direccion.." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Descripcion</label>
                                                            <input type="text" class="form-control" name="" id="txtdescripcion" placeholder="Descripcion.." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label style="color:white" for="Ubicacion">Ubicacion</label> <br>
                                                            <label for=""><input type="checkbox"  name="" id="txtbanner" value=""> Se Entrego Banner</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                        <label style="color:white" for="Ubicacion">Ubicacion</label> <br>
                                                            <label for=""><input type="checkbox"  name="" id="txtpunto" value=""> Acepto ser Punto</label>
                                                        </div>
                                                    </div>
                                                    <div  class="col-md-1">
                                						<div class="form-group">
                                							<button type="button" id="btnpuntocobranza" class="btn btn-info">Agregar</button>
                                						</div>
                                					</div>
                                					<div style="padding-left: 25px;" class="col-md-4">
                                						<div class="form-group">
                                                            <select class="custom-select custom-select-m" name="slcagentename" id="slcagente" placeholder="Selecione una Opcion">
                                                                <option value="" selected>Seleccione un Agente Visitante</option>      
                                                                <option value="1">Calderon Lopez Pablo</option>   
                                                                <option value="2">Peres Cespedes Yenny</option>   
                                                            </select>
                                						</div>
                                					</div>
                                					<div class="col-md-2">
                                						<div class="form-group">
                                						</div>
                                					</div>
                                					<div class="col-md-4">
                                                        <div class="form-group">
                                                            <select class="custom-select custom-select-m" name="slcpersonalatendiendo" id="slcpersonalatendiendo" placeholder="Selecione una Opcion">
                                                                <option value="" selected>Seleccione un Personal Atendiendo</option>
                                                                <option value="1">Caceres Canilla Teofila</option>   
                                                                <option value="2">Condori Churquiño Anastacio</option>  
                                                            </select>
                                                        </div>
                                                    </div>

                                					<div class="col-md-1">
                                						<div class="form-group">
                                							<button type="button" id="btnbilletera" class="btn btn-success">Agregar</button>
                                						</div>
                                					</div>
                                                    <div class="col-md-6">
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
                                                    <div class="col-md-6">
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
                                               <div class="col-md-12" id="divGuardar">
                                    				<div class="form-group">
                                    					<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
                                    					<button class="btn btn-primary" id="btnaceptar" type="submit">Aceptar</button>
                                    					<button class="btn btn-danger" id="btncancelar" type="reset">Cancelar</button>	
                                    				</div>
                                    			</div>  
                                                    
                                            </section>
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
	var laCont=1;
	lnTotal=0;
	subtotal=[];
	$("#divGuardar").hide();

	function AgregarAgente()
	{
        
		lnidagente=$("#slcagente").val();
		lcagente=$("#slcagente option:selected").text();
		

		if (lnidagente!="") {

			var fila='<tr class="selected" id="fila'+laCont+'"><td><button type="button" id="eliminar" value"'+lnidagente+'" class="btn btn-warning" onclick="Eliminar('+laCont+');">x</button></td><td for="id"><input type="hidden" id="txtidagente" name="slcagentename[]" value="'+lnidagente+'">'+lcagente+'</td><td><input type="number" name="txttelefonoagente[]" value="'+69021259+'"></td></tr>';
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
                idagente.push(lnidagente);
            }
            
		}
		else{
			alert("Seleccione un Agente Visitante");
		}
	}
	function AgregarPersonalAtendiendo()
	{
		lnidpersonalatendiendo=$("#slcpersonalatendiendo").val();
		lcpersonalatendiendo=$("#slcpersonalatendiendo option:selected").text();
		

		if (lnidpersonalatendiendo!="") {

			var fila='<tr class="selected" id="fila'+laCont+'"><td><button type="button" class="btn btn-warning" onclick="Eliminar('+laCont+');">x</button></td><td><input type="hidden" name="slcpersonalatendiendoname[]" value="'+lnidpersonalatendiendo+'">'+lcpersonalatendiendo+'</td><td><input type="number" name="txttelefonoatendiendo[]" value="'+69021259+'"></td></tr>';
			laCont++;
			Limpiar();
			Evaluar();
			let resultpersonal = idpersonal.filter((item,index)=>{
            return idpersonal.indexOf(item) === index;
            })
            
            if (resultpersonal.includes(lnidagente)) {                   
                alert("ya se encuentra este Personal en el detalle");
                return false;
            }else{
                $('#detallespersonalatendiendo').append(fila);
                idpersonal.push(lnidagente);
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
		if (lnTotal>0) {
			$("#divGuardar").show();
		}
		else{
			$("#divGuardar").hide();
		}
	}
	function Eliminar(tnId){
		$("#fila" + tnId).remove();
		alert("#fila" + tnId);
		Evaluar();
	}
</script>


</html>
