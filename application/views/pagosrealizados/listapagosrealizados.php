<?php   if(count($codigoservicio)>0){    ?>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-12 table-responsive"  style="    touch-action: auto;">
                                                <table id="tabla1" class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Codigo</th>
                                                        <th>Alias  </th>
                                                        <th>Estado  </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        <?php  for ($i=0; $i < count($codigoservicio) ; $i++) { ?>
                                                            <?php  if($codigoservicio[$i]->tieneFac==2){ ?>
                                                                <tr id="fila-<?= $i ?>" onclick="mostrarmodal(<?= intval(@$codigoservicio[$i]->codigoClienteEmpresa) ?>,'#cod-<?= $i ?>')" > 
                                                                <?php }else{  ?>
                                                                    <tr id="fila-<?= $i ?>" onclick="notiene()" > 
                                                                <?php   }?>
                                                                <td> 
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


                                        <?php  }else{
                                                        echo "No hay datos";
                                                    }    
                                                ?>
                                                <!-- <script src="<?=  base_url() ?>/application/assets/vendors/bundle.js"></script>
                                                 DataTable -->
                                                <script src="<?=  base_url() ?>/application/assets/vendors/dataTable/datatables.min.js"></script>
  

<script>
    $(document).ready( function () {
    $('#tabla1').DataTable();
} );
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
           
            </div>
            <div class="modal-footer">
                <button type="button" id="btncerraropciones"  class="close" data-dismiss="modal" aria-label="Close">cerrar                                                                 
                </button>
            </div>
        </div>
    </div>
</div>

