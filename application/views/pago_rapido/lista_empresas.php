

<?php   if(count($empresas->values)>0){    ?>
<div class="form-row">
    <div class="col-md-12 mb-12 table-responsive">
    <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>Nombre  </th>
                                    
                                   
                                </tr>
                                </thead>
                                <tbody>
                                
                                <?php  for ($i=0; $i < count($empresas->values) ; $i++) { ?>
                                    <tr id="fila-<?= $i ?>" onclick="cambiar_empresa(<?= $empresas->values[$i]->nEmpresa ?>,'#emp-<?= $i ?>','#fila-<?= $i ?>'   )" > 
                                    <td   > 
                                        <figure id="emp-<?= $i ?>" class="avatar avatar-sm"  style="background-color: #FFFF;border-color:black" onclick="cambiar_empresa(<?= $empresas->values[$i]->nEmpresa  ?> , '#emp-<?= $i ?>')" >
                                            <img src="<?= $empresas->values[$i]->cUrl_icon ?>" class="rounded-circle"
                                                                    alt="avatar">
                                        </figure>
                                    </td>
                                    <td>  <?= $empresas->values[$i]->cDescripcion ?></td>
                                    
                                   
                                </tr>
                                <!--
                                                <figure id="emp-<?= $i ?>" class="avatar avatar-sm"  style="background-color: #FFFF;border-color:black" onclick="cambiar_empresa(<?= $empresas->values[$i]->nEmpresa  ?> , '#emp-<?= $i ?>')" >
                                                            <a href="#" title="" data-toggle="tooltip" >
                                                                <img src="<?= $empresas->values[$i]->cUrl_icon ?>" class="rounded-circle"
                                                                    alt="avatar">
                                                            </a>
                                                </figure>-->
                                <?php }  ?>
                                
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Logo</th>
                                    <th>    Nombre   </th>
                               
                                </tr>
                                </tfoot>
                            </table>

                            </div>
                            </div>


   
 
 

    

    <script>
        $(document).ready( function () {
            $('#example1').DataTable();
        } );
    </script>

    <?php  }else{

    echo "No hay datos";
}    
    ?>


    
