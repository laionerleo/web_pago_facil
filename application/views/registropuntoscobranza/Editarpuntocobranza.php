<div class="modal fade" id="modal-update-punto-cobranza" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            <h4 class="modal-title" id="myModalLabel">Editar Punto Cobranza</h4>
        </div>  <!-- Modal Header -->
                                                                        
                                                                        
        <!-- Modal Body -->
        <div class="modal-body">
        <p class="statusMsg"></p>
        <form role="form" action="editar/puntocobranza" id="frmPuntoCobranza" method="post">
            <div class="form-group">
                    <label for="inputEmail">Cliente</label>
                    <input type="text" class="form-control" value="" id="txtCliente" placeholder="Cliente..."/>
             </div>
            <div class="form-group" style="display: none;">
                <label for="inputEmail">Latitud</label>
                <input type="number" class="form-control" value="" id="txtLatitud" placeholder="Latitud..."/>
            </div>
            <div class="form-group" style="display: none;">
                <label for="inputEmail">Longitud</label>
                <input type="number" class="form-control" value="" id="txtLongitud" placeholder="Longitud..."/>
            </div>
            <div class="form-group">
                <label for="inputEmail">Direccion</label>
                <input type="email" class="form-control" value="" id="txtDireccion" placeholder="Direccion..."/>
            </div>
            <div class="form-group">
                <label for="inputEmail">Horario Lun Vie</label>
                <input type="email" class="form-control" value="" id="txtHoraLuVi" placeholder="Hora Lunes Viernes..."/>
            </div>
            <div class="form-group">
                <label for="inputEmail">Horario Lun Vie 2</label>
                <input type="email" class="form-control" value="" id="txtHoraLuVi2" placeholder="Hora Lunes Viernes..."/>
            </div>
            <div class="form-group">
                <label for="inputEmail">Hora Sabado</label>
                <input type="email" class="form-control" value="" id="txtHoraSabado" placeholder="Hora Sabado..."/>
            </div>
            <div class="form-group">
                <label for="inputEmail">Hora Domingo</label>
                <input type="email" class="form-control" value="" id="txtHoraDomingo" placeholder="Hora Domingo..."/>
            </div>
            <div class="form-group">
                <label for="inputEmail">Nombre Establecimiento</label>
                <input type="email" class="form-control" value="" id="txtNombreEstablecimiento" placeholder="Nombre Establecimiento..."/>
            </div>
            <div class="form-group">
                <label for="inputEmail">Nombre Propietario</label>
                <input type="email" class="form-control" value="" id="txtNombrePro" placeholder="Nombre Propietario..."/>
            </div>
            <div class="form-group">
                <label for="inputEmail">Telefono Propietario</label>
                <input type="email" class="form-control" value="" id="txtTelefonoPro" placeholder="Telefono Propietario..."/>
            </div>
            <div class="form-group">
                <label for="inputEmail">Horario Propiertario</label>
                <input type="email" class="form-control" value="" id="txtHoraPro" placeholder="Horario Propietario..."/>
            </div>
            <div class="form-group">
                <label for="inputEmail">Persona Atendio</label>
                <input type="email" class="form-control" value="" id="txtPersonaAtendio" placeholder="Persona Atendio..."/>
            </div>
            <div class="form-group">
                <label for="inputEmail">Telefono Atendio</label>
                <input type="email" class="form-control" value="" id="txtTelefonoAtendio" placeholder="Telefono Atendio..."/>
            </div>
            <div class="form-group">
                <label style="color:white" for="Ubicacion">Se entrego banner</label> <br>
                <label for=""><input type="checkbox"  name="txtbanner1" id="txtbanner1" value=""> Se Entrego Banner</label>
            </div>
            <div class="form-group">
                <label style="color:white" for="Ubicacion">Acepto ser punto</label> <br>
                <label for=""><input type="checkbox"  name="txtpunto1" id="txtpunto1" value=""> Acepto ser Punto</label>
            </div>
        </form>
    </div>                                                                   
    <!-- Modal Footer -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary submitBtn" onclick="EditarPuntoCobranza($('#txtDireccion').val(),1,$('#txtHoraLuVi').val(),$('#txtHoraLuVi2').val(),$('#txtHoraSabado').val(),$('#txtHoraDomingo').val(),$('#txtNombreEstablecimiento').val(),$('#txtNombrePro').val(),$('#txtTelefonoPro').val(),$('#txtHoraPro').val(),$('#txtPersonaAtendio').val(),$('#txtTelefonoAtendio').val(),$('#txtbanner1').val(),$('#txtpunto1').val());">Aceptar</button>
    </div>                                                                    
                                                                        
</div>
                                                               
