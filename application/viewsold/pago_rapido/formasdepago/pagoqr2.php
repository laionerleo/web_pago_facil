                       
                       
                     <style>
                     .flotante {
    display:scroll;
        position:fixed;
        bottom:320px;
        right:0px;
}

                     </style>
                         <div class="row">
                                
                                <div id="vistaform" class="col-md-8 col-xs-8"  >
                                
                                    <center>
                                    <h4>USTED YA CUENTA CON UN PAGO EN PROCESO </h4>
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
                                                    <div class="col-md-12 col-xs-8">
                                                        <center>
                                                        <img src="data:image/png;base64,<?= @$imagenqr ?>" alt="" id="">
                                                        </center>
                                                        <center>
                                                        <a href="<?= base_url();  ?>es/Descargarqr/<?= @$transaccion  ?> ">Descargar</a>
                                                        </center>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <center>
                                                    <a id="btnayuda" data-toggle="modal" data-target="#exampleModalCenter"><img style="width:25px;height:25px" src="<?= base_url(); ?>application/assets/assets/media/image/informacion.svg" alt=""></a>

                                                    
                                                    <?php if($recarga==20) { ?>
                                                        <button id="btnpagarotrafactura"  class="btn btn-primary "onclick="limpiar()">Comenzar de nuevo</button>
                                                    <?php }else{ ?>
                                                        <input class="btn btn-primary" onclick="facturaspendientes(<?= @$clienteempresa  ?>)" type="button" value="Finalizar ">
                                                    <?php }  ?>
                                                    <input class="btn btn-primary" onclick="anulartransaccion()" type="button" value="Anular Qr ">
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
        $(document).ready(function() {
            // Instrucciones a ejecutar al terminar la carga
          //  cambiarimagen('debito','001');
            $("#confirmarpago").click();        


         
            });
        function anulartransaccion()
        {
            vistaprepararpago()
                /*var trans=codigo;
                var datos= {transaccion:trans };
                var urlajax=$("#url").val()+"anulartransaccion"; 
              
                  $.ajax({                    
                          url: urlajax,
                          data: {datos},
                          type : 'POST',
                          dataType: "json",
                          
                              beforeSend:function( ) {   
                              
                              },                    
                              success:function(response) {
                                console.log(response);
                                
                                
                                 
                              },
                              error: function (data) {
                                console.log(data);
                                  //swal("Mensaje", "Ocurrio un error al procesar la solicitud" , "error");
                                  
                              },               
                              complete:function( ) {
                                  
                              },
                          });  
                          */
            
        }

</script>


