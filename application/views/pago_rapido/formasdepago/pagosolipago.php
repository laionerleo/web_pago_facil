<style>
@media
  only screen 
    and (max-width: 760px) {
    .tamanoselect{
    width: 119%
    }
    .botones{
        text-align: center;
    }
    .titulos{
        text-align: left;

    }
    
}

@media screen and (min-width: 770px) {
    .tamanoselect{
    width: 60%;
    }
    .botones{
        
        text-align: left;
    }
    .titulos{
        
        text-align: right;
     
    }
}

</style>                   
                       
                                        <div class="row">
      <div class="col-md-8" id="vistaformulariolinkser" >
      <div class="card" style="margin-bottom: 1.2rem;">
              <center>
                <img id="baner" src="<?= $urlimagenbanner; ?>"  style =""class="card-img-top" alt="...">
              </center>

              <div class="card-body text-center m-t-70-minus">   
              
              <figure class="avatar avatar-m m-b-5">
              </figure>
                <br>
               
                <div class="form-row" style="padding-bottom: 5px;">
                      
                        <div class="col-md-4 col-12 titulos">
                            <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Monto  ( <?= @$Simbolo  ?>): </b></label>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="controls" style="    text-align: justify;">
                            <input class="form-control" readonly type="text"  value="<?= number_format((float)$montototal, 2, '.', '');   ?>  " >
                            </div>
                            
                        </div>
                </div>
                     <!--   Inicio tipo CI -->
                     <div class="form-row" style="padding-bottom: 5px;">
                        <div class="col-md-4 col-12 titulos">
                        <label for="inpci"> <b> Tipo Ci : </b></label>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="row">
                                <div class="form-group col-md-4 col-6">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio" name="customRadio"  onclick="ocultar()" class="custom-control-input"
                                            checked>
                                        <label class="custom-control-label" for="customRadio">Normal</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-6">
                                    <div class="custom-control custom-radio custom-checkbox-secondary">
                                        <input type="radio" id="customRadio1" name="customRadio"
                                            class="custom-control-input"  onclick="mostrar()">
                                        <label class="custom-control-label" for="customRadio1">Duplicado</label>
                                    </div>
                                </div> 
                            </div> 
                            
                        </div>
                </div>
            <!--   Final tipo CI -->
               
                <!--   NRO CI -->
                <div class="form-row" style="padding-bottom: 5px;">
                  <div class="col-md-4 col-12 titulos " >
                  <label for="inpci"> <b>Nro Ci : </b></label>
                  </div>
                  <div class="col-md-6 col-12">
                      <div class="row">
                      <div class="col-md-4 mb-3 col-8" >
                              <input class="form-control" type="number" min="0" name="inpci" placeholder="CI" id="inpci" value="<?=  $_SESSION['cinit'] ?>" >
                          </div>
                          <div class="col-md-4 mb-3 col-4 " id="divcomplemento" style="display:none" >
                              <input   class="form-control" type="text" name="inpcomplemento"  id="inpcomplemento" value="" placeholder="Complemento" >
                          </div>
                          <div class="col-md-4 mb-3 col-4" >
                              <select class="custom-select custom-select-m" name="slcext" id="slcext">
                                  <option value="0" selected>Extensión</option>
                                  <option value="SC">SC</option>
                                  <option value="BE">BE</option>
                                  <option value="CB">CB</option>
                                  <option value="TJ">TJ</option>
                                  <option value="PA">PA</option>
                                  <option value="LP">LP</option>
                                  <option value="PT">PT</option>
                                  <option value="OR">OR</option>
                                  <option value="CH">CH</option>
                              </select>
                          </div>
                          
                      </div> 
                      
                  </div>
          </div>
          <!--   NRO CI --> 

                <div class="form-row">
                  <div class="col-md-4 col-12 titulos">
                    <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b>Numero Soli :</b></label>
                  </div>
                  <div class="col-md-2">
                      <div class="controls" style="    text-align: justify;">
                          <input class="form-control" type="text"  name="inpnumbersoli" id="inpnumbersoli"    value="<?= $numeropago ?>" class="validate[required]"  />
                      </div>

                      
                      <p class="text-muted"> <h3>  </h3> </p>

                  </div>
                </div>  
                


                <div class="form-row" id="divtransaccion" style="padding-bottom: 5px; display:none ">
                          <div class="col-md-4 col-2" style="text-align: right;">
                          
                          <label for="inpci"  style="margin-bottom: 0.2rem;"> <b>Transacción : </b></label>
                          
                          </div>
                          <div class="col-md-6 col-6">
                              <div class="controls"  style="    text-align: justify;">
                                  <input class="form-control" type="text" name="lcTransaccion" placeholder="" id="lcTransaccion" value="" readonly >
                              </div>
                              
                          </div>
                  </div>

                
                <div class="form-row">
                      <div class="col-md-12" style="display:none">      
                          <textarea name="mensajerecibido" id="mensajerecibido" cols="30" rows="10"></textarea>
                      </div>
                </div>
              
                
                <div class="form-row">
                    
                </div>
             

            
            </div>
                <hr class="m-0">
            </div>
          
        </div>
        </div>
  
              <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                        <div class="form-row">
                           
                        
                              <div class="col-md-8 col-6 col-sm-4">
                              
                                <center  class="botones" > 
                                
                                <button id="btnpagarotrafactura"  class="btn btn-outline-primary" onclick="facturaspendientes(<?= $clienteempresa ?>)">Pagar otra factura</button>
                                    <button id="btncarga"  class="btn btn-primary" type="button" style="display:none" disabled>
                                            <span class="spinner-border spinner-border-sm mr-2" role="status"
                                                  aria-hidden="true"></span>
                                                  Procesando...
                                    </button> 
                                    <button id="bntprepararpago" class="btn btn-primary "onclick="metodoprepararpago()">Pagar</button> 
                                    
                                    
                                    </center>
                                <input  type="hidden" id="confirmarpago" class="btn btn-primary" data-toggle="modal" data-target="#modalconfirmarpago">
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
                
            </div>
      
  <!-- begin::footer -->
  <div class="modal fade" id="modalconfirmarpago" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Mensaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
             
                    <label id="mensaje" for=""> </label>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">SMS o OTP:</label>
                        <input type="number" id="inpcodigo" name="inpcodigo" >
                    </div>
                </form>
                
                <div class="form-row">
                      <div class="col-md-12 col-6" >
                          <center>
                            <h2 id="time"></h2>
                          </center>
                      </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" id="btncerrar" class="btn btn-secondary" data-dismiss="modal">Cancelar
                </button>
                <button id="btncargaconfirmar"  class="btn btn-primary" type="button" style="display:none" disabled>
                        <span class="spinner-border spinner-border-sm mr-2" role="status"
                            aria-hidden="true"></span>
                            Procesando...
                </button> 

                <input type="button" id="btnejecutartrabajo"  onclick="ejecutarpago()" class="btn btn-primary" value="Aceptar">

                
                
            </div>
        </div>
    </div>
</div>
  


  <script>
      var codigoservicio="003";
    var  intervalo;
    //var intentopago=<?= $intentos; ?> ;
    var intentos=0;
    var swsolipago =false;
    var switchprepararpago=true;
    function ocultar()
        {
            
         
           $('#divcomplemento').hide();
        }
        function mostrar()
        {
          

           $('#divcomplemento').show();

        }

function metodoprepararpago()
        {
   
            console.log("swit:"+switchprepararpago);
            switchprepararpago=true;
            var datosfaltantes="Faltan los siguientes Datos :";
            if( ($('#inpci').val().length>0)   &&  ($('#inpnumbersoli').val()!= 0) && ($('#inpci').val()>0)   &&   ($('#inpnumbersoli').val().length > 0)   && ($('#slcext').val()!= 0)  &&  (/^\d{8}$/.test($('#inpnumbersoli').val())  ) )
            { 
                valido("#inpci");
                valido("#inpnumbersoli");
                valido("#slcext");
                valido("#inpnumbersoli");

                    intentos=intentos+1;
                    var ci=$('#inpci').val();
                    var complemento=$('#inpcomplemento').val();
                    var extension=$('#slcext').val();
                    var fechaexpiracion="" //$('#slcmes').val()+"/"+$('#slcaño').val();
                    var numbersoli=$('#inpnumbersoli').val();
                    var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
                    var datos= {ci:ci, complemento:complemento, extension:extension , fechaexpiracion :fechaexpiracion ,codigoservicio:codigoservicio ,numbersoli:numbersoli ,tnIdentificarPestaña:tnIdentificarPestaña };
                    
                     //var datos= {ci:ci, complemento:complemento, extension:extension , fechaexpiracion :fechaexpiracion ,codigoservicio:codigoservicio ,numbersoli:numbersoli };
                   
                   
                    var urlajax=$("#url").val()+"metodoprepararpagobcp"; 
                   
                
                  
                    $.ajax({                    
                            url: urlajax,
                            data: {datos},
                            type : 'POST',
                            dataType: "json",
                            
                                beforeSend:function( ) {   
                                    $("#btncarga").show();
                                    $("#bntprepararpago").hide();
                                },                    
                                success:function(response) {
                                console.log(response);
                                if(response.tipo==10)
                                {
                                    var tiemposegundos = <?= (isset($tiempo)) ? @$tiempo : 10;  ?> ;
                                    display = document.querySelector('#time');
                                    startTimer(tiemposegundos, display);
                                    console.log(tiemposegundos);
                                   // $("#bntprepararpago").attr("disabled","disabled");
                                    $("#mensaje").text(response.mensajemodal);
                                 //   $("#divtransaccion").show();
                                   // $("#lntransacccion").val(response.tnTransaccion);
                                    //$("#lnTransaccionresultado").text(response.tnTransaccion);
                                    $("#btnejecutartrabajo").show();
                                    $("#confirmarpago").click();
                                                                    
                                }
                                if(response.tipo==1)
                                {
                                   // swal("Mensaje", response.mensaje , "error");
                                    $("#textoresultado").text(response.mensaje);
                                  
                                    console.log(response);
                                    $('#vistaresultado').show();
                                    $("#resultado-tab").click();
                                    $("#btncarga").hide();
                                    $("#bntprepararpago").show();
                                }
                                    
                                },
                                error: function (data) {
                                    swal("Mensaje", "Ocurrio un error al procesar la solicitud" , "error");

                                    
                                    
                                },               
                                complete:function( ) {
                                    $("#btncarga").hide();
                                    $("#bntprepararpago").show();
                                    
                                },
                    });
                    
              
                    

                
            }else{
                
                    if($('#inpci').val().length==0 || $('#inpci').val()==0 )
                    {
                        datosfaltantes=datosfaltantes+"CI ,";
                        error("#inpci") ;

                    }else{
                        valido("#inpci");
                    }
                      
                      if($('#inpnumbersoli').val().length==0)
                      {                   
                          error("#inpnumbersoli");
                          datosfaltantes=datosfaltantes+" Numero Soli  , ";
                      }else{
                          valido("#inpnumbersoli");
                      }

                    if($('#slcext').val()== 0)
                    {
                      datosfaltantes=datosfaltantes+"Extensión , ";
                      error("#slcext") ;
                    }else{
                        valido("#slcext");
                    }

                    if(!(/^\d{8}$/.test($('#inpnumbersoli').val())  ))
                    {
                        datosfaltantes=datosfaltantes+"Numero Soli  invalido  , ";
                      error("#inpnumbersoli") ;
                    }else{
                        valido("#inpnumbersoli");
                    }

                swal("Mensaje", datosfaltantes , "error");

              }


               

            
        }
  
        var extension="";
        //var expiracion 
        function ejecutarpago()
        {
            

            var codigo=$('#inpcodigo').val();
            var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
            var datos= {codigo:codigo , tnIdentificarPestaña:tnIdentificarPestaña};
            var urlajax=$("#url").val()+"confirmarpagobcp";   
            $.ajax({                    
                    url: urlajax,
                    data: {datos},
                    type : 'POST',
                    dataType: "json",
                    
                        beforeSend:function( ) {   
                            
                            $("#btncargaconfirmar").show();
                            $("#btnejecutartrabajo").hide();
                        },                    
                        success:function(response) {
                            console.log(response);
                           
                            if(response.tipo==10)
                                {
                                    $("#Idpedido").val(response.Idpedido);
                                    console.log(response);
                                    $("#btnejecutartrabajo").attr("disabled","disabled");
                                    swal("Pago exitoso", response.mensaje , "success");  
                                    clearInterval(intervalo);
                                    getfacturaempresa(response.tnTransaccion);
                                    getfacturapagofacil(response.tnTransaccion);
                                }
                            if(response.tipo==1)
                                {
                                    swal("Mensaje", response.mensaje , "error");
                                    $("#bntprepararpago").removeAttr('disabled');
                                    $("#btncarga").hide();
                                    $("#bntprepararpago").show();
                                }
                              
                                

                        },
                        error: function (data) {
                            
                            swal("Mensaje", data.responseText , "error");
                        },               
                        complete:function( ) {
                            $("#modalconfirmarpago").modal('toggle');
                            $('.modal-backdrop').remove();
                               
                        
                            $("#btncargaconfirmar").hide();
                            $("#btnejecutartrabajo").show();
                        },
                    });  
          


        }
  
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            clearInterval(intervalo);
            intervalo=setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    ///ejecutar metodo y cancelar el timer timer = duration;
                    clearInterval(intervalo);
                    //alert("se termino el tiempo de espera ");
                    clearInterval(intervalo);
                    ejecutarerror();

                }
            }, 1000);
        }

       
        function ejecutarerror()
        {
            display = document.querySelector('#time');
            display.textContent="Tiempo de espera Agotado";
            $("#btnejecutartrabajo").hide();
            $("#modalconfirmarpago").modal('toggle');
            $('.modal-backdrop').remove();
                            
          //  $("#btncerrar").click();
          //  $("#li6").show();
           // $('#vistaresultado').show();
           // $("#resultado-tab").click();
          // $("#textoresultado").text('Se termino el tiempo  de espera ');
           
            
            var intentos=<?= $intentos; ?> ;
           
        }
    
          $(document).ready(function() {
           // pagarportigomoney();
  
              });






      

  </script>
  
  
  
   