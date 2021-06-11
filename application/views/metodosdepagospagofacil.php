<!doctype html>
<html lang="en">
<?php $this->load->view('theme/head'); ?>

<style>
body{
   overflow-y: hidden;
}
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
    <?php  //  $this->load->view('theme/header'); ?>
    <!-- end::header -->

    <div class="content-wrapper">

        <!-- begin::navigation -->

        <!-- end::navigation -->

        <div class="content-body">

            <div class="content"  style="  padding-left: 20px; padding-top:10px">
                <div class="page-header" style="display:none">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href=index-2.html>Pago Fácil Bolivia</a>
                            </li>
                            <input type="hidden" id="url" value="<?= base_url();   ?>"  >
                            <li class="breadcrumb-item active" aria-current="page"> Métodos de Pago </li>
                        </ol>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                         <Center> <h5>Métodos  de Pago</h5>  </Center>
                         <marquee behavior="scroll" height="300" scrollamount="3" direction="down" >
                     
                             <?php  for ($i=0; $i <  count($metodosdepago); $i++) { ?>
                                    <center>
                                    <img src="<?=  $metodosdepago[$i]->url_icon ?>" width="100" height="50" style="object-fit:contain" alt="<?=  $metodosdepago[$i]->Nombre ?>" />
                                    <br>
                                    <label for=""> <?=  $metodosdepago[$i]->Nombre ?> </label>
                                    </center>
                            <?php  } ?>
                                 <?php  for ($i=0; $i <  count($metodosdepago); $i++) { ?>
                                    <center>
                                    <img src="<?=  $metodosdepago[$i]->url_icon ?>" width="100" height="50" style="object-fit:contain" alt="<?=  $metodosdepago[$i]->Nombre ?>" />
                                    <br>
                                    <label for=""> <?=  $metodosdepago[$i]->Nombre ?> </label>
                                    </center>
                            <?php  } ?>
                                 <?php  for ($i=0; $i <  count($metodosdepago); $i++) { ?>
                                    <center>
                                    <img src="<?=  $metodosdepago[$i]->url_icon ?>" width="100" height="50" style="object-fit:contain" alt="<?=  $metodosdepago[$i]->Nombre ?>" />
                                    <br>
                                    <label for=""> <?=  $metodosdepago[$i]->Nombre ?> </label>
                                    </center>
                            <?php  } ?>
                                 <?php  for ($i=0; $i <  count($metodosdepago); $i++) { ?>
                                    <center>
                                    <img src="<?=  $metodosdepago[$i]->url_icon ?>" width="100" height="50" style="object-fit:contain" alt="<?=  $metodosdepago[$i]->Nombre ?>" />
                                    <br>
                                    <label for=""> <?=  $metodosdepago[$i]->Nombre ?> </label>
                                    </center>
                            <?php  } ?>
                                 <?php  for ($i=0; $i <  count($metodosdepago); $i++) { ?>
                                    <center>
                                    <img src="<?=  $metodosdepago[$i]->url_icon ?>" width="100" height="50" style="object-fit:contain" alt="<?=  $metodosdepago[$i]->Nombre ?>" />
                                    <br>
                                    <label for=""> <?=  $metodosdepago[$i]->Nombre ?> </label>
                                    </center>
                            <?php  } ?>
                            <?php  for ($i=0; $i <  count($metodosdepago); $i++) { ?>
                                    <center>
                                    <img src="<?=  $metodosdepago[$i]->url_icon ?>" width="100" height="50" style="object-fit:contain" alt="<?=  $metodosdepago[$i]->Nombre ?>" />
                                    <br>
                                    <label for=""> <?=  $metodosdepago[$i]->Nombre ?> </label>
                                    </center>
                            <?php  } ?>
                            <?php  for ($i=0; $i <  count($metodosdepago); $i++) { ?>
                                    <center>
                                    <img src="<?=  $metodosdepago[$i]->url_icon ?>" width="100" height="50" style="object-fit:contain" alt="<?=  $metodosdepago[$i]->Nombre ?>" />
                                    <br>
                                    <label for=""> <?=  $metodosdepago[$i]->Nombre ?> </label>
                                    </center>
                            <?php  } ?>
                            
                            <?php  for ($i=0; $i <  count($metodosdepago); $i++) { ?>
                                    <center>
                                    <img src="<?=  $metodosdepago[$i]->url_icon ?>" width="100" height="50" style="object-fit:contain" alt="<?=  $metodosdepago[$i]->Nombre ?>" />
                                    <br>
                                    <label for=""> <?=  $metodosdepago[$i]->Nombre ?> </label>
                                    </center>
                            <?php  } ?>
                            <?php  for ($i=0; $i <  count($metodosdepago); $i++) { ?>
                                    <center>
                                    <img src="<?=  $metodosdepago[$i]->url_icon ?>" width="100" height="50" style="object-fit:contain" alt="<?=  $metodosdepago[$i]->Nombre ?>" />
                                    <br>
                                    <label for=""> <?=  $metodosdepago[$i]->Nombre ?> </label>
                                    </center>
                            <?php  } ?>
                            <?php  for ($i=0; $i <  count($metodosdepago); $i++) { ?>
                                    <center>
                                    <img src="<?=  $metodosdepago[$i]->url_icon ?>" width="100" height="50" style="object-fit:contain" alt="<?=  $metodosdepago[$i]->Nombre ?>" />
                                    <br>
                                    <label for=""> <?=  $metodosdepago[$i]->Nombre ?> </label>
                                    </center>
                            <?php  } ?>
                        </marquee>

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
<script src="<?=  base_url() ?>/application/assets/vendors/slick/slick.min.js"></script>

  
  
  <script>
        
      

  
            </script>
</body>


</html>
