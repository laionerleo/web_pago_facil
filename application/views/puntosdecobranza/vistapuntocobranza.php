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
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row mb-2">
                                                <div class="col-12 text-muted"><h2>Listado de Visitas a Puntos de Cobranza <a  href="<?=$url?>createvisitapuntosdecobranza"><button class="btn btn-primary">Nuevo</button></a></h2></div>
                                            </div>
                                        </div>
                                    </div>                  
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-12 table-responsive">
                                        <table id="example1" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Cliente</th>
                                                    <th>Punto Visita</th>
                                                    <th>Fecha  </th>  
                                                    <th>Direccion</th>
                                                    <th>¿ Banner ?</th>
                                                    <th>¿ Punto ?</th>
                                                    <th>Descripcion</th>                       
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
                                                            <td><?php echo $key->Direccion ?></td>
                                                            <?php
                                                            if($key->SeEntregoBanner == 1){?>
                                                                <td>Si</td>
                                                            <?php }else{?> <td>No</td> <?php } ?>
                                                            <?php
                                                            if($key->AceptoSerPunto == 1){?>
                                                                <td>Si</td>
                                                            <?php } else{?> <td>No</td> <?php } ?>
                                                            <td><?php echo $key->Descripcion ?></td>
                                                            <td>  
                												<a href="<?=$url?>ConsultarVisita/<?php echo $key->VisitaPuntoCobranza ?>">
                													<button class="btn btn-primary">Consultar</button>
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
