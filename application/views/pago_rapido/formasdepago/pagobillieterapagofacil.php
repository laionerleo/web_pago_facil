                       
                       </style>
                       
                       <div class="row">
                                <div class="col-md-8" >
                                    <div class="card">
                                    <center><p>Complete su transacción en su Billetera PagoFacil</p></center>
                                    <div class="card-body text-center ">                 
                                            <h3>Monto</h3>
                                            <p class="text-muted"> <h3> <?= number_format((float)$Monto, 2, '.', '');   ?> </h3> </p>
                                            <div class="form-row" style="    margin-bottom: -13px;">
                                              <div class="col-md-6">
                                                <h3>Cuenta de pago</h3> 
                                              </div>
                                              <div class="col-md-6">
                                                  <p class="text-muted"><?= $numeropago ?></p>

                                              </div>
                                            </div>   
                                            <div class="form-row" style="    margin-bottom: -13px;">
                                              <div class="col-md-6">
                                                <h3>Cliente-Empresa</h3> 
                                              </div>
                                              <div class="col-md-6">
                                                  <p class="text-muted"><?= $clienteempresa ?> </p>

                                              </div>
                                            </div>  
                                            <div class="form-row"  style="    margin-bottom: -13px;">
                                              <div class="col-md-6">
                                                <h3>Periodo</h3> 
                                              </div>
                                              <div class="col-md-6">
                                                  <p class="text-muted"> <?= $Periodo ?> </p>

                                              </div>
                                            </div>  
                                            <div class="form-row" style="">
                                              <div class="col-md-6">
                                                <h3>Empresa</h3> 
                                              </div>
                                              <div class="col-6" style="display: flex;flex-flow: column wrap;  justify-content: center;  align-items: center; "  >  
                                                  <img src="<?=  @$urlimagenempresa  ?>" class="rounded-circle"  alt="...">
                                              </div>
                                            </div> 
                                            <div class="form-row">
                                                  <div class="col-md-12">      
                                                      <textarea name="mensajerecibido" id="mensajerecibido" cols="30" rows="10"></textarea>
                                                  </div>
                                            </div>
                                         
                                           
                                            <div class="form-row">
                                               
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                <center> 
                                                        <button id="bntprepararpago" class="btn btn-primary "onclick="pagarportigomoney()">Pagar</button>
                                                        <button id="btnpagarotrafactura"  class="btn btn-primary "onclick="facturaspendientes(<?= $clienteempresa ?>)">Pagar otra factura</button>
                                                
                                                 </center>
                                                     
                                                </div>
                                            
                                            </div>


                                        
                                        </div>
                                        <hr class="m-0">
                                    </div>
                                  
                                </div>
                               
                            
                                
                                
                            </div>
                   
<!-- begin::footer -->

<!-- begin::modal -->




<script>

    var intervalo;
        function pagarportigomoney()
        {
          
            
                var ci=10;
                var datos= {ci:ci, };
                var urlajax=$("#url").val()+"metodotigomoney"; 
            
                $.ajax({                    
                        url: urlajax,
                        data: {datos},
                        type : 'POST',
                        dataType: "json",
                        
                            beforeSend:function( ) {   
                              $("#mensajerecibido").val("El pago se  a iniciado");
                              texto=$("#mensajerecibido").val();
                              
                              $("#mensajerecibido").val( texto+" \r\n El pago en proceso . espere porfavor");
                            },                    
                            success:function(response) {
                            console.log(response);
                            if(response.tipo==10)
                            {
                                intervalo=setInterval('verificartransaccion('+ response.valor +')',5000);
                                //$("#bntprepararpago").attr("disabled","disabled");
                               // $("#confirmarpago").click();
                                
                            }
                            if(response.tipo==1)
                            {
                              $("#mensajerecibido").val( texto+" \r\n"+response.mensaje);
                                //swal("Mensaje", response.mensaje , "error");
                            
                                //$("#confirmarpago").click();
                            }
                                
                            },
                            error: function (data) {
                                swal("Mensaje", "Ocurrio un error al procesar la solicitud" , "error");
                                
                            },               
                            complete:function( ) {
                                
                            },
                        });  

         
        }

        
      
        function verificartransaccion(codigo){
              var trans=codigo;
                var datos= {transaccion:trans };
                var urlajax=$("#url").val()+"verificartransaccion"; 
            
                $.ajax({                    
                        url: urlajax,
                        data: {datos},
                        type : 'POST',
                        dataType: "json",
                        
                            beforeSend:function( ) {   
                            
                            },                    
                            success:function(response) {
                              console.log(response);
                              if(response.tipo==3)
                              {
                                texto=$("#mensajerecibido").val();
                                $("#mensajerecibido").val( texto+" \r\n"+response.mensaje);
                                  console.log(response);
                              }else{
                                texto=$("#mensajerecibido").val();
                                $("#mensajerecibido").val( texto+" \r\n"+response.mensaje);
                                clearInterval(intervalo);
                                console.log(response);
                              }
                            },
                            error: function (data) {
                              console.log(data);
                                //swal("Mensaje", "Ocurrio un error al procesar la solicitud" , "error");
                                
                            },               
                            complete:function( ) {
                                
                            },
                        });  
          }
  
        $(document).ready(function() {
                    

            });

</script>



 