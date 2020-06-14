
                            <div class="row">
                                <div class="col-md-8">
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
                                                   
                                                    <input class="form-control" type="number" name="inpci"  id="inpci" value="<?=  $_SESSION['cinit'] ?>" >
                                                </div>
                                                <div class="col-md-3 mb-3" >
                                                    <input  style="display:none"  class="form-control" type="text" name="inpcomplemento"  id="inpcomplemento" value="" >
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <select class="custom-select custom-select-m" name="slcext" id="slcext">
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
                                            <div class="form-row">
                                                <div class="col-md-1"></div>
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
                                                        <option value="11">NOM</option>
                                                        <option value="12">DIC</option>
                                                        
                                                        

                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3" >
                                                    <?php
                                                    $cont = 2025;
                                                 
                                                    ?>
                                                    <select class="custom-select custom-select-m" name="slcaño" id="slcaño">
                                                    <?php while ($cont >= 1950) { ?>
                                                    <option value="<?php echo(substr($cont, 2)); ?>"><?php echo($cont); ?></option>
                                                    <?php $cont = ($cont-1); } ?>
                                                    </select>
                                                    <?php ?>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                <input class="form-control" style="display:none" type="number" name="inpnumbersoli"  id="inpnumbersoli" value="" >
                                                </div>
                                                
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                <center> <button class="btn btn-primary "onclick="metodoprepararpago()">preparar pago</button> </center>
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
                    <label for=""> Resiva tus mensajes SMS <br> ingrese el còdigo de pago bcp <br>enviado al numero xxxx  y correo xxxx </label>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Codigo:</label>
                        <input type="text">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                </button>
                <button type="button" id="btnaceptar" conclick="ejecutarpago()" class="btn btn-primary">Aceptar</button>
                
                
            </div>
        </div>
    </div>
</div>

  
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
            {   $("#inpnumbersoli").hide();
                $("#inpnumbersoli").value('');
                
                $("#slcaño").show();
                $("#slcmes").show();

                $("#baner").attr("src","<?= base_url(); ?>application/assets/assets/media/image/metodosdepago/bcp/banner_tdebito.png");
            }
            if(valor=="credito")
            {
                $("#slcaño").show();
                $("#slcmes").show();
                $("#inpnumbersoli").hide();
                $("#inpnumbersoli").value('');
                $("#baner").attr("src","<?= base_url(); ?>application/assets/assets/media/image/metodosdepago/bcp/banner_tcredito.png");
            }
            if(valor=="soli")
            {
                $("#inpnumbersoli").show();
                $("#slcaño").hide();
                $("#slcmes").hide();
                
                $("#baner").attr("src","<?= base_url(); ?>application/assets/assets/media/image/metodosdepago/bcp/banner_soli.png");
            }
            codigoservicio=codigo;
            
        }

        function metodoprepararpago()
        {
            /*        @Field("tcExtension")               String  tcExtension,  $session['extension'] si es la extencion del carnet es el departamendo del ci 
            @Field("tcComplement")              String  tcComplement,  $session['complemento']-- si hay duplicados  
            @Field("tcServiceCode")             String  tcServiceCode,  $session['servicecode']  
            @Field("tcExpireDate")              String  tcExpireDate);  $session['expiredate'] dato de expiracion 

            */
            var ci=$('#inpci').val();
            var complemento=$('#inpcomplemento').val();
            var extension=$('#slcext').val();
            var fechaexpiracion=$('#slcmes').val()+"/"+$('#slcaño').val();
            var numbersoli=$('#inpnumbersoli').val();
            
            
            
            var datos= {ci:ci, complemento:complemento, extension:extension , fechaexpiracion :fechaexpiracion ,codigoservicio:codigoservicio ,numbersoli:numbersoli };
            var urlajax=$("#url").val()+"metodoprepararpago";   
           // $("#vista_general").load(urlajax,{datos});   
            $.ajax({                    
                    url: urlajax,
                    data: {datos},
                    type : 'POST',
                    dataType: "json",
                    
                        beforeSend:function( ) {   
                            //$("#waitLoading").fadeIn(1000);
                        },                    
                        success:function(response) {
                        console.log(response);
                        if(response.tipo==10)
                        {
                            swal("Pago exitoso", response.mensaje , "success");  
                        }
                        if(response.tipo==1)
                        {
                            swal("Mensaje", response.mensaje , "error");
                        }
                            
                        },
                        error: function (data) {
                            console.log(data.responseText);
                        
                            
                        },               
                        complete:function( ) {
                            //$("#waitLoading").fadeOut(1000);  
                        },
                    });  
        }
  
        var extension="";
        //var expiracion 
        function ejecutarpago()
        {
               /*        @Field("tcExtension")               String  tcExtension,  $session['extension'] si es la extencion del carnet es el departamendo del ci 
            @Field("tcComplement")              String  tcComplement,  $session['complemento']-- si hay duplicados  
            @Field("tcServiceCode")             String  tcServiceCode,  $session['servicecode']  
            @Field("tcExpireDate")              String  tcExpireDate);  $session['expiredate'] dato de expiracion 

            */
            var ci=$('#inpcodigo').val();
            var datos= {codigo:codigo};
            var urlajax=$("#url").val()+"confirmarpago";   
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
                                    $("#modalconfirmar").click();
                                }
                            if(response.tipo==1)
                                {
                                    swal("Mensaje", response.mensaje , "error");
                                }
                        },
                        error: function (data) {
                            console.log(data.responseText);
                        },               
                        complete:function( ) {
                        },
                    });  
        }
</script>



 