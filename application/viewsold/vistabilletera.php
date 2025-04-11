
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="height: 100%;">
                        <div class="card-body text-center m-t-10-minus">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>billeteras dependientes</p>
                                        <ul class="list-group">

                                        <?php 
                                        
                                        
                                        for ($i=0; $i < count($billeteradependientes) ; $i++) { ?>
                                            <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="  <?= @$billeteradependientes[$i]->idBilletera ?>"  name="billeteraid" id="">
                                                <label class="form-check-label" for="defaultCheck3">
                                                    <?= @$billeteradependientes[$i]->NombreCliente ?>
                                                </label>
                                            </div>

                                            </li>
                                        <?php  } ?>
                                        </ul>


                                    </div>   
                                    <div class="col-md-6">
                                        <p>Buscador de billeteras </p>
                                        <div class="row">
                                                <div class="col-md-8"> <input type="number" placeolder="introducir billetera" id="codigousuario" ></div>
                                                <div class="col-md-4"><input onclick="buscarbilletera()" type="button" value="Buscar"></div>
                                            </div>
                                        <ul id="listabuscador" class="list-group">
                                           
                                           

                                          
             
                                        </ul>


                                    </div>   
                                </div>      
                                      
                            </div>
                           
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <center style="padding-bottom: 10px;"  >
                                <label for="">Monto a Recargar</label>
                                <input id="inpmonto" type="number" placeolders="Monto" >
                                </center>
                                
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
               
                                <div class="row">
                                
                                      
                                            <?php  for ($i=0; $i < count($metodospago) ; $i++) {
                                                ?>
                                                <div class="col-md-2"   onclick="ledioaeste(<?=  $metodospago[$i]->metodoPago ?>,'#img-<?=  $metodospago[$i]->metodoPago ?>')"  style=" word-wrap: break-word; border-color:blue;height:40px; width:140px;padding:10px; padding: 5px 5px 5px 5px;overflow:visible;   object-fit: cover;" id="item<?=  $metodospago[$i]->metodoPago ?>" >
                                                <img    id="img-<?=  $metodospago[$i]->metodoPago ?>" style=" height:30px; width:100%; position: relative;" src="<?=  $metodospago[$i]->url_icon ?>" alt="<?=  $metodospago[$i]->nombreMetodoPago ?>">    
                                                <!-- <label for=""><?=  $metodospago[$i]->nombreMetodoPago ?> </label> -->
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
                
            </div>
      
<!-- begin::footer -->


<!-- end::footer -->
	<script>
      
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

        function realizarrecarga()
        {       var monto=$('#inpmonto').val();
                var billetera=$('input:radio[name=billeteraid]:checked').val();
                console.log(billetera);
                if( billetera== null)
                {
                    billetera="";
                }
            
                if( (monto != "") && (billetera != "")    ){
                var datos= {monto:monto , billetera:billetera };
                var urlajax=$("#url").val()+"recargabilletera"; 
            
                $.ajax({                    
                        url: urlajax,
                        data: {datos},
                        type : 'POST',
                        dataType: "json",
                        
                            beforeSend:function( ) {   
                           
                            },                    
                            success:function(response) {
                            console.log(response);
                            if(response.tipo==10)
                                {
                                    //$("#modalconfirmar").click();
                                  
                                    swal("Recarga Exitosa", response.mensaje , "success");  
                                   
                                }
                            if(response.tipo==1)
                                {
                                    swal("Error", response.mensaje , "error");
                                
                                }
                            

                            },
                            error: function (data) {
                                console.log(data);
                                
                            },               
                            complete:function( ) {
                                
                            },
                        }); 
                }else{
                    
               
                    if( (monto == "")){
                        swal("Error", 'debe asignar un monto' , "error");
                        
                    }
                    if(( billetera == "")){
                        swal("Error", 'Elegir billetera' , "error");
                        
                    }
                } 
                

       
        }

        function vistafacturacion()
            {
                var montototal=$('#inpmonto').val();
                var idfactura=$("#facturaid").val();
                var billetera=$('input:radio[name=billeteraid]:checked').val();
                if( billetera== null)
                {
                    billetera="";
                }
            
                if( (montototal != "") && (billetera != "")    ){
             
                var datos= {metododepago:idmetododepago , montototal:montototal , idfactura:0, idbilletera:billetera };
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
                    
               
                    if( (montototal == "")){
                        swal("Error", 'debe asignar un monto' , "error");
                        
                    }
                    if(( billetera == "")){
                        swal("Error", 'Elegir billetera' , "error");
                        
                    }
                }
            }
        idmetododepago=0;
    function ledioaeste(idmetododepagonuevo,id_item)
            {
            console.log(id_item);
            
            $("#img-"+idmetododepago).css("border", "none");
            idmetododepago=idmetododepagonuevo;
            $(id_item).css("border", "solid");
            }

            $(document).ready(function() {
            // Instrucciones a ejecutar al terminar la carga
            ledioaeste(5,"#img-5");
            });
         

    </script>

      <!-- Slick -->
      <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick-theme.css" type="text/css">
    <script src="<?=  base_url() ?>/application/assets/vendors/slick/slick.min.js"></script>
    <script src="<?=  base_url() ?>/application/assets/assets/js/examples/slick.js"></script>
