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

<?php // if($cantidadfacturas>0){  ?>
   <div clas="col-md-5 col-sm-5 col-lg-5" id="divcajametodopago" >
      <div class="card">

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
                                 <div class="form-group"   style="margin-bottom: 0rem;">
                                    <div class="custom-control custom-radio" >
                                    
                                       <input  type="radio" data-metodopago="<?= $metodospagogrupos[$i]->MetodosPago[$j]->MetodoPago ?>"   data-item="#img-<?=  $metodospagogrupos[$i]->MetodosPago[$j]->MetodoPago ?>" id="metodopago-<?=  $metodospagogrupos[$i]->MetodosPago[$j]->MetodoPago ?>"  name="customRadio"  class="custom-control-input" >
                                       <label class="custom-control-label" for="metodopago-<?=  $metodospagogrupos[$i]->MetodosPago[$j]->MetodoPago ?>"><img    id="img-<?=  $metodospagogrupos[$i]->MetodosPago[$j]->MetodoPago ?>" style=" height:30px;    object-fit: contain;" src="<?=  $metodospagogrupos[$i]->MetodosPago[$j]->url_icon ?>" alt="<?=  $metodospagogrupos[$i]->MetodosPago[$j]->Nombre ?>">     <?=  $metodospagogrupos[$i]->MetodosPago[$j]->etiquetaBilletera ?></label>
                                    </div>
                                 </div>
                              </div>
                              <script>
                        var grupometododepago;
                                 <?php  if(isset($lnUltimoMetodPago)){ 
                                    if($metodospagogrupos[$i]->MetodosPago[$j]->MetodoPago== $lnUltimoMetodPago){
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
      </div>
   </div>
   <div id="cajalistafacturas" class="col-md-6 col-sm-6 col-lg-6" style="display:none"  >
   </div>
<?php //}else{  echo "Este Cliente no tiene facturas por pagar "; ?>
<?php // } ?>
</div>
    <!-- begin::footer -->
    <input type="hidden" id="empresa_id"name="empresa_id" value="<?= $empresa_id ?>">
    <input type="hidden" id="codigofijo" name="codigofijo" value="<?= @$codigofijo ?>">
   
    <input type="hidden" id="tnPosicion" name="tnPosicion" value="<?= $tnPosicion ?>">
    

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
   var lafacturas=new Array(); 
   for (let index = 0; index < cantidadfacturas; index++) {
      
      if($("#items-"+(index)).is(':checked') )
      {
      //$("#items-"+(index)).prop("checked", true);
      console.log($("#items-"+(index)).prop("id"));
      lafacturas.push ($("#items-"+(index)).val()); 
      }
   }
   console.log(lafacturas);
    var montototal= montototalaux ;//$("#montototal").val(montototalgeneral);
    var montocomision= montocomisionaux;
    var idfactura=$("#facturaid").val();
    var codigo_fijo=$("#codigofijo").val();
    var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
    var facturasiten=lafacturas;
    var datos= {metododepago:idmetododepago , montototal:montototal ,montocomision:montocomision  ,idfactura:idfactura , tnIdentificarPestaña:tnIdentificarPestaña , codigofijo:codigo_fijo, detallepago:facturasiten  };
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
      console.log("ledioaeste");
      idmetododepago=idmetododepagonuevo;
      $('#cajalistafacturas').show();
      listarfacturaspendientesmultiple(idmetododepago);
   }
$(document).ready(function() {
      <?php  if( $_SESSION['cliente']== 9  ) {  ?> 
               $("#grupometodopago2").click();
               $("#metodopago-4").click();
               ledioaeste(4,"#img-4") ;
         <?php  }else{
            if(isset($lnUltimoMetodPago) &&  !is_null($lnUltimoMetodPago)  )
               {
            ?> 
            console.log(grupometododepago);
               if(grupometododepago != null){
                  $(grupometododepago).click();
                  $("#metodopago-<?= $lnUltimoMetodPago ?>").click();
                  ledioaeste(<?= $lnUltimoMetodPago ?>,"#img-<?= $lnUltimoMetodPago ?>") ;
               }else{
                  $("#grupometodopago2").click();
                  $("#metodopago-4").click();
                  ledioaeste(4,"#img-4") ;
               }
         
               <?php }else{  ?>
               $("#grupometodopago2").click();
               $("#metodopago-4").click();
               ledioaeste(4,"#img-4") ;

            <?php  }  } ?> 

         $("input[name=customRadio]").click(function () {    
               ledioaeste($(this).data("metodopago"),$(this).data("item")) ;
            });

});
function funcionvermas()
   {
      $("#divinformacion").toggle(500);
   }
         
    function listarfacturaspendientesmultiple(metododepago)
    {
       console.log("esta ingresndo al metodo listarfacturaspendientesmultiple");
        var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
        var tnPosicion=$("#tnPosicion").val();
        var tnEmpresa=$("#empresa_id").val();
        var datos=  {  tnMetodoPago:metododepago , tnEmpresa:tnEmpresa,tnPosicion:tnPosicion , tnIdentificarPestaña:tnIdentificarPestaña };
        var urlajax=$("#url").val()+"listadofacturaspendientes";   
        $("#cajalistafacturas").empty();   
        $("#cajalistafacturas").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
       // $("#cajalistafacturas").click();
       $.ajaxSetup(
                  {
                     cache: false,
                     error: function(event, request, settings){
                        $("#cajalistafacturas").empty();  
                        swal("a ocurrido un error al procesar la solicitud ", "volver a elegir metodo pago ,si el error persite  consultar con atencion al cliente  72104048 " , "error");
                        }

                  });
        $("#cajalistafacturas").load(urlajax,{datos});

      $("#facturacionbody").empty();   
      $("#facturacionbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
      $("#confirmacionbody").empty();   
      $("#confirmacionbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
      $("#prepararpagobody").empty();   
      $("#prepararpagobody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);     
        

    }

</script>

      <!-- Slick -->
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick-theme.css" type="text/css">
    <script src="<?=  base_url() ?>/application/assets/vendors/slick/slick.min.js"></script>
    <script src="<?=  base_url() ?>/application/assets/assets/js/examples/slick.js"></script>
