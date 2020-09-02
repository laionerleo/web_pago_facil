                       
                       
                     <style>
                     .flotante {
    display:scroll;
        position:fixed;
        bottom:320px;
        right:0px;
}

                     </style>
                         <div class="row">
                                <div class="col-md-12" id="vistaboton"  >
                                    <center>
                                        <input  type="button" id="confirmarpago" class="btn btn-primary" data-toggle="modal"  value="elegirentidades" data-target="#elegirempresas">
                                        </center>
                                </div>
                                
                                <div id="vistaform" class="col-md-8 col-xs-8" style="display:none" >
                                    <center>
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6"><h3>Concepto</h3></div>
                                                    <div class="col-md-6 col-xs-6"> <p class="text-muted">Pago a traves de pago Facil  </p></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6"><h3>Monto</h3></div>
                                                    <div class="col-md-6 col-xs-6"> <p class="text-muted">  <?= number_format((float)@$montototal, 2, '.', '');   ?> </p></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6"><h3>Valido hasta </h3></div>
                                                    <div class="col-md-6 col-xs-6"><label id="dateexpiracion"></label></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6"><h3>Bancos con los que intentará pagar  </h3></div>
                                                   <center> 
                                                       <div id="bancoselegidos"></div>
                                                   </center>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-8">
                                                        <center>
                                                            <img id="imagenqr" src="" alt="">
                                                        </center>
                                                        <center>
                                                        <a id="linkdescarga" href="">Descargar</a>
                                                        </center>
                                                    </div>
                                                </div>
                                    </center>
                                </div>
                                
                              
                        </div>

                   
                   
            <a class='flotante' href='#' ><img src='<?= base_url(); ?>application/assets/assets/media/image/informacion.svg'  border="0"/></a>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                              
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="ti-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <p class="card-text">
                                    Felicidades , Generaste exitosamente el código QR para tu pago , imagen a sido descargada <br>
                                    Ahora sigue estos pasos para que tu pago se lleve a cabo


                                </p>
                                <h5 class="card-title">Paso 1</h5>
                                <p class="card-text">Abre la aplicacion movil de tu banco favorito(Bancos de ASOBAN)</p>
                                <h5 class="card-title">Paso 2</h5>
                                <p class="card-text"> Seleccionea la opcion SIMPLE </p>
                                <h5 class="card-title">Paso 3</h5>
                                <p class="card-text">Escanea o descarga la imgen QR que se genero</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>


    <input type="hidden" id="url" name="url" value="<?= $url ?>">
<!-- end::footer -->
<script>
    var codigoservicio="001";
    var entidadesasignadas= new Array(); 
    contador=1;
                                                                            
        var extension="";
        function generarqr()
        {
       
            var urlajax=$("#url").val()+"/generarqr";   
            $.ajax({                    
                    url: urlajax,
                    data: {datos:entidadesasignadas},
                    type : 'POST',
                    dataType: "json",
                    
                        beforeSend:function( ) {   
                            
                        },                    
                        success:function(response) {
                        if(response.tipo==10)
                        {
                            var urlimg=$("#url").val()+"getultimaselegidas";  
                            $("#bancoselegidos").load(urlimg,{id_proceso:0});  
                             var arrayqr=JSON.parse(response.imagenqr);
                            console.log(arrayqr.qrImage);
                            $("#dateexpiracion").append(`<p>  `+arrayqr.expirationDate+ `</p>`);
                            $('#vistaform').show();
                            $('#vistaboton').hide();
                            $('#btncerrar').click();
                            
                            $('#imagenqr').attr('src', `data:image/png;base64,${arrayqr.qrImage}`);
                            $("#linkdescarga").attr("href", response.linkdescarga);
                            //var valFileDownloadPath = $('#imagenqr').attr(src);;
                            //window.open(valFileDownloadPath , '_blank');
                            
                        }
                        if(response.tipo==1)
                        {
                            //swal("Mensaje", response.mensaje , "error");
                            $('#btncerrar').click();
                            alert(response.mensaje);
                            //$("#confirmarpago").click();
                        }
                           
                        },
                        error: function (data) {
                            console.log(data.responseText);
                        },               
                        complete:function( ) {
                        },
                    });  
        }
        function elegirentidad(id,idcheck)
        {
         
                var idaux=id;
                var numero=entidadesasignadas.indexOf(id);
             
                if(numero>=0)
                {
                    contador=contador-1;
                    entidadesasignadas.splice(numero,1);
                    $( idcheck ).prop( "checked", false );
                    $("#row-"+id).css("border-radius", "none");
                    $("#row-"+id).css("border", "none");
                    $("#row-"+id).css("border-color", "none");
                  
                }else{
                    if(contador<=3){
                    contador=contador+1;
                    entidadesasignadas.push(id);
                    $("#row-"+id).css("border-radius", "10px");
                    $("#row-"+id).css("border", "dashed");
                    $("#row-"+id).css("border-color", "solid");
               
                    $(idcheck ).prop( "checked", true );
                    }else{
                        $( idcheck ).prop( "checked", false );
                    }
                }
                console.log(entidadesasignadas);
            
        }
        $(document).ready(function() {
            // Instrucciones a ejecutar al terminar la carga
          //  cambiarimagen('debito','001');
            $("#confirmarpago").click();        
            
            <?php   for ($j=  0  ; $j < count($entidadeselegidas); $j++) { ?>
                $("#row-<?= $entidadeselegidas[$j] ?>").click(); 
            <?php  }?>

         
            });

</script>



<div class="modal fade" id="elegirempresas" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Mensaje</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <i class="ti-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <?php   for ($j=  0  ; $j < count($entidades); $j++) { ?>
                                                                                    
                                                                                    <div class="row"  onclick="elegirentidad(<?= $entidades[$j]->EntidadBancaria  ?> , '#idcheck-<?= $j ?>')" id="row-<?= $entidades[$j]->EntidadBancaria  ?>">
                                                                                        <div class="col-md-3 col-xs-3">
                                                                                            <div class="image">
                                                                                                <a href=""><img style="padding:2px; width:100px; height:50px" src=" <?= $entidades[$j]->UrlImagen  ?>" alt=""></a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs-6">
                                                                                            <h3 class="name">   <?= $entidades[$j]->Nombre  ?></h3>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-xs-2 action">
                                                                                        <input class="checkedleo" onclick="elegirentidad(<?= $entidades[$j]->EntidadBancaria  ?> , '#idcheck-<?= $j ?>')" type="checkbox" id="idcheck-<?= $j ?>" value="1">
                                                                                        <!-- <a id="btnayuda"href="aqui vendra la direcciond e ayuda "  ><img style="width:25px;height:25px" src="<?= base_url(); ?>application/assets/assets/media/image/informacion.svg" alt=""></a> -->
                                                                                        </div>
                                                                                    </div>
                                                                                

                                                                                <?php  } ?>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" id="btncerrar" class="btn btn-secondary" data-dismiss="modal">Close
                                                                        </button>
                                                                        <input type="button"  onclick="generarqr()" class="btn btn-primary" value="Aceptar">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>