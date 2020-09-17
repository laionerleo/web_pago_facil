
            <div class="row">
                <div class="col-md-8">
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
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">

                        <center style="padding-bottom: 10px;"  ><input id="inpmonto" type="number" placeolders="Monto" ></center>
                        <center><button class="btn btn-primary"  onclick="realizarrecarga()"> Realizar recarga</button></center>
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
            $("#prepararpagobody").empty();   
            $("#prepararpagobody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
            $("#prepararpagobody").load(urlajax,{datos});  
            
            $("#li5").show();
            $("#prepararpago-tab").click();  
            

        }
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
                           // billeteras=response;
                          
                               
                           
                            

                            },
                            error: function (data) {
                                console.log(data);
                                
                            },               
                            complete:function( ) {
                                
                            },
                        }); 
                }else{
                    
               
                    if( (monto == "")){
                        alert("introducir Monto ");
                    }
                    if(( billetera == "")){
                        alert("Elegir billetera");
                    }
                } 
                

       
        }

    </script>

      <!-- Slick -->
      <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick-theme.css" type="text/css">
    <script src="<?=  base_url() ?>/application/assets/vendors/slick/slick.min.js"></script>
    <script src="<?=  base_url() ?>/application/assets/assets/js/examples/slick.js"></script>
