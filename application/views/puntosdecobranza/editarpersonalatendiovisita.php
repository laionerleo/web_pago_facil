<div class="modal fade" id="modal-update-personal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            <h4 class="modal-title" id="myModalLabel">Editar Personal que Atendio</h4>
        </div>  <!-- Modal Header -->
                                                                        
                                                                        
        <!-- Modal Body -->
        <div class="modal-body">
        <p class="statusMsg"></p>
        <form role="form" action="InsertarVisita" method="post">
            <div class="form-group">
                <label for="inputName">Personal que Atendio</label>
                <select class="custom-select custom-select-m" name="txtAtendio" id="txtAtendio" placeholder="Selecione una Opcion">
                        <option value="" selected><?php echo $key->PersonalAtendio ?></option>      
                    <?php 
                        foreach ($agente as $atendio) {?>
                        <!--<option value="<?php echo $atendio->cliente; ?>"><?php echo $atendio->apellido.' '. $atendio->nombre; ?></option> -->
                    <?php }
                    ?>
                </select>    
                <!--<input type="text" class="form-control" value="<?php echo $key->PersonalAtendio ?>" id="txtAtendio" placeholder="Personal que Atendio..."/>-->
            </div>
            <div class="form-group">
                <label for="inputEmail">Telefono</label>
                <input type="email" class="form-control" value="<?php echo $key->TelefonoAtendio ?>" id="txtTelefonoAtendio" placeholder="Telefono..."/>
            </div>
        </form>
    </div>                                                                   
    <!-- Modal Footer -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary submitBtn" onclick="EditarPersonalAtendio($('#txtAtendio').val(),$('#txtTelefonoAtendio').val());">Aceptar</button>
    </div>                                                                    
                                                                        
</div>
                                                               
