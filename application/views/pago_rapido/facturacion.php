

<?php if(isset($saldo)){ ?>
    <center><h2>Saldo</h2></center>
    <?php
    // Check if saldo is -0
    if($saldo < 0) {
        // Display saldo with red letters and additional message
        echo '<center><h4 style="color: red;"> Bs ' . abs($saldo) . ' Crédito con PagoFacil</h4></center>';
    } else {
        // Display saldo as usual
        echo '<center><h4>Bs' . $saldo . '</h4></center>';
    }
    ?>
    
    <center><h6><?= @$mensaje ?></h6></center>
<?php } ?>
            
            
            <div class="row">
            <?php if($comision>0   || $tnFacturar == 1  ){  ?>
                <div class="col-md-4">
                    <div class="card" style="height: 100%;">
                        <div class="card-body text-center m-t-10-minus">
                     
                                    <h4>Datos para la Factura PagoFacil </h4>
                                    <label for=""> Nombre Cliente</label>
                                    <input class="form-control" id="inpnombrecliente" type="text" placeholder="Nombre de cliente" value="<?= @$nombrecliente ?>" >
                                    <label for=""> Tipo de Documento </label>
                                    <select class="form-control" name="slcTipoDocumento" id="slcTipoDocumento">
                                        <option value="1" selected > CEDULA DE IDENTIDAD</option>
                                        <option value="2">CEDULA DE IDENTIDAD DE EXTRANJERO </option>
                                        <option value="3" >PASAPORTE </option>
                                        <option value="4">OTRO DOCUMENTO DE IDENTIDAD </option>
                                        <option value="5">NÚMERO DE IDENTIFICACIÓN TRIBUTARIA </option>
                                        
                                    </select>
                                    <label  for=""> CI o NIT de Cliente</label>
                                    <?php if( is_null($cionit) || $cionit == ""   ) { ?>
                                        <input class="form-control" type="number" id="inpcionit" placeholder="CI o NIT de cliente" value="0"> 
                                    <?php }else{  ?>
                                        <input class="form-control" type="number" id="inpcionit" placeholder="CI o NIT de cliente" value="<?= @$cionit  ?>"> 
                                    <?php }  ?>
                        </div>
                    </div>
                </div>
            <?php }else{ ?>
                <input class="form-control" id="inpnombrecliente" type="hidden" placeholder="Nombre de cliente" value="<?= @$nombrecliente ?>" >
                <input class="form-control" type="hidden" id="inpcionit" placeholder="CI o NIT de cliente" value="<?= @$cionit ?>">
                <input class="form-control" type="hidden" id="slcTipoDocumento" placeholder="CI o NIT de cliente" value="1">
                <?php }?>

                <?php if($tnPedirCorreo==1  &&  $tnPedirWhatsapp == 1  ){  ?>
                    <input class="form-control" type="hidden" id="inpnumero" placeholder="Numero de envio de facturas" value="<?= trim(@$numerocelular) ?>" >
                    <input class="form-control" type="hidden" id="inpcorreo" placeholder="Correo de envio de facturas"  value="<?= trim(@$correo) ?>"  >
                        
                        
                <?php }else{ ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center m-t-10-minus" >
                            <h4>Datos de envió de factura </h4>
                            <?php if( $tnPedirWhatsapp == 1  ){  ?>
                 
                                <input class="form-control" type="hidden" id="inpnumero" placeholder="Numero de envio de facturas" value="<?= trim(@$numerocelular) ?>" >
                            <?php }else{ ?>
                                <label for=""> Nro De Whatsapp </label>
                                <input class="form-control" type="number" id="inpnumero" placeholder="Numero de envio de facturas" value="<?= trim(@$numerocelular) ?>" >

                            <?php }?>

                            <?php if($tnPedirCorreo==1 ){  ?>
                          
                                <input class="form-control" type="hidden" id="inpcorreo" placeholder="Correo de envio de facturas"  value="<?= trim(@$correo) ?>"  >
                               
                            <?php }else{ ?>
                                <label for=""> Correo de Envio de Facturas</label>
                                <input class="form-control" type="email" id="inpcorreo" placeholder="Correo de envio de facturas"  value="<?= trim(@$correo) ?>"  >

                            <?php }?></div>
                        </div>
                    </div>
                <?php }?>


                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                        <center><button class="btn btn-primary"  onclick="vistaconfirmacion()"> Siguiente</button></center>
                        </div>
                    </div>
                </div>
            </div>
<!-- begin::footer -->
<input type="hidden" id="url" name="url" value="<?= $url ?>">
<input type="hidden" id="lnEmpresaElegida" name="lnEmpresaElegida" value="<?= $lnEmpresaElegida ?>">
<!-- end::footer -->												
<script>
function vistaconfirmacion()
{
    var nombrecliente=$('#inpnombrecliente').val();
    var inpcionit=$('#inpcionit').val();
    var inpnumero=$('#inpnumero').val();
    var inpcorreo=$('#inpcorreo').val();
    var slcTipoDocumentoIdentidad=$('#slcTipoDocumento').val();
    var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
    var lnEmpresaElegida=$('#lnEmpresaElegida').val();

    if(lnEmpresaElegida== 180 || lnEmpresaElegida== 167 )
    {
        $swError=0;
        var mensajeerror="Porfavor  insertar  ";
        if(inpcionit=="0"    )
        {
            error("#inpcionit");
            mensajeerror=mensajeerror + "Numero de documento  ,";
            $swError=1;
        }else{
            valido("#inpcionit");
        }

        if(nombrecliente==""  )
        {
            error("#inpnombrecliente");
            mensajeerror=mensajeerror + "Nombre Completo ,";
            $swError=1;
        }else{
            valido("#inpnombrecliente");
        }

        if($swError== 1)
        {
            swal("Mensaje", mensajeerror.slice(0,-1) , "error");
            return true;
        }
        


           
    }
    
    console.log(document.getElementById("inpnumero").validity);
    if(  inpnumero != "" && inpnumero != "70000000"  && inpnumero > "60000000"  && inpcorreo != "invitado@pagofacil.com.bo" &&  IsEmail(inpcorreo) )
    {
        valido("#inpnumero");
        valido("#inpcorreo");
        var datos= {metododepago:5 ,nombrecliente:nombrecliente,inpcionit:inpcionit,inpnumero:inpnumero ,inpcorreo:inpcorreo  , tnIdentificarPestaña:tnIdentificarPestaña  ,tnTipoDocumentoIdentidad:slcTipoDocumentoIdentidad  };
        var urlajax=$("#url").val()+"vistaconfirmacion";   
        $("#confirmacionbody").empty();   
        $("#confirmacionbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
        $("#prepararpagobody").empty();   
        $("#prepararpagobody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
        $.ajaxSetup(
            {
                cache: false,   
                     
            });
        $("#confirmacionbody").load(urlajax,{datos}); 
        $("#li4").show();
        $("#confirmacion-tab").click();
    }else{
        var mensajeerror="Porfavor cambiar ";
        if(inpnumero =="70000000"  ||  inpnumero == ""   )
        {
            error("#inpnumero");
            mensajeerror=mensajeerror + "numero ,";
        }else{
            valido("#inpnumero");
        }
        if(inpcorreo == "invitado@pagofacil.com.bo"  || !IsEmail(inpcorreo)  )
        {
            error("#inpcorreo");
            mensajeerror=mensajeerror + "Correo ,";
        }else{
            valido("#inpcorreo");
        }
       // alert(mensajeerror);
        swal("Mensaje", mensajeerror.slice(0,-1) , "error");

    }
    
}

    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
            return false;
        }else{
            return true;
        }
    }


    function  limpiarparasoat()
    {
        var lnEmpresaElegida=$('#lnEmpresaElegida').val();

        if(lnEmpresaElegida== 180 )
        {
            $('#inpnombrecliente').val("") ; 
            
        }

    }
    limpiarparasoat() ;
    
</script>
      <!-- Slick -->
      <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick-theme.css" type="text/css">
    <script src="<?=  base_url() ?>/application/assets/vendors/slick/slick.min.js"></script>
    <script src="<?=  base_url() ?>/application/assets/assets/js/examples/slick.js"></script>
