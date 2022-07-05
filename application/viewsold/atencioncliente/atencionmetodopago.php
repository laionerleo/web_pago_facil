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
        <input type="hidden" id="url"  value="<?= $url ?>">
        <div class="content-body" id="vista_general"  >
        

        <div class="content" >
        <div class="page-header justify-content-between">
  
        </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                          <div class="card-body">
                            <h2>Metodos Pago</h2>
                          <form id="form_login">
                            <div class="form-group">
                                    <select id="slcmetodopago" name="slcmetodopago" class="form-control form-control-lg">
                                        <option>Seleccione Un metodo de pago</option>
                                        <?php  for ($i=0; $i < count($metodosdepago) ; $i++) {?>
                                            <option value="<?=  $metodosdepago[$i]->metodoPago ?>" ><?=  $metodosdepago[$i]->nombre ?></option>
                                            
                                        <?php  } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select id="slctipo" name="slctipo" class="form-control form-control-lg">
                                        <option>    Seleccion una Opcion</option>
                                        <option value="" > RECLAMO</option>
                                        <option value="" >CONSULTA </option>
                                        <option value="" >QUEJA </option>
                                        <option value="" >SUGERENCIA </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">ingrese un comentario</label><br>
                                    
                                           <textarea style="width: -moz-available;" name="" id="" cols="30" rows="10"></textarea>
                                </div>
                             
                                <input type="hidden" id="url" name="url" value="<?= $url ?>">
                               <center> <button type="button" onclick="actualizardatos()" class="btn btn-primary">Guardar</button></center>
                            </form>
                    </div>
                    
                </div>
                
            </div>
        </div>

          <!-- begin::footer -->
       
          <!-- end::footer -->

    </div>

    </div>

</div>
<!-- end::main -->
<?php $this->load->view('theme/js');  ?>
<!-- Plugin scripts -->
<script>

function realizaratencion()
		{
			var datos=$("#form_login").serialize();
			var urlajax=$("#url").val()+"atencionmetodopago";   
            
                 
            $.ajax({                    
                url: urlajax,
                data: {datos},
                type : 'POST',
                dataType: "json",
                beforeSend:function( ) {   
                    //$("#waitLoadinglogin").fadeIn(1000);
                },                    
                success:function(response) {
                
                console.log(response);
            
                    if(response==0)
                    {
                        alert("se registro con Exito");
                        window.location.href = urlsucces;
                        //location.reload();
                        
                    }
                    
                },
                error: function (data) {
                    //console.log(data);
                    $("#mensaje").text('usuario o contraseña incorrectos');
                  
                },               
                complete:function( ) {
                    //$("#waitLoadinglogin").fadeOut(1000);  
                },
            }
            ); 

		}
</script>




</body>


</html>
