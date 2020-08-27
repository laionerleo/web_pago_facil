
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-body text-center m-t-10-minus">
                            <div class="card-body">
                            <div class="row">
                            <div class="col-md-8">
                                <div class="row mb-2">
                                    <div class="col-12 text-muted">Verificacion de Pago</div>
                                    
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 text-muted">Empresa:</div>
                                    <div class="col-6"> <?= @$nombreempresa;  ?> </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 text-muted">Codigo Cliente:</div>
                                    <div class="col-6"><?= @$codigocliente;  ?></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 text-muted">Cliente:</div>
                                    <div class="col-6"><?= @$nombrecliente;  ?></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6 text-muted">Nro de factura:</div>
                                    <div class="col-6"><?= @$numerofacturas;  ?></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                               
                                <div class="row mb-2">
                                            
                                            <div class="col-12" style="display: flex;flex-flow: column wrap;  justify-content: center;  align-items: center; "  >  
                                                    <img src="<?=  @$urliconoempresapagada  ?>" class="rounded-circle" style="width:35%; height:60%" alt="...">
                                            </div>
                                        </div>
                            </div>
                            </div>


                                        <?php   if(count(@$facturaspagadas)>0){    ?>
                                        <div class="form-row">
                                        <div class="col-md-12 mb-12 table-responsive">
                                            <table id="example1" class="table table-striped table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th>Periodo</th>
                                                                    <th>Importe  </th>
                                                                    <th>Fecha de Pago</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>                                                                
                                                                <?php  for ($i=0; $i < count($facturaspagadas) ; $i++) { ?>
                                                                    <tr id="fila-<?= $i ?>"  > 
                                                                    <td   > 
                                                                    <label for=""><?= @$facturaspagadas[$i]->periodo ?></label>
                                                                    </td>
                                                                    <td>  <?= @$facturaspagadas[$i]->importe ?></td>
                                                                    <td>  <?= @$facturaspagadas[$i]->fechaPago ?></td>
                                                                 </tr>
                                                        
                                                                <?php }  ?>
                                                                
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                <th>Periodo</th>
                                                                    <th>Importe  </th>
                                                                    <th>Fecha de Pago</th>
                                                                    

                                                                
                                                                </tr>
                                                                </tfoot>
                                                            </table>

                                                            </div>
                                                            </div>





                                                            <input  type="hidden" id="btnmodal" class="btn btn-primary" data-toggle="modal"  value="nada" data-target="#modalopciones">


                                        <script>
                                                                                $(document).ready( function () {
                                                                                    $('#example1').DataTable();
                                                                                } );
                                                                                </script>

                                            <?php  }else{echo "No hay datos";}    ?>

                                     
                            </div>
                           
                        </div>
                    </div>
                </div>
                
             
                <input type="hidden" id="url" name="url" value="<?= $url ?>">
                
            </div>
