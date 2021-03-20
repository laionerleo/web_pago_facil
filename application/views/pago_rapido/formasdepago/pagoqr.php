<style>
                     .flotante {
    display:scroll;
        position:fixed;
        bottom:320px;
        right:0px;
}

                     </style>

<div class="col-md-12"  style="display:none"  >
    <center>
        <input  type="button" id="confirmarpago" class="btn btn-primary" data-toggle="modal"  value="elegirentidades" data-target="#elegirempresas">
    </center>
</div>
                
                                     <div class="row">
                                <div class="col-md-8" >
                                <div class="card" style="margin-bottom: 1.2rem;">
                                        <img id="baner" src="<?= $urlimagenbanner   ?>" class="card-img-top" alt="...">
                                        <div class="card-body text-center">
                                        <div class="form-row" style="padding-bottom: 5px;">
                          
                                                <div class="col-md-6 col-12 titulos">
                                                    <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Monto  ( <?= @$Simbolo  ?>): </b></label>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="controls" style="    text-align: justify;">
                                                    <input class="form-control" readonly type="text" style="text-align: end;"  value="<?= number_format((float)$montototal, 2, '.', '');   ?>  " >
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="form-row" style="padding-bottom: 5px;">
                                                <div class="col-md-6 col-12 titulos">
                                                    <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Periodo </b></label>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="controls" style="    text-align: justify;">
                                                    <input class="form-control" readonly type="text" style="text-align: end;"  value="<?= $Periodo ?> " >
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                     
                                          <div class="form-row">
                                            <div class="col-md-12 col-6" >
                                                <center>
                                                    <h2 id="time"></h2>
                                                </center>
                                            </div>
                                            </div>
                                            
                                        <div id="vistaform" style="display:none" >
                                                        <div class="form-row" style="padding-bottom: 5px;">
                                                            <div class="col-md-6 col-12 titulos">
                                                                <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Valido hasta </b></label>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="controls" style="    text-align: justify;">
                                                                <input class="form-control" id="dateexpiracion" readonly type="text"   value="" >
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                
                                                        
                                                        <center> 
                                                            <div id="bancoselegidos"></div>
                                                        
                                                        
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
                                     
                                    </div>
                                  
                                </div>
                        </div>


                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                 

                                                
                                                
                                                <div class="col-md-3 col-6 col-sm-4">
                                                    <center>
                                                    <?php if($recarga==20) { ?>
                                                        <button id="btnpagarotrafactura"  class="btn btn-primary "onclick="limpiar()">Comenzar de nuevo</button>
                                                    <?php }else{ ?>
                                                        <input class="btn btn-primary" onclick="facturaspendientes(<?= @$clienteempresa  ?>)" type="button" value="Finalizar ">
                                                    <?php }  ?>
                                                    
                                                     </center>                                                     
                                                </div>
                                                <div class="col-md-4 col-6 col-sm-4">
                                                    <center class="botones">
                                                    
                                                        <button id="bntprepararpago" class="btn btn-primary "  data-toggle="modal"  value="elegirentidades" data-target="#elegirempresas">Generar Qr </button>
                                                        <button id="bntconsultarpago" style="display:none" onclick="verificacionpagoqr()" class="btn btn-primary " >Consultar  Qr </button>
                                                        <button id="btncargaconsulta"  class="btn btn-primary" type="button" style="display:none" disabled>
                                                            <span class="spinner-border spinner-border-sm mr-2" role="status"
                                                                    aria-hidden="true"></span>
                                                                    Procesando...
                                                        </button> 
                                                        
                                                     </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                    <Label>Pagos con QR</Label>
                                </div>
                                <div class="modal-body">
                                <p class="card-text">
                                    Felicidades , Generaste exitosamente el código QR para tu pago , <br>
                                    Ahora sigue estos pasos para que tu pago se lleve a cabo                                </p>
                                <h5 class="card-title" style="margin-bottom: 0px;"  >Paso 1</h5>
                                <p class="card-text">Abre la aplicación movil de tu banco favorito(Bancos de ASOBAN)</p>
                                <h5 class="card-title" style="margin-bottom: 0px;" >Paso 2</h5>
                                <p class="card-text"> Selecciona la opcion SIMPLE </p>
                                <h5 class="card-title" style="margin-bottom: 0px;">Paso 3</h5>
                                <p class="card-text">Escanea o descarga la imagen QR que se generó</p>
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
    var gntransaccion;
    contador=1;
                                                                            
        var extension="";
        function generarqr()
        {
       
            var urlajax=$("#url").val()+"/generarqr";   
            $.ajax({                    
                    url: urlajax,
                    data: {datos:entidadesasignadas},
                    type : 'POST',
                    cache: false,
                    dataType: "json",
                    
                        beforeSend:function( ) {   
                            $('#btngenerarqr').hide();
                            $('#btncarga').show();
                            
                        },                    
                        success:function(response) {
                        if(response.tipo==10)
                        {
                            var urlimg=$("#url").val()+"getultimaselegidas";  
                            $("#bancoselegidos").load(urlimg,{id_proceso:0});  
                             var arrayqr=JSON.parse(response.imagenqr);
                            console.log(arrayqr.qrImage);
                            $("#dateexpiracion").val(arrayqr.expirationDate);
                            $('#vistaform').show();
                            $("#elegirempresas").modal('toggle');
                            $('.modal-backdrop').remove();
                            $('#bntprepararpago').hide();
                            $('#bntconsultarpago').show();
                            $('#imagenqr').attr('src', `data:image/png;base64,${arrayqr.qrImage}`);
                            $("#linkdescarga").attr("href", response.linkdescarga);
                            gntransaccion=response.tnTransaccion;
                        }
                        if(response.tipo==1)
                        {
                            swal("Error ", response.mensaje , "error");
                        }
                        },
                        error: function (data) {
                            $("#elegirempresas").modal('toggle');
                            $('.modal-backdrop').remove();
                            swal("Error ", data.responseText , "error");
                        },               
                        complete:function( ) {
                            $('#btngenerarqr').show();
                            
                            $('#btncarga').hide();
                        },
                    });  
        }


        function verificacionpagoqr()
        {
            var tnTransaccion=gntransaccion;
            var urlajax="<?= base_url(); ?>es"+"/verificarqr";  
            var datos= {tnTransaccion:tnTransaccion }; 
            $.ajax({                    
                    url: urlajax,
                    data: {datos} , 
                    type : 'POST',
                    dataType: "json",
                                    
                    beforeSend:function( ) {   
                    //   $("#btncarga").show();
                    $("#btncargaconsulta").show();
                    $('#bntconsultarpago').hide();
                    },                    
                    success:function(response) {
                        if(response.tipo==10)
                        {   
                            if(response.Estado==1)
                            {
                                swal("Consulta Qr", "El  Pago esta Pendiente", "info");
                            }
                            if(response.Estado==2)
                            {
                                swal("Consulta Qr", "El Pago se a realizado con exito", "succes");
                            }
                            if(response.Estado==4)
                            {
                                swal("Consulta Qr", "El pago esta Anulado", "info");               // si entra aqui significa que ue exitodo el pago asi que debo finilizarlo
                            
                            }
                            if(response.Estado==6)
                            {
                                swal("Consulta Qr", "El pago paso a modo de prueba ", "info");               // si entra aqui significa que ue exitodo el pago asi que debo finilizarlo
                            }
                        }else{
                            swal("Error", response.mensaje,  "error");
                        }
                    },
                error: function (data) {
                    console.log(data.responseText);
                },               
                complete:function( ) {
                    $("#btncargaconsulta").hide();
                    $('#bntconsultarpago').show();
                    //var gnNumeroTransaccion,gnSwVerificacionQr;
                
                    
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
                  //  $( idcheck ).prop( "checked", false );
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
               
                    //$(idcheck ).prop( "checked", true );
                    }else{
                       $( idcheck ).prop( "checked", false );
                    }
                }
                console.log(entidadesasignadas);
            
        }
        $(document).ready(function() {
            // Instrucciones a ejecutar al terminar la carga
          //  cambiarimagen('debito','001');
         //   $("#confirmarpago").click();        
            
            <?php   for ($j=  0  ; $j < count($entidadeselegidas); $j++) { ?>
                $("#idcheck-<?= $entidadeselegidas[$j] ?>").click(); 
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
                            
                            <div class="row"  id="row-<?= $entidades[$j]->EntidadBancaria  ?>">
                                <div class="col-md-3 col-xs-3 col-4">
                                    <div class="image">
                                        <img style="padding:2px; width:100px; height:50px" src=" <?= $entidades[$j]->UrlImagen  ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-6 col-6">
                                    <h3 class="name">   <?= $entidades[$j]->Nombre  ?></h3>
                                </div>
                                <div class="col-md-3 col-xs-2  col-2 action">
                                <input class="checkedleo"  onclick="elegirentidad(<?= $entidades[$j]->EntidadBancaria  ?> , '#idcheck-<?= $j ?>')" type="checkbox" id="idcheck-<?= $j ?>" value="1">
                                <!-- <a id="btnayuda"href="aqui vendra la direcciond e ayuda "  ><img style="width:25px;height:25px" src="<?= base_url(); ?>application/assets/assets/media/image/informacion.svg" alt=""></a> -->
                                </div>
                            </div>
                        

                        <?php  } ?>
            </div>
            <div class="modal-footer">
                <button type="button" id="btncerrar" class="btn btn-secondary" data-dismiss="modal">Cerrar
                </button>
                <button id="btncarga"  class="btn btn-primary" type="button" style="display:none" disabled>
                        <span class="spinner-border spinner-border-sm mr-2" role="status"
                            aria-hidden="true"></span>
                            Procesando...
                </button> 
                <input type="button" id="btngenerarqr"  onclick="generarqr()" class="btn btn-primary" value="Aceptar">
            </div>
        </div>
    </div>
</div>

                                                       