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
                                <a class="nav-link" id="facturacion-tab" data-toggle="tab" href="#facturacionbody" role="tab"
                                   aria-controls="contact" aria-selected="false">Datos de Facturacion</a>
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
                                 <?php   if(count($codigoservicio)>0){    ?>
                                        <div class="form-row">
                                        <div class="col-md-12 mb-12 table-responsive">
                                        <table id="example1" class="table table-striped table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th>Codigo</th>
                                                                    <th>Alias  </th>
                                                                    <th>Estado  </th>
                                                                    

                                                                    
                                                                    
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                
                                                                <?php  for ($i=0; $i < count($codigoservicio) ; $i++) { ?>
                                                                    <tr id="fila-<?= $i ?>" onclick="mostrarmodal(<?= intval(@$codigoservicio[$i]->codigoClienteEmpresa) ?>,'#cod-<?= $i ?>')" > 
                                                                    <td   > 
                                                                    <label for=""><?= @$codigoservicio[$i]->codigoClienteEmpresa ?></label>
                                                                    </td>
                                                                    <td>  <?= @$codigoservicio[$i]->alias ?></td>
                                                                    <td>
                                                                        <?php  if($codigoservicio[$i]->tieneFac==2){ ?>
                                                                        <label for="">pagada</label>
                                                                        <?php }else{  ?>
                                                                            <label for=""> no pagada</label>
                                                                        <?php   }?>
                                                                    </td>

                                                                    
                                                                    
                                                                </tr>
                                                        
                                                                <?php }  ?>
                                                                
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                       <th>Codigo</th>
                                                                    <th>Alias  </th>
                                                                    <th>Estado  </th>
                                                                    

                                                                
                                                                </tr>
                                                                </tfoot>
                                                            </table>

                                                            </div>
                                                            </div>





                                                            <input  type="hidden" id="btnmodal" class="btn btn-primary" data-toggle="modal"  value="nada" data-target="#modalopciones">


                                        <script>
                                                                                $(document).ready( function () {
                                                                                    $('#example1').DataTable();
                                                                                } );
                                                                                </script>

                                            <?php  }else{

                                            echo "No hay datos";
                                        }    
                                            ?>


    

                            </div>
                            <div class="tab-pane fade" id="facturaspagadasbody" role="tabpanel" aria-labelledby="facturaspagadasbody">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="facturacionbody" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
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
<!-- Plugin scripts -->
<script>
function mostrarmodal(codigo,idfila)
   {
       console.log(codigo);
    $("#btnmodal").click();
    $("#codigocliente").val(codigo);
    

   }

   function facturaspagadas()
{
    var codigocliente= $("#codigocliente").val();
    var codigoempresa=$("#codigoempresa").val();
    var datos= {codigocliente:codigocliente , codigoempresa:codigoempresa };
    var urlajax=$("#url").val()+"get_facturaspagadas";  
    $("#li2").show();
    $("#btncerrar").click();
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
                                                                   <input class="btn btn-primary" type="button" value="Pagar Facturas">
                                                                   <input onclick="facturaspagadas()" class="btn btn-primary" type="button" value="Ver facturas pagadas">
                                                                   <input type="hidden" name="codigocliente" id="codigocliente">
                                                                   <input type="hidden" name="codigoempresa" id="codigoempresa"  value="<?php echo @$empresa ?>">
                                                                   
                                                                      
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" id="btncerrar"  class="close" data-dismiss="modal" aria-label="Close">cerrar                                                                 
                                                                        </button>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


</body>


</html>
