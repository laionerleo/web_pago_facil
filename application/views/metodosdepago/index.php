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
        <input type="hidden" id="url"  value="<?= $url ?>">
        <div class="content-body" id="vista_general"  >
        

        <div class="content" >
        <div class="page-header justify-content-between">
  
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                          <div class="card-body">
                             
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item" id="li1"  >
                                <a class="nav-link active" id="comision-tab"  data-toggle="tab" href="#comisionbody" role="tab"
                                   aria-controls="home" aria-selected="true">Comision </a>
                            </li>
                            <li class="nav-item" id="li2" >
                                <a class="nav-link" id="proceso-tab" data-toggle="tab" href="#procesobody" role="tab"
                                   aria-controls="profile" aria-selected="false">Proceso de pago </a>
                            </li>
                           
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="comisionbody" role="tabpanel"
                                 aria-labelledby="home-tab">
                                 <p>vista comision</p>

                            </div>
                            <div class="tab-pane fade" id="procesobody" role="tabpanel" aria-labelledby="procesobody">

                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>

                                <p>vista proceso </p>
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
<?php $this->load->view('theme/js');  ?>
<!-- Plugin scripts -->
<script>
function mostrarmodal(codigo,idfila)
   {
       console.log(codigo);
    $("#btnmodal").click();
    $("#codigocliente").val(codigo);
    

   }

    function notiene()
    {
        alert('el usuario no cuenta con facturas pagadas');
    }

   function facturaspagadas()
{
    var codigocliente= $("#codigocliente").val();
    var codigoempresa=$("#codigoempresa").val();
    var datos= {codigocliente:codigocliente , codigoempresa:codigoempresa };
    var urlajax=$("#url").val()+"get_facturaspagadas";  
    $("#li2").show();
    $("#btncerraropciones").click();
    $("#facturaspagadasbody").load(urlajax,{datos});  
    $("#facturaspagadas-tab").click(); 
  
   
     
}
</script>
<div class="modal fade" id="modalopciones" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Elija una opcion</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <i class="ti-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    <!-- <input class="btn btn-primary" type="button" value="Pagar Facturas">  -->
                                                                   <input onclick="facturaspagadas()" class="btn btn-primary" type="button" value="Ver facturas pagadas">
                                                                   <input type="hidden" name="codigocliente" id="codigocliente">
                                                                   <input type="hidden" name="codigoempresa" id="codigoempresa"  value="<?php echo @$empresa ?>">
                                                                   
                                                                      
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" id="btncerraropciones"  class="close" data-dismiss="modal" aria-label="Close">cerrar                                                                 
                                                                        </button>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


</body>


</html>
