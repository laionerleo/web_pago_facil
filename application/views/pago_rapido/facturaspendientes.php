

                
                    <div class="row">
                        <div class="col-md-12" style="height:100%">

                            <div class="row">
                                <div class="col-md-4">

                                    <div class="card" style="height: 100%;">
                                        <div class="card-body text-center m-t-10-minus">
                                        <div class="card-body">
                                                    <div class="row mb-2">
                                                        <div class="col-6 text-muted">Cooplan</div>
                                                        <div class="col-6" style="display: flex;flex-flow: column wrap;  justify-content: center;  align-items: center; "  >  
                                                                <img src="http://www.syscoop.com.bo/Url_Icon/cooplan.png" class="rounded-circle" style="width:100%; height:75px" alt="...">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-6 text-muted">Codigo Fijo:</div>
                                                        <div class="col-6"><?= $facturaprincipal->idCliente  ?>213931</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-6 text-muted">Codigo Ubicacion:</div>
                                                        <div class="col-6"><?= $facturaprincipal->codigoUbicacion  ?></div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-6 text-muted"> Nombre:</div>
                                                        <div class="col-6"> <?= $facturaprincipal->nombre  ?> </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-6 text-muted">Facturas por pagar:</div>
                                                        <div class="col-6"> <?= count($facturas);  ?>  </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-6 text-muted"> Mes:</div>
                                                        <div class="col-6"><?= $facturaprincipal->periodo  ?>  </div>
                                                    </div>
                                        </div>
                                        <hr class="m-0">
                                        
                                            <div class="card-body text-center m-t-10-minus" > 
                                                <a onclick="getpdfactualizado()" class="btn btn-outline-primary">
                                                        <i class="mr-2" data-feather="edit-2"></i> <?= $etiquetas->EtiquetaAvisoCompleta  ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                </div>
                                <div class="col-md-8">

                                    <div class="card">
                                        <div class="card-body">
                                            
                                            <div class="table-responsive">
                                                    <table class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Mes </th>
                                                        <th> Monto</th>
                                                        
                                                        <th>opcion</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  for ($i=0; $i < count($facturas) ; $i++) { ?>
                                                            <tr>
                                                                <td> <?= ($i+1).":".$facturas[$i]->periodo ?> </td>
                                                                <td> <?= $facturas[$i]->montoTotal ?> </td>
                                                                <td> <center> <button class="btn btn-primary"  onclick="obteneravisomes('<?= $facturas[$i]->periodoaux ?>')">  <?= $etiquetas->EtiquetaAviso  ?></button></center> </td>
                                                            </tr>
                                                        <?php  } ?>

                       


                                                
                                                    
                                                    </table>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="slick-center-mode">
                                                            <?php  for ($i=0; $i < count($metodospago) ; $i++) { ?>
                                                                <div class="slick-slide-item" style="  display: flex;flex-flow: column wrap;  justify-content: center;  align-items: center; "  >
                                                                    <img src="<?=  $metodospago[$i]->url_icon ?>" class="img-fluid" alt="<?=  $metodospago[$i]->nombre ?>">
                                                                    <label for=""><?=  $metodospago[$i]->nombre ?></label>
                                                                </div>
                                                                
                                                            <?php  } ?>
                                                        </div>
                                                    </div>
                                                 
                                              
                                                    <div class="col-md-6" >
                                                        <center><button class="btn btn-primary"  onclick="facturaspendientes()"> Siguiente</button></center>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                 
                                </div>
                            </div>
                               
                            </div>

                   
            </div>

                
            <!-- begin::footer -->
            <input type="hidden" id="empresa_id"name="empresa_id" value="<?= $empresa_id ?>">
            <input type="hidden" id="codigofijo" name="codigofijo" value="<?= $codigofijo ?>">
            
              <!-- end::footer -->
													
<script>
    function obteneravisomes(periodomes)
    {
        var urlajax="http://localhost/web_pago_facil/es/Welcome/getavisofacturames"; 
        var empresa_id=$("#empresa_id").val();
        var codigo_fijo=$("#codigofijo").val();

        
        var datos={
                    periodo:periodomes,
                    empresa_id:empresa_id ,
                    codigo_fijo:codigo_fijo                  
                        };
       // $("#pdf_view").load(urlajax,{datos});  
       var nuevaVentana= window.open("<?=  base_url() ?>/es/getavisomes2/"+periodomes+"/"+empresa_id+"/"+codigo_fijo,"ventana","left=200,top=200,height=300,width=500,scrollbar=si,location=no ,resizable=si,menubar=no");
 /*
        $.ajax({                    
													url: urlajax,
                                                    data: {datos},
													type : 'POST',
													//dataType: "json",
                                                   
													beforeSend:function( ) {   
														console.log("entro");
													},                    
													success:function(response) {
                                                        console.log("succes");
                                                        console.log(response);
                                                        var bytes = base64ToArrayBuffer(response); // pass your byte response to this constructor

                                                        var blob1=new Blob([bytes], {type: "application/pdf"});// change resultByte to bytes

                                                        
                                                          
                                                    //var file = new Blob([arreglo]);
                                                    var fileURL = URL.createObjectURL(blob1);
                                                    window.open(fileURL);
                                                  ;

													},
													error: function (data) {
                                                        console.log("error");
													    console.log(data.responseText);
													},               
													complete:function( ) {
												
													},
												}
												); 
                                                */

    }
    function obteneravisoactualizado()
    {

    }
    function getpdfactualizado() {
        var urlajax="http://localhost/web_pago_facil/es/Welcome/getavisofacturames"; 
        var empresa_id=$("#empresa_id").val();
        var codigo_fijo=$("#codigofijo").val();

        
       
       // $("#pdf_view").load(urlajax,{datos});  
       //http://localhost/web_pago_facil//es/getavisomes2/2020-02/13/23931
       var nuevaVentana= window.open("<?=  base_url() ?>es/getavisoactualizado/"+codigo_fijo+"/"+empresa_id,"ventana","left=200,top=200,height=300,width=500,scrollbar=si,location=no ,resizable=si,menubar=no");
 
    }
</script>


