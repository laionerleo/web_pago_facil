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
                                <a class="nav-link active" id="inicio-tab"  data-toggle="tab" href="#iniciobody" role="tab"
                                   aria-controls="home" aria-selected="true">Codigos de servicio</a>
                            </li>
                            <li class="nav-item" id="li2" style="display:none" >
                                <a class="nav-link" id="facturaspagadas-tab" data-toggle="tab" href="#facturaspagadasbody" role="tab"
                                   aria-controls="profile" aria-selected="false">Facturas Pagadas </a>
                            </li>
                            <li class="nav-item" id="li3" style="display:none">
                                <a class="nav-link" id="vysorpdf-tab" data-toggle="tab" href="#vysorpdfbody" role="tab"
                                   aria-controls="contact" aria-selected="false">PDF</a>
                            </li>
                            <li class="nav-item" id="li4" style="display:none" >
                                <a class="nav-link" id="confirmacion-tab" data-toggle="tab" href="#confirmacionbody" role="tab"
                                   aria-controls="contact" aria-selected="false">Verificacion de Pago</a>
                            </li>
                            <li class="nav-item" id="li5" style="display:none" > 
                                <a class="nav-link" id="prepararpago-tab" data-toggle="tab" href="#prepararpagobody" role="tab"
                                   aria-controls="contact" aria-selected="false">Procesar Pago </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="iniciobody" role="tabpanel"
                                 aria-labelledby="home-tab">
                                 <div id="listapagosrealizados">
                                    
                                </div>
                            </div>
                            <div class="tab-pane fade" id="facturaspagadasbody" role="tabpanel" aria-labelledby="facturaspagadasbody">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="vysorpdfbody" role="tabpanel" aria-labelledby="contact-tab" style="height:500px"  >
                            <div class="row">
                                     
                                        
                                        




                                
                            </div>
                            <div class="tab-pane fade" id="facturacionbody" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="confirmacionbody" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="prepararpagobody" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>                     
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
<input type="hidden" name="codigocliente" id="codigocliente">
<input type="hidden" name="codigoempresa" id="codigoempresa"  value="<?php echo @$empresa ?>">
            
                
<!-- Plugin scripts -->
<script>
$(document).ready( function () {
   // $('#tabla1').DataTable();
   listapagosrealizados();
} );

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

    function listapagosrealizados()
{
    $("#listapagosrealizados").empty();
    $("#listapagosrealizados").append(`<div class="d-flex justify-content-center">
                                <div class="spinner-border" style="width: 5rem; height: 5rem;"  role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <br>
                            `);
    var codigoempresa=$("#codigoempresa").val();
    
    var urlajax=$("#url").val()+"listapagosrealizados";  
   // $("#waitLoading").fadeIn(1000);
    $("#listapagosrealizados").load(urlajax  ,{ Empresa: codigoempresa} );   
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

</body>


</html>
