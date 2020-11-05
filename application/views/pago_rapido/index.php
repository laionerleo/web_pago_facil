<!doctype html>
<html lang="en">
<?php $this->load->view('theme/head'); ?>
<style>
        input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
</style>

<body  class="">

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<!-- BEGIN: Sidebar Group -->
<div class="sidebar-group">

    <!-- BEGIN: User Menu -->
  <?php  $this->load->view('theme/menu_lateral_derecho');   ?>
    <!-- END: User Menu -->

    <!-- BEGIN: Settings -->
    <?php  $this->load->view('theme/menu_lateral_configuraciones');   ?>
   
    <!-- END: Settings -->

</div>
<!-- END: Sidebar Group -->

<!-- begin::main -->
<div class="layout-wrapper">

    <!-- begin::header -->
    <?php  $this->load->view('theme/header'); ?>
    <!-- end::header -->

    <div class="content-wrapper">

        <!-- begin::navigation -->
        <?php $this->load->view('theme/menu_lateral_izquierdo');   ?>
        <!-- end::navigation -->

        <div class="content-body" id="vista_general"  >

            <div class="content" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                              <div class="card-body">
                                 
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item" id="li1"  >
                                    <a class="nav-link active" id="inicio-tab"  data-toggle="tab" href="#iniciobody" role="tab"
                                       aria-controls="home" aria-selected="true">Inicio</a>
                                </li>
                                <li class="nav-item" id="lir"  style="display:none" >
                                    <a class="nav-link" id="recarga-tab"  data-toggle="tab" href="#recargabody" role="tab"
                                       aria-controls="home" aria-selected="true">Recarga Billetera</a>
                                </li>
                                <li class="nav-item" id="li2" style="display:none" >
                                    <a class="nav-link" id="facturaspendientes-tab" data-toggle="tab" href="#facturaspendientesbody" role="tab"
                                       aria-controls="profile" aria-selected="false">Facturas Pendientes </a>
                                </li>
                                <li class="nav-item" id="li3" style="display:none">
                                    <a class="nav-link" id="facturacion-tab" data-toggle="tab" href="#facturacionbody" role="tab"
                                       aria-controls="contact" aria-selected="false">Datos de Facturacion</a>
                                </li>
                                <li class="nav-item" id="li4" style="display:none" >
                                    <a class="nav-link" id="confirmacion-tab" data-toggle="tab" href="#confirmacionbody" role="tab"
                                       aria-controls="contact" aria-selected="false">Verificacion de Pago</a>
                                </li>
                                <li class="nav-item" id="li5" style="display:none" > 
                                    <a class="nav-link" id="prepararpago-tab" data-toggle="tab" href="#prepararpagobody" role="tab"
                                       aria-controls="contact" aria-selected="false">Procesar Pago </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="iniciobody" role="tabpanel"
                                     aria-labelledby="home-tab">

                                     <div class="form-row">
                                        <div class="col-md-4 mb-2">
                                        <label for="">Rubros </label><br>
                                        <div class="avatar-group ml-4">
                                                    <?php  for ($i=0; $i < count($rubros->values) ; $i++) { ?>
                                                            <figure id="rub-<?= $i ?>" class="avatar avatar-lg" style="background-color: #FFFF;border-color:black" >
                                                                <a href="#" title="  <?php echo $rubros->values[$i]->nNombre  ?>" data-toggle="tooltip" onclick="cambiar_rubro(<?php echo $rubros->values[$i]->nTipoEmpresa  ?>,'#rub-<?= $i ?>')">
                                                                    <img src="<?php echo $rubros->values[$i]->cImagenUrl  ?>" class="rounded-circle"
                                                                        alt="avatar">
                                                                </a>
                                                            </figure>
                                                            &nbsp;&nbsp;
                                                    <?php }  ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3    mb-2"  style=" word-wrap: break-word;">
                                        <label for="">regiones </label><br>
                                        <div class="avatar-group ml-4">
                                                    <figure id="reg-0"  class="avatar avatar-lg" style="background-color: #FFFF;border-color:black" >
                                                                <a href="#" title=" <?php echo $region->values[0]->cNombre  ?>" data-toggle="tooltip" onclick="cambiar_region(<?php echo $region->values[0]->nRegion  ?>,'#reg-0' ,'<?php echo $region->values[0]->cNombre  ?>'   )">
                                                                <img id="region_principal" src="<?php echo $region->values[0]->nEstado  ?>"class="rounded-circle"
                                                                        alt="avatar">
                                                                </a>
                                                    </figure>
                                                    <div id="div_regiones"  style="display:none">
                                                        <?php  for ($i=1; $i < count($region->values) ; $i++) { ?>
                                                            <figure id="reg-<?= $i ?>"  class="avatar avatar-lg" style="background-color: #FFFF;border-color:black" >
                                                                <a href="#" title=" <?php echo $region->values[$i]->cNombre  ?>" data-toggle="tooltip" onclick="cambiar_region(<?php echo $region->values[$i]->nRegion  ?>,'#reg-<?= $i ?>','<?php echo $region->values[$i]->cNombre  ?>' )">
                                                                <img src="<?php echo $region->values[$i]->nEstado  ?>"class="rounded-circle"
                                                                        alt="avatar">
                                                                </a>
                                                            </figure>
                                                            &nbsp;
                                                        <?php }  ?>
                                                    </div>
                                                    <figure id="reg-x" onclick="habilitarregiones()"  class="avatar avatar-sm" style="background-color: #FFFF;border-color:black" >
                                                        <a href="#" title="Cambiar"  data-toggle="tooltip" onclick="">
                                                        <img src="<?=  base_url() ?>/application/assets/assets/media/image/cambio.svg"class="rounded-circle"
                                                                alt="avatar">
                                                        </a>
                                                    </figure>

                                                    
                                        </div>
                                       
                                        <label id="nombre_region"  href=""><?php echo $region->values[0]->cNombre  ?> </label>
                                    </div>
                                </div>
                                  <div id="vistas_empresas"  >
                                       
                                  </div>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <center>
                                          <input id="btnperfil" style="" type="button" class="btn btn-primary"  onclick="perfilfrecuente()"  value="Perfil Frecuente">
                                          <input id="btnperfilempresa" style="" type="button" class="btn btn-primary"  onclick="cambiar_rubro(1,'#rub-0');"  value="Perfil todas las empresas ">
                                          
                                          </center>
                                      </div>
                                  </div>
                                  <br>
                                 
                                    <div class="form-row">
                                        <div  id="divcriteriobusqueda" class="col-md-3 mb-2 ">
                                            <label for="">Tipo de documento</label><br>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" onclick="cambiar_tipo_switch()" name="exampleRadios"
                                                    id="exampleRadios4" value="option1" checked >
                                            <label class="form-check-label" for="exampleRadios4">
                                                Codigo Fijo 
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" onclick="cambiar_tipo_switch()" name="exampleRadios"
                                                    id="exampleRadios5" value="option2" >
                                            <label class="form-check-label" for="exampleRadios5">
                                                Carnet de Identidad
                                            </label>
                                        </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label id ="lblcodigo" for="">Codigo</label>
                                            <input id="inp_dato" min="0" class="form-control form-control-sm" type="number" placeholder="codigo fijo o ci" value="<?= @$_SESSION['codigofijo']   ?>">
                                        </div>
                                        <div   id="divrecarga" class="col-md-3 mb-3"  style="display:none">
                                            <br>
                                            <button type="button" class="btn btn-primary m-r-5" onclick="busqueda_billeteras_general()" data-toggle="tooltip"
                                                data-placement="top" title="Buscar otras Billeteras">
                                                Buscar Billeteras
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-1 mb-1" id="idlugarboton" >
                                            <input type="hidden" id="url"  value="<?= $url ?>">
                                            <input type="hidden" id="perfil"  value="<?= $perfilfrecuente ?>">
                                            
                                            <br>
                                            <input id="btnbuscar"  type="button" class="btn btn-primary"  onclick="busqueda_datos()"  value="Buscar">
                                            <input id="btnrecarga" style="display:none" type="button" class="btn btn-primary"  onclick="vistarecarga()"  value="Recarga ">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-12" id="vista_clientes">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="recargabody" role="tabpanel" aria-labelledby="recargabody">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="facturaspendientesbody" role="tabpanel" aria-labelledby="facturaspendientesbody">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="facturacionbody" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="facturacionbody" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="confirmacionbody" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="prepararpagobody" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>                     
                                </div>
                                
                                
                            </div>
                            
                             
                              </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>

              <!-- begin::footer -->
            <?php $this->load->view('theme/footer');  ?>
              <!-- end::footer -->

        </div>

    </div>

</div>
<!-- end::main -->

<!-- Plugin scripts -->
<script>

var region_id=1;
var rubro_id=1;
var empresa_id=0;
var id_fugure_rubro="";
var id_fugure_region="";
var id_fugure_empresa="";
var id_fila="";
var swregion=1;
var urlimagenempresa="";
var nombreempresa="";


//0 es carnet y uno es 
var sw=1;



function cambiar_region(id_region,id_figure,nombre,)
{
    region_id=id_region;
    $(id_fugure_region).removeClass("avatar-state-success");
    id_fugure_region=id_figure;
    
    $('#btn_region').click();
    $(id_figure).addClass("avatar-state-success");
    $("#nombre_region").text(nombre);
    filtrar_empresas();

}
function cambiar_rubro(id_rubro,id_figure)
{
    rubro_id=id_rubro;
    $(id_fugure_rubro).removeClass("avatar-state-success");
    id_fugure_rubro=id_figure;
    $("#btnperfilempresa").hide();
    $("#btnperfil").show();
    

    filtrar_empresas();
    $(id_figure).addClass("avatar-state-success");
    
}
function cambiar_empresa(id_empresa,id_figure,fila_id,urlimagen1,nombre )
{   
    nombreempresa=nombre;
    urlimagen=urlimagen1
    empresa_id=id_empresa;
    $(id_fugure_empresa).removeClass("avatar-state-success");
    id_fugure_empresa=id_figure;
    $(id_figure).addClass("avatar-state-success");
    $(id_fila).css("background-color", "#FFFFFF");
    id_fila=fila_id;

    $(id_fila).css("background-color", "rgb(45, 206, 222)");
    
    $('html, body').animate({
 scrollTop: $("#idlugarboton").offset().top
 }, 2000);
    
if(id_empresa==20)
    {
        habilitarrecarga();
    }else{
        dehabilitarrecarga();
    }
    
}
function  cambiar_tipo_switch()
{
    if(sw==1)
    {
        sw=2;
    }else{
        sw=1;
    }
}
function filtrar_empresas()
{
    var datos= {rubro_id:rubro_id,region_id:region_id  };
    var urlajax=$("#url").val()+"get_filtro_regiones";  
   // $("#waitLoading").fadeIn(1000);
    $("#vistas_empresas").load(urlajax,{datos});   
}
function perfilfrecuente()
{
    $("#btnperfilempresa").show();
    $("#btnperfil").hide();
    
    var urlajax=$("#url").val()+"perfilfrecuente";  
   // $("#waitLoading").fadeIn(1000);
    $("#vistas_empresas").load(urlajax);   
}
//perfilfrecuente



function habilitarregiones()
{
  if(swregion==1)
  {
    //$('#div_regiones').show();
    $('#div_regiones').toggle(1500);
    swregion=0;

  }else{
    //$('#div_regiones').hide();
    $('#div_regiones').toggle(1500);
    swregion=1;
  }
  
}

function  busqueda_datos()
{
    var codigo=$("#inp_dato").val();
    var tipo=sw;
    if( (codigo!='') && (empresa_id!=0))
    {
        
    var datos= {empresa_id:empresa_id,codigo:codigo ,tipo:tipo };
    var urlajax=$("#url").val()+"filtro_codigo_fijo";   
    $("#vista_clientes").show();
    $("#vista_clientes").load(urlajax,{datos});                    
  
    }else{
        if(codigo=='')
        {
            alert(' no  inserto el codigo ');
        }
        if(empresa_id==0)
        {
            alert('no selecciono la empresa ');
        }
        
    }
    
}

function  busqueda_billeteras_dependientes()
{
    var codigo=$("#inp_dato").val();
    if( (codigo!='') && (empresa_id!=0))
    {
    var datos= {codigo:codigo  };
    var urlajax=$("#url").val()+"filtro_billeteras_dependientes";   
    $("#vista_clientes").show();
    $("#vista_clientes").load(urlajax,{datos});                    
  
    }else{
        if(codigo=='')
        {
            alert(' no  inserto el codigo ');
        }
        if(empresa_id==0)
        {
            alert('no selecciono la empresa ');
        }
        
    }
    
}
function  busqueda_billeteras_general()
{
    var codigo=$("#inp_dato").val();
    if( (codigo!='') && (empresa_id!=0))
    {
    var datos= {codigo:codigo  };
    var urlajax=$("#url").val()+"filtro_billeteras_general";   
    $("#vista_clientes").show();
    $("#vista_clientes").load(urlajax,{datos});                    
  
    }else{
        if(codigo=='')
        {
            alert(' no  inserto el codigo ');
        }
        if(empresa_id==0)
        {
            alert('no selecciono la empresa ');
        }
        
    }
    
}
function facturaspendientes(codigo_usuario)
{
    var codigo=codigo_usuario;
    var tipo=sw;
    var datos= {empresa_id:empresa_id,codigo:codigo ,tipo:tipo , urlimagen:urlimagen ,nombreempresa: nombreempresa  };
    var urlajax=$("#url").val()+"facturaspendientes";   
    $("#facturaspendientesbody").empty();
    $("#facturaspendientesbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    $("#facturacionbody").empty();   
    $("#facturacionbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    $("#confirmacionbody").empty();   
    $("#confirmacionbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    $("#prepararpagobody").empty();   
    $("#prepararpagobody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    
    
    $("#facturaspendientesbody").load(urlajax,{datos});   
    
    $("#li2").show();
    $("#facturaspendientes-tab").click();

}

function habilitarrecarga()
{
    $('#btnbuscar').hide();
    $('#divrecarga').show();
    $('#lblcodigo').text('Telefono - Carnet ');
    
    $("#vista_clientes").hide();
    
   $('#inp_dato').val(<?= $_SESSION['cliente']; ?> );
   $('#divcriteriobusqueda').hide();
   
    busqueda_billeteras_dependientes();
}
function dehabilitarrecarga()
{
    $('#btnbuscar').show();
    $('#divrecarga').hide();
    $('#lblcodigo').text('Codigo');
    $('#lir').hide();
    $("#recargabody").empty(); 
    $('#divcriteriobusqueda').show();
    $("#vista_clientes").empty();
    
    $('#inp_dato').val("<?= @$_SESSION['codigofijo']; ?>" );
    
}
  
function vistarecarga(codigo)
{
   // var codigo=$('#inp_dato').val();
    var datos= {codigo:codigo  };
    var urlajax=$("#url").val()+"vistarecargas";   
    $("#facturaspendientesbody").empty();
    $("#facturaspendientesbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    $("#facturacionbody").empty();   
    $("#facturacionbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    $("#confirmacionbody").empty();   
    $("#confirmacionbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    $("#prepararpagobody").empty();   
    $("#prepararpagobody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    
    
    $("#recargabody").load(urlajax,{datos});   
    
    $("#lir").show();
    $("#recarga-tab").click();

}

function limpiar()
{
 
    $("#facturaspendientesbody").empty();
    $("#recargabody").empty();  
    $("#facturaspendientesbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    $("#facturacionbody").empty();   
    $("#facturacionbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    $("#confirmacionbody").empty();   
    $("#confirmacionbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    $("#prepararpagobody").empty();   
    $("#prepararpagobody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    $("#inicio-tab").click();

}


</script>
  
  <?php $this->load->view('theme/js');  ?>
<script>
    var perfil =$('#perfil').val();
    var swperfil=0;
$( document ).ready(function() {
 
    if(perfil==1)
    {
        perfilfrecuente();
        $("#btnperfil").hide();
        swperfil=1;
    }else{
        swperfil=0;
        cambiar_rubro(1,'#rub-0');
        $("#btnperfilempresa").hide();
    }
    //
    
    $('#li2').attr('disabled', true); //add
});
$("#inp_dato").on('keyup', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        busqueda_datos();
    }
}); 

</script>

</body>


</html>
