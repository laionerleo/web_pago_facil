<div class="modal fade" id="modal-update-punto-cobranza1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            <h4 class="modal-title" id="myModalLabel">Detalle Dato Encontrado</h4>
        </div>  <!-- Modal Header -->
                                                                        
                                                                        
        <!-- Modal Body -->
        <div class="modal-body">
        <p class="statusMsg"></p>
        <form role="form" action="InsertarVisita" method="post">
            <div class="form-group">
                    <label for="inputEmail">¿ Es Punto Cobranza ?</label>
                    <input type="text" class="form-control" value="" id="txtPuntoCobranza" placeholder="Punto Conbranza..."/>
             </div>
            <div class="form-group">
                <label for="inputEmail">¿ Es Billetera ?</label>
                <input type="text" class="form-control" value="" id="txtBilletera" placeholder="Billetera..."/>
            </div>
            <div class="form-group">
                <label for="inputEmail">Total Facturas Pagada</label>
                <input type="text" class="form-control" value="" id="TotalFacturas" placeholder="Total Facturas..."/>
            </div>
        </form>
    </div>                                                                   
    <!-- Modal Footer -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>                                                                    
                                                                        
</div>