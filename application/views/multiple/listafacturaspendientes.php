   <div class="card">
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-striped table-bordered">
               <thead>
                  <tr>
                     <th> N </th>
                     <th> Concepto </th>
                     <th> NroItem  </th>
                     <th> Monto </th>
                     <th> Comision </th>
                     <th> Monto Total  </th>
                     <th> Opcion </th>
                  </tr>
               </thead>
               <tbody>
                  <?php if(isset($facturas)){
                     for ($i=0; $i < count($facturas) ; $i++) { ?>
                  <tr>
                     <td> <?= $i+1 ?> </td>
                     <td> <?= $facturas[$i]->periodo ?> </td>
                     <td> <?= $facturas[$i]->nroitem ?> </td>
                     <td style="text-align: end;"> 
                        <?php if($facturas[$i]->montoTotal == 0 ){ ?> 
                        <input type="number" id="montototal" name="montototal" value="<?= @$facturas[0]->montoTotal  ?>">
                        <?php }else{
                           echo   number_format((float)$facturas[$i]->montoTotal, 2, '.', '') ;
                           ?>  
                        <input  type="hidden" id="montototal<?= $i ?>" name="montototal" value="<?= @$facturas[0]->montoTotal  ?>"> 
                        <?php  } ?> 
                     </td>
                     <td>
                        <?=   number_format((float)$facturas[$i]->MontoComision, 2, '.', '') ; ?> 
                     </td>
                     <td>
                        <?=   number_format((float)$facturas[$i]->MontoComision, 2, '.', '') +number_format((float)$facturas[$i]->montoTotal, 2, '.', '')  ; ?> 
                     </td>
                     <td>
                        <center>
                           <?php if($i == 0 ){ ?> 
                           <input  type="checkbox"  name="Items"  id="Items<?= $i ?>"  >
                           <?php }else{ ?>
                           <input  type="checkbox" disabled name="Items<?= $i ?>"  id="Items<?= $i ?>"   value="<?= $facturas[$i]->nroitem ?>" >
                           <?php  } ?>    
                        </center>
                     </td>
                  </tr>
                  <?php  }?>
                  <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td> <label id="lblMontototalfinal" for=""></label></td>
                     <td></td>
                     <td></td>
                  </tr>
                  <input type="hidden" id="montototal"name="montotoal" value="">
                  <input type="hidden" id="facturaid"  name="facturaid" value="">
                  <?php } ?>
               </tbody>
            </table>
         </div>
         <center>  
            <button class="btn btn-outline-primary" onclick="vistafacturacion()" > Siguiente   </button>
         </center>
      </div>
   </div>