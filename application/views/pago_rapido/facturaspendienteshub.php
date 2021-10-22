<style>
::-webkit-scrollbar {
    display: none;
}

@media only screen and (max-width: 500px) {
    .botonesabajo{
        position: fixed;
        left: 0px;
        right: 0px;
        bottom: 24px;
        height: 50px;
        z-index: 0;
    }


 .linea{
        width: 60%;
    }
}
@media only screen and (min-width: 1440px) {

    .linea{
        width: 50%;
    }
}

/* unvisited link */
.linkcomopagar:link {
  color: red;
}

/* visited link */
.linkcomopagar:visited {
  color: green;
}

/* mouse over link */
.linkcomopagar:hover {
  color: blue;
}

/* selected link */
.linkcomopagar:active {
  color: blue;
}
input.largerCheckbox { 
            width: 20px; 
            height: 20px; 
 }
 .table td, .table th {
    padding: .35rem;
 }
</style>
<div class="row">

<div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th> N </th>
                                            <th> Concepto </th>
                                            <th> NroItem  </th>
                                            <th> Monto </th>
                                            <th> Comision </th>
                                            <th> Monto Total  </th>
                                         
                                            <th> Opcion </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($facturas)){
                                                for ($i=0; $i < count($facturas) ; $i++) { ?>
                                                <tr>
                                                    <td> <?= $i+1 ?> </td>
                                                    <td> <?= $facturas[$i]->periodo ?> </td>
                                                    <td> <?= $facturas[$i]->nroitem ?> </td>
                                                    <td style="text-align: end;"> 
                                                        <?php if($facturas[$i]->montoTotal == 0 ){ ?> 
                                                            <input type="number" id="montototal" name="montototal" value="<?= @$facturas[0]->montoTotal  ?>">
                                                        <?php }else{
                                                                echo   number_format((float)$facturas[$i]->montoTotal, 2, '.', '') ;
                                                         ?>  
                                                            <input  type="hidden" id="montototal<?= $i ?>" name="montototal" value="<?= @$facturas[0]->montoTotal  ?>"> 
                                                        
                                                            <?php  } ?> 
                                                    </td>
                                                    <td>
                                                         <?=   number_format((float)$facturas[$i]->MontoComision, 2, '.', '') ; ?> 
                                                    </td>
                                                   
                                                    <td>
                                                         <?=   number_format((float)$facturas[$i]->MontoComision, 2, '.', '') +number_format((float)$facturas[$i]->montoTotal, 2, '.', '')  ; ?> 
                                                    </td>
                                                    <td>
                                                        <center>
                                                        <?php if($i == 0 ){ ?> 
                                                            <input  type="checkbox"  name="Items"  id="Items<?= $i ?>"  >
                                                        <?php }else{ ?>
                                                                <input  type="checkbox" disabled name="Items<?= $i ?>"  id="Items<?= $i ?>"   value="<?= $facturas[$i]->nroitem ?>" >
                                                        <?php  } ?>    

                                                        </center>                                                    
                                                    </td>
                                                </tr>
                                            <?php  }?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td> <label id="lblMontototalfinal" for=""></label></td>
                                                    <td> 
                                                        <center>  
                                                            <button class="btn btn-outline-primary" onclick="$('#divcajametodopago').toggle(1500);  $('html, body').animate({ scrollTop: $('#divcajametodopago').offset().top}, 2000);" > Pagar  </button>
                                                        </center> 
                                                    </td>
                                                </tr>
                                        <input type="hidden" id="montototal"name="montotoal" value="<?= @$facturas[0]->montoTotal  ?>">
                                        <input type="hidden" id="facturaid"  name="facturaid" value="<?= @$facturas[0]->factura  ?>">
                                        
                                        
                                        
                                        
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                   <div class="card" >
                        <div class="card-body text-center m-t-10-minus" style="padding-bottom: 0.3rem;">
                            <div class="card-body" style="overflow: hidden;overflow-x: scroll;    text-align: initial;    padding: 0.1rem;">
                                <div class="mb-2" style="display: -webkit-inline-box;     padding: 0.1rem;">
                                    <div  style="width:100px">Codigo Fijo:</div>
                                    <div style="width:100px"> Concepto:</div>
                                    <div style="width:100px">Codigo Ubicacion:</div>
                                    <div style="width:150px"> Nombre:</div>
                                    <div style="width:100px">Facturas por pagar:</div>
                                    <div style="width:100px">  <a onclick="getpdfactualizado()" class="btn btn-outline-primary"><i class="mr-2" data-feather="edit-2"></i> <?= $etiquetas->EtiquetaAvisoCompleta  ?></a>    </div>    
                                </div>
                                <div class="mb-2" style="display: -webkit-inline-box;" >
                                        <div style="width:100px"> <?= @$idCliente;  ?>     </div>
                                        <div style="width:100px"><?= @$periodomes ?>      </div>
                                        <div style="width:100px"> <?= @$codigoUbicacion;  ?>   </div>
                                        <div style="width:150px"> <?= @$nombre;  ?>    </div>
                                        <div style="width:100px"> <?= @$cantidadfacturas;  ?>     </div>       
                                </div>
                                <div id="divinformacion" style="display:none">
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted" style="align-self: center;"><?=  @$nombreempresa  ?></div>
                                            <div class="col-6" style="display: flex;flex-flow: column wrap;  justify-content: center;  align-items: center; "  >  
                                                    <img src="<?=  @$urlimagenempresa  ?>" class="rounded-circle" style="width:100%; height:75px ;     object-fit: contain;" alt="...">
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <a href="#" onclick="funcionvermas()">Ver Mas</a>
                         
                        </div>
                    </div>
                </div>

               
</div>
    <div class="row">
                
              


                <div clas="col-md-6" id="divcajametodopago" style="display:none">
                    <div class="card">
                         
                                <?php if($cantidadfacturas>0){ ?>
                                    
                                    <div class="card-body" style="padding: 0rem;">
                                                    <div class="accordion" style="border-bottom: ridge; border-radius: 10px;border: #e8e6ec; border-style: double" id="accordionExample">
                                                    <?php  for ($i=0; $i <  count($metodospagogrupos); $i++) { ?>
                                                    
                                                        <div class="card shadow-none"  style="padding-top:7px">
                                                            <div class="card-header" id="headingThree" style="width: -webkit-fill-available;">
                                                                    <div class="row" style="width: -webkit-fill-available;">
                                                                        <a href="" id="grupometodopago<?=  $i ?>" class="btn btn-link collapsed"  style="    width: -webkit-fill-available;" data-toggle="collapse" data-target="#collapse<?= $metodospagogrupos[$i]->GrupoMetodoPago  ?>" aria-expanded="false" aria-controls="collapseThree">
                                                                            <div class="col-md-2 col-3">
                                                                                <figure class="avatar">
                                                                                    <img src="<?= $metodospagogrupos[$i]->Logo  ?>" alt="avatar">
                                                                                </figure>
                                                                            </div>
                                                                            <div class="col-md-10 col-9" style="    text-align: initial;">
                                                                                <p for="" class="card-title" style="     margin-bottom: 0.4rem;"><?= $metodospagogrupos[$i]->Nombre  ?></p>
                                                                                <label for="" class="mb-2" style="font-weight: 100; color:black"> <?= $metodospagogrupos[$i]->Descripcion  ?> </label>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                            </div>
                                                            <div id="collapse<?= $metodospagogrupos[$i]->GrupoMetodoPago  ?>" class="collapse" aria-labelledby="headingThree"     data-parent="#accordionExample">
                                                                <div class="card-body" style="    background: #dedede8a;">
                                                                
                                                                    <div class="row">
                                                                            <div class="col-md-2 col-4">
                                                                                
                                                                            </div>
                                                                            
                                                                            <div class="col-md-10 col-8 row">
                                                                                
                                                                                
                                                                            <?php  for ($j=0; $j < count($metodospagogrupos[$i]->MetodosPago) ; $j++) {  ?>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group" style="margin-bottom: 0rem;">
                                                                                                    <div class="custom-control custom-radio" onclick="ledioaeste(<?=  $metodospagogrupos[$i]->MetodosPago[$j]->MetodoPago ?>,'#img-<?=  $metodospagogrupos[$i]->MetodosPago[$j]->MetodoPago ?>')">
                                                                                                        <input type="radio" id="metodopago-<?=  $metodospagogrupos[$i]->MetodosPago[$j]->MetodoPago ?>"  name="customRadio"  class="custom-control-input" >
                                                                                                        <label class="custom-control-label" for="metodopago-<?=  $metodospagogrupos[$i]->MetodosPago[$j]->MetodoPago ?>"><img    id="img-<?=  $metodospagogrupos[$i]->MetodosPago[$j]->MetodoPago ?>" style=" height:30px;    object-fit: contain;" src="<?=  $metodospagogrupos[$i]->MetodosPago[$j]->url_icon ?>" alt="<?=  $metodospagogrupos[$i]->MetodosPago[$j]->Nombre ?>">     <?=  $metodospagogrupos[$i]->MetodosPago[$j]->etiquetaBilletera ?></label>
                                                                                                    </div>
                                                                                        </div>
                                                                                    
                                                                                    </div>

                                                                                    <script>
                                                                                        <?php  if(isset( $_SESSION['metododepago'])){ 
                                                                                            if($_SESSION['metododepago']== $metodospagogrupos[$i]->MetodosPago[$j]->MetodoPago){
                                                                                            ?> 
                                                                                                var grupometododepago="#grupometodopago<?=  $i ?>";     
                                                                                        <?php }} ?> 
                                                                                            
                                                                                    </script>
                                                                                    

                                                                                <?php }  ?>
                                                                                


                                                                            </div>
                                                                        </div>
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>   
                                                    </div>
                                 

                                
                                    
                                </div>
                                <div class="row botonesabajo" style="padding-bottom: 10px;">
                                            <div class="col-md-12" >
                                            
                                            <center><button class="btn btn-primary"  onclick="vistafacturacion()"> Siguiente</button></center>
                                                
                                    </div>
                                   </div>


                                <?php }else{ echo "usted no tiene facturas por pagar"; }?>




                                
                            
                    </div>
                </div>
    
    </div>
<!-- begin::footer -->
    <input type="hidden" id="empresa_id"name="empresa_id" value="<?= $empresa_id ?>">
    <input type="hidden" id="codigofijo" name="codigofijo" value="<?= $codigofijo ?>">
    <input type="hidden" id="url" name="url" value="<?= $url ?>">
    

<!-- end::footer -->
													
<script>

    function elegiritem(checkitem){
        
        $("#Items"+(checkitem)).prop("disabled", false);

    }

    $('input[type=checkbox]').on('change', function() {
        //$("#Items"+(checkitem)).prop("disabled", false);
        if ($(this).is(':checked') ) {
            console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Seleccionado");

        } else {
            console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Deseleccionado");
        }
    });

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
    var codigo_fijo=$("#codigofijo").val();
    var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
    var datos= {metododepago:idmetododepago , montototal:montototal , idfactura:idfactura , tnIdentificarPestaña:tnIdentificarPestaña , codigofijo:codigo_fijo };
    var urlajax=$("#url").val()+"vistafacturacion";  
     
    $("#facturacionbody").empty();   
    $("#facturacionbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    $("#confirmacionbody").empty();   
    $("#confirmacionbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    $("#prepararpagobody").empty();   
    $("#prepararpagobody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    
    
    $.ajaxSetup(
        {
            cache: false,
            
                    });
    $("#facturacionbody").load(urlajax,{datos});   
    $("#li3").show();
    $("#facturacion-tab").click();
    
}
idmetododepago=0;
    function ledioaeste(idmetododepagonuevo,id_item)
            {
                console.log(id_item);
            
             // $("#img-"+idmetododepago).css("border", "none");
              idmetododepago=idmetododepagonuevo;
                //id_fugure_region=id_figure;
                //$('#btn_region').click();
           /*     $(id_item).css("border", "solid");
                $(id_item).css("border-color", "red");
                $(id_item).css("border-style", "outset");
                $(id_item).css("border-radius", "15px");
                //$("#nombre_region").text(nombre);*/
                //filtrar_empresas();

            }

            $(document).ready(function() {
            // Instrucciones a ejecutar al terminar la carga
            //ledioaeste(5,"#img-5");
           <?php  if(isset( $_SESSION['metododepago'])){  ?> 
                $(grupometododepago).click();
                $("#metodopago-<?= $_SESSION['metododepago'] ?>").click();
                
            <?php  }else{?> 
                $("#grupometodopago3").click();
                $("#metodopago-5").click();
            <?php  } ?> 
            
            
            
            
            });
             function funcionvermas()
             {
                $("#divinformacion").toggle(500);
             }
         

</script>

      <!-- Slick -->
      <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick-theme.css" type="text/css">
    <script src="<?=  base_url() ?>/application/assets/vendors/slick/slick.min.js"></script>
    <script src="<?=  base_url() ?>/application/assets/assets/js/examples/slick.js"></script>
