
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="height: 100%;">
                        <div class="card-body text-center m-t-10-minus">
                            <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-12 text-muted">Datos facturacion</div>
                                            
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
                                                    <img src="<?=  @$urlimagenempresa  ?>" class="rounded-circle" style="width:100%; height:75px" alt="...">
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
                                            <div class="col-6 text-muted"> Monto :</div>
                                            <div class="col-6">  <?= @$monto;  ?>   </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted"> Comision Online:</div>
                                            <div class="col-6"> <?= @$comision;  ?>  </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted"> Total :</div>
                                            <div class="col-6"> <?= @$montototalpagar ?> </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-12 text-muted"> Detalle de la forma de pago :</div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted"> Medio :</div>
                                            <div class="col-6">  bcp rapido y seguro  </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted"> Medios BCP :</div>
                                            <div class="col-6"> <?= @$mediosbcp;  ?>  </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted"> E-mail:</div>
                                            <div class="col-6"> <?= @$email;  ?>   </div>
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
      
<!-- begin::footer -->


<!-- end::footer -->
	<script>
        function vistaprepararpago()
        {
            var datos= {metododepago:5 };
            var urlajax=$("#url").val()+"vistaprepararpago";   
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
