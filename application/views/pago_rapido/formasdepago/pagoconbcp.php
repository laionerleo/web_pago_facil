                       
                       
                     <style>
                     .flotante {
    display:scroll;
        position:fixed;
        bottom:320px;
        right:0px;
}

                     </style>
                     
                       <div class="row">
                                <div class="col-md-8" >
                                <div class="card" style="margin-bottom: 1.2rem;">
                                  
                                  <img id="baner" src="<?= base_url(); ?>application/assets/assets/media/image/metodosdepago/bcp/banner_tdebito.png" class="card-img-top" alt="...">
                             
                                  <div class="card-body text-center m-t-70-minus">
                                      <figure class="avatar avatar-m m-b-5">
                                          
                                      </figure>
                                  
                                      <div class="form-row" style="padding-bottom: 5px;">
                                              <div class="col-md-4 col-12 titulos">
                                              
                                                  <label for="inpci"  style="margin-bottom: 0.2rem;"> <b> Monto  ( <?= @$Simbolo  ?>): </b></label>
                                              </div>
                                              <div class="col-md-2 col-12">
                                                  <div class="controls" style="    text-align: justify;">
                                                  <input class="form-control" readonly type="text"  value="<?= number_format((float)$montototal, 2, '.', '');   ?>  " >
                                                  </div>
                                                  
                                              </div>
                                      </div>
                                      <div class="form-row" id="divtransaccion" style="padding-bottom: 5px; display:none">
                                              <div class="col-md-4 col-12 titulos" style="text-align: right;">
                                              
                                              <label for="inpci"  style="margin-bottom: 0.2rem;"> <b>Transacción : </b></label>
                                              
                                              </div>
                                              <div class="col-md-2 col-12">
                                                  <div class="controls" id="divtransaccion" style="    text-align: justify;">
                                                      <input class="form-control" type="text" name="lntransacccion" placeholder="" id="lntransacccion" value="" readonly >
                                                  </div>
                                                  
                                              </div>
                                      </div>
                                  <!--   Inicio tipo CI -->
                                      <div class="form-row" style="padding-bottom: 5px;">
                                              <div class="col-md-4 col-12 titulos">
                                              <label for="inpci"> <b> Tipo Ci : </b></label>
                                              </div>
                                              <div class="col-md-8 col-12">
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
                                              <div class="col-md-8 col-12">
                                                  <div class="row">
                                                  <div class="col-md-3 mb-3 col-8" >
                                                          <input class="form-control" type="number" min="0" name="inpci" placeholder="CI" id="inpci" value="<?=  $_SESSION['cinit'] ?>" >
                                                      </div>
                                                      <div class="col-md-3 mb-3 col-4 " id="divcomplemento" style="display:none" >
                                                          <input   class="form-control" type="text" name="inpcomplemento"  id="inpcomplemento" value="" placeholder="Complemento" >
                                                      </div>
                                                      <div class="col-md-3 mb-3 col-4" >
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
                                                              <option value="EX">EX</option>
                                                          </select>
                                                      </div>
                                                     
                                                  </div> 
                                                  
                                              </div>
                                      </div>
                                      <!--   NRO CI -->

                                       <!--   INCIO TIPO TARJETA -->
                                      <div class="form-row" style="padding-bottom: 5px;">
                                              <div class="col-md-4 col-12 titulos">
                                                  <label for="inpci"> <b>Tipo Tarjeta : </b></label>
                                              </div>
                                              <div class="col-md-8 col-12">
                                                  <div class="row">
                                                      <div class="form-check col-md-6 col-6">
                                                          <input class="form-check-input" type="radio" name="exampleRadios" onclick="cambiarimagen('debito','001')" id="inpdebito" value="option1" checked >
                                                          <label class="form-check-label" for="exampleRadios4"  checked>
                                                          <img  style="width:45px;height:30px" src="<?= base_url(); ?>application/assets/assets/media/image/metodosdepago/bcp/bcp_pago_debito.png" class="img-fluid" alt="debito">    
                                                          Débito
                                                          </label>
                                                      </div>
                                                      <div class="form-check col-md-6  col-6">
                                                          <input class="form-check-input" type="radio" name="exampleRadios"  onclick="cambiarimagen('credito','002')" id="inpcredito" value="option1" >
                                                          <label class="form-check-label" for="exampleRadios4">
                                                          <img style="width:45px;height:30px" src="<?= base_url(); ?>application/assets/assets/media/image/metodosdepago/bcp/bcp_pago_credito.png" class="img-fluid" alt="credito">    
                                                          Crédito
                                                          </label>
                                                      </div>
                                                      <div class="form-check col-md-4 col-4" style="display:none" >
                                                          <input class="form-check-input" type="radio" name="exampleRadios" onclick="cambiarimagen('soli','003')"  id="inpsoli" value="option1" >
                                                          <label class="form-check-label" for="exampleRadios4">
                                                          <img  style="width:45px;height:30px" src="<?= base_url(); ?>application/assets/assets/media/image/metodosdepago/bcp/bcp_pago_soli.png" class="img-fluid" alt="soli pagos">    
                                                          Soli Pagos
                                                          </label>
                                                      </div>
                                                  </div>
                                              </div>
                                      </div>
                                      <!--   FINAL TIPO TARJETA -->

                                       <!--  INICIO NUMBER SOLI Y  FECHA  -->
                                       <div class="form-row" style="padding-bottom: 5px;">
                                              <div class="col-md-4 col-12 titulos" >
                                                 <label  for="">   <b id="etiquetatipopago">Fecha Expiración:  </b></label>
                                                 
                                                  
                                              </div>
                                              <div class="col-md-8 col-12">
                                                  <div class="row">
                                                      <div class="col-md-3 mb-3 col-6" id="divmes" >
                                                          <select class="custom-select custom-select-m" name="slcmes" id="slcmes">
                                                              <option value="0" selected> <b>Mes </b></option>
                                                              <option value="01">ENE</option>
                                                              <option value="02">FEB</option>
                                                              <option value="03">MAR</option>
                                                              <option value="04">ABR</option>
                                                              <option value="05">MAY</option>
                                                              <option value="06">JUN</option>
                                                              <option value="07">JUL</option>
                                                              <option value="08">AGO</option>
                                                              <option value="09">SEP</option>
                                                              <option value="10">OCT</option>
                                                              <option value="11">NOV</option>
                                                              <option value="12">DIC</option>
                                                          </select>
                                                  
                                                      </div>
                                                      <div class="col-md-3 col-6" id="divano">
                                                          <?php
                                                              $cont = date('Y');
                                                              $contfinal = $cont+10;
                                                              ?>
                                                              <select class="custom-select custom-select-m" name="slcaño" id="slcaño">
                                                              <option  value="0" selected> <b>Año</b></option>
                                                              <?php while ($cont <= $contfinal) { ?>
                                                              <option value="<?php echo(substr($cont, 2)); ?>"><?php echo($cont); ?></option>
                                                              <?php $cont = ($cont+1); } ?>
                                                              </select>
                                                          <?php ?>
                                                      </div>
                                                      <div class="col-md-3 mb-3"  id="divnumbersoliold" style="display:none" >
                                                          <input class="form-control" style="display:none" type="number" name="inpnumbersoliold"  id="inpnumbersoliold" placeholder="Numero Soli" >
                                                      </div>
                                                  </div>
                                              </div>
                                      </div>

                                      <!--  INICIO NUMBER SOLI -->
                                      <div class="form-row" style="padding-bottom: 5px; ">
                                              <div class="col-md-4 col-12 titulos" >
                                                 <label  for="">   <b id="etiquetatipopago">Numero Registrado BCP :  </b></label>
                                                 
                                                  
                                              </div>
                                              <div class="col-md-8 col-12">
                                                  <div class="row">
                                                      <div class="col-md-3 mb-3"  id="divnumbersoli" >
                                                          <input class="form-control"  type="number" name="inpnumbersoli"  id="inpnumbersoli" placeholder="Numero registrado en BCP" value="<?=  $tnTelefono ?>" >
                                                      </div>
                                                  </div>
                                              </div>
                                      </div>
                                      
                                      <!--  FINAL  NUMBER SOLI Y  FECHA -->
                                      <input  type="hidden" id="confirmarpago" class="btn btn-primary" data-toggle="modal" data-target="#modalconfirmarpago">
                                      <div class="form-row" style="padding-top:10px" >
                                              <div class="col-md-4 col-6 titulos">
                                                  <label for=""> <b>Como pagar : </b></label>
                                              </div>
                                          <div class="col-md-2 col-3">
                                              <a id="btnayuda" data-toggle="modal" data-target="#exampleModalCenter"><img style="width:25px;height:25px" src="<?= base_url(); ?>application/assets/assets/media/image/informacion.svg" alt=""></a>
                                          </div>
                                      
                                      </div>
                                      <div class="form-row">
                                            <div class="col-md-6 col-6">
                                                <button id="bntprepararpago" class="btn btn-primary "onclick="metodoprepararpago()">Procesar Pago </button>
                                                <button id="btncarga"  class="btn btn-primary" type="button" style="display:none" disabled>
                                                                <span class="spinner-border spinner-border-sm mr-2" role="status"
                                                                    aria-hidden="true"></span>
                                                                    Procesando...
                                                        </button> 
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <?php if($recarga==20) { ?>
                                                    <button id="btnpagarotrafactura"  class="btn btn-outline-primary "onclick="limpiar()">Comenzar de nuevo</button>
                                                    <?php }else{ ?>
                                                    <button id="btnpagarotrafactura"  class="btn btn-outline-primary "onclick="facturaspendientes(<?= $clienteempresa ?>)">Pagar otra factura</button>
                                                <?php }  ?>
                                            </div>
                                            <div class="col-md-4 col-4 col-sm-4" id="verfacturaspagadaspdf"  style="display:none">
                                                    <input class="btn btn-outline-primary"  onclick="vistadescargarpdf()" type="button" value="Ver PDF">
                                                </div>
                                            <input  type="hidden" id="confirmarpago" class="btn btn-primary" data-toggle="modal" data-target="#modalconfirmarpago">
                                                
                                        </div>


                                  
                                  </div>
                                        <hr class="m-0">
                                    </div>
                                  
                                </div>
                               
                            
                                
                                
                            </div>
                   
<!-- begin::footer -->

<!-- begin::modal -->

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
                <center>
                    <h2 id="time"></h2>
                </center>
                <br>
                <center>
                    <h2 id="mensajeconfirmar"></h2>
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" id="btncerrar" class="btn btn-secondary" data-dismiss="modal">Close
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                              
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="ti-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <h5 class="card-title">Paso 1</h5>
                                <p class="card-text">Preparar tu pago con los datos requeridos <br> a) Tarjetas de débito/crédito:CI extension,fecha vencimiento de tu tarjetas <br> b)Solipagos:: CI extension nro Solipagos</p>
                                <h5 class="card-title">Paso 2</h5>
                                <p class="card-text"> Confirma tu pago ingresando el codigo que se te enviara a tu nro de telefono como SMS y/o a tu whatsapp y/o tu email registrados en BCP</p>
                                <h5 class="card-title">Paso 3</h5>
                                <p class="card-text">Recibe tus facturas de pago en tu correo electronico o descargandop directamente desde la opcion "Pagos realizados"</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>


<a class='flotante' href='#' ><img src='<?= base_url(); ?>application/assets/assets/media/image/informacion.svg'  border="0"/></a>

  
    <input type="hidden" id="url" name="url" value="<?= $url ?>">
<!-- end::footer -->
<script>
    var codigoservicio="001";
    var  intervalo;
    var intentos=0;
   // var ci =0;
    //var extension="";
   // var expiracion ="";
    function ocultar()
        {
           $('#inpcomplemento').hide();
           $('#divcomplemento').hide();
        }
        function mostrar()
        {
           $('#inpcomplemento').show();
           $('#divcomplemento').show();
        }
        function cambiarimagen(valor,codigo)
        {
            if(valor=="debito")
            {   
                $("#baner").attr("src","<?= base_url(); ?>application/assets/assets/media/image/metodosdepago/bcp/banner_tdebito.png");
                $("#inpci").val('<?=  @$ultimatransacciondebito->CiNit    ?>');
                $("#slcaño").val('<?=  substr(@$ultimatransacciondebito->ExpireDate,3,2  )     ?>');
                $("#slcmes").val('<?=  substr(@$ultimatransacciondebito->ExpireDate,0,2  )     ?>');
                $("#slcext").val('<?=  @$ultimatransacciondebito->Extension    ?>');
                

                $("#etiquetatipopago").text('Fecha Expiracion');
                $("#slcaño").show();
                $("#slcmes").show();
              //  $("#inpnumbersoli").hide();
               // $("#inpnumbersoli").val('');
                


            }
            if(valor=="credito")
            {
                $("#baner").attr("src","<?= base_url(); ?>application/assets/assets/media/image/metodosdepago/bcp/banner_tcredito.png");
                $("#inpci").val('<?=  @$ultimatransaccioncredito->CiNit    ?>');
              /*  $("#slcaño").val('<?=  substr(@$ultimatransaccioncredito->ExpireDate,3,2  )     ?>');
                $("#slcmes").val('<?=  substr(@$ultimatransaccioncredito->ExpireDate,0,2  )     ?>');*/
                $("#slcext").val('<?=  @$ultimatransaccioncredito->Extension    ?>');


                $("#etiquetatipopago").text('Fecha Expiracion');
                $("#slcaño").show();
                $("#slcmes").show();
                $("#inpnumbersoli").hide();
                $("#inpnumbersoli").val('');
                
            }
     
            codigoservicio=codigo;
            
        }

        function metodoprepararpago()
        {
            var numbersoli=$('#inpnumbersoli').val();
            if(  ($('#inpci').val().length>0)   &&  ($('#inpci').val()!=0) && ($('#slcext').val()!= 0) && ($('#slcext').val()!= "")  && ($('#slcext').val()!= null)  && $('#slcmes').val()!= 0  && $('#slcmes').val()!= null  && $('#slcaño').val()!= 0 && $('#slcaño').val()!= null   && ($('#slcmes').val()!= "")  && ($('#slcaño').val()!= "") && ( numbersoli != "") && ( numbersoli > 60000000 ) && ( numbersoli != 70000000 )     )
                { 
                    valido("#inpci");
                    valido("#slcext");
                    valido("#slcmes") ;
                    valido("#slcaño");
                    var ci=$('#inpci').val();
                    var complemento=$('#inpcomplemento').val();
                    var extension=$('#slcext').val();
                    var fechaexpiracion=$('#slcmes').val()+"/"+$('#slcaño').val();
                   
                    var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
                    var datos= {ci:ci, complemento:complemento, extension:extension , fechaexpiracion :fechaexpiracion ,codigoservicio:codigoservicio ,numbersoli:numbersoli ,tnIdentificarPestaña:tnIdentificarPestaña };
                    var urlajax=$("#url").val()+"metodoprepararpagobcp"; 
                    console.log(datos);
                      
                    $.ajax({                    
                        url: urlajax,
                        data: {datos},
                        type : 'POST',
                        dataType: "json",
                        timeout: 0,
                        
                            beforeSend:function( ) {  
                                $("#btncarga").show();
                                $("#bntprepararpago").hide(); 
                            },                    
                            success:function(response) {
                            console.log(response);
                            if(response.tipo==10)
                            {
                                //var tiemposegundos = <?= (isset($tiempo)) ? @$tiempo : 40;  ?> ;
                                var tiemposegundos =300;

                                display = document.querySelector('#time');
                                startTimer(tiemposegundos, display);
                                console.log(tiemposegundos);
                                $("#bntprepararpago").attr("disabled","disabled");
                                $("#confirmarpago").click();
                                $("#mensaje").text(response.mensajemodal);
                            }
                            if(response.tipo==1)
                            {
                                swal("Mensaje", response.mensaje , "error");
                            
                                //$("#confirmarpago").click();
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
                console.log("alkwjdlaksjdlkajsdlkaj");
                var datosfaltantes="Faltan los siguientes Datos :";
                if($('#inpci').val().length==0 || $('#inpci').val()==0 )
                {
                    datosfaltantes=datosfaltantes+"CI ,";
                    error("#inpci") ;

                }else{
                    valido("#inpci");
                }

                var lcAuxExt=$('#slcext').val();
                console.log(lcAuxExt);
                if(lcAuxExt   == 0 || lcAuxExt== "" || lcAuxExt== null  )
                    {
                    datosfaltantes=datosfaltantes+"Extensión , ";
                    error("#slcext") ;

                    }else{
                        valido("#slcext");
                    }
      
                    if($('#slcmes').val()== 0 ||  $('#slcmes').val()== "" ||  $('#slcmes').val()== null  )
                    {
                        datosfaltantes=datosfaltantes+"Mes  , ";
                        error("#slcmes") ;
        

                    }else{
                        valido("#slcmes");
                    }

                    if($('#slcaño').val()== 0 || $('#slcaño').val()== ""  ||  $('#slcaño').val()== null  )
                    {
                        datosfaltantes=datosfaltantes+"Año  , ";
                
                        error("#slcaño") ;
                    }else{
                        valido("#slcaño");
                    }
            


                swal("Error",datosfaltantes , "error");
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
            var resultadopago=0;
            var resultadomensaje="";
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
                            clearInterval(intervalo);
                            
                            if(response.tipo==10)
                                {
                                   //$("#modalconfirmar").click();
                                   $("#btnejecutartrabajo").attr("disabled","disabled");
                                   // facturaspendientes();
                                   $('#bntprepararpago').hide();
                                   resultadopago=10;
                                   resultadomensaje=response.mensaje;
                                   gntransaccion=response.tnTransaccion;
                                   $("#verfacturaspagadaspdf").show();
                                   //getfacturaempresa(response.tnTransaccion);
                                   getfacturapagofacil(response.tnTransaccion);

                                }
                            if(response.tipo==1)
                                {
                                    
                                    $("#bntprepararpago").removeAttr('disabled');
                                    resultadopago=1;
                                    resultadomensaje=response.mensaje;
                                }
                                $('#inpcodigo').val("");
                               
                                

                        },
                        error: function (data) {
                            console.log(data.responseText);
                            resultadopago=1;
                        },               
                        complete:function( ) {
                            ejecutarerror();
                            if(resultadopago===1)
                            {
                                
                                swal("Mensaje", resultadomensaje , "error");
                                //$('#mensajeconfirmar').css('color','red');
                                //$('#mensajeconfirmar').text(resultadomensaje);
                            }else{
                                swal("Pago exitoso",resultadomensaje , "success");  

                            }
                            $("#btncargaconfirmar").hide();
                            $("#btnejecutartrabajo").show();

                        },
                    });  
        }
  
        $(document).ready(function() {
            // Instrucciones a ejecutar al terminar la carga
            cambiarimagen('debito','001');
            $("#btnayuda").click();            

            });

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
            $("#modalconfirmarpago").modal('toggle');

//            $("#popupBusquedaParroquia").modal('hide');//ocultamos el modal
           // $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
            $('.modal-backdrop').remove();//eliminamos el backdrop del modal

            //$('#myModal').modal('hide')
         //   $("#btncerrar").click();
         //   var intentos=<?= $intentos; ?> ;
           
        }
</script>



 