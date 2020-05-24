<!doctype html>
<html lang="en">
<?php $this->load->view('theme/head'); ?>
<style>

*, *:before, *:after {
  box-sizing: inherit;
  margin:0;
  padding:0;
}
.mid {
  display: flex;
  align-items: center;
  justify-content: center;
  padding-top:0em;
}


/* Switch starts here */
.rocker {
  display: inline-block;
  position: relative;
  /*
  SIZE OF SWITCH
  ==============
  All sizes are in em - therefore
  changing the font-size here
  will change the size of the switch.
  See .rocker-small below as example.
  */
  font-size: 2em;
  font-weight: bold;
  text-align: center;
  text-transform: uppercase;
  color: #888;
  width: 12em;
  height: 4em;
  overflow: hidden;
  border-bottom: 0.5em solid #eee;
}

.rocker-small {
  font-size: 0.75em; /* Sizes the switch */
  
}

.rocker::before {
  content: "";
  position: absolute;
  top: 0.5em;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #999;
  border: 0.5em solid #eee;
  border-bottom: 0;
}

.rocker input {
  opacity: 0;
  width: 0;
  height: 0;
}

.switch-left,
.switch-right {
  cursor: pointer;
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 2.9em;
  width: 6em;
  transition: 0.2s;
}

.switch-left {
  height: 2.9em;
  width: 6em;
  left: 0.85em;
  bottom: 0.4em;
  background-color: #ddd;
  transform: rotate(15deg) skewX(15deg);
}

.switch-right {
  right: 0.5em;
  bottom: 0;
  background-color: #bd5757;
  color: #fff;
}

.switch-left::before,
.switch-right::before {
  content: "";
  position: absolute;
  width: 0.4em;
  height: 2.45em;
  bottom: -0.45em;
  background-color: #ccc;
  transform: skewY(-65deg);
}

.switch-left::before {
  left: -0.4em;
}

.switch-right::before {
  right: -0.375em;
  background-color: transparent;
  transform: skewY(65deg);
}

input:checked + .switch-left {
  background-color: #0084d0;
  color: #fff;
  bottom: 0px;
  left: 0.5em;
  height: 2.9em;
  width: 6em;
  transform: rotate(0deg) skewX(0deg);
}

input:checked + .switch-left::before {
  background-color: transparent;
  width: 3.0833em;
}

input:checked + .switch-left + .switch-right {
  background-color: #ddd;
  color: #888;
  bottom: 0.4em;
  right: 0.8em;
  height: 2.9em;
  width: 5.75em;
  transform: rotate(-15deg) skewX(-15deg);
}

input:checked + .switch-left + .switch-right::before {
  background-color: #ccc;
}

/* Keyboard Users */
input:focus + .switch-left {
  color: #333;
}

input:checked:focus + .switch-left {
  color: #fff;
}

input:focus + .switch-left + .switch-right {
  color: #fff;
}

input:checked:focus + .switch-left + .switch-right {
  color: #333;
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

        <div class="content-body">

            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                              <h6 class="card-title">Pago rapido</h6>
                                <div class="form-row">
                                    <div class="col-md-2 mb-2">
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
                                                                <a href="#" title=" <?php echo $region->values[0]->cNombre  ?>" data-toggle="tooltip" onclick="cambiar_region(<?php echo $region->values[$i]->nRegion  ?>,'#reg-0')">
                                                                <img src="<?php echo $region->values[0]->nEstado  ?>"class="rounded-circle"
                                                                        alt="avatar">
                                                                </a>
                                                    </figure>
                                                  

                                                  <div id="div_regiones"  style="display:none">
                                                    <?php  for ($i=1; $i < count($region->values) ; $i++) { ?>
                                                      
                                                        <figure id="reg-<?= $i ?>"  class="avatar avatar-lg" style="background-color: #FFFF;border-color:black" >
                                                                <a href="#" title=" <?php echo $region->values[$i]->cNombre  ?>" data-toggle="tooltip" onclick="cambiar_region(<?php echo $region->values[$i]->nRegion  ?>,'#reg-<?= $i ?>')">
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
                                    </div>
                                    <div class="col-md-3 mb-2 ">
                                        <label for="">Tipo de documento</label><br>
                                        <div class="mid">
                                            <label class="rocker rocker-small">
                                            <input type="checkbox" onclick="cambiar_tipo_switch()"  value="0" >
                                            <span class="switch-left">CF</span>
                                            <span class="switch-right">CI</span>
                                          </label> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">.</label>
                                        <input id="inp_dato" class="form-control form-control-sm" type="text" placeholder="codigo fijo o ci">
                                    </div>
                                </div>
                                <div class="form-row" >
                                        <div class="col-md-6 mb-6"  >
                                            <label for="">empresas</label>
                                            <div id="vistas_empresas">
                                            </div>                                    
                                        </div>
                                </div>
                                  <br>
                                <div class="form-row">
                                    <div class="col-md-1 mb-1">
                                        <input type="hidden" id="url"  value="<?= $url ?>">
                                        <br>
                                        <input type="button" class="btn btn-primary"  onclick="busqueda_datos()"  value="Buscar">
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
var swregion=1;

//0 es carnet y uno es 
var sw=2;



function cambiar_region(id_region,id_figure)
{
    region_id=id_region;
    $(id_fugure_region).removeClass("avatar-state-success");
    id_fugure_region=id_figure;
    
    $('#btn_region').click();
    $(id_figure).addClass("avatar-state-success");
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
function cambiar_empresa(id_empresa,id_figure)
{
    empresa_id=id_empresa;
    $(id_fugure_empresa).removeClass("avatar-state-success");
    id_fugure_empresa=id_figure;
    $(id_figure).addClass("avatar-state-success");
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
    $('#div_regiones').show();
    swregion=0;

  }else{
    $('#div_regiones').hide();
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

</script>
  
  <?php $this->load->view('theme/js');  ?>
</body>


</html>
