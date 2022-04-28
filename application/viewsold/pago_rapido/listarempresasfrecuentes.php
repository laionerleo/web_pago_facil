<style>
    .custom-switch .custom-control-label::before {
    left: -2.25rem;
    width: 1.75rem;
    pointer-events: all;
    border-radius: .5rem;
}

</style>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="chkperfil" >
                <label class="custom-control-label" for="chkperfil">Mostrar Primero esta pantalla</label>
            </div>
        </div>
    </div>
</div>
<?php   if(count($empresas)>0){        ?>

<div class="form-row">
    <div class="col-md-12 mb-12 table-responsive">
    <center><h4>Empresas mas pagadas</h4></center>
    <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>Nombre  </th>
                                    
                                   
                                </tr>
                                </thead>
                                <tbody>
                                
                                <?php  for ($i=0; $i < count($empresas) ; $i++) { ?>
                                    <tr id="fila-<?= $i ?>" onclick="cambiar_empresa(<?= $empresas[$i]->empresa ?>,'#emp-<?= $i ?>','#fila-<?= $i ?>','<?= $empresas[$i]->cUrl_icon ?>', '<?= $empresas[$i]->cDescripcion ?>'   )" > 
                                    <td   > 
                                        <figure id="emp-<?= $i ?>" class="avatar avatar-sm"  style="background-color: #FFFF;border-color:black" onclick="cambiar_empresa(<?= $empresas[$i]->nEmpresa  ?> , '#emp-<?= $i ?>')" >
                                            <img src="<?= $empresas[$i]->url_icon ?>" class="rounded-circle"
                                                                    alt="avatar">
                                        </figure>
                                    </td>
                                    <td>  <?= $empresas[$i]->descripcion ?></td>
                                    
                                   
                                </tr>
         
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

                                 

<?php   foreach ($empresasaccesodirecto as $key => $value) {  ?>
        <a  onclick="cambiar_empresa(<?= $value->Empresa ?> , '#emp-<?= $key ?>'  ,null,'<?=  $value->Url_Icon ?>', '<?=  $value->Descripcion ?>' )" class='flotante' style=" top:  <?= ( $key +1) *100 ?>px;" href="#" ><img onmouseover="bigImg(this ,  '<?= $value->Descripcion ?>' , <?= $key ?> )" onmouseout="normalImg(this ,'<?= $value->Descripcion ?>' , <?= $key ?> )"  style=" object-fit: contain;  border-radius: 100px;" width="60px"  height="70px"  src='<?= $value->Url_Icon ?>' /> <br> <label id="btnflotante<?= $key ?>"  for=""></label> </a>
<?php } ?>
    
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
    } $(document).ready( function () {
            $('#example1').DataTable();
            if(perfil==1){
                $('#chkperfil').prop('checked', true);
            }
        } );

        //$(document).on('change','input[type="checkbox"]' ,function(e) {
        $('#chkperfil').on("change", function(){
            console.log("ingreso aqui ");
           // alert("leonardo ingreso aqui ");
           
            if(swperfil==1)
            {
                swperfil=0;
                
            }else{
                swperfil=1;
            }
            //alert("perfil:"+swperfil);
            cambiarperfil();
        });

        function cambiarperfil()
        {
            
            var urlajax=$("#url").val()+"/actualizarperfilfrecuente";   
            $.ajax({                    
                    url: urlajax,
                    data: {perfil:swperfil},
                    type : 'POST',
                    dataType: "json",
                    
                        beforeSend:function( ) {   
                            
                        },                    
                        success:function(response) {
                            console.log(response);
                            console.log("succes");                    
                        },
                        error: function (data) {
                            console.log(data.responseText);
                            console.log("error");                    
                        },               
                        complete:function( ) {
                        },
                    });  
        }

        
    </script>

    <?php  }else{

    echo "No hay datos";
}    
    ?>


    
