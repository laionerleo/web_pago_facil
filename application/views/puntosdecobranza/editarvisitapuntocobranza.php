<div class="modal fade" id="modal-update" role="dialog">
    <form novalidate action="EditarVisitaAgente" method="post" id="FormAgente">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Editar Agente Visitante</h4>
                </div>  <!-- Modal Header -->
                                                                            
                                                                            
            <!-- Modal Body -->
            <div class="modal-body">
            <p class="statusMsg"></p>
            
                <div class="form-group">
                    <label for="inputName">Agente Visitante</label>
                    <input type="text" class="form-control" id="txtAgente" placeholder="Agente Visitante..."/>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Telefono</label>
                    <input type="number" class="form-control" id="txtTelefonoAgente" placeholder="Telefono..."/>
                </div>
        </div>                                                                   
        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="EditarAgente($('#txtAgente').val(),$('#txtTelefonoAgente').val());">Aceptar</button>
        </div>                                                                    
    </form>                                                                    
</div>
                                                               
