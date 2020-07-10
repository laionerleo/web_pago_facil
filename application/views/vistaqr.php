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
  
    <!-- END: User Menu -->

    <!-- BEGIN: Settings -->
 
   
    <!-- END: Settings -->

</div>
<!-- END: Sidebar Group -->

<!-- begin::main -->
<div class="layout-wrapper">

    <!-- begin::header -->
    <?php  $this->load->view('theme/headeraux'); ?>
    <!-- end::header -->

    <div class="content-wrapper">

        <!-- begin::navigation -->
  
        <!-- end::navigation -->

        <div class="content-body">

            <div class="content" style="    padding-left: 0;">
                <div class="page-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href=index-2.html>QR de transaccion</a>
                            </li>
                       
                            
                        </ol>
                    </nav>
                </div>

                <div class="row">
                 <?php   if(!isset($error))
		            { ?>
                    <div class="col-md-12">
                        <center>
                        <img src="data:image/png;base64,<?= @$imagenqr ?>" alt="" id="">
                        </center>
                        <center>
                            <a href="<?= base_url();  ?>es/Descargarqr/<?= @$transaccion  ?> ">Descargar</a>
                        </center>
                    </div>
                    <?php }else{?>
                        <div class="col-md-12 error-page bg-white">
                            <center>
                            
                            <h4 class="mb-0 text-muted font-weight-normal"> No Existe</h4>
                                <div>
                                    <span class="error-page-item font-weight-bold">Q</span>
                                    <span class="error-page-item font-weight-bold">r</span>
                                </div>
                            </center>
                        </div>
                            <?php }?>
                </div>
            </div>

            <!-- begin::footer -->
        
            <!-- end::footer -->

        </div>

    </div>

</div>
<!-- end::main -->

<!-- Plugin scripts -->
  
  <?php $this->load->view('theme/js');  ?>
</body>


</html>
