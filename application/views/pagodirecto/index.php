<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="<?=  base_url() ?>/application/assets/assets/media/image/logo-pagofacil.png"/>  -->
    <link rel="shortcut icon" href="<?=   @$tcUrlImagen; ?>"/>
    

    <!-- Plugin styles -->
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/bundle.css" type="text/css">

        <!-- Slick -->
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick-theme.css" type="text/css">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/datepicker/daterangepicker.css" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/dataTable/datatables.min.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/assets/css/app.min.css" type="text/css">
    
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/slick/slick-theme.css" type="text/css">
    <link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/prism/prism.css" type="text/css">
    <title><?=  @$tcNombreEmpresa   ?></title>
      <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
      <meta content="<?= substr(strip_tags(@$tcNombreEmpresa), 0, 35).'...';      ?>" name="description">
      <meta content="" name="author">  
    <meta name="title" content="<?= substr(strip_tags(@$tcNombreEmpresa), 0, 35).' by PagoFacil - '.$tcNombreEmpresa      ?>">
    <meta name="description" content="<?= substr(strip_tags(@$tcNombreEmpresa), 0, 65).'...';      ?>" >
    <meta property="og:url" content="">
    <meta property="og:image" content="<?=  @$tcUrlImagen  ?>">
    <meta property="og:image:secure_url" content="<?=  @$tcUrlImagen ; ?>">
    <meta property="og:image" itemprop="image" content="<?=  @ $tcUrlImagen ?>"> 
    <meta property="og:image:type" content="image/jpg">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?=   @$tcUrlImagen; ?>">
    <link rel="stylesheet" type="text/css" href="<?=  base_url() ?>/application/assets/assets/js/msdropdown/dd.css" />
    
</head>
<meta property="og:type" content="website">
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
        <!-- end::navigation -->

        <div class="content-body" id="vista_general"  >

            <div class="content"  style=" padding-left: 35px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                              <div class="card-body">
                                 
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item" id="li1" style="display: none;" >
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
                                       aria-controls="contact" aria-selected="false">Confirmación de Pago</a>
                                </li>
                                <li class="nav-item" id="li5" style="display:none" > 
                                    <a class="nav-link" id="prepararpago-tab" data-toggle="tab" href="#prepararpagobody" role="tab"
                                       aria-controls="contact" aria-selected="false">Procesar Pago </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="iniciobody" role="tabpanel"
                                     aria-labelledby="home-tab">
                                     <div class="row">
                                         <div  class=" col-md-2">  </div>
                                     <div class=" col-md-8">
                                            <div class="card" style="height: 100%;">
                                                <div class="card-body text-center m-t-10-minus">
                                                    <div class="card-body">
                                                        <h4>Datos </h4>
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <h1><?= $tcNombreEmpresa ?></h1>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <img style="width: 150px; height: 150px; object-fit: contain;" src="<?= $tcUrlImagen  ?>" alt="">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <div class="form-row">
                                                                <div  id="divcriteriobusqueda" class="col-md-4 mb-2 "  style="display:none" >
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
                                                                <div  id="divcriteriobusquedahub" class="col-md-4 mb-2"   style="text-align: initial;">

                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <label id ="lblcodigo" for="">Codigo</label>
                                                                    <input id="inp_dato" min="0" class="form-control form-control-sm" type="number" placeholder="codigo fijo o ci" value="<?= @$_SESSION['codigofijo']   ?>">
                                                                </div>
                                                             
                                                                <div class="form-row col-md-4 mb-3 ">
                                                                    <div class="col-md-1 mb-1" id="idlugarboton" >
                                                                        <input type="hidden" id="url"  value="<?= $url ?>">
                                                                        <input type="hidden" id="perfil"  value="<?= $perfilfrecuente ?>">
                                                                        
                                                                        <br>
                                                                        <input id="btnbuscar"  type="button" class="btn btn-primary"  onclick="busqueda_datos()"  value="Buscar">
                                                                        <input id="btnrecarga" style="display:none" type="button" class="btn btn-primary"  onclick="vistarecarga()"  value="Recarga ">
                                                                        
                                                                    </div>
                                                                </div>

                                                                <div class="form-row" style="    width: 100%;">
                                                                <div class="col-md-12 mb-12" id="vista_clientes">
                                                                    
                                                                </div>
                                                            </div>

                                                            
                                                            </div>
                                            
                                                    
                                                    </div>
                                                
                                                </div>
                                            </div>
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
<input type="hidden" id="url" value="<?= base_url() ?>es/">
              <!-- begin::footer -->
            <?php $this->load->view('theme/footer');  ?>
              <!-- end::footer -->

        </div>

    </div>

</div>
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
var sw=1;

function cambiar_region(id_region,id_figure,nombre,)
{
    region_id=id_region;
    $('#btn_region').click();
    filtrar_empresas();

}
function cambiar_rubro(id_rubro,id_figure)
{
    rubro_id=id_rubro;
    id_fugure_rubro=id_figure;
    $("#btnperfilempresa").hide();
    $("#btnperfil").show();
    filtrar_empresas();
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
            cargarcriteriobusquedahub(id_empresa);
        }
    if(id_empresa==165)
        {
            $("#inp_dato").val("29101");
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
    $("#vistas_empresas").empty();
    $("#vistas_empresas").append(`<div class="d-flex justify-content-center">
                                <div class="spinner-border" style="width: 5rem; height: 5rem;"  role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <br>
                            `);

    var datos= {rubro_id:rubro_id,region_id:region_id  };
    var urlajax=$("#url").val()+"get_filtro_regiones";  
   // $("#waitLoading").fadeIn(1000);
    $("#vistas_empresas").load(urlajax,{datos});   
    $("#vista_clientes").empty();
}
function perfilfrecuente()
{
    $("#vistas_empresas").empty();
    $("#vistas_empresas").append(`<div class="d-flex justify-content-center">
                                <div class="spinner-border" style="width: 5rem; height: 5rem;"  role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <br>
                            `);

    $("#btnperfilempresa").show();
    $("#btnperfil").hide();
    
    var urlajax=$("#url").val()+"perfilfrecuente";  
   // $("#waitLoading").fadeIn(1000);
    $("#vistas_empresas").load(urlajax);   
}

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

    $("#vista_clientes").empty();
    $("#vista_clientes").append(`<div class="d-flex justify-content-center">
                                    <div class="spinner-border" style="width: 5rem; height: 5rem;"  role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            <br>
                            `);
    

    var lacriterio=$("[name=criterio]:checked").val().split('-');
    
    var criterio=lacriterio[0];
    var titulo=lacriterio[1];
   
    var codigo=$("#inp_dato").val();
  
    if( (codigo!='') && (empresa_id!=0)  && (criterio!=0 )  )
    {  
        var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
        var datos= {empresa_id:empresa_id,codigo:codigo , criterio :criterio ,titulo:titulo ,tnIdentificarPestaña:tnIdentificarPestaña  };
        var urlajax=$("#url").val()+"filtro_clientes";   
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
        $("#vista_clientes").empty();
        
    }
    
}

function  busqueda_billeteras_dependientes()
{
    $("#vista_clientes").empty();
    $("#vista_clientes").append(`<div class="d-flex justify-content-center">
                                <div class="spinner-border" style="width: 5rem; height: 5rem;"  role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <br>
                            `);
    var codigo=$("#inp_dato").val();
    var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
    if( (codigo!='') && (empresa_id!=0))
    {
    var datos= {codigo:codigo , tnIdentificarPestaña:tnIdentificarPestaña  };
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
        $("#vista_clientes").empty();
        
    }
    
}
function  busqueda_billeteras_general()
{
    var codigo=$("#inp_dato").val();
    
    var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
    if( (codigo!='') && (empresa_id!=0))
    {
    var datos= {codigo:codigo  , tnIdentificarPestaña : tnIdentificarPestaña  };
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
    var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
    var codigo=codigo_usuario;
    var tipo=sw;
    var datos= {empresa_id:empresa_id,codigo:codigo ,tipo:tipo , urlimagen:urlimagen ,nombreempresa: nombreempresa , tnIdentificarPestaña:tnIdentificarPestaña };
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

function facturaspendientesmultiple(codigo_usuario)
{
    // var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
    empresa_id=<?= $tnEmpresa   ?> ; 
    tipo =1;
    urlimagen ="<?= $tcUrlImagen  ?>";
    nombreempresa="<?= $tcNombreEmpresa ?>";
    tnIdentificarPestaña=<?= $tnIdentificarPestaña  ?>;
    codigo=codigo_usuario;
  
    var datos= {empresa_id:empresa_id,codigo:codigo ,tipo:tipo , urlimagen:urlimagen ,nombreempresa: nombreempresa , tnIdentificarPestaña:tnIdentificarPestaña };
    var urlajax=$("#url").val()+"facturaspendientesmultiple";   
    $("#facturaspendientesbody").empty();
    $("#facturaspendientesbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    $("#facturacionbody").empty();   
    $("#facturacionbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    $("#confirmacionbody").empty();   
    $("#confirmacionbody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    $("#prepararpagobody").empty();   
    $("#prepararpagobody").prepend(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span>     </div>`);   
    
    $.ajaxSetup(
                {
                    cache: false,
                    error: function(event, request, settings){
                   // alert("a ocurrido un error al procesar la solicitud , volver a consultar ");
                    swal("a ocurrido un error al procesar la solicitud ", "volver a consultar la deuda porfavor "+request , "error");
                    $("#facturaspendientesbody").empty();
                    $("#inicio-tab").click();
                    }

                });
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
    
   //$('#inp_dato').val();
   $('#divcriteriobusqueda').hide();
   $('#divcriteriobusquedahub').hide();
   
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
    
    //$('#inp_dato').val("<?= 1 ?>" );
    
}
  
function vistarecarga(codigo)
{
   var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
    var datos= {codigo:codigo , tnIdentificarPestaña :tnIdentificarPestaña   };
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
function cargarcriteriobusquedahub(empresa)
{
    $("#divcriteriobusquedahub").append(`<div class="d-flex justify-content-center">
                                <div class="spinner-border" style="width: 5rem; height: 5rem;"  role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <br>
                            `);
    var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
    var datos= {Empresa:empresa ,tnIdentificarPestaña:tnIdentificarPestaña };
    var urlajax=$("#url").val()+"cargarcriterioshub";   
    $("#divcriteriobusqueda").hide();
    $("#divcriteriobusquedahub").show();
    $("#divcriteriobusquedahub").load(urlajax,{datos});   
}
</script>
  
  <?php $this->load->view('theme/js');  ?>
  <script src="<?=  base_url() ?>/application/assets/assets/js/msdropdown/jquery.dd.js" type="text/javascript"></script>
<script>
    sessionStorage.setItem('gnIdentificadorPestana', <?=  $tnIdentificarPestaña ?> );
    var perfil =$('#perfil').val();
    var swperfil=0;
    var slcregion,slcrubro;
    var indexunico=0;
    $( document ).ready(function() {

        id_empresa=<?= $tnEmpresa   ?> ; 
        empresa_id=<?= $tnEmpresa   ?> ; 
    var codigofijolink= <?= $tnCodigoFijo  ?> ;  
    if(codigofijolink==0)
    {
        $("#li1").show();
        cargarcriteriobusquedahub(id_empresa);
    }else{
        facturaspendientesmultiple(0);
    }
    
        

    });
            $("#inp_dato").on('keyup', function (e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    busqueda_datos();
                }
        }); 

function error(tnIdImput)
        {             
            $(tnIdImput).css("border-color", "red");
            $(tnIdImput).css("border-style", "outset");
            $(tnIdImput).css("border-width", "revert");
            //$(tnIdImput).append("<br><label>Falta introducir este dato</label>");
        }
        function valido(tnIdImput)
        {             
            $(tnIdImput).css("border-color", "#47FB13");
            $(tnIdImput).css("border-style", "outset");
            $(tnIdImput).css("border-width", "revert");
        }

             
        function getfacturaempresa(transaccion)
        {
            var link = document.createElement('a');
            var tntransaccion=transaccion;
            link.href =" <?=  base_url() ?>/es/getfacturaempresa/"+tntransaccion;
            link.download = "recibo-"+tntransaccion+"pdf";
            link.dispatchEvent(new MouseEvent('click'));
        }

       function getfacturapagofacil(transaccion)
        {
            var link = document.createElement('a');
            var tntransaccion=transaccion;
            link.href =" <?=  base_url() ?>/es/getfacturapagofacil/"+tntransaccion;
            link.download = "recibo-"+tntransaccion+"pdf";
            link.dispatchEvent(new MouseEvent('click'));
       
       
       }
        

</script>

</body>


</html>
