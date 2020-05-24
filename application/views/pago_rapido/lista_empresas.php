

<?php   if(count($empresas->values)>0){?>
    <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Opcion</th>
                                   
                                </tr>
                                </thead>
                                <tbody>
                                
                                <?php  for ($i=0; $i < count($empresas->values) ; $i++) { ?>
                                    <tr>
                                    <td> 
                                        <!-- <figure id="emp-<?= $i ?>" class="avatar avatar-sm"  style="background-color: #FFFF;border-color:black" onclick="cambiar_empresa(<?= $empresas->values[$i]->nEmpresa  ?> , '#emp-<?= $i ?>')" >
                                            <img src="<?= $empresas->values[$i]->cUrl_icon ?>" class="rounded-circle"
                                                                    alt="avatar">
                                        </figure>-->
                                    </td>
                                    <td><?= $empresas->values[$i]->cDescripcion ?></td>
                                    <td>Boton</td>
                                   
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
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Opcion</th>
                               
                                </tr>
                                </tfoot>
                            </table>




   
 
 

    

    <script>
        $(document).ready( function () {
            $('#example1').DataTable();
        } );
    </script>

    <?php  }else{

    echo "No hay datos";
}    
    ?>


    
