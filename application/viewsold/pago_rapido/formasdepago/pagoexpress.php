<style>

.ticket {
    position: relative;
    border: 2px solid red;
    background: white;
    color: black;
    text-transform: uppercase;
    text-align: center;
    display: inline-block;
    padding: 1em 2em;
}
.ticket:before,
.ticket:after{
    height:90px;
    width:45px;
    content: '';
    position: absolute;
    top: 0.9em;
    top: calc(0.9em - 1px);
    height: 1.2em;
    width: 0.6em;
    border: 2px solid red;
}
.ticket:before {
    left: -2px;
    border-radius: 0 1em 1em 0;
    border-left-color: white;
}
.ticket:after {
    right: -2px;
    border-radius: 1em 0 0 1em;
    border-right-color: white;
}

</style>                       
                       
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
                                                        <div class="form-group col-md-6">
                                                        <label for="inpci"> Correo</label>
                                                        
                                                        <input id="inpcorreo"   class="form-control"  name="inpcorreo" placeholder="" id="inpcorreo" value="" >
                                                       
                                                        </div>

                                                       
                                                        <div class="form-group col-md-6">
                                                        <label for="inpci"> telefono</label>
                                                        <input class="form-control" type="number" name="inptelefono" placeholder="" id="inptelefono" value="" >
                                                        </div>
                                                </div>


                                                <div id="vistatiket" class="form-row" style="">
                                                        <div class="form-group col-md-12">
                                                            
                                                            
                                                            <br>
                                                            
                                                            <p style="text-aligng=initial">Usted Podra aproximarse a cualquier  de los puntos de pago de la red de PAGO EXPRESS indicando su codigo de recaudacion podra pagar EN EFECTIVO En el siguiente link podra ver el mapa de todos los puntos disponibles </p>
                                                            <a href="https://pagoexpress.com.bo/sitioweb/#payment-section" > <b> ->Puntos PAGO EXPRES <-</b></a>

                                                           
                                                       
                                                        </div>
                                                        <div class="row col-md-12  ticket">
                                                           
                                                                <h2 id="ticket" >  PF-12345</h2>
                                                           
                                                            
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


        function ejecutarpago()
        {
           

       if(  ($('#inpcorreo').val().length>0) &&  ($('#inptelefono').val().length>0)    )
           { 
            var correo=$('#inpcorreo').val();
            var celular=$('#inptelefono').val();
            
           var datos= {correo:correo, celular:celular };
           var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
           var urlajax=$("#url").val()+"/generarticketpagoexpress"; 
           
            $.ajax({                    
                    url: urlajax,
                    data: {datos:datos , tnIdentificarPestaña:tnIdentificarPestaña },
                    type : 'POST',
                    dataType: "json",
                    
                        beforeSend:function( ) {   
                         
                        },                    
                        success:function(response) {
                        console.log(response);
                        if(response.tipo==10)
                        {
                            swal("Mensaje", response.mensaje , "success");
                            $('#vistatiket').show();
                            $('#ticket').text("PF-"+ response.tnTransaccion);
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
                               
                        },
                    }); 
            
            }else{
                swal("Mensaje", "por favor llenar todos los datos precisos " , "error"); 
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



 