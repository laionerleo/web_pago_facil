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
                            <li class="nav-item" id="li2" style="display:none" >
                                <a class="nav-link" id="proceso-tab" data-toggle="tab" href="#procesobody" role="tab"
                                   aria-controls="profile" aria-selected="false">Proceso de pago </a>
                            </li>
                           
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="comisionbody" role="tabpanel"
                                 aria-labelledby="home-tab">
                                 
                                 <div class="accordion accordion-primary custom-accordion">
                                     <?php for ($i=0; $i < count($rubros); $i++) { ?>
                                        <div class="accordion-row ">
                                            <a href="#" class="accordion-header">
                                                <span><?= $rubros[$i]->nNombre  ?></span>
                                                <i class="accordion-status-icon close fa fa-chevron-up"></i>
                                                <i class="accordion-status-icon open fa fa-chevron-down"></i>
                                            </a>
                                            <div class="accordion-body">
                                                <div class="list-group">
                                                <?php for ($j=0; $j < count($empresas); $j++) { 
                                                        if($empresas[$j]->nTipoEmpresa  == $rubros[$i]->nTipoEmpresa )
                                                        {
                                                    ?>
                                                    <a  onclick="mostrarcomisiones('<?= $empresas[$j]->cDescripcion  ?>')" class="list-group-item list-group-item-action">
                                                    <?= $empresas[$j]->cDescripcion  ?>
                                                    </a>

                                                    <?php   } } ?>

                                                   
                                                </div>

                                            </div>
                                        </div>
                                     <?php   } ?>

                                      
                                </div>

                            </div>
                            <div class="tab-pane fade" id="procesobody" role="tabpanel" aria-labelledby="procesobody">

                              <div class="row">
                                        <div class="col-md-12">
                                            <div class="card" style="height: 100%;">
                                                <div class="card-body text-center m-t-10-minus">
                                                    <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row mb-2">
                                                                <div class="col-12 text-muted"><h2>Arancéles</h2></div>
                                                                
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-6 text-muted">Empresa:</div>
                                                                <div class="col-6"> <label for="" id="nombreempresa" ></label> </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-6 text-muted">Metodo de pago:</div>
                                                                <div class="col-6"><?= @$comisiones->nombreMetodoPago;  ?></div>
                                                            </div>
                                                        
                                                        </div>
                                                   
                                                    </div>

                                                            
                                                                <?php   if(count(@$comisiones->tipoComisionDetalle)>0){  
                                                                    $aux=0;
                                                                    ?>
                                                                <div class="form-row">
                                                                <div class="col-md-12 mb-12 table-responsive">
                                                                    <table id="example1" class="table table-striped table-bordered">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th>Rango en BS</th>
                                                                                            <th>Comision  </th>
                                                                                            <th>Unidad</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>                                                                
                                                                                        <?php  for ($i=0; $i < count($comisiones->tipoComisionDetalle) ; $i++) { ?>
                                                                                            <tr id="fila-<?= $i ?>"  > 
                                                                                            <td   > 
                                                                                            <label for=""><?= @$aux ?> -<?= @$comisiones->tipoComisionDetalle[$i]->hasta   ?></label>
                                                                                            <?php   @$aux=@$comisiones->tipoComisionDetalle[$i]->hasta  ?>
                                                                                            </td>
                                                                                            <td>  <?=  number_format($comisiones->tipoComisionDetalle[$i]->valor, 2) ?></td>
                                                                                            <td>  <?= @$comisiones->tipoComisionDetalle[$i]->unidad->cSimbolo ?></td>
                                                                                        </tr>
                                                                                
                                                                                        <?php }  ?>
                                                                                        
                                                                                        </tbody>
                                                                                        <tfoot>
                                                                                        <tr>
                                                                                        <th>Rango en BS</th>
                                                                                            <th>Comision  </th>
                                                                                            <th>Unidad</th>
                                                                                            

                                                                                        
                                                                                        </tr>
                                                                                        </tfoot>
                                                                                    </table>

                                                                                    </div>
                                                                                    </div>





                                                                                    <input  type="hidden" id="btnmodal" class="btn btn-primary" data-toggle="modal"  value="nada" data-target="#modalopciones">



                                                                    <?php  }else{echo "No hay datos";}    ?>

                                                            
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

   function mostrarcomisiones(nombre)
{
    $("#li2").show();
    $("#nombreempresa").text(nombre);
    $("#li2").show();
    $("#proceso-tab").click(); 
 
}
</script>




</body>


</html>
