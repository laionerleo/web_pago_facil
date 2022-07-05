<!doctype html>
<html lang="en">
<?php $this->load->view('theme/head'); ?>
<style>

.rounded:hover {filter: saturate(180%); -webkit-transform:scale(1.3)}

</style>
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

        <!-- end::navigation -->

        <div class="content-body">

            <div class="content"  style="  padding-left: 20px;">
                <div class="page-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href=index-2.html>Pago Facil Bolivia</a>
                            </li>
                            <input type="hidden" id="url" value="<?= base_url();   ?>"  >
                            <li class="breadcrumb-item active" aria-current="page">Entidades Financieras</li>
                        </ol>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                         <Center> <h1>Como Pagar tu QR</h1>  </Center>
                         <Center> <label for=""> (seleccionar la entidad bancaria con la que desea pagar ) </label>  </Center>
                         
                        <div class="row row-xs">
                            <?php  for ($i=0; $i <  count($entidades); $i++) { ?>

                                <div class="col-lg-3 mb-3 col-sm-4 col-6">
                                <center>
        
                                        <a  data-toggle="modal" data-target="#exampleModalCenter<?=  $i ?>" >
                                            <img class="img-fluid rounded" src="<?=  $entidades[$i]->UrlImagen ?>"  
                                                alt="image">
                                        </a>
                               

                                </center> 

                            </div>

                            <div class="modal fade" id="exampleModalCenter<?=  $i ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Entidad Bancaria </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="ti-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <center> <h2><?=  $entidades[$i]->Nombre ?> </h2> (<?=  $entidades[$i]->Sigla ?>) </center>
                                            <hr>
                                            <div class="row mb-2">
                                                <div class="col-6 text-muted"> <center> Telefono:</center> </div>
                                                <div class="col-6"> <center> <?=  $entidades[$i]->Telefono ?></center></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6 text-muted"> <center>Pagina Web:</center> </div>
                                                <div class="col-6"> <center> <?=  $entidades[$i]->Internet ?></center></div>
                                            </div>
                                            <hr>

                                            <center>Horario de restriccion</center>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <center> <?=  $entidades[$i]->RestriccionDesde ?></center>
                                                        
                                                </div>
                                                <div class="col-md-6">
                                                <center> <?=  $entidades[$i]->RestriccionHasta ?> </center>

                                                </div>
                                            </div>



                                        </div>
                                        <div class="">
                                            <center>
                                            <?php  if(trim($entidades[$i]->ComoPagar ) !=""  ){ ?>
                                                <a  class="btn btn-primary"  target="_blank" href="<?=  $entidades[$i]->ComoPagar ?>">
                                                    Como pagar?    
                                                </a>
                                            <?php }else{?>
                                                <a  class="btn btn-primary" onclick="alert('No existe  enlace ')"  >
                                                    como pagar?
                                                </a>
                                            <?php }?>    


                                            </center>
                                            <br>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php  } ?>
                        
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
<script src="<?=  base_url() ?>/application/assets/vendors/bundle.js"></script>
<script src="<?=  base_url() ?>/application/assets/assets/js/app.min.js"></script>
  
  
  <script>
        
    

  
            </script>
</body>


</html>
