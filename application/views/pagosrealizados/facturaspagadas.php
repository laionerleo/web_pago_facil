
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-body text-center m-t-10-minus">
                            <div class="card-body">
                            <div class="row">
                            <div class="col-md-8">
                                <div class="row mb-2">
                                    <div class="col-12 text-muted">Verificacion de Pago</div>
                                    
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 text-muted">Empresa:</div>
                                    <div class="col-6"> <?= @$nombreempresa;  ?> </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 text-muted">Codigo Cliente:</div>
                                    <div class="col-6"><?= @$codigocliente;  ?></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 text-muted">Cliente:</div>
                                    <div class="col-6"><?= @$nombrecliente;  ?></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 text-muted">Nro de factura:</div>
                                    <div class="col-6"><?= @$numerofacturas;  ?></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                               
                                <div class="row mb-2">
                                            
                                            <div class="col-12" style="display: flex;flex-flow: column wrap;  justify-content: center;  align-items: center; "  >  
                                                    <img src="<?=  @$urliconoempresapagada  ?>" class="rounded-circle" style="width:35%; height:60%" alt="...">
                                            </div>
                                        </div>
                            </div>
                            </div>

                                    <label for="">haga click en el fila de la lista que desea ver </label>
                                        <?php   if(count(@$facturaspagadas)>0){    ?>
                                        <div class="form-row">
                                        <div class="col-md-12 mb-12 table-responsive">
                                            <table id="example1" class="table table-striped table-bordered">
                                                                <thead>
                                                                <tr>
                                                                <th>Nro Transaccion</th>
                                                                    <th>Periodo</th>
                                                                    <th>Importe  </th>
                                                                    <th>Fecha de Pago</th>
                                                                    <th>Hora de Pago</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>                                                                
                                                                <?php  for ($i=0; $i < count($facturaspagadas) ; $i++) { ?>
                                                                    
                                                                    <tr id="fila-<?= $i ?>" onclick="mostrarmodalfacturas(<?= @$facturaspagadas[$i]->transaccionDePago ?> , '<?= @$facturaspagadas[$i]->periodo ?>' ,<?= @$facturaspagadas[$i]->factura ?> )"  > 
                                                                    <td>  <?= @$facturaspagadas[$i]->transaccionDePago ?></td>
                                                                    <td > 
                                                                    <label for=""><?= @$facturaspagadas[$i]->periodo ?></label>
                                                                    </td>
                                                                    <td>  <?= @$facturaspagadas[$i]->importe ?></td>
                                                                    <td>  <?= @$facturaspagadas[$i]->fechaPago ?></td>
                                                                    <td>  <?= @$facturaspagadas[$i]->horaPago ?></td>
                                                                    
                                                                 </tr>
                                                        
                                                                <?php }  ?>
                                                                
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <th>Nro Transaccion</th>
                                                                <th>Periodo</th>
                                                                    <th>Importe  </th>
                                                                    <th>Fecha de Pago</th>
                                                                    <th>Hora de Pago</th>
                                                                    

                                                                
                                                                </tr>
                                                                </tfoot>
                                                            </table>

                                                            </div>
                                                            </div>





                                                            <input  type="hidden" id="btnmodal" class="btn btn-primary" data-toggle="modal"  value="nada" data-target="#modalopciones">


                                                            <script src="<?=  base_url() ?>/application/assets/vendors/dataTable/datatables.min.js"></script>

                                                                <script>
                                                                $(document).ready( function () {                                                                    
                                                                    $('#example1').DataTable({
                                                                                        "ordering": false,
                                                                                        });  
                                                                } );
                                                                </script>

                                            <?php  }else{echo "No hay datos";}    ?>

                                     
                            </div>
                           
                        </div>
                    </div>
                </div>
                
             
                <input type="hidden" id="url" name="url" value="<?= $url ?>">
                
                <input type="hidden" id="btnmodalfacturas" name="btnmodalfacturas" data-toggle="modal"  value="nada" data-target="#modalopcionesfacturas">
                <input type="hidden" id="btnmodalcorreo" name="btnmodalcorreo" data-toggle="modal"  value="nada" data-target="#modalenviocorreo">
                <input type="hidden" id="btnmodalvisualizar" name="btnmodalvisualizar" data-toggle="modal"  value="nada" data-target="#modalvisualizar">


                <input type="hidden" name="codigocliente" id="codigocliente">
                <input type="hidden" name="codigotransaccion" id="codigotransaccion"  value="">
                <input type="hidden" name="periodo" id="periodo"  value="">
                <input type="hidden" name="nrofactura" id="nrofactura"  value="">


                
                
          
                
            </div>
<script>
   function veraviso()
{
    //
    var idfactura= $("#periodo").val();
    var tipo ;
         if(screen.width>=1024)
         {
            tipo =1
         }else{
            tipo=2;
         }
    var datos= { idfactura:idfactura , tipo:tipo };
    var urlajax=$("#url").val()+"vysoravisopdf";  
    $("#btncerrarvisualizar").click();
    $("#btncerraropcionesfacturas").click();
 
    $("#li3").show();
    
    $("#vysorpdfbody").load(urlajax,{datos});  
    $("#vysorpdf-tab").click(); 
  
   
     
}
function verfacturapagofacil()
{
    /*
    $tnTransaccionDePago=$datos['transaccion'];
		$tnEmpresa=$datos['codigoempresa'];
		$tnFactura= $datos['nrofactura'];	
       */ 
    var codigoempresa= $("#codigoempresa").val();
    var nrofactura= $("#nrofactura").val();
    var transaccion= $("#codigotransaccion").val();
    var tipo ;
         if(screen.width>=1024)
         {
            tipo =1
         }else{
            tipo=2;
         }

    var datos= { nrofactura:nrofactura ,transaccion:transaccion ,codigoempresa:codigoempresa , tipo:tipo  };
    var urlajax=$("#url").val()+"vysorfacturapagofacilpdf";  
    $("#btncerrarvisualizar").click();
    $("#btncerraropcionesfacturas").click();
    $("#li3").show();
    $("#vysorpdfbody").load(urlajax,{datos});  
    $("#vysorpdf-tab").click(); 
  
   
     
}
function verfacturaempresa()
{
    var codigoempresa= $("#codigoempresa").val();
    var nrofactura= $("#nrofactura").val();
    var transaccion= $("#codigotransaccion").val();
    var tipo ;
         if(screen.width>=1024)
         {
            tipo =1
         }else{
            tipo=2;
         }

    var datos= { nrofactura:nrofactura ,transaccion:transaccion ,codigoempresa:codigoempresa , tipo:tipo };
    var urlajax=$("#url").val()+"vysorfacturaempresapdf";  
    $("#btncerrarvisualizar").click();
    $("#btncerraropcionesfacturas").click();
    $("#li3").show();
    $("#vysorpdfbody").load(urlajax,{datos});  
    $("#vysorpdf-tab").click(); 
  
   
     
}



function mostrarmodalfacturas(codigotransaccio,periodo,factura)
{
  
    $("#btnmodalfacturas").click();
    $("#codigotransaccion").val(codigotransaccio);
    $("#periodo").val(periodo);
    $("#nrofactura").val(factura);
    
    

    
}
function mostrarmodalcorreo()
{
  
    $("#btnmodalcorreo").click();
    console.log('entro para mostrar el modal correo');
   // $("#codigocliente").val(codigo);
    
}
function mostrarmodalvisualizar()
{
  
    $("#btnmodalvisualizar").click();
    console.log('entro para mostrar el modal correo');
   // $("#codigocliente").val(codigo);
    
}

function enviarfacturacorreo()
{
                var empresa= $("#codigoempresa").val();
                var tccorreo= $("#tccorreo").val();
                var transaccion= $("#codigotransaccion").val();
                  
                  var datos= {empresa:empresa,tccorreo:tccorreo, transaccion:transaccion };
                  var urlajax=$("#url").val()+"enviarfacturacorreo"; 
              
                  $.ajax({                    
                          url: urlajax,
                          data: {datos},
                          type : 'POST',
                          dataType: "json",
                          
                              beforeSend:function( ) {   
                               
                              },                    
                              success:function(response) {
                              console.log(response);
                              $("#mensajecorreoenviado").text(response.mensaje);
                           
                              },
                              error: function (data) {
                                console.log(data);
                                $("#mensajecorreoenviado").text("Ah ocurrido un error");
                           
                                  
                              },               
                              complete:function( ) {
                                  
                              },
                          });  
  
           
          

}
</script>
 




        <div class="modal fade" id="modalopcionesfacturas" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Elija una opcion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="ti-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                   
                        <div class="row">
                            <div class="col-md-12" style="    margin-bottom: 4px;" >
                                <center>
                            
                                    <input class="btn btn-primary" onclick="veraviso()" type="button" value="Ver <?=  @ $etiquetas->EtiquetaAviso ?>"> 
                                </center>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-12" style="    margin-bottom: 4px;" >
                            <center>
                                <input class="btn btn-primary" onclick="mostrarmodalvisualizar()" type="button" value="Ver <?=  @ $etiquetas->EtiquetaTipoNota ?>"> 
                            </center>
                            </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-12" style="    margin-bottom: 4px;" >
                                <center>
                                <input class="btn btn-primary" type="button" onclick="mostrarmodalcorreo()" value="Enviar Factura por correo">
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" id="btncerraropcionesfacturas"  class="close" data-dismiss="modal" aria-label="Close">cerrar                                                                 
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalvisualizar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="correotitulo">Visualizar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="ti-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                            <div class="col-md-12" style="    margin-bottom: 4px;" >
                                <center>
                                <input class="btn btn-primary" onclick="veraviso()" type="button" value="Ver  <?=  @$etiquetas->EtiquetaAviso ?> <?= @$nombreempresa;  ?>"> 
                                </center>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12" style="    margin-bottom: 4px;" >
                                <center>
                                <input class="btn btn-primary" onclick="verfacturapagofacil()" type="button" value="Ver Factura PagoFacil"> 
                                </center>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12" style="    margin-bottom: 4px;" >
                            <center>
                                <input class="btn btn-primary" type="button" onclick="verfacturaempresa()"  value="Ver  <?=  @$etiquetas->EtiquetaTipoNota ?> <?= @$nombreempresa;  ?>">
                                </center>
                                </div>
                            </div>
                    
                            
                    </div>
                    <div class="modal-footer">
                   
                    <button type="button" id="btncerrarvisualizar"  class="close" data-dismiss="modal" aria-label="Close">cerrar                                                                 
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalenviocorreo" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="correotitulo">Correo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="ti-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                            <p>Ingrese el correo destino o selecciones el correo de su cuenta PagoFacil</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <label for="tccorreo">Ingrese correo destino</label>
                            <input type="email" id="tccorreo" name="tccorreo">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <label id="mensajecorreoenviado" for="mensaje"></label>
                        
                        </div>
                        
                    </div>  
                    <div class="modal-footer">
                    <input class="btn btn-primary" onclick="enviarfacturacorreo()" type="button" value="Enviar"> 
                    <button type="button" id="btncerrarcorreo"  class="close" data-dismiss="modal" aria-label="Close">cerrar                                                                 
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>



        