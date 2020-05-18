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
                <div class="page-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href=index-2.html>Pago facil Bolivia</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">PAGO RAPIDO</li>
                        </ol>
                    </nav>
                </div>

                <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Pago rapido</h6>
                            <form class="needs-validation" novalidate="">
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        
                                    
                                            <a href="#" title="Cart" class="nav-link" data-toggle="dropdown">
                                                <i data-feather="shopping-bag"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                                <div class="bg-dark p-4 text-center d-flex justify-content-between align-items-center">
                                                    <h5 class="mb-0">Cart</h5>
                                                    <small class="opacity-7">3 products</small>
                                                </div>
                                                <div>
                                                    <div class="list-group list-group-flush">
                                                        <a href="#" class="p-3 list-group-item d-flex">
                                                            <div>
                                                                <figure class="avatar mr-3">
                                                                    <img src="<?=  base_url() ?>/application/assets/assets/media/image/products/product6.png"
                                                                        alt="Canon 4000D 18-55 MM">
                                                                </figure>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                                    Santa cruz 
                                                                    <i title="Close" data-toggle="tooltip"
                                                                    class="hide-show-toggler-item ti-close"></i>
                                                                </p>
                                                                
                                                            </div>
                                                        </a>
                                                        <a href="#" class="p-3 list-group-item d-flex">
                                                            <div>
                                                                <figure class="avatar mr-3">
                                                                    <img src="<?=  base_url() ?>/application/assets/assets/media/image/products/product3.png"
                                                                        alt="pineapple">
                                                                </figure>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                                    Snopy SN-BT96 Pretty
                                                                    <i title="Close" data-toggle="tooltip"
                                                                    class="hide-show-toggler-item ti-close"></i>
                                                                </p>
                                                                <span class="text-muted small">1 X $250</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        
                                     
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        
                                        <select class="form-control form-control-lg">
                                            <option  style="center left; padding-left:20px;"> Tipo Empresa</option>
                                        </select>
                                     
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        
                                        <select class="form-control form-control-lg">
                                            <option  style="center left; padding-left:20px;"> Seleccionar Empresa</option>
                                        </select>
                                     
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        
                                        <select class="form-control form-control-lg">
                                        <option  style="center left; padding-left:20px;" value="" selected disabled hidden> Seleccionar</option>
                                            <option  style="center left; padding-left:20px;"> Codigo Fijo</option>
                                            <option  style="center left; padding-left:20px;"> Cedula de identidad</option>
                                            
                                        </select>
                                     
                                    </div>
                                    <div class="col-md-1 mb-">
                                     <button class="btn btn-primary" type="submit"> Buscar</button>
                                    </div>


                                 
                                </div>
                              
                                
                            </form>







                    </div>
                </div>
                </div>
                </div>
            </div>

            <!-- begin::footer -->
         <?php $this->load->view('theme/footer');  ?>
            <!-- end::footer -->

        </div>

    </div>

</div>
<!-- end::main -->

<!-- Plugin scripts -->
  
  <?php $this->load->view('theme/js');  ?>
</body>


</html>
