
<div class="row">
                <div class="col-md-6">
                    <div class="card" >
                        <div class="card-body text-center m-t-10-minus">
                            <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-12 text-muted">Confirmación de Pago</div>
                                            
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">Nombre:</div>
                                            <div class="col-6"> <?= @$nombre;  ?> </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">NIT o CI:</div>
                                            <div class="col-6"><?= @$cinit;  ?></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">Detalle de transaccion</div>
                                            <div class="col-6" style="display: flex;flex-flow: column wrap;  justify-content: center;  align-items: center; "  >  
                                                    <img src="<?=  @$urlimagenempresa  ?>" class="rounded-circle" style="width:100%; height:75px ; object-fit:contain" alt="...">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-12 text-muted"> Facturas Elegidas a  pagar </div>
                                            <div class="col-12">
                                            <table class="table table-striped table-bordered"  style="width:inherit" >  
                                                <thead id="theadclientes"  >
                                                    <tr>
                                                        <?php if($lnEmpresaElegidaconfirmacion != 180 ){ ?>
                                                            <th> Concepto </th>
                                                            <th> Cantidad  </th>
                                                        <?php } ?>
                                                        <th> Monto </th>
                                                        <th> comision </th>
                                                        <th> Monto Total  </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                    <tr>
                                                        <?php if($lnEmpresaElegidaconfirmacion!= 180 ){ ?>
                                                            <td>
                                                                <?php for ($i=0; $i < count($listadofacturas) ; $i++) { ?>
                                                                    <?= $listadofacturas[$i]->periodo."," ?> 
                                                                <?php } ?>
                                                            </td>
                                                            <td>    
                                                                <?= count($itnselegidos) ?>
                                                            </td>    
                                                        <?php } ?>
                                                        <td>
                                                            <?= number_format((float)$monto, 2, '.', '');   ?> 
                                                        </td>
                                                        <td>
                                                            <?= number_format((float)$comision, 2, '.', '');   ?>
                                                        </td>
                                                        <td>
                                                        <?= number_format((float)$montototalpagar, 2, '.', '');  ?> 
                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                            
                                        </div>  
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">EMPRESA :  </div>
                                            <div class="col-6"> <?= @$nombreempresa;  ?>  </div>
                                              
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted"> Señor(es):</div>
                                            <div class="col-6"> <?= @$nombre;  ?>  </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-12 text-muted"> Detalle de la forma de pago :</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted"> Medio :</div>
                                            <div class="col-6">  <?= @$etiquetametodopago  ?>  </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-12 text-muted"> Detalle de envio de facturas :</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted"> Telefono :</div>
                                            <div class="col-6"> <?= @$medios;  ?>  </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted"> E-mail:</div>
                                            <div class="col-6"> <?= @$email;  ?>   </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-12 text-muted"> <strong>No válido como comprobante de pago. Únicamente para visualizar información sobre el pago a realizar.</strong></div>                                            
                                        </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                        <center><button class="btn btn-primary"  onclick="vistaprepararpago()"> Siguiente</button></center>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="url" name="url" value="<?= $url ?>">             
            </div>
	<script>
        function vistaprepararpago()
        {
            var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
            var datos= { tnIdentificarPestaña:tnIdentificarPestaña };
            var urlajax=$("#url").val()+"vistaprepararpago";   
            $("#prepararpagobody").empty();   
            $("#prepararpagobody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
            $.ajaxSetup(
                {
            cache: false,
            
                    });
            $("#prepararpagobody").load(urlajax,{datos});  
            
            $("#li5").show();
            $("#prepararpago-tab").click();  
            

        }
    </script>
      <!-- Slick -->
        <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick.css" type="text/css">
        <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick-theme.css" type="text/css">
        <script src="<?=  base_url() ?>/application/assets/vendors/slick/slick.min.js"></script>
        <script src="<?=  base_url() ?>/application/assets/assets/js/examples/slick.js"></script>
        <script src="https://songbird.cardinalcommerce.com/edge/v1/songbird.js"></script> 
