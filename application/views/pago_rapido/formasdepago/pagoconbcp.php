                       
                       
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
                                    <div class="card">
                                        <img id="baner" src="<?= base_url(); ?>application/assets/assets/media/image/metodosdepago/bcp/banner_tdebito.png" class="card-img-top" alt="...">
                                        <div class="card-body text-center m-t-70-minus">
                                            <figure class="avatar avatar-m m-b-5">
                                                
                                            </figure>
                                            <h3>Monto</h3>
                                            <p class="text-muted"> <h3> <?= number_format((float)$montototal, 2, '.', '');   ?></h3> </p>
                                            <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio" name="customRadio"  onclick="ocultar()" class="custom-control-input"
                                                        checked>
                                                    <label class="custom-control-label" for="customRadio">CI</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="custom-control custom-radio custom-checkbox-secondary">
                                                    <input type="radio" id="customRadio1" name="customRadio"
                                                        class="custom-control-input"  onclick="mostrar()">
                                                    <label class="custom-control-label" for="customRadio1">CI duplicado</label>
                                                </div>
                                            </div>    
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-3 mb-3" >
                                                <label for="inpci">CI</label>
                                                    <input class="form-control" type="number" name="inpci" placeholder="CI" id="inpci" value="<?=  $_SESSION['cinit'] ?>" >
                                                </div>
                                                <div class="col-md-3 mb-3" >
                                                <label for=""></label>
                                                    <input  style="display:none"  class="form-control" type="text" name="inpcomplemento"  id="inpcomplemento" value="" placeholder="Complemento" >
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                <label for="">Extensión</label>
                                                    <select class="custom-select custom-select-m" name="slcext" id="slcext">
                                                        
                                                        <option  value="SC">SC</option>
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
                                            <div class="form-row ">
                                                
                                                    <div class="form-check col-md-4">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" onclick="cambiarimagen('debito','001')" id="inpdebito" value="option1" checked >
                                                        <label class="form-check-label" for="exampleRadios4"  checked>
                                                        <img  style="width:25px;height:25px" src="<?= base_url(); ?>application/assets/assets/media/image/metodosdepago/bcp/bcp_pago_debito.png" class="img-fluid" alt="debito">    
                                                        Tarjeta de débito
                                                        </label>
                                                    </div>
                                                    <div class="form-check col-md-4 ">
                                                        <input class="form-check-input" type="radio" name="exampleRadios"  onclick="cambiarimagen('credito','002')" id="inpcredito" value="option1" >
                                                        <label class="form-check-label" for="exampleRadios4">
                                                        <img style="width:25px;height:25px" src="<?= base_url(); ?>application/assets/assets/media/image/metodosdepago/bcp/bcp_pago_credito.png" class="img-fluid" alt="credito">    
                                                        Tarjeta de crédito
                                                        </label>
                                                    </div>
                                                    
                                                    <div class="form-check col-md-4">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" onclick="cambiarimagen('soli','003')"  id="inpsoli" value="option1" >
                                                        <label class="form-check-label" for="exampleRadios4">
                                                        <img  style="width:25px;height:25px" src="<?= base_url(); ?>application/assets/assets/media/image/metodosdepago/bcp/bcp_pago_soli.png" class="img-fluid" alt="soli pagos">    
                                                        SoliPagos
                                                        </label>
                                                    </div>
                                                    
                                                    
                                            </div>
                                            <label id="etiquetatipopago" for="">Fecha Expiracion</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  <br>
                                            <div class="form-row">
                                                
                                                    
                                                    <div class="col-md-3 mb-3" >
                                                        <select class="custom-select custom-select-m" name="slcmes" id="slcmes">
                                                            
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
                                                    <div class="col-md-3">
                                                    <?php
                                                        $cont = date('Y');
                                                        $contfinal = $cont+10;
                                                        ?>
                                                        <select class="custom-select custom-select-m" name="slcaño" id="slcaño">
                                                        
                                                        <?php while ($cont <= $contfinal) { ?>
                                                        <option value="<?php echo(substr($cont, 2)); ?>"><?php echo($cont); ?></option>
                                                        <?php $cont = ($cont+1); } ?>
                                                        </select>
                                                        <?php ?>
                                                    </div>
                                                
                                                    <div class="col-md-3 mb-3">
                                                    <input class="form-control" style="display:none" type="number" name="inpnumbersoli"  id="inpnumbersoli" placeholder="Numero Soli" >
                                                    </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                <center> 
                                                    <button id="bntprepararpago" class="btn btn-primary "onclick="metodoprepararpago()">Procesar Pago </button>
                                                    <?php if($recarga==20) { ?>
                                                            <button id="btnpagarotrafactura"  class="btn btn-primary "onclick="limpiar()">Comenzar de nuevo</button>
                                                          <?php }else{ ?>
                                                            <button id="btnpagarotrafactura"  class="btn btn-primary "onclick="facturaspendientes(<?= $clienteempresa ?>)">Pagar otra factura</button>
                                                          <?php }  ?>
                                                </center>
                                                     
                                                     <input  type="hidden" id="confirmarpago" class="btn btn-primary" data-toggle="modal" data-target="#modalconfirmarpago">
                                                     <a id="btnayuda" data-toggle="modal" data-target="#exampleModalCenter"><img style="width:25px;height:25px" src="<?= base_url(); ?>application/assets/assets/media/image/informacion.svg" alt=""></a>
                                                     
                                                </div>
                                            
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
                    <label for=""> Revisar tus mensajes SMS <br> ingrese el còdigo de pago bcp <br>enviado al numero xxxx  y correo xxxx </label>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">SMS o OTP:</label>
                        <input type="number" id="inpcodigo" name="inpcodigo" >
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btncerrar" class="btn btn-secondary" data-dismiss="modal">Close
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
   // var ci =0;
    //var extension="";
   // var expiracion ="";
    function ocultar()
        {
           $('#inpcomplemento').hide();
        }
        function mostrar()
        {
           $('#inpcomplemento').show();
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
                $("#inpnumbersoli").hide();
                $("#inpnumbersoli").val('');
                


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
            if(valor=="soli")
            {
                $("#baner").attr("src","<?= base_url(); ?>application/assets/assets/media/image/metodosdepago/bcp/banner_soli.png");

                $("#inpci").val('<?=  @$ultimatransaccionsolipago->CiNit    ?>');
                $("#inpnumbersoli").val('<?=  @$ultimatransaccionsolipago->Telefono   ?>');
                $("#slcext").val('<?=  @$ultimatransaccionsolipago->Extension    ?>');

                $("#etiquetatipopago").text('Number Soli ');
                $("#inpnumbersoli").show();
                $("#slcaño").hide();
                $("#slcmes").hide();
                
                
            }
            codigoservicio=codigo;
            
        }

        function metodoprepararpago()
        {
            if(  ($('#inpci').val().length>0) && ($('#slcext').val() != null)  && ($('#slcmes').val()!= null ) && ($('#slcaño').val() != null)     )
            { 
                console.log($('#slcext').val());
            
                var ci=$('#inpci').val();
                var complemento=$('#inpcomplemento').val();
                var extension=$('#slcext').val();
                var fechaexpiracion=$('#slcmes').val()+"/"+$('#slcaño').val();
                var numbersoli=$('#inpnumbersoli').val();
                var datos= {ci:ci, complemento:complemento, extension:extension , fechaexpiracion :fechaexpiracion ,codigoservicio:codigoservicio ,numbersoli:numbersoli };
                var urlajax=$("#url").val()+"metodoprepararpagobcp"; 
            
                $.ajax({                    
                        url: urlajax,
                        data: {datos},
                        type : 'POST',
                        dataType: "json",
                        
                            beforeSend:function( ) {   
                            
                            },                    
                            success:function(response) {
                            console.log(response);
                            if(response.tipo==10)
                            {
                                $("#bntprepararpago").attr("disabled","disabled");
                                $("#confirmarpago").click();
                                
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
                                
                            },
                        });  

            }else{
                swal("Mensaje", "por favor llenar todos los datos " , "error");
            }
        }
  
        var extension="";
        //var expiracion 
        function ejecutarpago()
        {
            
            var codigo=$('#inpcodigo').val();
            var datos= {codigo:codigo};
            var urlajax=$("#url").val()+"confirmarpagobcp";   
            $.ajax({                    
                    url: urlajax,
                    data: {datos},
                    type : 'POST',
                    dataType: "json",
                    
                        beforeSend:function( ) {   
                            
                        },                    
                        success:function(response) {
                            console.log(response);
                            $("#btncerrar").click();
                            if(response.tipo==10)
                                {
                                    //$("#modalconfirmar").click();
                                    $("#btnejecutartrabajo").attr("disabled","disabled");
                                    swal("Pago exitoso", response.mensaje , "success");  
                                    //facturaspendientes();
                                }
                            if(response.tipo==1)
                                {
                                    swal("Mensaje", response.mensaje , "error");
                                    $("#bntprepararpago").removeAttr('disabled');
                                }
                         
                                

                        },
                        error: function (data) {
                            console.log(data.responseText);
                        },               
                        complete:function( ) {
                        },
                    });  
        }
  
        $(document).ready(function() {
            // Instrucciones a ejecutar al terminar la carga
            cambiarimagen('debito','001');
            $("#btnayuda").click();            

            });

</script>



 