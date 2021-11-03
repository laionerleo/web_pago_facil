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
                <label for="inputName">Agente Visitante</label>
                <input type="text" class="form-control" id="inputName" placeholder="Agente Visitante..."/>
            </div>
            <div class="form-group">
                <label for="inputEmail">Telefono</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="Telefono..."/>
            </div>
        </form>
    </div>                                                                   
    <!-- Modal Footer -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
    </div>                                                                    
                                                                        
</div>
                                                               
