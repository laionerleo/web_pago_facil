

 <style>
    @media only screen and (max-width: 500px) {
    .tablafacturas{
      font-size: x-small;
    }


   }
   @media only screen and (min-width: 1440px) {

      .tablafacturas{
         font-size: larger; 
      }
   } 
   
 </style>
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
         console.log(montototalaux.toFixed(2)); 
         console.log(montocomisionaux.toFixed(2)); 
         console.log(montototalgeneral.toFixed(2)); 
      });

      function cargarvalornuevo(valor)
      {  
         montototalaux=parseInt(valor);
         console.log(montototalaux);
      }

   </script>
   
   <div class="card" id="cardfacturaspendientes">
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-striped table-bordered tablafacturas" style="box-shadow: 0 0 20px #4fc9f0;">
               <thead>
                  <tr>
                  <th> Seleccionar </th>
                    <!--    <th> N </th> -->
                     <th> Concepto </th>
                   <!--  <th> <?= $etiquetas->EtiquetaItemPago ?>   </th>  -->
                     <th> Monto </th>
                     <th> Comision </th>
                     <th> Monto Total  </th>
                    
                
                  </tr>
               </thead>
               <tbody >
                  <?php if(isset($facturas) && count($facturas)>0    ){
                     for ($i=0; $i < count($facturas) ; $i++) { ?>
                  <tr>
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
                    <!--    <td> <?= $i+1 ?> </td>-->
                     <td style="    padding-right: 0.1rem;"> <?= $facturas[$i]->periodo ?> </td>
                  <!--    <td>  <?= (isset($facturas[$i]->nroitem))?  $facturas[$i]->nroitem : $facturas[$i]->factura ?>  </td>  -->
                     <td style="text-align: end;"> 
                        <?php if($facturas[$i]->montoTotal == 0 ){ ?> 
                           <input onkeyup="cargarvalornuevo( $('#montototal').val() )"  type="number" id="montototal" name="montototal" value="<?= @$facturas[0]->montoTotal  ?>">
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
                    
                  </tr>
                  <?php  }?>
                  <tr>
                     <td style="    border-right: none;">  </td>
                     <td style="    border-left: none;" >  </td>
                     <td style="text-align: end;"> <label id="lblMontototal" for=""></label> </td>
                     <td style="text-align: end;"> <label id="lblMontocomision" for=""></label> </td>
                     <td style="text-align: end;" ><label id="lblMontototalfinal" for=""></label></td>
                
                  </tr>
                  <input type="hidden" id="montototal"name="montotoal" value="">
                  <input type="hidden" id="facturaid"  name="facturaid" value="">
                  <?php }else { ?>
                     <tr>
                        <td style="background-color: inherit; color: #ff0202;" COLSPAN="5">
                           <h4>No tiene Facturas  pendientes</h4>
                        </td>
                     </tr>
                           
                     <?php } ?>


               </tbody>
            </table>
         </div>
         <?php if(count($facturas) > 0){   ?>
            
            <div class="row">
               <div class="col-6 col-md-6" style="text-align: center;" >
                  <button class="btn btn-outline-warning"   onclick="  $('#li1').show(); $('#inicio-tab').click();"> Atras   </button>
               </div>

               <div class="col-6 col-md-6" style="text-align: center;">
                  <button class="btn btn-outline-primary" onclick="vistafacturacion()" > Siguiente   </button>
               </div>
            </div>

            <?php }   ?>
      </div>
   </div>


   <script>
    $('html, body').animate({scrollTop: $("#cardfacturaspendientes").offset().top }, 2000);
</script>