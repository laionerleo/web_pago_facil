<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PagoFacil Bolivia</title>

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="<?=  base_url() ?>/application/assets/assets/media/image/logo-pagofacil.png"/>  -->
    <link rel="shortcut icon" href="https://pagofacil.com.bo/wp-content/uploads/2017/11/favicon.png"/>
    

    <!-- Plugin styles -->
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/bundle.css" type="text/css">

        <!-- Slick -->
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick-theme.css" type="text/css">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/datepicker/daterangepicker.css" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/dataTable/datatables.min.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/assets/css/app.min.css" type="text/css">
    
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick-theme.css" type="text/css">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta content="" name="author">
    <meta name="title" content="QR - PAGOFACIL">
    <meta name="description" content="Mediante este link , usted podra tener su  imagen Qr para poder realizar su respectivo pago" >
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?=  base_url() ?>/application/assets/assets/media/image/codigo-qr.png">
    <meta property="og:image" content="<?=  base_url() ?>/application/assets/assets/media/image/codigo-qr.png">
    <meta property="og:image:secure_url" content="<?=  base_url() ?>/application/assets/assets/media/image/codigo-qr.png">
    <meta property="og:image" itemprop="image" content="<?=  base_url() ?>/application/assets/assets/media/image/codigo-qr.png"> 
    <meta property="og:image:type" content="image/jpg">
     

</head>
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
<script src="<?=  base_url() ?>/application/assets/vendors/bundle.js"></script>
      <!-- App scripts -->
      <script src="<?=  base_url() ?>/application/assets/assets/js/app.min.js"></script>
  
</body>


</html>
