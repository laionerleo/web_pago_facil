<style>
                     .flotante {
    display:scroll;
        position:fixed;
        bottom:320px;
        right:0px;
}


img.fnone {
  float: none !important;
  height: 21px;
}
.dd .ddTitle {
    color: #000;
    background: #ffffff 
}
.dd .ddTitle .ddTitleText {
    padding: 5px 20px 5px 5px;
    text-align: start;
}
.dd .ddChild li {
    padding: 5px;
    background-color: #fff;
    border-bottom: 1px solid #c3c3c3;
    text-align: start;
}

</style>
<link rel="stylesheet" type="text/css" href="<?=  base_url() ?>/application/assets/assets/js/msdropdown/dd.css" />
<div class="col-md-12"  style="display:none"  >
    <center>
        <input  type="button" id="confirmarpago" class="btn btn-primary" data-toggle="modal"  value="elegirentidades" data-target="#elegirempresas">
    </center>
</div>
                
                        <div class="row">
                            <div class="col-md-8" >
                                <div class="card" style="margin-bottom: 1.2rem;">
                                    <img id="baner" src="<?= $urlimagenbanner   ?>" class="card-img-top" alt="...">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <center>
                                            
                                                 <img onclick="ayudaqr()" src="http://localhost/web_pago_facil/application/assets/assets/iconos/imformacion.png" style="height: 35px;" alt="">
                                            
                                        </center>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="form-row" style="padding-bottom: 5px;">                       
                                            <div class="col-md-6 col-12 titulos">
                                                <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Monto  ( <?= @$Simbolo  ?>): </b></label>
                                            </div>
                                            <div class="col-md-2 col-12">
                                                <div class="controls" style="    text-align: justify;">
                                                    <input class="form-control" readonly type="text" style="text-align: end;"  value="<?= number_format((float)$montototal, 2, '.', '');   ?>  " >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row" style="padding-bottom: 5px;">
                                                <div class="col-md-6 col-12 titulos">
                                                    <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Periodo </b></label>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="controls" style="    text-align: justify;">
                                                        <input class="form-control" readonly type="text" style="text-align: end;"  value="<?= $Periodo ?> " >
                                                    </div>
                                                    
                                                </div>
                                        </div>

                                        <div class="form-row" style="padding-bottom: 5px;">
                                                <div class="col-md-6 col-12 titulos">
                                                    <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Entidades Bancarias </b></label>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="controls" style=" text-align: justify; text-align: left;">
                                                            <select name="webmenu"  class=" form-control" id="webmenu" >
                                                                    <option   value="0"  data-image="<?= $entidades[$j]->UrlImagen  ?>"> Seleccionar  Entidad Bancaria </option>
                                                                <?php   for ($j=  0  ; $j < count($entidades); $j++) { ?>   
                                                                    <option   value="<?= $entidades[$j]->EntidadBancaria  ?>, #imgentidad-<?= $entidades[$j]->EntidadBancaria  ?> , <?= $entidades[$j]->UrlImagen  ?> ,<?= $entidades[$j]->HabilitadaInternet  ?> , <?= $entidades[$j]->Nombre  ?> "  data-image="<?= $entidades[$j]->UrlImagen  ?>"> <?= $entidades[$j]->Nombre  ?>  </option>
                                                                <?php  } ?> 
                                                            </select>   
                                                    </div>
                                                </div>
                                        </div>

                                        <center>
                                                <article class="item">
                                                    <img onclick=""   id="imagenelegida" style="object-fit:contain ;width:100px; position: relative; border-radius:15px ; " src="" alt="">    
                                                </article>
                                                <div class="row">
                                                        <div class="col-md 6 col-6">
                                                            <label for="" id="lbldesde"></label>
                                                        </div>
                                                        <div class="col-md 6 col-6" >
                                                        <label for="" id="lblhasta"></label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <center>
                                                                <a id="linkcomopagar"  class="linkcomopagar" style="display:none ; font-weight: bolder; " target="_blank" href="">
                                                                    <u>  <img src="http://localhost/web_pago_facil/application/assets/assets/iconos/imformacion.png" style="height: 35px;" alt=""> <br> ¿ Como Pagar ? </u>
                                                                </a>
                                                            </center>
                                                        </div>
                                                </div>
                                                
                                                <div id="datosentidad">
                                                    
                                                </div>
                                                
                                        </center>
                                        <div class="form-row">
                                            <div class="col-md-12 col-6" >
                                                <center>
                                                    <h2 id="time"></h2>
                                                </center>
                                            </div>
                                        </div>

                                            
                                        <div id="vistaform" style="display:none" >
                                            <div class="form-row" style="padding-bottom: 5px;">
                                                <div class="col-md-6 col-12 titulos">
                                                    <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Valido hasta </b></label>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="controls" style="    text-align: justify;">
                                                        <input class="form-control" id="dateexpiracion" readonly type="text"   value="" >
                                                    </div>
                                                </div>
                                            </div>
                                            <center> 
                                                <div id="bancoselegidos"></div>                                                        
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-8">
                                                        <center>
                                                            <img id="imagenqr" src="" alt="">
                                                        </center>
                                                        <center>
                                                        <a id="linkdescarga" href=""> <img src="<?= base_url(); ?>application/assets/assets/iconos/descarga.png" style="height: 50px;" alt=""></a>
                                                        </center>
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="cajaayuda" style="display:none">
                                <div class="card" style="margin-bottom: 1.2rem;">
                                <div class="card-body">
                                    <p class="card-text">
                                        Felicidades , Generaste exitosamente el código QR para tu pago , <br>
                                         Ahora sigue estos pasos para que tu pago se lleve a cabo                                </p>
                                <h5 class="card-title" style="margin-bottom: 0px;"  >Paso 1</h5>
                                <div class="row">
                                <div class="col-md-2 col-2" style="text-align: end;">
                                        <img src="http://localhost/web_pago_facil/application/assets/assets/iconos/ingreso al dispositivo celular.png" style="height: 35px;" alt="">
                                    </div>
                                    <div class="col-md-10 col-10">
                                        <label for="">
                                            Abre la aplicación movil de tu banco favorito(Bancos de ASOBAN)
                                        </label>

                                    </div>
                                </div>
                                <h5 class="card-title" style="margin-bottom: 0px;" >Paso 2</h5>
                                <div class="row">
                                    <div class="col-md-2 col-2" style="text-align: end;">
                                        <img src="http://localhost/web_pago_facil/application/assets/assets/iconos/deslizar.png" style="height: 35px;" alt="">
                                    </div>
                                    <div class="col-md-10 col-10">
                                        <label for="">
                                        Selecciona la opcion SIMPLE
                                        </label>

                                    </div>
                                </div>
                                <h5 class="card-title" style="margin-bottom: 0px;" >Paso 3</h5>
                                <div class="row">
                                <div class="col-md-2 col-2" style="text-align: end;">
                                        <img src="http://localhost/web_pago_facil/application/assets/assets/iconos/ingreso al dispositivo celular.png" style="height: 35px;" alt="">
                                    </div>
                                    <div class="col-md-10 col-10">
                                        <label for="">
                                        Escanea o descarga la imagen QR que se generó
                                        </label>

                                    </div>
                                </div>
                                
                                </div>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                 

                                            <div class="col-md-4 col-6 col-sm-4">
                                                    <center class="botones">
                                                    
                                                        <button id="bntprepararpago" class="btn btn-primary " onclick="generarqr()" >Generar Qr </button>
                                                        <button id="bntconsultarpago" style="display:none" onclick="verificacionpagoqr()" class="btn btn-primary " >Consultar  Qr </button>
                                                        <button id="btncargaconsulta"  class="btn btn-primary" type="button" style="display:none" disabled>
                                                            <span class="spinner-border spinner-border-sm mr-2" role="status"
                                                                    aria-hidden="true"></span>
                                                                    Procesando...
                                                        </button> 
                                                        
                                                     </center>
                                                </div>
                                                
                                                <div class="col-md-3 col-6 col-sm-4">
                                                    <center>
                                                    <?php if($recarga==20) { ?>
                                                        <button id="btnpagarotrafactura"  class=" btn btn-outline-primary "onclick="limpiar()">Comenzar de nuevo</button>
                                                    <?php }else{ ?>
                                                        <input class="btn btn-outline-primary" onclick="facturaspendientes(<?= @$clienteempresa  ?>)" type="button" value="Finalizar ">
                                                    <?php }  ?>
                                                    
                                                     </center>                                                     
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                   
                   
            <a class='flotante' href='#' ><img src='<?= base_url(); ?>application/assets/assets/media/image/informacion.svg'  border="0"/></a>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                              
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="ti-close"></i>
                                    </button>
                                    <Label>Pagos con QR</Label>
                                </div>
                                <div class="modal-body">
                                <p class="card-text">
                                    Felicidades , Generaste exitosamente el código QR para tu pago , <br>
                                    Ahora sigue estos pasos para que tu pago se lleve a cabo                                </p>
                                <h5 class="card-title" style="margin-bottom: 0px;"  >Paso 1</h5>
                                <p class="card-text">Abre la aplicación movil de tu banco favorito(Bancos de ASOBAN)</p>
                                <h5 class="card-title" style="margin-bottom: 0px;" >Paso 2</h5>
                                <p class="card-text"> Selecciona la opcion SIMPLE </p>
                                <h5 class="card-title" style="margin-bottom: 0px;">Paso 3</h5>
                                <p class="card-text">Escanea o descarga la imagen QR que se generó</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>


    <input type="hidden" id="url" name="url" value="<?= $url ?>">
     <script src="<?=  base_url() ?>/application/assets/assets/js/msdropdown/jquery.dd.js" type="text/javascript"></script>
<!-- end::footer -->
<script>
    var codigoservicio="001";
    var entidadesasignadas= new Array(); 
    var gntransaccion;
    contador=1;
    var ArrayEntidades= <?= json_encode($entidades) ; ?>;
                                                                            
        var extension="";
        function generarqr()
        {
            if(entidadesasignadas.length>0 )
            {
                var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
                var urlajax=$("#url").val()+"generarqrbnb";   
            
            $.ajax({                    
                    url: urlajax,
                    data: {datos:entidadesasignadas , tnIdentificarPestaña:tnIdentificarPestaña },
                    type : 'POST',
                    cache: false,
                    timeout: 0,
                    dataType: "json",
                    
                        beforeSend:function( ) {  
                            $('#bntprepararpago').hide();
                            $('#btncargaconsulta').show();
                            
                            
                        },                    
                        success:function(response) {
                        if(response.tipo==10)
                        {
                            var urlimg=$("#url").val()+"getultimaselegidas";  
                            $("#bancoselegidos").load(urlimg,{id_proceso:0});  
                             var arrayqr=JSON.parse(response.imagenqr);
                            console.log(arrayqr.qrImage);
                            $("#dateexpiracion").val(arrayqr.expirationDate);
                            $('#vistaform').show();
                            //$("#elegirempresas").modal('toggle');
                            //$('.modal-backdrop').remove();
                            $('#bntprepararpago').hide();
                            $('#bntconsultarpago').show();
                            $('#imagenqr').attr('src', `data:image/png;base64,${arrayqr.qrImage}`);
                            $("#linkdescarga").attr("href", response.linkdescarga);
                            gntransaccion=response.tnTransaccion;
                            MandarAyudaQr(gntransaccion);
                        }
                        if(response.tipo==1)
                        {
                            swal("Error ", response.mensaje , "error");
                        }
                        },
                        error: function (data) {
                        // $("#elegirempresas").modal('toggle');
                        //   $('.modal-backdrop').remove();
                            swal("Error ", data.responseText , "error");
                        },               
                        complete:function( ) {
                            $('#bntprepararpago').hide();
                            
                            $('#btncargaconsulta').hide();
                        },
                    });  

            }else{

                swal("Mensaje", "Falta Elegir Entidad Bancaria" , "error");
                error("#webmenu_title")
            }
            
        }

        function MandarAyudaQr(tnTransaccion)
        {
            //var tnTransaccion=gntransaccion;
            var datos= {tnTransaccionDePago:tnTransaccion  }; 
            var urlajax="<?= base_url(); ?>es"+"/MandarAyudaQr";  
            $.ajax({                    
                    url: urlajax,
                    data: {datos} ,
                    type : 'POST',
                    dataType: "json",
                                    
                    beforeSend:function( ) {   
              
                    },                    
                    success:function(response) {
                        console.log(response);
                    },
                error: function (data) {
                    console.log(data.responseText);
                },               
                complete:function( ) {
                  
                
                    
                },
            });  
        } 

        
        function ayudaqr()
             {
                $("#cajaayuda").toggle(500);
             }


        function verificacionpagoqr()
        {
            var tnTransaccion=gntransaccion;
            var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
            var urlajax="<?= base_url(); ?>es"+"/verificarqr";  
            var datos= {tnTransaccion:tnTransaccion  ,tnIdentificarPestaña:tnIdentificarPestaña}; 
            $.ajax({                    
                    url: urlajax,
                    data: {datos} , 
                    type : 'POST',
                    dataType: "json",
                                    
                    beforeSend:function( ) {   
                    //   $("#btncarga").show();
                    $("#btncargaconsulta").show();
                    $('#bntconsultarpago').hide();
                    },                    
                    success:function(response) {
                        if(response.tipo==10)
                        {   
                            if(response.Estado==1)
                            {
                                swal("Consulta Qr", "El  Pago esta Pendiente", "info");
                            }
                            if(response.Estado==2)
                            {
                                swal("Consulta Qr", "El Pago se a realizado con exito", "succes");
                                <?php if($recarga!=20) { ?>
                                getfacturaempresa(gntransaccion);
                                getfacturapagofacil(gntransaccion);
                                <?php }else{ ?>
                                    console.log("hola =-- <?=$recarga ?>");
                                <?php } ?>
                            }
                            if(response.Estado==4)
                            {
                                swal("Consulta Qr", "El pago esta Anulado", "info");               // si entra aqui significa que ue exitodo el pago asi que debo finilizarlo
                            
                            }
                            if(response.Estado==6)
                            {
                                swal("Consulta Qr", "El pago paso a modo de prueba ", "info");               // si entra aqui significa que ue exitodo el pago asi que debo finilizarlo
                            }
                        }else{
                            swal("Error", response.mensaje,  "error");
                        }
                    },
                error: function (data) {
                    console.log(data.responseText);
                },               
                complete:function( ) {
                    $("#btncargaconsulta").hide();
                    $('#bntconsultarpago').show();
                    //var gnNumeroTransaccion,gnSwVerificacionQr;
                
                    
                },
            });  
        } 
        function elegirentidad(id,idcheck)
        {
         
                var idaux=id;
                var numero=entidadesasignadas.indexOf(id);
             
                if(numero>=0)
                {
                    contador=contador-1;
                    entidadesasignadas.splice(numero,1);
                  //  $( idcheck ).prop( "checked", false );
                    $("#row-"+id).css("border-radius", "none");
                    $("#row-"+id).css("border", "none");
                    $("#row-"+id).css("border-color", "none");
                  
                }else{
                    if(contador<=1){
                    contador=contador+1;
                    entidadesasignadas.push(id);
                    $("#row-"+id).css("border-radius", "10px");
                    $("#row-"+id).css("border", "dashed");
                    $("#row-"+id).css("border-color", "solid");
               
                    //$(idcheck ).prop( "checked", true );
                    }else{
                       $( idcheck ).prop( "checked", false );
                    }
                }
                console.log(entidadesasignadas);
                var horaFicticia = new Date();
                var horaActualMillis = horaFicticia.getHours() * 3600000 + horaFicticia.getMinutes() * 60000; // Convertimos la hora actual a milisegundos desde el inicio del día


                for (let index2 = 0; index2 < ArrayEntidades.length; index2++) {
                      
                    if(ArrayEntidades[index2]["EntidadBancaria"]==id)
                    {
                        if (ArrayEntidades[index2]["RestriccionDesde"] != undefined) {
                            $('#lbldesde').text("Restriccion Desde :" + ArrayEntidades[index2]["RestriccionDesde"]);
                        }
                        if (ArrayEntidades[index2]["RestriccionHasta"] != undefined) {
                            $('#lblhasta').text("Restriccion Hasta  :" + ArrayEntidades[index2]["RestriccionHasta"]);
                        }

                        let lcMensajerestriccionEntidadBancaria=ArrayEntidades[index2]["MensajeRestriccion"];
                        console.log(lcMensajerestriccionEntidadBancaria);
                        lcMensajerestriccionEntidadBancaria = (lcMensajerestriccionEntidadBancaria == null ) 
    ? "¡Advertencia: Actualmente es propenso a errores debido a restricciones bancarias. Tenga en cuenta que puede haber un error o retraso después del pago, para recibir su pedido."
    : lcMensajerestriccionEntidadBancaria;
                        console.log("despuej de la vlidacion",lcMensajerestriccionEntidadBancaria);
                        if (ArrayEntidades[index2]["RestriccionDesde"] != undefined && ArrayEntidades[index2]["RestriccionHasta"] != undefined) {
                            var restriccionDesde = ArrayEntidades[index2]["RestriccionDesde"]; // Formato "HH:mm"
                            var restriccionHasta = ArrayEntidades[index2]["RestriccionHasta"]; // Formato "HH:mm"

                            // Convertimos las restricciones a milisegundos desde el inicio del día
                            var restriccionDesdeParts = restriccionDesde.split(':');
                            var restriccionHastaParts = restriccionHasta.split(':');

                            var restriccionDesdeMillis = (parseInt(restriccionDesdeParts[0]) * 3600000) + (parseInt(restriccionDesdeParts[1]) * 60000);
                            var restriccionHastaMillis = (parseInt(restriccionHastaParts[0]) * 3600000) + (parseInt(restriccionHastaParts[1]) * 60000);

                            // Verificar si el rango cruza la medianoche
                            var cruzaMedianoche = restriccionDesdeMillis > restriccionHastaMillis;

                            // Verificar si la hora actual está dentro del rango de restricción
                            if (cruzaMedianoche) {
                                // El rango cruza la medianoche
                                if (horaActualMillis >= restriccionDesdeMillis || horaActualMillis <= restriccionHastaMillis) {

                                    $('#mensajeHora').text(lcMensajerestriccionEntidadBancaria);
                                    $('#mensajeHora').show();
                                } else {
                                    $('#mensajeHora').hide();
                                }
                            } else {
                                // El rango no cruza la medianoche
                                if (horaActualMillis >= restriccionDesdeMillis && horaActualMillis <= restriccionHastaMillis) {
                                    $('#mensajeHora').text(lcMensajerestriccionEntidadBancaria);
                                    $('#mensajeHora').show();
                                } else {
                                    $('#mensajeHora').hide();
                                }
                            }
                        }  

                             if(ArrayEntidades[index2]["ComoPagar"]!=undefined  &&  ArrayEntidades[index2]["ComoPagar"]!="")
                             {
                                $("#linkcomopagar").show();
                                $("#linkcomopagar").attr("href", ArrayEntidades[index2]["ComoPagar"]);
                             }else{
                                $("#linkcomopagar").hide();
                             }
                             
                            gdHoraDesde=ArrayEntidades[index2]["RestriccionDesde"];
                            gdHoraHasta= ArrayEntidades[index2]["RestriccionHasta"];
                            
                    }   
                }
            
        }
        $(document).ready(function() {
            // Instrucciones a ejecutar al terminar la carga
          //  cambiarimagen('debito','001');
         //   $("#confirmarpago").click();        
            
 /*           <?php   for ($j=  0  ; $j < count($entidadeselegidas); $j++) { ?>
                $("#idcheck-<?= $entidadeselegidas[$j] ?>").click(); 
            <?php  }?>
*/

  try {
		            var pages = $("#webmenu").msDropdown({on:{change:function(data, ui) {
												var val = data.value;
                                                var result=val.split(',');
                                                var identidad=result[1].replace("'", '');
                                               //  identidad=identidad.replace("'", '');
                                                var srcimagen=result[2].replace("'", '');
                                               // srcimagen=srcimagen.replace("'", '');
                                                console.log(result);
                                                if(result[0]!=0)
                                                {
                                                    elegirentidad(result[0],identidad);
                                                }
                                                
												if(val!="")
												console.log(val);
											}}}).data("dd");

                                            slcrubro.set("selectedIndex", 0);

	/*	var pagename = document.location.pathname.toString();
		pagename = pagename.split("/");
		pages.setIndexByValue(pagename[pagename.length-1]);
		$("#ver").html(msBeautify.version.msDropdown);
        */
	} catch(e) {
		//console.log(e);	
	}
    
         
            });
            function error(tnIdImput)
        {             
            $(tnIdImput).css("border-color", "red");
            $(tnIdImput).css("border-style", "outset");
            $(tnIdImput).css("border-width", "revert");
            //$(tnIdImput).append("<br><label>Falta introducir este dato</label>");
        }
</script>



<div class="modal fade" id="elegirempresas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mensaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <?php   for ($j=  0  ; $j < count($entidades); $j++) { ?>
                            
                            <div class="row"  id="row-<?= $entidades[$j]->EntidadBancaria  ?>">
                                <div class="col-md-3 col-xs-3 col-4">
                                    <div class="image">
                                        <img style="padding:2px; width:100px; height:50px" src=" <?= $entidades[$j]->UrlImagen  ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-6 col-6">
                                    <h3 class="name">   <?= $entidades[$j]->Nombre  ?></h3>
                                </div>
                                <div class="col-md-3 col-xs-2  col-2 action">
                                <input class="checkedleo"  onclick="elegirentidad(<?= $entidades[$j]->EntidadBancaria  ?> , '#idcheck-<?= $j ?>')" type="checkbox" id="idcheck-<?= $j ?>" value="1">
                                <!-- <a id="btnayuda"href="aqui vendra la direcciond e ayuda "  ><img style="width:25px;height:25px" src="<?= base_url(); ?>application/assets/assets/media/image/informacion.svg" alt=""></a> -->
                                </div>
                            </div>
                        

                        <?php  } ?>
            </div>
            <div class="modal-footer">
                <button type="button" id="btncerrar" class="btn btn-secondary" data-dismiss="modal">Cerrar
                </button>
                <button id="btncarga"  class="btn btn-primary" type="button" style="display:none" disabled>
                        <span class="spinner-border spinner-border-sm mr-2" role="status"
                            aria-hidden="true"></span>
                            Procesando...
                </button> 
                <input type="button" id="btngenerarqr"  onclick="generarqr()" class="btn btn-primary" value="Aceptar">
            </div>
        </div>
    </div>
</div>

                                                       