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
                            <div class="card-body text-left" style="    padding-top: revert;"> 
                                <br>
                                <form class="needs-validation" novalidate action="BuscarVisitaFechas" method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row mb-2">
                                                <div class="col-12 text-muted"><h2>Listado de Visitas a Puntos de Cobranza <a  href="<?=$url?>createvisitapuntosdecobranza"><button type="button" class="btn btn-primary">Nuevo</button></a></h2></div>
                                            </div>
                                        </div>
                                        
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                	<div class="input-group">
                                                	</div>
                                                </div>                                               
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">                                           	
                                                	<label for="">desde</label>
                                                	<input type="date" class="form-control" name="dtDesde" placeholder="Buscar Desde..." values="">                                            	
                                                </div>                                               
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">                                            	
                                                	<label for="">hasta</label>
                                                    <input type="date" class="form-control" name="dtHasta" placeholder="Buscar Hasta..." values="" >                                            	
                                                </div>                                               
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">                                            	
                                                    <span class="input-group-btn">
                                                        <label style="color: white;" for="">hasta</label>
                                                    	<button type="submit" class="btn btn-success">Buscar</button>
                                                    </span>                                            	                                               
                                                </div>                                               
                                            </div>
                                       
                                    </div>                  
                                </div>
                                </form>
                                <div class="form-row">
                                    <div class="col-md-12 mb-12 table-responsive">
                                        <table id="example1" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Cliente Propietario</th>
                                                    <th>Tipo de Punto</th>
                                                    <th>Fecha  </th>  
                                                    <th>¿ Banner ?</th>
                                                    <th>¿ Punto ?</th>
                                                    <th>Telefono</th>   
                                                    <th>Correo</th>   
                                                    <th>Opciones</th>
                                                </tr>                            
                                            </thead>
                                            <tbody>                                                                
                                                <?php
                                                    foreach ($visitas as $key) {?>
                                                        <tr>
                                                            <td><?php echo $key->Cliente ?></td>
                                                            <td><?php echo $key->Nombre ?></td>
                                                            <td><?php echo $key->Fecha ?></td>
                                                            <?php
                                                            if($key->SeEntregoBanner == 1){?>
                                                                <td>Si</td>
                                                            <?php }else{?> <td>No</td> <?php } ?>
                                                            <?php
                                                            if($key->AceptoSerPunto == 1){?>
                                                                <td>Si</td>
                                                            <?php } else{?> <td>No</td> <?php } ?>
                                                            <td><?php echo $key->telefono ?></td>
                                                            <td><?php echo $key->correo ?></td>
                                                            <td>  
                												<a href="<?=$url?>ConsultarVisita/<?php echo $key->VisitaPuntoCobranza ?>">
                													<button class="btn btn-primary">Modificar</button>
                												</a>
                											</td>
                                                        </tr>
                                                    <?php }
                                                ?>                                        
                                            </tbody>                        
                                            <tfoot>
                                                <tr>                                                                                                                   
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                                <input  type="hidden" id="btnmodal" class="btn btn-primary" data-toggle="modal"  value="nada" data-target="#modalopciones">                                           
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
