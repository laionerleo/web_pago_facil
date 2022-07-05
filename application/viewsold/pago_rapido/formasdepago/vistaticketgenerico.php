<style>

.ticket {
    position: relative;
    border: 2px solid #6abd14;
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
    border: 2px solid #6abd14;
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
                                    <img id="baner" src="<?= $urlimagenbanner   ?>" class="card-img-top" alt="...">
                                     
                                        <div class="card-body text-center">
                                       
                                        <div class="card-body text-center m-t-70-minus">
                                            <br>
                                                <div class="row mb-2">
                                                    <div class="col-6 " style="text-align:end" > <h3 >Monto : </h3></div>
                                                    <div class="col-6" style="text-align: initial;"> <h3 > <?= number_format((float)$montototal, 2, '.', '');   ?> <?= @$Simbolo  ?></h3></div>
                                                </div>
                                            
                                            
                                                <div id="vistatiket" class="form-row" style="display:block">
                                                        <div class="form-group col-md-12">
                                                            <br>
                                                            <p style="text-aligng=initial"><?= $lcMensaje ?></p>
                                                            <a   target="_blank"  href="<?= $UrlPuntosDePago   ?> " > <b> ->  <?= $TituloSucursales   ?>  <-</b></a>
                                                        </div>
                                                        <center>
                                                            <div class="row col-md-6  ticket" style="margin-bottom: 10px">
                                                                <h2 id="ticket"  style="color:#005009"> </h2>
                                                            </div>
                                                        </center>
                                                    
                                                </div>
                                          
                                                   <div class="form-row">
                                                <div class="col-md-12">
                                                <center> 
                                                 <button style="color: white;" class="btn btn-warning"  onclick="cancelarmetodopago()"> Cancelar</button>                                                      
                                                <button id="btnejecutarpago" class="btn btn-primary "onclick="ejecutarpago()">Generar Ticket </button> 
                                                <button id="btncarga"  class="btn btn-primary" type="button" style="display:none" disabled>
                                                            <span class="spinner-border spinner-border-sm mr-2" role="status"
                                                                aria-hidden="true"></span>
                                                                Procesando...
                                                    </button> 
                                                   
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
           

                  
            var correo=$('#inpemailenvio').val();
            var celular=$('#inptelefonoenvio').val();
            var urlajax=$("#url").val()+"/generarticket"; 
            var tcCorreoEnvio=$('#inpemailenvio').val();
            var tnNumeroEnvio=$('#inptelefonoenvio').val();
            var tcNombreCompleto=$('#inpnombrecompleto').val();
            var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
            var datos= { tcCorreoEnvio:tcCorreoEnvio , tnNumeroEnvio :tnNumeroEnvio,tcNombreCompleto:tcNombreCompleto , tnIdentificarPestaña:tnIdentificarPestaña};

            $.ajax({                    
                    url: urlajax,
                    data: {datos} , 
                    type : 'POST',
                    dataType: "json",
                    
                        beforeSend:function( ) {   
                            $("#btncarga").show();
                            $("#btnejecutarpago").hide();
                         
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
                            $("#btncarga").hide();
                            //$("#btnejecutarpago").hide();    
                        },
                    }); 
            
          
        }
  
        var contador="";
        'use strict';
        $(document).ready(function () {
            $('[data-toggle="popover"]').popover();   
            $('[data-input-mask="tarjeta"]').mask('0000-0000-0000-0000');
            $(".pop-right").popover({placement : 'right'});



        });
</script>



 