
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height: 100%;">
                        <div class="card-body text-center m-t-10-minus">
                            <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row mb-2">
                                        <div class="col-12 text-muted">Lista de  Comisiones</div>
                                    </div>
                                </div>
                            </div>
                                <?php   if(count(@$comisiones)>0){    ?>
                                <div class="form-row">
                                <div class="col-md-12 mb-12 table-responsive">
                                    <table id="example1" class="table table-striped table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Liquidacion</th>
                                                            <th>Fecha</th>
                                                            <th>Monto  </th>
                                                            <th>Comision</th>
                                                            <th>Retencion</th>
                                                            <th>Cantidad Facturas</th>
                                                            <!-- <th>Opcion</th>  -->
                                                        </tr>
                                                        </thead>
                                                        <tbody>                                                                
                                                        <?php  for ($i=0; $i < count($comisiones) ; $i++) { ?>
                                                            
                                                            <tr> 
                                                            <td>  <?= @$comisiones[$i]->LiquidacionComision ?></td>
                                                            <td > 
                                                            <label for=""><?= @$comisiones[$i]->FechaACalcular ?></label>
                                                            </td>
                                                            <td>  <?= @$comisiones[$i]->MontoLiquidacion ?></td>
                                                            <td>  <?= @$comisiones[$i]->MontoComision ?></td>
                                                            <td>  <?= @$comisiones[$i]->MontoRetencion ?></td>
                                                            <td>  <?= @$comisiones[$i]->TotalMovimiento ?></td>
                                                            <!-- <td> <button class="btn btn-primary">Ver Detallles</button> </td> -->
                                                            
                                                            </tr>
                                                
                                                        <?php }  ?>
                                                        
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th>Liquidacion</th>
                                                            <th>Fecha</th>
                                                            <th>Monto  </th>
                                                            <th>Comision</th>
                                                            <th>Retencion</th>
                                                            <th>Cantidad Facturas</th>
                                                        <!--    <th> Opcion</th> -->
                                                            

                                                        
                                                        </tr>
                                                        </tfoot>
                                                    </table>

                                                    </div>
                                                    </div>





                                                    <input  type="hidden" id="btnmodal" class="btn btn-primary" data-toggle="modal"  value="nada" data-target="#modalopciones">


                                                    <script src="<?=  base_url() ?>/application/assets/vendors/dataTable/datatables.min.js"></script>

                                                        <script>
                                                        
                                                        </script>

                                    <?php  }else{echo "No hay datos";}    ?>

                                
                    </div>
                    
                        </div>
                    </div>
                </div>
                
             
                <input type="hidden" id="url" name="url" value="<?= $url ?>">
                
                <input type="hidden" id="btnmodalfacturas" name="btnmodalfacturas" data-toggle="modal"  value="nada" data-target="#modalopcionesfacturas">
                <input type="hidden" id="btnmodalcorreo" name="btnmodalcorreo" data-toggle="modal"  value="nada" data-target="#modalenviocorreo">
                <input type="hidden" id="btnmodalvisualizar" name="btnmodalvisualizar" data-toggle="modal"  value="nada" data-target="#modalvisualizar">


                <input type="hidden" name="codigocliente" id="codigocliente">
                <input type="hidden" name="codigotransaccion" id="codigotransaccion"  value="">
                <input type="hidden" name="periodo" id="periodo"  value="">
                <input type="hidden" name="nrofactura" id="nrofactura"  value="">


                
                
          
                
            </div>


 




     

     



        