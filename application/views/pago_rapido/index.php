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

        <div class="content-body">

            <div class="content">
                <div class="page-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href=index-2.html>Pago facil Bolivia</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">PAGO RAPIDO</li>
                        </ol>
                    </nav>
                </div>

                <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Pago rapido</h6>
                            <form class="needs-validation" novalidate="">
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <a href="#" id="btn_rubro" title="Cart" class="nav-link" data-toggle="dropdown">
                                                Escoger tipo de empresa<i data-feather="shopping-bag"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                                <div class="bg-dark p-4 text-center d-flex justify-content-between align-items-center">
                                                    <h5 class="mb-0">Tipo Empresa</h5>
                                                    
                                                </div>
                                                <div>
                                                    <div class="list-group list-group-flush">
                                                    <?php  for ($i=0; $i < count($rubros->values) ; $i++) { ?>
                                                        <a href="#" onclick="cambiar_rubro(<?php echo $rubros->values[$i]->nTipoEmpresa  ?>)" class="p-2 list-group-item d-flex">
                                                            <div>
                                                                <figure class="avatar mr-3">
                                                                    <img src="<?php echo $rubros->values[$i]->cImagenUrl  ?>"
                                                                        alt="Santa">
                                                                </figure>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <p class="mb-0 line-height-12 d-flex justify-content-between">
                                                                <?php echo $rubros->values[$i]->nNombre  ?>
                                                                    <i title="Close" data-toggle="tooltip"
                                                                    class="hide-show-toggler-item ti-close"></i>
                                                                </p>
                                                                
                                                            </div>
                                                        </a>
                                                    <?php }  ?>
                                                  
                                                     
                                                    </div>
                                                </div>
                                               
                                            </div>
                                     
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        
                                    
                                            <a href="#" id="btn_region" title="Cart" class="nav-link" data-toggle="dropdown">
                                                Escoger ciudad<i data-feather="shopping-bag"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                                <div class="bg-dark p-4 text-center d-flex justify-content-between align-items-center">
                                                    <h5 class="mb-0">Region</h5>
                                                    
                                                </div>
                                                <div>
                                                    <div class="list-group list-group-flush">
                                                    <?php  for ($i=0; $i < count($region->values) ; $i++) { ?>
                                                        <a href="#" onclick="cambiar_region(<?php echo $region->values[$i]->nRegion  ?>)" class="p-2 list-group-item d-flex">
                                                            <div>
                                                                <figure class="avatar mr-3">
                                                                    <img src="<?php echo $region->values[$i]->nEstado  ?>"
                                                                        alt="Santa">
                                                                </figure>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <p class="mb-0 line-height-12 d-flex justify-content-between">
                                                                <?php echo $region->values[$i]->cNombre  ?>
                                                                    <i title="Close" data-toggle="tooltip"
                                                                    class="hide-show-toggler-item ti-close"></i>
                                                                </p>
                                                                
                                                            </div>
                                                        </a>
                                                        <?php }  ?>
                                                
                                                     
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        
                                     
                                    </div>
                                    
                                    <div class="col-md-3 mb-3">
                                    <a href="#" id="btn_region" title="Cart" class="nav-link" data-toggle="dropdown">
                                                Escoger empresa<i data-feather="shopping-bag"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                                <div class="bg-dark p-4 text-center d-flex justify-content-between align-items-center">
                                                    <h5 class="mb-0">Empresas</h5>
                                                    
                                                </div>
                                                <div>
                                                    <div class="list-group list-group-flush" id="lista_filtro_empresa" >
                                                    
                                                     
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        
                                     
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        
                                        <select class="form-control form-control-lg">
                                        <option  style="center left; padding-left:20px;" value="" selected disabled hidden> Seleccionar</option>
                                            <option  style="center left; padding-left:20px;"> Codigo Fijo</option>
                                            <option  style="center left; padding-left:20px;"> Cedula de identidad</option>
                                            
                                        </select>
                                     
                                    </div>
                                    <div class="col-md-1 mb-">
                                    <input type="hidden" id="url"  value="<?= $url ?>">
                                     <button class="btn btn-primary" type="submit"> Buscar</button>
                                    </div>


                                 
                                </div>
                              
                                
                            </form>
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

function cambiar_region(id_region)
{
    region_id=id_region;
    filtrar_empresas();
    $('#btn_region').click();

}
function cambiar_rubro(id_rubro)
{
    rubro_id=id_rubro;
    //alert("nuevo rubro :"+rubro_id );
    $('#btn_rubro').click();
    filtrar_empresas();
}
function filtrar_empresas()
		{
			                var datos= {rubro_id:rubro_id,region_id:region_id  };

							var urlajax=$("#url").val()+"get_filtro_regiones";        
								$.ajax({                    
										url: urlajax,
										data: {datos},
										type : 'POST',
										dataType: "json",
										beforeSend:function( ) {   
											//$("#waitLoadinglogin").fadeIn(1000);
										},                    
										success:function(response) {
                                            console.log("funciono bien ");
                                            console.log(response.values);
                                            $("#lista_filtro_empresa").empty();
                                            for (let index = 0; index < response.values.length; index++) {
                                                console.log(response.values[index].cDescripcion);
                                                
                                                $("#lista_filtro_empresa").append(`
                                                <a href="#"  class="p-2 list-group-item d-flex">
                                                            <div>
                                                                <figure class="avatar mr-3">
                                                                    <img src="`+response.values[index].cUrl_icon_big+`"
                                                                        alt="Santa">
                                                                </figure>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <p class="mb-0 line-height-12 d-flex justify-content-between">
                                                                `+response.values[index].cDescripcion+`
                                                                    <i title="Close" data-toggle="tooltip"
                                                                    class="hide-show-toggler-item ti-close"></i>
                                                                </p>
                                                                
                                                            </div>
                                                        </a>
                                                
                                                `);
                                                
                                            }
										},
										error: function (data) {
											console.log("error");
											console.log(data.responseText);
										
										},               
										complete:function( ) {
											//$("#waitLoadinglogin").fadeOut(1000);  
										},
									}
									); 

		}

</script>
  
  <?php $this->load->view('theme/js');  ?>
</body>


</html>
