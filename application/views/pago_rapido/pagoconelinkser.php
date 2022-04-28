                       
                       
                       <div class="row">
                                <div class="col-md-8">
                                <div class="card">
                                        <img id="baner" src="https://cinecenter.com.bo/assets/images/linkser.png"  style ="height: 90px;"class="card-img-top" alt="...">
                                        <div class="card-body text-center m-t-70-minus">
                                            <br>
                                                <div class="row mb-2">
                                                    <div class="col-6 text-muted"> <h3 style=" color: aliceblue;">Monto</h3></div>
                                                    <div class="col-6"> <h3 style=" color: aliceblue;"> <?= number_format((float)$montototal, 2, '.', '');   ?></h3></div>
                                                </div>
                                            
                                            
                                                <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                        <label for="inpci">Nro de tarjeta</label>
                                                        <input class="form-control" type="number" name="inpnrotarjeta" placeholder="    -   -   -" id="inpnrotarjeta" value="" >
                                                        </div>
                                                </div>
                                                <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                        <label for="inpci">Nombre del tarjeta habiente</label>
                                                        <input class="form-control" type="text" name="inpnombretarjeta" placeholder="" id="inpnombretarjeta" value="" >
                                                        </div>
                                                </div>


                                         
                                            <div class="form-row">
                                            
                                                <div class="row col-md-12" >
                                                <label id="etiquetatipopago" for="">Fecha Expiracion</label> 
                                                <div class="col-xs-6" >

                                                        <select class="custom-select custom-select-m" name="slcmes" id="slcmes">
                                                            <option value="01">ENE</option>
                                                            <option value="02">FEB</option>
                                                            <option value="03">MAR</option>
                                                            <option value="04">ABR</option>
                                                            <option value="05">MAY</option>
                                                            <option value="06">JUN</option>
                                                            <option value="07">JUL</option>
                                                            <option value="08">AGO</option>
                                                            <option value="09">SEP</option>
                                                            <option value="10">OCT</option>
                                                            <option value="11">NOM</option>
                                                            <option value="12">DIC</option>
                                                        </select>
                                                </div>

                                                <div class="col-xs-6" >
                                                    <?php
                                                    $cont = date('Y');
                                                    $contfinal = $cont+10;
                                                    ?>
                                                    <select class="custom-select custom-select-m" name="slcaño" id="slcaño">
                                                    <?php while ($cont <= $contfinal) { ?>
                                                    <option value="<?= $cont ?>"><?php echo($cont); ?></option>
                                                    <?php $cont = ($cont+1); } ?>
                                                    </select>
                                                    <?php ?>
                                                </div>
                                                </div>
                                                
                                                
                                                
                                            </div>
                                            <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <br>
                                                        
                                                        <input class="form-control" type="number" name="inpcodigoseguridad" placeholder="Codigo seguridad"  id="inpcodigoseguridad" value="" >
                                                        </div>
                                                </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                <center> <button class="btn btn-primary "onclick="ejecutarpago()">Pagar </button> </center>

                                        <input  type="hidden" id="confirmarpago" class="btn btn-primary" data-toggle="modal" data-target="#modalconfirmarpago">
                                                </div>
                                            
                                            </div>


                                        
                                        </div>
                                        <hr class="m-0">
                                    </div>
                                  
                                </div>
                            
                                
                                
                            </div>
                   
<!-- begin::footer -->

<!-- begin::modal -->


  
    <input type="hidden" id="url" name="url" value="<?= $url ?>">
<!-- end::footer -->
<script>
    var codigoservicio="001";
   // var ci =0;
    //var extension="";
   // var expiracion ="";
   
      

        function ejecutarpago()
        {
            /*        @Field("tcExtension")               String  tcExtension,  $session['extension'] si es la extencion del carnet es el departamendo del ci 
            @Field("tcComplement")              String  tcComplement,  $session['complemento']-- si hay duplicados  
            @Field("tcServiceCode")             String  tcServiceCode,  $session['servicecode']  
            @Field("tcExpireDate")              String  tcExpireDate);  $session['expiredate'] dato de expiracion 

            */
            var nrotarjeta=$('#inpnrotarjeta').val();
            var nombretarjeta=$('#inpnombretarjeta').val();
            var fechaexpiracion=$('#slcaño').val()+$('#slcmes').val();
            var codigoseguridad=$('#inpcodigoseguridad').val();
            
            
            
            var datos= {nrotarjeta:nrotarjeta, nombretarjeta:nombretarjeta, fechaexpiracion:fechaexpiracion , codigoseguridad :codigoseguridad  };
            var urlajax=$("#url").val()+"ejecuparpagoeLinkser";   
        //   $("#prepararpagobody").load(urlajax,{datos});   
         $.ajax({                    
                    url: urlajax,
                    data: {datos},
                    type : 'POST',
                    dataType: "json",
                    
                        beforeSend:function( ) {   
                            //$("#waitLoading").fadeIn(1000);
                        },                    
                        success:function(response) {
                        console.log(response);
                        if(response.tipo==10)
                        {
                            swal("Mensaje", response.mensaje , "success");
                            
                        }
                        if(response.tipo==1)
                        {
                            swal("Mensaje", response.mensaje , "error");
                            
                        }
                            
                        },
                        error: function (data) {
                            console.log(data.responseText);
                        
                            
                        },               
                        complete:function( ) {
                            //$("#waitLoading").fadeOut(1000);  
                        },
                    });  
        }
  
        var extension="";
        //var expiracion 
        
  

</script>



 