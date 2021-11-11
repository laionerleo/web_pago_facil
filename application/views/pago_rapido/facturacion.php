

        <?php if(isset($saldo)){ ?>
        <center><h2>Saldo</h2></center>
        <center><h4>Bs<?= @$saldo ?></h4></center>
        <center><h6><?= @$mensaje ?></h6></center>
        
        <?php } ?>
            
            
            <div class="row">
            <?php if($comision>0 ){  ?>
                <div class="col-md-4">
                    <div class="card" style="height: 100%;">
                        <div class="card-body text-center m-t-10-minus">
                            <div class="card-body">
                                <h4>Datos para la Factura PagoFacil </h4>
                    
                                <label for=""> Nombre Cliente</label>
                            <input class="form-control" id="inpnombrecliente" type="text" placeholder="Nombre de cliente" value="<?= @$nombrecliente ?>" >
                            <label for=""> CI o NIT de Cliente</label>
                            <input class="form-control" type="text" id="inpcionit" placeholder="CI o NIT de cliente" value="<?= @$cionit ?>">
                                   
                            </div>
                           
                        </div>
                    </div>
                </div>
            <?php }else{ ?>
                <input class="form-control" id="inpnombrecliente" type="hidden" placeholder="Nombre de cliente" value="<?= @$nombrecliente ?>" >
                <input class="form-control" type="hidden" id="inpcionit" placeholder="CI o NIT de cliente" value="<?= @$cionit ?>">
                <?php }?>


                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center m-t-10-minus" >
                        <h4>Datos de Envio</h4>
                        <label for=""> Nro De Whatsapp </label>
                        <input class="form-control" type="text" id="inpnumero" placeholder=" <?= @$etiquetametodopago  ?>" value="<?= @$numerocelular ?> " >
                        <label for=""> Correo de Envio de Facturas</label>
                        <input class="form-control" type="text" id="inpcorreo" placeholder="Correo de envio de facturas"  value="<?= @$correo ?>"  >
                        </div>
                    </div>
                </div>
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
 
<!-- end::footer -->
													
<script>


function vistaconfirmacion()
{
    var nombrecliente=$('#inpnombrecliente').val();
    var inpcionit=$('#inpcionit').val();
    var inpnumero=$('#inpnumero').val();
    var inpcorreo=$('#inpcorreo').val();
    var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
    
    var datos= {metododepago:5 ,nombrecliente:nombrecliente,inpcionit:inpcionit,inpnumero:inpnumero ,inpcorreo:inpcorreo  , tnIdentificarPestaña:tnIdentificarPestaña};
    console.log(datos);
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
}
</script>
      <!-- Slick -->
      <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick-theme.css" type="text/css">
    <script src="<?=  base_url() ?>/application/assets/vendors/slick/slick.min.js"></script>
    <script src="<?=  base_url() ?>/application/assets/assets/js/examples/slick.js"></script>
