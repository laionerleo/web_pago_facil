

            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="height: 100%;">
                        <div class="card-body text-center m-t-10-minus">
                            <div class="card-body">
                                <h4>Datos de Facturacion</h4>
                    
                                <label for=""> nombre cliente</label>
                            <input class="form-control" id="inpnombrecliente" type="text" placeholder="Nombre de cliente" value="<?= @$nombrecliente ?>" >
                            <label for=""> CI o NIT de cliente</label>
                            <input class="form-control" type="text" id="inpcionit" placeholder="CI o NIT de cliente" value="<?= @$cionit ?>">
                                   
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center m-t-10-minus" >
                        <h4>Datos de Transaccion</h4>
                        <label for=""> Medio BCP</label>
                        <input class="form-control" type="text" id="inpnumero" placeholder="Medios BCP" value="<?= @$numerocelular ?> " >
                        <label for=""> Correo de envio de facturas</label>
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
    
    var datos= {metododepago:5 ,nombrecliente:nombrecliente,inpcionit:inpcionit,inpnumero:inpnumero ,inpcorreo:inpcorreo };
    var urlajax=$("#url").val()+"vistaconfirmacion";   
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
