<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet"> 
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>-->
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
    .caja {
      position: relative;
      border: 1px solid #ccc;
      width: 95%;
      overflow: hidden;
      background-color: #fff;
      border-radius: 5px;
    }
    .caja::after{
    	content:"\025be";
    	display:table-cell;
    	padding-top:7px;
    	text-align:center;
    	width:30px;
    	height:40px;
    	background-color: #ebebebcf;
    	position:absolute;
    	top:0;
    	right:0px;	
    	pointer-events: none;
    	background-image: url('https://serviciopagofacil.syscoop.com.bo/Imagenes/Comercio/180/soat.jpeg');
    }
    .caja select {
        padding: 5px 8px;
        width: auto;
        border: none;
        box-shadow: none;
        background-color: transparent;
        background-image: none;
        appearance: none;       
    }
    .tituloSoap{
        padding: 5px;
        background-color: #888888;
        color: #fff;
        border-radius: 5px;
    }   
    #cardlistaclientes{
        background-color: #f8f9fa52;
    }
    #NroPlaca{
        line-height: 1.5rem;

        padding: unset;
        margin: auto;
        position: absolute;
        top: 0px;
    }

    #DivImagen{
        width: 96%;
        max-width: 960px;
        height: 96%;
        max-height: 130px;
        min-height: auto;
        /* margin: 10px auto; */
        margin: 0px 0px 4px 0px;
    }
    .imgIcono{
        width: 60%;
        height: 115px;
        /* object-fit: contain;*/
    }
    @media only screen and (min-width: 500px){
        #btnSiguiente{
           
        }
    }
    @media only screen and (min-width: 768px), (min-width: 1440px) {
    
        .imgIcono{
            width: 60%;
            height: 115px;
             object-fit: contain;
        }
    }
</style>
<link rel="stylesheet" type="text/css" href="<?=  base_url() ?>/application/assets/assets/js/msdropdown/dd.css" />
<div class="tituloSoap" style="display: none;">
    <?php
    if (count($clientes) < 2) { ?>
        <nav id="titulo" style="display: none;">Renovacion Soat <?= $clientes[0]->loObjeto1->nombre ?> &nbsp;&nbsp;&nbsp;&nbsp; <b>Nº Placa: </b><?php echo $codigoBusqueda[0] ?></nav>
    <?php }else {?>
        <nav id="titulo" style="display: none;">Nuevo Soat <?= $clientes[0]->loObjeto1->nombre ?>  &nbsp;&nbsp;&nbsp;&nbsp; <b>Nº Placa: </b> <?php echo $codigoBusqueda[0] ?></nav> 
    <?php }
    ?>
</div>
<div class="card" id="cardlistaclientes" >
    <div  class="card-body">
    
        <div id="btnComprar" style="padding-bottom: 0px;">
            <?php 
                $codigoBusqueda = explode(';', $codigoBusqueda);
            ?>
            <?php
                if ($status == 55) { ?>
                    <div class="row">
                        <div class="col-md-12" >
                            <div class="card" >
                                <div class="card-body" style="padding: 10px; background-color: #f8f9fa5c;">
                                    <nav><b>Cuenta con SOAT  </b></nav> 
                                    <nav>eL Nº de placa <b><?php echo $codigoBusqueda[0] ?></b> ya cuenta con SOAT </nav>
                                </div>
                            </div>
                        </div>
                    </div>  
                <?php } else if (count($clientes) < 2) { ?>
                    <div class="row">
                        <div class="col-md-12" >
                            <div class="card" >
                                <div class="card-body" style="padding: 10px; background-color: #f8f9fa5c;">
                                    <nav><b>Renovacion SOAT <?= $clientes[0]->loObjeto1->nombre ?> </b></nav> 
                                    <nav>Los datos del Soat anterior del Nº de placa <b><?php echo $codigoBusqueda[0] ?></b> fueron obtenidos correctamente</nav>
                                </div>
                            </div>
                        </div>
                    </div>  
                <?php }else {?>
                    
                    <div class="row">
                        <div class="col-md-12" >
                            <div class="card" >
                                <div class="card-body" style="padding: 10px; background-color: #f8f9fa5c;">
                                    <nav><b>Compre su SOAT  </b></nav> 
                                    <nav>El Nº de placa <b><?php echo $codigoBusqueda[0] ?></b> no se encuentra registrada</nav>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-md-2" style="padding-top: 26px;">
                            <button class="btn btn-success" onclick="Habilitar();">Comprar</button>
                        </div>-->
                    </div>           
                <?php }
            ?>          
        </div>
        
                
                    
            <?php
                if ($status != 55) { ?>
      
                <div class="row" id="idDetalleSoat" >
                    <!--<p id="NroPlaca">N° de Placa: <b><?php echo $codigoBusqueda ?></b></p>-->
                    <br>
                    <div class="col-md-7"> 
                            <div class="col-md-12">
                                <div class="form-group" id="DivTipoVehiculo">
                                    <label> <b> Tipo Vehiculo </b></label>
                                    <div class="tipoVehi" style="width: auto;">
                                        <select  name="webmenusoap"  class=" form-control" id="webmenusoap" >
                                            <?php   for ($i=0; $i <  count($clientes) ; $i++) { 
                                                $laTipoVehiculo = explode(':', $clientes[$i]->FacturarA);   
                                                $laTipoUso = explode(':', $clientes[$i]->nombre);?>   
                                                <option   value="<?= $i  ?>,<?= $clientes[$i]->Logo  ?>" data-image="<?= $clientes[$i]->Logo  ?>"> <?= $laTipoVehiculo[1]  ?>   <?= $clientes[$i]->loObjeto1->nombre ?>  </option>
                                            <?php  } ?> 
                                        </select>
                                    </div>  
                                </div>
                            </div> 
                            <div class="col-md-12" id="TipoUso">
                                <div class="form-group">
                                    <label for=""><b>Tipo Uso</b></label>
                                    <div class="">
                                        <input type="text" value="<?=  $laTipoUso[1]  ?>" disabled class="form-control" >
                                       <!-- <select class="form-control"  name="idParticular" id="idParticular" placeholder="Selecione una Opcion" required>                       
                                            <option value="">Particular</option>    
                                        </select>-->
                                    </div>                  
                                </div>
                            </div> 
                    </div>
                    <!--<div class="col-md-2"></div>-->
                    <div class="col-md-5">
                        
                        <div class="col-md-12 col-sm-12" style="text-align: center;">
                            <div class="form-group"  id="DivImagen">
                                <img class="imgIcono" src="https://serviciopagofacil.syscoop.com.bo/Imagenes/PagoFacil/motos2.jpg" alt="">
                            </div>
                        </div> 
                        <div class="col-md-12" style="text-align: center;" id="btnSiguiente">
                            <div class="form-group">    
                                <button class="btn btn-primary" onclick="facturaspendientesmultiple($('#idTipoVehiculo').val());">Siguiente</button>
                            </div>
                        </div> 
                    </div>
                </div>
                <input style="display: none;" type="text" class="form-control" id="idTipoVehiculo">
                <input style="display: none;" type="hidden" name="pais" id="inputSelect" value="">
                <?php
                } ?>
                     
                   
                    
                
           
        
    </div>
</div>

<script src="<?=  base_url() ?>/application/assets/assets/js/msdropdown/jquery.dd.js" type="text/javascript"></script>
<script>
   /* var select = document.querySelector('#select');
    var opciones = document.querySelector('#opciones');
    var contenidoSelect = document.querySelector('#select .contenido-select');
    var hiddenInput = document.querySelector('#inputSelect');
    
    document.querySelectorAll('#opciones > .opcion').forEach((opcion) => {
        opcion.addEventListener('click', (e) => {
            e.preventDefault();
            contenidoSelect.innerHTML = e.currentTarget.innerHTML;
            select.classList.toggle('active');
            opciones.classList.toggle('active');
          //  hiddenInput.value = e.currentTarget.querySelector('.titulo').innerText;
        });
    });
    
    select.addEventListener('click', () => {
        select.classList.toggle('active');
        opciones.classList.toggle('active');
    });*/
       
    $('html, body').animate({scrollTop: $("#cardlistaclientes").offset().top }, 2000);
    
    
    function Habilitar() {
        $('#idDetalleSoat').show();
        $('#btnComprar').hide();
        $('#titulo').show();
        $('.tituloSoap').show();
        $('#tituloTipoVehiculo').show();
        $('#DivTipoVehiculo').show();
    }
    $('#webmenusoap').change(MonstrarValores);
    function MonstrarValores() {
        datosArticulos = document.getElementById('webmenusoap').value.split(',');

        //datosArticulos = $('#idVehiculo').val();
        $('.imgIcono').attr('src',' '+datosArticulos[1]+'?' + Math.random());
        $('#idTipoVehiculo').val(datosArticulos[0]);
    }
    $(document).ready(function() {  
        try {
        
                var pages = $("#webmenusoap").msDropdown({on:{change:function(data, ui) {
                                        }}}).data("dd");
        
                                        slcrubro.set("selectedIndex", 0);
        
        } catch(e) {
        console.log(e);	
        }

        MonstrarValores();
        
   });
   /*$( "#option1" ).click(function() {
        MonstrarValores();
    });*/
    function cambiar(id, imagen){
      //alert(id+' '+imagen);
      $('#idTipoVehiculo').val(id);
    //  $('.imgIcono').attr('src', 'https://serviciopagofacil.syscoop.com.bo/Imagenes/PagoFacil/microbus.png?' + Math.random());
      $('.imgIcono').attr('src',' '+imagen+'?' + Math.random());
    }
</script>
