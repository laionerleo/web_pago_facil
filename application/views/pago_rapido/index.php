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
                                <h6 class="card-title">Pago rapido</h6>
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
                                  <br>
                                 
                                <div class="form-row">
                                    <div class="col-md-3 mb-2 ">
                                        <label for="">Tipo de documento</label><br>
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" onclick="cambiar_tipo_switch()" name="exampleRadios"
                                                id="exampleRadios4" value="option1" >
                                          <label class="form-check-label" for="exampleRadios4">
                                              Codigo Fijo 
                                          </label>
                                      </div>
                                      <div class="form-check">
                                          <input class="form-check-input" type="radio" onclick="cambiar_tipo_switch()" name="exampleRadios"
                                                id="exampleRadios5" value="option2" checked>
                                          <label class="form-check-label" for="exampleRadios5">
                                              Carnet de Identidad
                                          </label>
                                      </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">Codigo</label>
                                        <input id="inp_dato" class="form-control form-control-sm" type="text" placeholder="codigo fijo o ci">
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-md-1 mb-1">
                                        <input type="hidden" id="url"  value="<?= $url ?>">
                                        <br>
                                        <input type="button" class="btn btn-primary"  onclick="busqueda_datos()"  value="Buscar">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-12" id="vista_clientes">
                                        
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

//0 es carnet y uno es 
var sw=2;



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
function cambiar_empresa(id_empresa,id_figure,fila_id)
{
    empresa_id=id_empresa;
    $(id_fugure_empresa).removeClass("avatar-state-success");
    id_fugure_empresa=id_figure;
    $(id_figure).addClass("avatar-state-success");
    $(id_fila).css("background-color", "#FFFFFF");
    id_fila=fila_id;

    $(id_fila).css("background-color", "rgb(45, 206, 222)");
    
    
    
    //$('#btn_empresa').click();
    
}
function  cambiar_tipo_switch()
{
//sw=0
    if(sw==1)
    {
        sw=2;
    }else{
        sw=1;
    }
    console.log("el valor del swith  es :" + sw);
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
    var datos= {empresa_id:empresa_id,codigo:codigo ,tipo:tipo };
    var urlajax=$("#url").val()+"filtro_codigo_fijo";   
    $("#vista_clientes").load(urlajax,{datos});                    
}
function facturaspendientes()
{
  var codigo=$("#inp_dato").val();
    var tipo=sw;
    var datos= {empresa_id:empresa_id,codigo:codigo ,tipo:tipo };
    var urlajax=$("#url").val()+"facturaspendientes";   
    $("#vista_general").load(urlajax,{datos});   
}

</script>
  
  <?php $this->load->view('theme/js');  ?>
</body>


</html>
