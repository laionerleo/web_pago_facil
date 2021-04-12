<style>


input.radiomontoclass { 
            width: 20px; 
            height: 20px; 
 } 
</style>
         
         
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
                                            <div class="col-6 text-muted">Billetera:</div>
                                            <div class="col-6"><?= @$taDatosBilletera->idBilletera;  ?></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted">CI NIT </div>
                                            <div class="col-6"><?=  @$taDatosBilletera->cinit;  ?></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted"> Nombre:</div>
                                            <div class="col-6"> <?=  @$taDatosBilletera->NombreCliente;   ?> </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6 text-muted"> Saldo Actual:</div>
                                            <div class="col-6"> <?=  @$taDatosBilletera->Saldo;   ?> </div>
                                        </div>
                                        
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                            <label for="">Monto a Recargar</label>
                            <div class="row">
                                    <div class="col-md-12">
                                
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input  radiomontoclass" type="radio" name="radiomonto"
                                                id="inlineRadio1" value="500">
                                            <label class="form-check-label" for="inlineRadio1">500 bs </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radiomontoclass" type="radio" name="radiomonto"
                                                id="inlineRadio2" value="1000">
                                            <label class="form-check-label" for="inlineRadio2">1000 bs </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radiomontoclass" type="radio" name="radiomonto"
                                                id="inlineRadio3" value="1500" >
                                            <label class="form-check-label" for="inlineRadio3">1500 bs </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radiomontoclass" type="radio" name="radiomonto"
                                                id="inlineRadio4" value="2000" >
                                            <label class="form-check-label" for="inlineRadio3">2000 bs  </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input radiomontoclass" type="radio" name="radiomonto"
                                                id="inlineRadio5" value="0" >
                                            <label class="form-check-label" for="inlineRadio3">Otro Monto  </label>
                                        </div>
                                    </div>
                                </div>
                          
                                <center style="padding-bottom: 10px; display:none" id="cajamonto"  >
                                    <div class="col-md-4">
                                        <label for="">Monto a Recargar</label>
                                        <input id="inpmonto" class="form-control" value="<?= $tnMontoMinimo ?>" min="<?= $tnMontoMinimo ?>" type="number" placeolders="Monto a recargar " style="    text-align: end;" >
                                    </div>
                                </center>
                              
                            
                               
                                
                            </div>
                            <center  >
                                    <div class="col-md-12">
                                        <p for="">Cantidad de recargas al dia : <?= $tnRecargasMaximo    ?>  Recargas Realizadas con exito : <?= $tnRecargasHechas    ?>   </p>
                                        
                                        
                                </center>
                        </div>

                        <div class="card">
                            <div class="card-body">
               
                                <div class="row">
                                
                                      
                                            <?php  for ($i=0; $i < count($metodospago) ; $i++) {
                                                ?>
                                                <div class="col-md-2 col-6 col-sm-4"   onclick="ledioaeste(<?=  $metodospago[$i]->metodoPago ?>,'#img-<?=  $metodospago[$i]->metodoPago ?>')"  style=" word-wrap: break-word; border-color:blue;height:55px; width:140px;padding:10px; padding: 5px 5px 5px 5px;overflow:visible;   object-fit: cover;" id="item<?=  $metodospago[$i]->metodoPago ?>" >
                                                <img    id="img-<?=  $metodospago[$i]->metodoPago ?>" style=" height:30px; width:100%; position: relative;" src="<?=  $metodospago[$i]->url_icon ?>" alt="<?=  $metodospago[$i]->nombreMetodoPago ?>">    
                                                <label style="    font-size: 10px;" for=""><?=  $metodospago[$i]->nombreMetodoPago ?> </label> 
                                                </div>
                                            <?php  } ?>
                  
                                 
                                    
                                  
                                </div>

                                <div class="ROW">
                                    <center><button class="btn btn-primary"  onclick="vistafacturacion()"> Recargar</button></center>
                                </div>
                            </div>
                        </div>
                </div>
                <input type="hidden" id="url" name="url" value="<?= $url ?>">
                <input type="hidden" id="tnBilletera" name="tnBilletera" value="<?= $tnBilletera ?>">
                <input type="hidden" id="inpMontoMinimo" name="inpMontoMinimo" value="<?= $tnMontoMinimo ?>">
                <input type="hidden" id="inpCantidadRecargas" name="inpCantidadRecargas" value="<?= $tnRecargasMaximo    ?>">
                <input type="hidden" id="inpRecargasHechas" name="inpRecargasHechas" value="<?= $tnRecargasHechas ?>">
                
                



                
            </div>
      
<!-- begin::footer -->


<!-- end::footer -->
	<script>
    var lnMontoMinimo= parseInt($('#inpMontoMinimo').val());
    var lnrecargamax=$('#inpCantidadRecargas').val();
    var lnRecargashechas=$('#inpRecargasHechas').val();
    
      
        function buscarbilletera()
        {       var codigousuario=$('#codigousuario').val();
                if( codigousuario != ""){
                var datos= {codigo:codigousuario};
                var urlajax=$("#url").val()+"buscadorbilletera"; 
            
                $.ajax({                    
                        url: urlajax,
                        data: {datos},
                        type : 'POST',
                        dataType: "json",
                        
                            beforeSend:function( ) {   
                           
                            },                    
                            success:function(response) {
                            //console.log(response);
                            billeteras=response;
                            console.log(billeteras);
                               
                            if(  billeteras.length>0)
                            {
                                $("#listabuscador").empty();   

                                for (let i = 0; i < billeteras.length; i++) {
                                  //console.log(metodosdepago[i]);
                                  
                                  var elemento = `<li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value=" `+billeteras[i].idBilletera+`"  name="billeteraid" id="">
                                                <label class="form-check-label" for="defaultCheck3">
                                                   `+billeteras[i].NombreCliente+`
                                                </label>
                                            </div>

                                            </li>`;

                               
                                  
                                  console.log(elemento);
                         
                                 $("#listabuscador").append(elemento);
                               }
                            }else{
                                $("#listabuscador").empty(); 
                                $("#listabuscador").append('<p> No existe billetera </p>');
                            }
                               
                            

                            },
                            error: function (data) {
                                console.log(data);
                                
                            },               
                            complete:function( ) {
                                
                            },
                        }); 
                }else{
                    alert("introducir billetera destino ");
                } 

       
        }

     
        function vistafacturacion()
            {
                var montototal=$('#inpmonto').val();      
                var idfactura=$("#facturaid").val();
                var billetera=$('#tnBilletera').val();
                var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
                console.log(lnrecargamax);
             if(  lnRecargashechas   < lnrecargamax)
             {
            
                if( (montototal != 0) && (montototal != "") && (montototal > 0) && (montototal >= lnMontoMinimo)   ){
             
                    var datos= {metododepago:idmetododepago , montototal:montototal , idfactura:0, idbilletera:billetera , tnIdentificarPestaña:tnIdentificarPestaña };
                    var urlajax=$("#url").val()+"vistafacturacionrecarga";  
                    
                    $("#facturacionbody").empty();   
                    $("#facturacionbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
                    $("#confirmacionbody").empty();   
                    $("#confirmacionbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
                    $("#prepararpagobody").empty();   
                    $("#prepararpagobody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);                   
                    $("#facturacionbody").load(urlajax,{datos});   
                    $("#li3").show();
                    $("#facturacion-tab").click();
                }else{
                    if( (montototal == 0) || (montototal == "" )  || (montototal < 0)   ){
                        swal("Error", 'debe asignar un monto valido' , "error");
                        
                    }
                    if(montototal <= lnMontoMinimo) 
                    {
                        swal("Error", 'Monto minimo a recargar es de '+lnMontoMinimo + 'Bs' , "error");
                    }
                
                }

             }else{
                swal("Error", 'ya supero su limite de recargas al dia' , "error");
                 //aqui entra si ya supero su limite de recargas
             }

                
            }
        idmetododepago=0;
    function ledioaeste(idmetododepagonuevo,id_item)
            {
            console.log(id_item);
            
            $("#img-"+idmetododepago).css("border", "none");
            idmetododepago=idmetododepagonuevo;
            $(id_item).css("border", "solid");
            $(id_item).css("border-color", "red");
            $(id_item).css("border-style", "outset");
            $(id_item).css("border-radius", "15px");
            
            
            }

            $(document).ready(function() {
            // Instrucciones a ejecutar al terminar la carga
            ledioaeste(5,"#img-5");
            });


    
        $("input[name=radiomonto]").change(function () {	
          //  console.log("ingreso aqui ");
           // alert($(this).val());
           if($(this).val() == 0 ){
            var tnMontoMinimo=$('#inpMontoMinimo').val();
                $("#inpmonto").val(tnMontoMinimo);
                $("#cajamonto").show();
           }else{
            $("#cajamonto").hide();
            $("#inpmonto").val($(this).val());
            
           }



           
        });
         

    </script>

      <!-- Slick -->
      <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick-theme.css" type="text/css">
    <script src="<?=  base_url() ?>/application/assets/vendors/slick/slick.min.js"></script>
    <script src="<?=  base_url() ?>/application/assets/assets/js/examples/slick.js"></script>
