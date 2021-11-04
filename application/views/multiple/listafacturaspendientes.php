 
 
 
    <script>
      var cantidadfacturas="<?= count($facturas)  ?>"; 
      var montototalaux=0;
      var montocomisionaux=0;
      var montototalgeneral=0;

      function elegiritem(checkitem){
        $("#Items"+(checkitem)).prop("disabled", false);
      } 
      $(".Items").on('click', function() {
         montototalaux=0;
         montocomisionaux=0;
         montototalgeneral=0;    
         var checkelegido=$(this).prop("id");
         checkelegido = checkelegido.split("-"); 
         checkelegido= checkelegido[1]; 

         for (let index = 0; index < cantidadfacturas; index++) {
            if(checkelegido >=index )
            {
               $("#items-"+(index)).prop("checked", true);
               montototalaux=montototalaux+parseFloat($("#items-"+(index)).data("monto"));
               montocomisionaux=montocomisionaux + parseFloat( $("#items-"+(index)).data("montocomision")) ; 
               montototalgeneral= montototalgeneral +  parseFloat($("#items-"+(index)).data("monto"))  +  parseFloat( $("#items-"+(index)).data("montocomision")) ; 
            }else{
               $("#items-"+(index)).prop("checked", false);
            }
         }
         $("#lblMontototal").text(montototalaux.toFixed(2));
         $("#lblMontocomision").text(montocomisionaux.toFixed(2));
         $("#lblMontototalfinal").text(montototalgeneral.toFixed(2) );  
      });
   </script>
   
   <div class="card">
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-striped table-bordered">
               <thead>
                  <tr>
                     <th> N </th>
                     <th> Concepto </th>
                     <th> <?= $etiquetas->EtiquetaItemPago ?>   </th>
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
                     <td>  <?= (isset($facturas[$i]->nroitem))?  $facturas[$i]->nroitem : $facturas[$i]->factura ?>  </td>
                     <td style="text-align: end;"> 
                        <?php if($facturas[$i]->montoTotal == 0 ){ ?> 
                           <input type="number" id="montototal" name="montototal" value="<?= @$facturas[0]->montoTotal  ?>">
                        <?php }else{
                           echo   number_format((float)$facturas[$i]->montoTotal, 2, '.', '') ;
                        ?>  
                        <input  type="hidden" id="montototal<?= $i ?>" name="montototal" value="<?= @$facturas[0]->montoTotal  ?>"> 
                        <?php  } ?> 
                     </td>
                     <td style="text-align: end;">
                        <?=   number_format((float)$facturas[$i]->MontoComision, 2, '.', '') ; ?> 
                     </td>
                     <td  style="text-align: end;">
                        <?= number_format((float)$facturas[$i]->MontoComision +(float)$facturas[$i]->montoTotal   , 2, '.', '') ; ?> 
                     </td>
                     <td>
                        <center>
                        <?php if(   $i == 0 ){ ?> 
                           
                           <input data-montocomision="<?= @number_format((float)$facturas[$i]->MontoComision, 2, '.', '')  ?>"  data-monto="<?= @number_format((float)$facturas[$i]->montoTotal, 2, '.', '')  ?>" type="checkbox"  class="Items" name="Items[]"  id="items-<?= $i ?>"   value="<?= (isset($facturas[$i]->nroitem))?  $facturas[$i]->nroitem : $facturas[$i]->factura ?>"  >
                           <script>
                                  $("#items-0").click();
                           </script>
                        <?php }else{
                          
                              if($lnMultipago==1){ ?> 
                                    <input data-montocomision="<?= @number_format((float)$facturas[$i]->MontoComision, 2, '.', '')  ?>"  data-monto="<?= @number_format((float)$facturas[$i]->montoTotal, 2, '.', '')  ?>" type="checkbox"  class="Items" name="Items[]"  id="items-<?= $i ?>"   value="<?= (isset($facturas[$i]->nroitem))?  $facturas[$i]->nroitem : $facturas[$i]->factura ?>" >
                              <?php }else{ ?> 
                                    <input data-montocomision="<?= @number_format((float)$facturas[$i]->MontoComision, 2, '.', '')  ?>"  data-monto="<?= @number_format((float)$facturas[$i]->montoTotal, 2, '.', '')  ?>" type="checkbox"  class="Items" name="Items[]"  id="items-<?= $i ?>"   value="<?= (isset($facturas[$i]->nroitem))?  $facturas[$i]->nroitem : $facturas[$i]->factura ?>" style="display:none" >
                        <?php } }  ?> 

                        </center>
                     </td>
                  </tr>
                  <?php  }?>
                  <tr>
                     <td></td>
                     <td></td>
                     <td>  </td>
                     <td> <label id="lblMontototal" for=""></label> </td>
                     <td> <label id="lblMontocomision" for=""></label> </td>
                     <td><label id="lblMontototalfinal" for=""></label></td>
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

