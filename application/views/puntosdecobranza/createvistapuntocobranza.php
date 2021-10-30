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
                            			<h3 class="card-title">Nueva Visita de Punto</h3>
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
                                                            <select class="custom-select custom-select-m" name="slcpunto" id="slcpunto" placeholder="Selecione una Opcion">
                                                                <option value="0" selected>Seleccione una Opcion</option>
                                                                <option value="1">Punto Pago Facil</option>
                                                                <option value="2">Billetera</option>
                                                                <option value="3">Nuevo Punto</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Cliente</label>
                                                            <select class="custom-select custom-select-m" name="slccliente" id="slccliente" placeholder="Selecione una Opcion">
                                                                <option value="0" selected>Seleccione una Opcion</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Fecha">Fecha</label>
                                                            <input type="date" class="form-control" name="" id="txtfecha">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Latitud">Latitud</label>
                                                            <input type="text" class="form-control" name="" id="txtlatitud">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Longitud">Longitud</label>
                                                            <input type="text" class="form-control" name="" id="txtlongitud">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Ubicacion</label>
                                                            <input type="text" class="form-control" name="" id="txtubicacion">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Ubicacion">Ubicacion</label>
                                                            <input type="text" class="form-control" name="" id="txtubicacion">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for=""><input type="checkbox"  name="" id="txtbanner" value=""> Se Entrego Banner</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for=""><input type="checkbox"  name="" id="txtpunto" value=""> Acepto ser Punto</label>
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
                                								<th></th>
                                								<th></th>
                                								<th></th>
                                							</tfoot>
                                							<tbody>
                                								
                                							</tbody>
                                						</table>
                                					</div>
                                                    <div class="col-md-6">
                                						<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                							<thead style="background-color:#80FA43">
                                                                <th>Opciones</th>
                                								<th>Atendio</th>
                                								<th>Telefono</th>
                                							</thead>
                                							<tfoot>
                                								<th></th>
                                								<th></th>
                                								<th></th>
                                							</tfoot>
                                							<tbody>
                                								
                                							</tbody>
                                						</table>
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
    $(document).ready( function () {
            $('#example1').DataTable();
        } );
   
</script>


</html>
