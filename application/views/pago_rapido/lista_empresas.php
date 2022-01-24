

<?php   if(count($empresas->values)>0){ ?>

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
                                    <tr id="fila-<?= $i ?>" onclick="cambiar_empresa(<?= $empresas->values[$i]->nEmpresa ?>,'#emp-<?= $i ?>','#fila-<?= $i ?>','<?= $empresas->values[$i]->cUrl_icon ?>', '<?= $empresas->values[$i]->cDescripcion ?>'   )" > 
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


   
 
 
<style>
    .flotante {
        display:scroll;
        position:fixed;

        right:0px;
    }
</style>

<?php  for ($i=0; $i < count($empresasaccesodirecto) ; $i++) { 
   if($i<3)
   {
   ?>
        <a  onclick="cambiar_empresa(<?= $empresasaccesodirecto[$i]->empresa ?> , '#emp-<?= $i ?>')" class='flotante' style=" top:  <?= ( $i+1) *100 ?>px;" href="#" ><img onmouseover="bigImg(this ,  '<?= $empresasaccesodirecto[$i]->descripcion ?>' , <?= $i ?> )" onmouseout="normalImg(this ,'<?= $empresasaccesodirecto[$i]->Descripcion ?>' , <?= $i ?> )"  style=" object-fit: contain;  border-radius: 100px;" width="60px"  height="70px"  src='<?= $empresasaccesodirecto[$i]->url_icon ?>' /> <br> <label id="btnflotante<?= $i ?>"  for=""></label> </a>
<?php  }
 }

?>
    
<script>
    
    function bigImg(x , nombreempresa , Position) {
        x.style.height = "80px";
        x.style.width = "90px";
        console.log(nombreempresa);
        $("#btnflotante"+Position).text(nombreempresa);
    }

    function normalImg(x ,nombreempresa , Position ) {
        x.style.height = "60px";
        x.style.width = "70px";
        $("#btnflotante"+Position).text("");
    } 

    $(document).ready( function () {
        $('#example1').DataTable();
    } );
</script><?php  }else{

    echo "No hay datos";
}    
    ?>


    
