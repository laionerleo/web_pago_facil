<div class="row">
    <div class="col-md-8" >
    <div class="card" style="margin-bottom: 1.2rem;">
              <center>
                <img id="baner" src="<?= $urlimagenbanner; ?>"  style =""class="card-img-top" alt="...">
              </center>
  
              <div class="card-body text-center m-t-70-minus">   
              
                  <figure class="avatar avatar-m m-b-5">
                  </figure>
                    <br>
                   
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

                    <div class="form-row">
                      <div class="col-md-6 col-12 titulos">
                        <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b>  <?=  $EtiquetaBilletera ?> :  </b></label>
                      </div>
                      <div class="col-md-3">
                          <div class="controls" style="    text-align: justify;">
                              <input class="form-control" type="number"  name="tnNumeroTigoMoney" id="tnNumeroTigoMoney"    value="<?= $numeropago ?>" class="validate[required]"  />
                          </div>


                      </div>


                      
                    </div>  

                      
                    <div class="form-row" id="divtransaccion" style="padding-bottom: 5px; display:none ">
                          
                            <div class="col-md-6 col-12 titulos">
                                <label for="transaccion" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b>Transacción : </b></label>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="controls" style="    text-align: justify;">

                                <input class="form-control" type="text" name="lcTransaccion" placeholder="" id="lcTransaccion" value="" readonly >

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
                    
                    <div class="form-row">
                          <div class="col-md-12" style="display:none">      
                              <textarea name="mensajerecibido" id="mensajerecibido" cols="30" rows="10"></textarea>
                          </div>
                    </div>
                  
    
                 

                
                </div>
                <hr class="m-0">
            </div>
          
        </div>
      
    </div>
</div>

<div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                        <div class="form-row">
                        
                                <div class="col-md-6 col-6 col-sm-4">
                                <center  class="botones" > 
                                    <button id="btncarga"  class="btn btn-primary" type="button" style="display:none" disabled>
                                            <span class="spinner-border spinner-border-sm mr-2" role="status"
                                                  aria-hidden="true"></span>
                                                  Procesando...
                                    </button> 
                                    <button id="bntprepararpago" class="btn btn-primary "onclick="pagarportigomoney()">Pagar</button> 
                                </center>
                                <input  type="hidden" id="confirmarpago" class="btn btn-primary" data-toggle="modal" data-target="#modalconfirmarpago">
                              </div>
                              <div class="col-md-6 col-6 col-sm-4">
                                <center>
                                 
                                 <?php if($recarga==20) { ?>
                                  <button id="btnpagarotrafactura"  class="btn btn-outline-primary" onclick="limpiar()">Comenzar de nuevo</button>
                                <?php }else{ ?>
                                  <button id="btnpagarotrafactura"  class="btn btn-outline-primary" onclick="facturaspendientes(<?= $clienteempresa ?>)">Pagar otra factura</button>  
                                <?php }  ?>
                                 
                                 
                                 
                                 
                                 </center>
                                
                              </div>
                           
                          </div>
                      </div>
                    </div>
                </div>
              </div>         
<!-- begin::footer -->

<!-- begin::modal -->




<script>

      var intervalo;
      var intervalorelog;
      var goAjax; 
        function pagarportigomoney()
        {
          var tnNumeroTigoMoney=$('#tnNumeroTigoMoney').val();
            
          if(tnNumeroTigoMoney.length >0 &&  (/^\d{8}$/.test(tnNumeroTigoMoney))   )
          {
            valido("#tnNumeroTigoMoney");
            var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");

              var datos= {tnNumeroTigoMoney:tnNumeroTigoMoney, tnIdentificarPestaña:tnIdentificarPestaña  };
              var urlajax=$("#url").val()+"metodotigomoney"; 
          
              $.ajax({                    
                  url: urlajax,
                  data: {datos},
                  type : 'POST',
                  dataType: "json",
                  
                      beforeSend:function( ) {   
                          display = document.querySelector('#time');
                          Relog(<?=  $tiempo ?>, display);
                          $("#btncarga").show();
                          $("#bntprepararpago").hide();
                          //  $("#mensajerecibido").val("El pago se  a iniciado");
                          //texto=$("#mensajerecibido").val();
                          //$("#mensajerecibido").val( texto+" \r\n El pago en proceso . espere porfavor");
                      },                    
                      success:function(response) {
                          console.log(response);
                          console.log(response.valor);
                          if(response.tipo==10)
                          {
                              intervalo=setInterval('verificartransaccion('+ response.valor +')',6000);
                              console.log("valor del intervalo ="+intervalo);
                          }
                          if(response.tipo==1)
                          {
                            clearInterval(intervalorelog);
                            $("#time").empty();
                            $("#btncarga").hide();
                            $("#bntprepararpago").show();
                            swal("Error", response.mensaje , "error");     
                          }
                          
                      },
                      error: function (data) {
                          swal("Mensaje", "Ocurrio un error al procesar la solicitud" , "error");  
                      },               
                      complete:function( ) {
                          
                      },
                });
          }else{
            var datosfaltantes="";

            if($('#tnNumeroTigoMoney').val()== 0   || $('#tnNumeroTigoMoney').val().length< 7 ||  !(/^\d{8}$/.test(tnNumeroTigoMoney))     )
            {
                datosfaltantes=datosfaltantes+"Numero TigoMoney no valido   , ";
                error("#tnNumeroTigoMoney") ;
            }else{
                valido("#tnNumeroTigoMoney");
            }

            swal("Falta ", datosfaltantes , "error");

          }  
}

        
      
        function verificartransaccion(codigo){
              var trans=codigo;
              var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
                var datos= {transaccion:trans ,tnIdentificarPestaña:tnIdentificarPestaña };
                var urlajax=$("#url").val()+"verificartransaccion"; 
                if(goAjax!=null)
                {
                  console.log(goAjax);
                        console.log(goAjax.status ); 
                }
          
               
                goAjax= $.ajax({                    
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

                                }
                                if(response.tipo==1)
                                {
                                    clearInterval(intervalo);
                                    clearInterval(intervalorelog);
                                    $("#time").empty();
                                    console.log(response);
                                    swal("Error", response.mensaje , "error");
                                    $("#btncarga").hide();
                                    $("#bntprepararpago").show();
                                }
                                if(response.tipo==0)
                                {
                                  clearInterval(intervalo);
                                  clearInterval(intervalorelog);
                                  $("#time").empty();
                                  
                                  swal("Pago exitoso",response.mensaje , "success");  
                                  $("#btncarga").hide();
                                  $("#bntprepararpago").show();

                                }

                            },
                            error: function (data) {
                              console.log(data);  
                            },               
                            complete:function( ) {
                                
                            },
                        }); 
                        

          }
  
        $(document).ready(function() {
                    

            });

      function Relog(duration, display) {
            var timer = duration, minutes, seconds;
            clearInterval(intervalorelog);
            intervalorelog=setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    ///ejecutar metodo y cancelar el timer timer = duration;
                    clearInterval(intervalorelog);
                    
                }
            }, 1000);
        }


</script>



 