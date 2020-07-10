<!doctype html>
<html lang="en">
<?php $this->load->view('theme/head'); ?>

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
                                                     
                       
                       <div class="row">
                                <div class="col-md-12">
                                    <div class="card">

                                            <div class="container h-100-vh">
                                            <div class="row align-items-md-center h-100-vh">
                                                <div class="col-lg-6">
                                                    <img class="img-fluid" src="<?= base_url();  ?>application/assets/assets/media/svg/mean_at_work.svg" alt="image">
                                                </div>
                                                <div class="col-lg-4 offset-lg-1">
                                                    <h1>MUY PRONTO!</h1>
                                                    <p>Esta proceso del Desarrollo</p>
                                                </div>
                                            </div>
                                            </div>

                                    
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
    
    //$('#btn_empresa').click();
    
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
function facturaspendientes()
{
  var codigo=$("#inp_dato").val();
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

  

</script>
  
  <?php $this->load->view('theme/js');  ?>
<script>
    
$( document ).ready(function() {
    cambiar_rubro(1,'#rub-0');
    $('#li2').attr('disabled', true); //add
});

</script>

</body>


</html>
