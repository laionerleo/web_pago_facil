                       
                       
                       <div class="row">
                                <div class="col-md-8" id="vistaformulariolinkser" >
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
                                                        
                                                        <input id="inpnrotarjeta" data-input-mask="tarjeta"   class="form-control"  name="inpnumber" placeholder="" id="inpnumber" value="" >
                                                       
                                                        </div>
                                                </div>
                                                <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                        <label for="inpci">Nombre del tarjeta habiente</label>
                                                        <input class="form-control" type="text" name="inpnombretarjeta" placeholder="" id="inpnombretarjeta" value="" >
                                                        </div>
                                                </div>


                                         
                                            
                                            <label id="etiquetatipopago" for="">Fecha Expiracion</label> 
                                            <div class="form-row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3" >

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
                                                            <option value="11">NOV</option>
                                                            <option value="12">DIC</option>
                                                        </select>
                                                </div>

                                                <div class="col-md-3" >
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
                                                <div class="col-md-3"></div>
                                              
                                                
                                                
                                                
                                            </div>
                                            <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                                                                                 
                                                        
                                                        <div class="input-group">
                                                           
                                                            <input class="form-control" type="number" aria-describedby="inputGroupPrepend" name="inpcodigoseguridad" placeholder="Codigo seguridad"  id="inpcodigoseguridad" value="" >
                                                            <div class="input-group-prepend">
                                                                <span data-toggle="popover" data-placement="top" title="El codigo de seguridad de 3 digitos se encuentra detras de su tarjeta Visa o MasterCard"  data-toggle="modal" data-target="#exampleModalCenter class="input-group-text" id="inputGroupPrepend"><a id="btnayuda" "><img style="width:20px;height:20px" src="<?= base_url(); ?>application/assets/assets/media/image/informacion.svg" alt=""></a></span>
                                                            </div>
                                                        </div>
                                                        
                                                        </div>
                                                </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                <center> 
                                                    <button id="btnejecutarpago" class="btn btn-primary "onclick="ejecutarpago()">Pagar </button> 
                                                    <?php if($recarga==20) { ?>
                                                            <button id="btnpagarotrafactura"  class="btn btn-primary "onclick="limpiar()">Comenzar de nuevo</button>
                                                          <?php }else{ ?>
                                                            <button id="btnpagarotrafactura"  class="btn btn-primary "onclick="facturaspendientes(<?= $clienteempresa ?>)">Pagar otra factura</button>
                                                          <?php }  ?>
                                                  
                                                </center>

                                        <input  type="hidden" id="confirmarpago" class="btn btn-primary" data-toggle="modal" data-target="#modalconfirmarpago">
                                                </div>
                                            
                                            </div>


                                        
                                        </div>
                                        <hr class="m-0">
                                    </div>
                                  
                                  
                                </div>
                                <div class="col-md-8" id="vistacarga" style="display:none" >
                                    <div class="card">
                                  
                                   
                                    <center >
                                        <div style="position: absolute;        top:50%;        left: 50%;                   margin-top: 15px;        margin-left: 0px;" class="spinner-border text-primary" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </center>     
                                    </div>
                                </div>

                            
                                
                                
                            </div>
                   
<!-- begin::footer -->

<!-- begin::modal -->

<script src="<?=  base_url() ?>/application/assets/vendors/input-mask/jquery.mask.js"></script>
  
    <input type="hidden" id="url" name="url" value="<?= $url ?>">
<!-- end::footer -->
<script>
    var codigoservicio="001";
   // var ci =0;
    //var extension="";
   // var expiracion ="";
   
      

        function ejecutarpago()
        {
            if(  ($('#inpnrotarjeta').val().length>0) &&  ($('#inpnombretarjeta').val().length>0) &&  ($('#inpcodigoseguridad').val().length>0)      )
            { 
            var nrotarjeta=$('#inpnrotarjeta').val();
            var nombretarjeta=$('#inpnombretarjeta').val();
            var fechaexpiracion=$('#slcaño').val()+$('#slcmes').val();
            var codigoseguridad=$('#inpcodigoseguridad').val();
            
            
            
            var datos= {nrotarjeta:nrotarjeta, nombretarjeta:nombretarjeta, fechaexpiracion:fechaexpiracion , codigoseguridad :codigoseguridad  };
            var urlajax=$("#url").val()+"ejecuparpagoeLinkser";   
            $.ajax({                    
                    url: urlajax,
                    data: {datos},
                    type : 'POST',
                    dataType: "json",
                    
                        beforeSend:function( ) {   
                            //$("#waitLoading").fadeIn(1000);
                            $("#vistacarga").show();
                            $("#vistaformulariolinkser").hide();
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
                               
                            $("#vistacarga").hide();
                            $("#vistaformulariolinkser").show();
                        },
                    });  
            }else{
                swal("Mensaje", "por favor llenar todos los datos " , "error"); 
            }
        }
  
        var contador="";
        'use strict';
        $(document).ready(function () {
            $('[data-toggle="popover"]').popover();   
            $('[data-input-mask="tarjeta"]').mask('0000-0000-0000-0000');
            $(".pop-right").popover({placement : 'right'});



        });
</script>



 