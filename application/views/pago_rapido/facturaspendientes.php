<div class="row">
                <div class="col-md-4">
                   <div class="card" style="height: 100%;">
                        <div class="card-body text-center m-t-10-minus">
                            <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted"><?=  @$nombreempresa  ?></div>
                                            <div class="col-6" style="display: flex;flex-flow: column wrap;  justify-content: center;  align-items: center; "  >  
                                                    <img src="<?=  @$urlimagenempresa  ?>" class="rounded-circle" style="width:100%; height:75px" alt="...">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">Codigo Fijo:</div>
                                            <div class="col-6"><?= @$idCliente;  ?></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">Codigo Ubicacion:</div>
                                            <div class="col-6"><?= @$codigoUbicacion;  ?></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted"> Nombre:</div>
                                            <div class="col-6"> <?= @$nombre;  ?> </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">Facturas por pagar:</div>
                                            <div class="col-6"> <?= @$cantidadfacturas;  ?>  </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted"> Mes:</div>
                                            <div class="col-6"><?= @$periodomes ?>  </div>
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
                                            <?php if(isset($facturas)){
                                                for ($i=0; $i < count($facturas) ; $i++) { ?>
                                                <tr>
                                                    <td> <?= ($i+1).":".$facturas[$i]->periodo ?> </td>
                                                    <td> <?= $facturas[$i]->montoTotal ?> </td>
                                                    <td> <center> <button class="btn btn-primary"  onclick="obteneravisomes('<?= $facturas[$i]->periodoaux ?>')">  <?= $etiquetas->EtiquetaAviso  ?></button></center> </td>
                                                </tr>
                                            <?php  }?>
                                        <input type="hidden" id="montototal"name="montotoal" value="<?= @$facturas[0]->montoTotal  ?>">
                                        <input type="hidden" id="facturaid"  name="facturaid" value="<?= @$facturas[0]->factura  ?>">
                                        
                                        
                                        
                                        
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <div class="card">
                            <div class="card-body">
                            <?php if($cantidadfacturas>0){ ?>
                                <div class="row">
                                
                                      
                                            <?php  for ($i=0; $i < count($metodospago) ; $i++) {
                                                ?>
                                                <div class="col-md-2"   onclick="ledioaeste(<?=  $metodospago[$i]->metodoPago ?>,'#item<?=  $metodospago[$i]->metodoPago ?>')"  style=" word-wrap: break-word; border-color:blue;height:100px; width:140px;padding:10px; padding: 5px 5px 5px 5px;overflow:visible;   object-fit: cover;" id="item<?=  $metodospago[$i]->metodoPago ?>" >
                                                <img    id="img-<?=  $metodospago[$i]->metodoPago ?>" style=" height:30px; width:100%; position: relative;" src="<?=  $metodospago[$i]->url_icon ?>" alt="<?=  $metodospago[$i]->nombreMetodoPago ?>">    
                                                <label for=""><?=  $metodospago[$i]->nombreMetodoPago ?> </label>
                                                
                                                </div>

                                                
                                                
                                            <?php  } ?>
                  
                                 
                                    
                                  
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-12" >
                                       
                                       <center><button class="btn btn-primary"  onclick="vistafacturacion()"> Siguiente</button></center>
                                         
                                   </div>
                                
                                </div>
                                <?php }else{ echo "usted no tiene facturas por pagar"; }?>



                            </div>
                    </div>
                </div>
    </div>
      
<!-- begin::footer -->
    <input type="hidden" id="empresa_id"name="empresa_id" value="<?= $empresa_id ?>">
    <input type="hidden" id="codigofijo" name="codigofijo" value="<?= $codigofijo ?>">
    <input type="hidden" id="url" name="url" value="<?= $url ?>">
    

<!-- end::footer -->
													
<script>
function obteneravisomes(periodomes)
{
    var urlajax= $("#url").val()+"Welcome/getavisofacturames"; 
    var empresa_id=$("#empresa_id").val();
    var codigo_fijo=$("#codigofijo").val();
    var datos={
                periodo:periodomes,
                empresa_id:empresa_id ,
                codigo_fijo:codigo_fijo                  
        };
    var nuevaVentana= window.open("<?=  base_url() ?>/es/getavisomes2/"+periodomes+"/"+empresa_id+"/"+codigo_fijo,"ventana","left=200,top=200,height=300,width=500,scrollbar=si,location=no ,resizable=si,menubar=no");
}
function getpdfactualizado()
{
    var urlajax="http://localhost/web_pago_facil/es/Welcome/getavisofacturames"; 
    var empresa_id=$("#empresa_id").val();
    var codigo_fijo=$("#codigofijo").val();
    var nuevaVentana= window.open("<?=  base_url() ?>es/getavisoactualizado/"+codigo_fijo+"/"+empresa_id,"ventana","left=200,top=200,height=300,width=500,scrollbar=si,location=no ,resizable=si,menubar=no");
}



// en este metodo se  guardar el metodo de pago el monto y la comision en variables de session 
function vistafacturacion()
{
    var montototal=$("#montototal").val();
    var idfactura=$("#facturaid").val();
    var datos= {metododepago:idmetododepago , montototal:montototal , idfactura:idfactura };
    var urlajax=$("#url").val()+"vistafacturacion";  
     
    $("#facturacionbody").empty();   
    $("#facturacionbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    $("#confirmacionbody").empty();   
    $("#confirmacionbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    $("#prepararpagobody").empty();   
    $("#prepararpagobody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    
    
     
    $("#facturacionbody").load(urlajax,{datos});   
    $("#li3").show();
    $("#facturacion-tab").click();
    
}
idmetododepago=0;
    function ledioaeste(idmetododepagonuevo,id_item)
            {
                console.log(id_item);
            
              $("#item"+idmetododepago).css("border", "none");
              idmetododepago=idmetododepagonuevo;
                //id_fugure_region=id_figure;
                //$('#btn_region').click();
                $(id_item).css("border", "solid");
                //$("#nombre_region").text(nombre);
                //filtrar_empresas();

            }

            $(document).ready(function() {
            // Instrucciones a ejecutar al terminar la carga
            ledioaeste(5,"#item5");
            });
         

</script>

      <!-- Slick -->
      <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick-theme.css" type="text/css">
    <script src="<?=  base_url() ?>/application/assets/vendors/slick/slick.min.js"></script>
    <script src="<?=  base_url() ?>/application/assets/assets/js/examples/slick.js"></script>
