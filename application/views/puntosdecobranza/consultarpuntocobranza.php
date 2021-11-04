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
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Tipo Punto</label>
                                                            <select class="custom-select custom-select-m" name="slcpunto" id="slcpunto" placeholder="Selecione una Opcion" required>
                                                                <option value="<?php echo $consultaragente[0]->IdCliente; ?>" selected><?php echo $consultaragente[0]->Cliente; ?></option>                                  
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Cliente</label>
                                                            <select class="custom-select custom-select-m" name="slccliente" id="slccliente" placeholder="Selecione una Opcion" required>
                                                            <option value="<?php echo $consultaragente[0]->PuntoCobranzaBilletera ?>" selected><?php echo $consultaragente[0]->Nombre ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Fecha">Fecha</label>
                                                            <input type="date" class="form-control" value="<?php echo $consultaragente[0]->Fecha ?>" name="dtfecha" id="txtfecha" required>
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
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Ubicacion GPS</label>
                                                            <input type="text" class="form-control" value="<?php echo $consultaragente[0]->UbicacionGps ?>" name="lcUbicacionGps" id="txtubicacion" placeholder="Ubicacion.." required>
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
                                                            <label for=""><input type="checkbox" value="<?php echo $consultaragente[0]->SeEntregoBanner ?>"  name="SeEntregoBanner" id="txtbanner" value="1"> Se Entrego Banner</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                        <label style="color:white" for="Ubicacion">Ubicacion</label> <br>
                                                            <label for=""><input type="checkbox" value="<?php echo $consultaragente[0]->AceptoSerPunto ?>"  name="AceptoSerPunto" id="txtpunto" value="1"> Acepto ser Punto</label>
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
                                                                        data-toggle="modal"><button  class="btn btn-info">Editar</button></a>
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
                                                                        data-toggle="modal"><button class="btn btn-info">Editar</button></a>
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
    function EditarAgente(Agente, TelefonoAgente) {
   // var goFormularioCliente=$("#FormAgente").serialize();
    var lcUrlajax="EditarVisitaAgente";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     
    $.ajax({                  
            url: lcUrlajax,
            data: {Agente: Agente, TelefonoAgente: TelefonoAgente},
            type : 'POST',
            dataType: "json",
            beforeSend:function( ) {   
            },                    
            success:function(response) {
                console.log("Exito");
                console.log(response);
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
    function EditarPersonalAtendio(Atendio, TelefonoAtendio) {
   // var goFormularioCliente=$("#FormAgente").serialize();
    var lcUrlajax="EditarVisitaPersonalAtendio";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     
    $.ajax({                  
            url: lcUrlajax,
            data: {Atendio: Atendio, TelefonoAtendio: TelefonoAtendio},
            type : 'POST',
            dataType: "json",
            beforeSend:function( ) {   
            },                    
            success:function(response) {
                console.log("Exito");
                console.log(response);
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
</script>
</html>
