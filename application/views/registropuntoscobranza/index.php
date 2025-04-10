<!doctype html>
<html lang="en">
<?php $this->load->view('theme/head'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
<body  class="">

<div class="layout-wrapper">



    <div class="content-wrapper">

        <div class="content-body">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="height: 100%;">
                            <div class="card-body text-left" style="    padding-top: revert;"> 
                                <br>
                                <form class="needs-validation" novalidate action="BuscarVisitaFechas" method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row mb-2">
                                                <div class="col-12 text-muted"><h2>Listado de Visitas a Puntos de Cobranza <a  href="<?=$url?>nuevopuntocobranza"><button type="button" class="btn btn-primary">Nuevo</button></a></h2></div>
                                            </div>
                                        </div>
                                        
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                	<div class="input-group">
                                                	</div>
                                                </div>                                               
                                            </div>
                                       
                                    </div>                  
                                </div>
                                </form>
                                <div class="form-row">
                                    <div class="col-md-12 mb-12 table-responsive">
                                        <table id="example1" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Cliente</th>
                                                    <th>Propietario</th>
                                                    <th>Nombre Establecimiento</th>
                                                    <th>Estado  </th>  
                                                    <th>¿ Banner ?</th>
                                                    <th>¿ Punto ?</th>
                                                       
                                                    <th>Opciones</th>
                                                </tr>                            
                                            </thead>
                                            <tbody>                                                                
                                                <?php
                                                    foreach ($puntocobranza as $key) {?>
                                                        <tr>
                                                            <td><?php echo $key->apellido.' '. $key->nombre ?></td>
                                                            <td><?php echo $key->nombrePropietario ?></td>
                                                            <td><?php echo $key->nombreEstablecimiento ?></td>
                                                            <?php
                                                            if($key->estado == 1){?>
                                                                <td>Activo</td>
                                                            <?php }else{?> <td>Inactivo</td> <?php } ?>
                                                            <?php
                                                            if($key->seEntregoBanner == 1){?>
                                                                <td>Si</td>
                                                            <?php }else{?> <td>No</td> <?php } ?>
                                                            <?php
                                                            if($key->aceptoSerPunto == 1){?>
                                                                <td>Si</td>
                                                            <?php } else{?> <td>No</td> <?php } ?>
                                                            
                                                            <!--<td>  
                												<a href="<?=$url?>ConsultarVisita/<?php echo $key->idPuntoCobranza ?>">
                													<button class="btn btn-primary">Modificar</button>
                												</a>
                											</td>-->
                											<td><a  href="#modal-update-punto-cobranza" data-bs-effect="effect-just-me"
                                                                data-toggle="modal"><button class="btn btn-primary" onclick="editar('<?php echo $key->nombre.' '. $key->apellido ?>', '<?php echo $key->direccion ?>','<?php echo $key->horarioLunVieTurno1 ?>','<?php echo $key->horarioLunVieTurno2 ?>','<?php echo $key->horaSabado ?>','<?php echo $key->horaDomingo ?>','<?php echo $key->nombreEstablecimiento ?>','<?php echo $key->nombrePropietario ?>','<?php echo $key->nroTelefonoProp ?>','<?php echo $key->horarioProp ?>','<?php echo $key->personaQueAtendio ?>','<?php echo $key->nroTelefonoPersonaAtendio ?>','<?php echo $key->seEntregoBanner ?>','<?php echo $key->aceptoSerPunto ?>');" id="btnModal" type="button">Editar</button></a> 
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                ?>                                        
                                            </tbody>                        
                                            <tfoot>
                                                <tr>                                                                                                                   
                                                </tr>
                                            </tfoot>
                                            <?php include 'Editarpuntocobranza.php'; ?>
                                        </table>

                                    </div>
                                </div>
                                <input  type="hidden" id="btnmodal" class="btn btn-primary" data-toggle="modal"  value="nada" data-target="#modalopciones">                                           
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
<!-- end::main -->
<?php $this->load->view('theme/js');  ?>
<!-- Plugin scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<script>
    $(document).ready( function () {
            $('#example1').DataTable();

        } );
   
   function editar(Cliente, Direccion, HoraLunVi, HoraLunVi2, HoraSabado, HoraDomingo, NombreEstablecimiento, NombrePropietario, TelefonoPro, HoraPro, PersonaAtendio, TelefonoAten, Banner, AceptoSerPunto) {
       $('#txtCliente').val(Cliente);
       $('#txtDireccion').val(Direccion);
       $('#txtHoraLuVi').val(HoraLunVi);
       $('#txtHoraLuVi2').val(HoraLunVi2);
       $('#txtHoraSabado').val(HoraSabado);
       $('#txtHoraDomingo').val(HoraDomingo);
       $('#txtNombreEstablecimiento').val(NombreEstablecimiento);
       $('#txtNombrePro').val(NombrePropietario);       
       $('#txtTelefonoPro').val(TelefonoPro);
       $('#txtHoraPro').val(HoraPro);
       $('#txtPersonaAtendio').val(PersonaAtendio);
       $('#txtTelefonoAtendio').val(TelefonoAten);

       $('#txtbanner1').val(Banner);
       $('#txtpunto1').val(AceptoSerPunto);
        if(Banner == 1){
            $("#txtbanner1").prop("checked", true);
        }else{
            $("#txtbanner1").prop("checked", false);
        }
        if(AceptoSerPunto == 1){
            $("#txtpunto1").prop("checked", true);
        }else{
            $("#txtpunto1").prop("checked", false);
        }

   }
   $(document).ready(function(){ ocultar(); }) 
    $(document).on('change','input[type="checkbox"]' ,function(e) {
	    var checkboxBanner = document.getElementById('txtbanner1');
        var checkboxPunto = document.getElementById('txtpunto1');
        if(checkboxBanner.checked == true){
            $('#txtbanner1').val(1);
        }else{
            $('#txtbanner1').val('0');
        }
        if(checkboxPunto.checked == true){
            $('#txtpunto1').val(1);
        }else{
            $('#txtpunto1').val('0');
        }
	});
   function EditarPuntoCobranza(Direccion,Estado, HoraLunVi, HoraLunVi2, HoraSabado, HoraDomingo, NombreEstablecimiento, NombrePropietario, TelefonoPro, HoraPro, PersonaAtendio, TelefonoAten, Banner, AceptoSerPunto) {
        var lcUrlajax="https://pagofacil.com.bo/online/es/editar/puntocobranza";
        var goFormularioCliente = document.getElementById("frmPuntoCobranza");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });    
        $.ajax({                  
                url: lcUrlajax,
                data: {Direccion: Direccion,
                       Estado: Estado,
                       HoraLunVi: HoraLunVi,
                       HoraLunVi2: HoraLunVi2,
                       HoraSabado: HoraSabado,
                       HoraDomingo: HoraDomingo,
                       NombreEstablecimiento: NombreEstablecimiento,
                       NombrePropietario: NombrePropietario,
                       TelefonoPro: TelefonoPro,
                       HoraPro: HoraPro,
                       PersonaAtendio: PersonaAtendio,
                       TelefonoAten: TelefonoAten,
                       Banner: Banner,
                       AceptoSerPunto: AceptoSerPunto},
                type : 'POST',
                dataType: "json",
                beforeSend:function( ) {   
                },                    
                success:function(response) {
                    console.log("Exito");
                    console.log(response);
                    
                    swal({
                      title: "Exitoso!",
                      text: "Rediriguiendo.",
                      type: "success",
                      timer: 2000,
                      showConfirmButton: false
                    }, function(){
                          window.location.href = "https://pagofacil.com.bo/online/es/listadopuntocobranza";
                    });
                    
                },
                error: function (data) {
                    console.log("Error");
                    console.log(data.responseText);
                    swal({
                      title: "Error!",
                      text: "Rediriguiendo.",
                      type: "error",
                      timer: 2000,
                      showConfirmButton: false
                    }, function(){
                          window.location.href = "https://pagofacil.com.bo/online/es/listadopuntocobranza";
                    });
                },               
                complete:function( ) {                   
                },
            }
            );  
   }
</script>


</html>
