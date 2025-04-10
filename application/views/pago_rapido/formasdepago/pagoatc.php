<script type="text/javascript" src="https://h.online-metrix.net/fp/tags.js?org_id=<?= trim(@$result->OrgId)  ?? ''?>&session_id=<?=trim($result->MerchantId) ?? ''  ?><?= trim($result->sessionID)  ?>"></script>
  <!-- <script src="https://songbird.cardinalcommerce.com/edge/v1/songbird.js"></script>  -->
<link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/form-wizard/jquery.steps.css" type="text/css">
<link rel="stylesheet" href="<?=  base_url() ?>/application/assets/vendors/select2/css/select2.min.css" type="text/css">
<style>
            .tips {
          position: fixed;
          bottom: 0;
          width: 100%;
          height: 30px;
          background: #f1f1f1;
          line-height: 30px;
          font-size: 14px;
          padding: 2px 15px;
          }

          .container {

          display: flex;
          flex-direction: row;
          align-items: center;
          margin: auto;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;

          }
          .container .col1 {
          perspective: 1000;
          transform-style: preserve-3d;
          }
          .container .col1 .card2 {
          position: relative;
          width: 420px;
          height: 250px;
          margin-bottom: 85px;
          margin-right: 10px;
          border-radius: 17px;
          box-shadow: 0 5px 20px -5px rgba(0, 0, 0, 0.1);
          transition: all 1s;
          transform-style: preserve-3d;

          }
          .container .col1 .card2 .front {
          position: absolute;
          background: var(--card-color);
          border-radius: 17px;
          padding: 50px;
          width: 100%;
          height: 100%;
          transform: translateZ(1px);
          -webkit-transform: translateZ(1px);
          transition: background 0.3s;
          z-index: 50;
          background-image: repeating-linear-gradient(45deg, rgba(255, 255, 255, 0) 1px, rgba(255, 255, 255, 0.03) 2px, rgba(255, 255, 255, 0.04) 3px, rgba(255, 255, 255, 0.05) 4px), -webkit-linear-gradient(-245deg, rgba(255, 255, 255, 0) 40%, rgba(255, 255, 255, 0.2) 70%, rgba(255, 255, 255, 0) 90%);
          -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
          }
          .container .col1 .card2 .front .type {
          position: absolute;
          width: 75px;
          height: 45px;
          top: 20px;
          right: 20px;
          }
          .container .col1 .card2 .front .type img {
          width: 100%;
          float: right;
          }
          .container .col1 .card2 .front .card_number {
          position: absolute;
          font-size: 26px;
          font-weight: 500;
          letter-spacing: -1px;
          top: 110px;
          left: 40px;
          color: var(--text-color);
          word-spacing: 3px;
          transition: color 0.5s;
          }
          .container .col1 .card2 .front .date {
          position: absolute;
          bottom: 40px;
          right: 55px;
          width: 90px;
          height: 35px;
          color: var(--text-color);
          transition: color 0.5s;
          }
          .container .col1 .card2 .front .date .date_value {
          font-size: 12px;
          position: absolute;
          margin-left: -25px;
          margin-top: 12px;
          color: var(--text-color);
          font-weight: 500;
          transition: color 0.5s;
          }
          .container .col1 .card2 .front .date:after {
          content: "Mes / Año ";
          position: absolute;
          display: block;
          font-size: 7px;
          margin-left: 20px;
          }
          .container .col1 .card2 .front .date:before {
          content: "valido\hasta";
          position: absolute;
          display: block;
          font-size: 8px;
          white-space: pre;
          margin-top: 8px;
          left: -25px;
          top: 8px;
          }
          .container .col1 .card2 .front .fullname {
          position: absolute;
          font-size: 20px;
          bottom: 40px;
          color: var(--text-color);
          transition: color 0.5s;
          left:36px;

          }
          .container .col1 .card2 .back {
          position: absolute;
          width: 100%;
          border-radius: 17px;
          height: 100%;
          background: var(--card-color);
          transform: rotateY(180deg);
          }
          .container .col1 .card2 .back .magnetic {
          position: absolute;
          width: 100%;
          height: 50px;
          background: rgba(0, 0, 0, 0.7);
          margin-top: 25px;
          }
          .container .col1 .card2 .back .bar {
          position: absolute;
          width: 80%;
          height: 37px;
          background: rgba(255, 255, 255, 0.7);
          left: 10px;
          margin-top: 100px;
          }
          .container .col1 .card2 .back .seccode {
          font-size: 13px;
          color: var(--text-color);
          font-weight: 500;
          position: absolute;
          top: 100px;
          right: 40px;
          }
          .container .col1 .card2 .back .chip {
          bottom: 45px;
          left: 10px;
          }
          .container .col1 .card2 .back .disclaimer {
          position: absolute;
          width: 65%;
          left: 80px;
          color: #f1f1f1;
          font-size: 8px;
          bottom: 55px;
          }

          .container .col2 input:focus {
          outline-width: 0;
          background: rgba(31, 134, 252, 0.15);
          transition: background 0.5s;
          }
          .container .col2 label {
          padding-left: 8px;
          font-size: 15px;
          color: #444;
          }
          .container .col2 .ccv {
          width: 60%;
          }
          .container .col2 .buy {
          width: 260px;
          height: 50px;
          position: relative;
          display: block;
          margin: 20px auto;
          border-radius: 10px;
          border: none;
          background: #42C2DF;
          color: white;
          font-size: 20px;
          transition: background 0.4s;
          cursor: pointer;
          }
          .container .col2 .buy i {
          font-size: 20px;
          }
          .container .col2 .buy:hover {
          background: #3594A9;
          transition: background 0.4s;
          }

          .chip {
          position: absolute;
          width: 55px;
          height: 40px;
          background: #bbb;
          border-radius: 7px;
          left: 36px;
          }
          .chip:after {
          content: "";
          display: block;
          width: 35px;
          height: 25px;
          border-radius: 4px;
          position: absolute;
          top: 0;
          bottom: 0;
          margin: auto;
          background: #ddd;
          }



          @media
          only screen 
          and (max-width: 1440px) {

            .container {
               display: unset;
               flex-direction: row;
               align-items: center;
               margin: auto;
               top: 0;
               bottom: 0;
               left: 0;
               right: 0;
               padding: initial;

            }  
          .botones{
            text-align: center;
          }

          .container .col1 .card2 {
          position: relative;
          /* width: 420px; */
          width: 227px;
          height: 159px;
          margin-bottom: 85px;
          margin-right: 10px;
          border-radius: 17px;
          box-shadow: 0 5px 20px -5px rgba(0, 0, 0, 0.1);
          transition: all 1s;
          transform-style: preserve-3d;
          }

          .container .col1 .card2 .front .fullname {
          position: absolute;
          font-size: 9px;
          bottom: 40px;
          color: var(--text-color);
          transition: color 0.5s;
          left: 36px;
          }

          .container .col1 .card2 .front .card_number {
          position: absolute;
          font-size: 10px;
          font-weight: 500;
          letter-spacing: -1px;
          top: 70px;
          left: 40px;
          color: var(--text-color);
          word-spacing: 3px;
          transition: color 0.5s;
          }

          .chip {
          position: absolute;
          width: 42px;
          height: 33px;
          background: #bbb;
          border-radius: 7px;
          left: 23px;
          top: 27px;
          }

          .container .col1 .card2 .front .date {
          position: absolute;
          bottom: 18px;
          right: 2px;
          width: 82px;
          height: 35px;
          color: var(--text-color);
          transition: color 0.5s;
          }

          .container .col1 .card2 .front .date:before {
          content: "valido\hasta";
          position: absolute;
          display: block;
          font-size: 7px;
          white-space: pre;
          margin-top: 8px;
          left: -15px;
          top: 8px;
          }
          <style>
          .container .col1 .card2 .front .date:after {
          content: "Mes / Año ";
          position: absolute;
          display: block;
          font-size: 7px;
          margin-left: 20px;
          }
          .container .col1 .card2 .front .date .date_value {
          font-size: 8px;
          position: absolute;
          margin-left: -18px;
          margin-top: 15px;
          color: var(--text-color);
          font-weight: 500;
          transition: color 0.5s;
          }
          .container .col1 .card2 .back .magnetic {
          position: absolute;
          width: 100%;
          height: 25px;
          background: rgba(0, 0, 0, 0.7);
          margin-top: 24px;
          }
          .container .col1 .card2 .back .bar {
          position: absolute;
          width: 76%;
          height: 27px;
          background: rgba(255, 255, 255, 0.7);
          left: 0px;
          margin-top: 62px;
          }
          .container .col1 .card2 .back .seccode {
          font-size: 13px;
          color: var(--text-color);
          font-weight: 500;
          position: absolute;
          top: 68px;
          right: 2px;
          left: 164px;
          }
          .container .col1 .card2 .back .disclaimer {
          position: absolute;
          width: 65%;
          left: 44px;
          color: #f1f1f1;
          font-size: 5px;
          bottom: 29px;
          }


          .col1 {
          perspective: 1000;
          transform-style: preserve-3d;
          height: 183px;
          }

          }


          .wizard > .steps > ul > li
          {
          width: 100%;
          }

          @media screen and (min-width: 770px) {
          .botones{
              
              text-align: left;
          }

          .wizard > .steps > ul > li
          {
              width: 25%;
          }


        


          }
</style>
<noscript>
   <iframe style="width: 100px; height: 100px; border: 0; position: absolute; top: -5000px;" src="https://h.online-metrix.net/fp/tags.js?org_id=<?= trim(@$result->OrgId)  ?? ''?>&session_id=<?= trim($result->MerchantId) ?? ''?><?= trim($result->sessionID)  ?>"></iframe>
</noscript>
<div class="row">
   <div class="col-md-12" >
      <div class="card" style="margin-bottom: 1.2rem;">
         <!-- <img id="baner" src="<?= $urlimagenbanner   ?>" class="card-img-top" alt="..."> -->
         <div class="card-body text-center" style="    padding-top: revert;">
            <br>
            <div id="wizard2"  >
               <h3>Datos de Tarjeta</h3>
               <section  class="card card-body border mb-0">
                  <div class="container row">
                     <div class="col1 col-md-6" >
                        <center>
                           <div class="card2">
                              <div class="front">
                                 <div class="type">
                                    <img class="bankid">
                                 </div>
                                 <span class="chip"></span>
                                 <span class="card_number">●●●● ●●●● ●●●● ●●●● </span>
                                 <div class="date"><span class="date_value">MM / YYYY</span></div>
                                 <span class="fullname">Nombre Completo</span>
                              </div>
                              <div class="back">
                                 <div class="magnetic"></div>
                                 <div class="bar"></div>
                                 <span class="seccode">●●●</span>
                                 <span class="chip"></span><span class="disclaimer">This card is property of Random Bank of Random corporation. <br> If found please return to Random Bank of Random corporation - 21968 Paris, Verdi Street, 34 </span>
                              </div>
                           </div>
                        </center>
                     </div>
                     <div class="col2 col-md-6 " id="formulariotarjeta" >
                        <form id="form1" style="   width: inherit" class="row container ">
                           <div class="col-md-12" style="padding-bottom: 5px;"  >
                              <div class="col-md-12 col-12 titulos" >
                                 <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Numero de tarjeta *  : </b></label>
                              </div>
                              <div class="col-md-12 col-12">
                                 <div class="controls" style="    text-align: justify;">
                                    <input class="number form-control" data-input-mask="tarjeta"  id="creditCardNumber" onfocusout="focusoutcardnumber()" onfocus="onfocuscardnumber()" onkeyup="keyupcardnumber($(this).val())"   data-cardinal-field="AccountNumber" name="creditCardNumber" type="text" ng-model="ncard" maxlength="19" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" required >
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6" style="padding-bottom: 5px;"  >
                              <div class="col-md-12 col-12 titulos" >
                                 <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Nombre *  : </b></label>
                              </div>
                              <div class="col-md-12 col-12">
                                 <div class="controls" style="    text-align: justify;">
                                    <input class="form-control inputname " id="billingFirst" type="text" onfocus="onfocusnombre()" onkeyup="keyupnombre($(this).val())"  placeholder="" required >
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6" style="padding-bottom: 5px;"  >
                              <div class="col-md-12 col-12 titulos" >
                                 <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Apellido *  : </b></label>
                              </div>
                              <div class="col-md-12 col-12">
                                 <div class="controls" style="    text-align: justify;">
                                    <input class=" form-control inputname " id="billingLast" type="text" onfocus="onfocusapellido()" onkeyup="keyupapellido($(this).val())" placeholder="" required >
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-8 col-sm-6" style="padding-bottom: 5px;"  >
                       <div class="col-md-12 col-12 titulos" >
                           <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Fecha de Expiracion *  : </b></label>
                       </div>
                       <div class="col-md-12 col-12">
                           <div class="controls row" style="    text-align: justify; display:none">
                             <input class="form-control expire " id="expirationDate" type="text" value="">

                           </div>
                          <div class="control row ">
                          <div class="col-md-5 col-sm-6 col-5" >
                            <select class="custom-select custom-select-m tamanoselect" name="slcmes" id="slcmes" required onchange="cambiandomes($(this).val())"  >
                                 
                                 <option value="">Mes</option>
                                 <option value="01">ENE</option>
                                <option value="02">FEB</option>
                                <option value="03">MAR</option>
                                <option value="04">ABR</option>
                                <option value="05">MAY</option>
                                <option value="06">JUN</option>
                                <option value="07">JUL</option>
                                <option value="08">AGO</option>
                                <option value="09">SEP</option>
                                <option value="10">OCT</option>
                                <option value="11">NOV</option>
                                <option value="12">DIC</option>
                            </select>
                            
                          </div>
                          <div class="col-md-5 col-sm-6 col-5" >
                              <?php
                              $cont = date('Y');
                              $contfinal = $cont+10;
                              ?>
                              <select class="custom-select custom-select-m tamanoselect" name="slcaño" id="slcaño" required  onchange="cambiandoanio($(this).val())">
                              <option value="">Año</option>
                              <?php while ($cont <= $contfinal) { ?>
                                 <option value="<?= $cont ?>"><?php echo($cont); ?></option>
                              <?php $cont = ($cont+1); } ?>
                              </select>
                              <?php ?>
                             
                          </div>

                       </div>
                       
                       </div>
                     </div>
                           <div class="col-md-4" style="padding-bottom: 5px;"  >
                              <div class="col-md-12 col-12 titulos" >
                                 <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Codigo  * : </b></label>
                              </div>
                              <div class="col-md-12 col-12">
                                 <div class="controls" style="    text-align: justify;">
                                    <input class="  form-control ccv" style="width: 70;" onfocusout="focusoutcvv()" onfocus="onfocuscvv()" onkeyup="keyupcvv($(this).val())"   id="cvvCode" type="text" placeholder="CVV" maxlength="4" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" required>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </section>
               <h3>Informacion Personal</h3>
               <section class="card card-body border mb-0">
                  <form id="form2">
                     <div  class="row">
                        <div class="col-md-4" style="padding-bottom: 5px;"  >
                           <div class="col-md-12 col-12 titulos" >
                              <label for="billingNumber" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Numero de telefono * : </b></label>
                           </div>
                           <div class="col-md-12 col-12">
                              <div class="controls" style="    text-align: justify;">
                                 <input type="number" class="form-control" id="billingNumber" value="<?=   @$tnTelefono ?>" required/>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4" style="padding-bottom: 5px; display:none"  >
                           <div class="col-md-12 col-12 titulos" >
                              <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Monto  : </b></label>
                           </div>
                           <div class="col-md-12 col-12">
                              <div class="controls" style="    text-align: justify;">
                                 <input type="text" class="form-control" id="Amount" value="<?= trim($result->tcMonto) ?>"  />
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4" style="padding-bottom: 5px ; display:none"  >
                           <div class="col-md-12 col-12 titulos" >
                              <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b>Moneda  : </b></label>
                           </div>
                           <div class="col-md-12 col-12">
                              <div class="controls" style="    text-align: justify;">
                                 <input type="text" class="form-control" id="CurrencyCode" value="<?= $Sigla  ?>"  />
                              </div>
                           </div>
                        </div>
                        <div  class="col-md-4" style="padding-bottom: 5px;"  >
                           <div class="col-md-12 col-12 titulos">
                              <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Correo electronico * : </b></label>
                           </div>
                           <div class="col-md-12 col-12">
                              <div class="controls" style="    text-align: justify;">
                                 <input type="email" class="form-control" id="emailAddress1" value="<?=   @$tcCorreo ?>"  required>
                              </div>
                           </div>
                        </div>
                        <div  class="col-md-4" style="padding-bottom: 5px;"  >
                           <div class="col-md-12 col-12 titulos">
                              <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Pais* : </b></label>
                           </div>
                           <div class="col-md-12 col-12">
                              <div class="controls" style="    text-align: justify;">
                                 <select id="billingCountry" name="billingCountry"  class=" form-control" required>
                                    <?php for ($k=0; $k < count($paises) ; $k++) {
                                       ?>
                                    <option style="width: 227px;" onclick="cargarestadosatc(<?= $paises[$k]->Pais  ?>)" value="<?= $paises[$k]->Code2  ?>-<?= $paises[$k]->Pais  ?>"> <?= $paises[$k]->Nombre  ?>  </option>
                                    <?php     }?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div  class="col-md-4" style="padding-bottom: 5px;"  >
                           <div class="col-md-12 col-12 titulos">
                              <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Estado * : </b></label>
                           </div>
                           <div class="col-md-12 col-12">
                              <div class="controls" style="    text-align: justify;" id="idcajaestado">
                                 <select id="billingState" style="width: 227px;"   name="tnCiudad" class=" form-control" required>
                                 </select>
                              </div>
                              <div class="spinner-grow text-primary" id="spnestado" role="status" style="display:none">
                                          <span class="sr-only">Loading...</span>
                              </div>
                           </div>
                        </div>
                        <div  class="col-md-4" style="padding-bottom: 5px;"  >
                           <div class="col-md-12 col-12 titulos">
                              <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Ciudad  : </b></label>
                           </div>
                           <div class="col-md-12 col-12">
                              <div class="controls" style="    text-align: justify;" id="idcajaciudad">
                                 <select id="billingCity" style="width: 227px;"   name="tnCiudad" class=" form-control" >
                                 </select>
                              </div>
                              <div class="spinner-grow text-primary" id="spnciudad" role="status" style="display:none">
                                          <span class="sr-only">Loading...</span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4" style="padding-bottom: 5px;"  >
                           <div class="col-md-12 col-12 titulos" >
                              <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Direccion  *: </b></label>
                           </div>
                           <div class="col-md-12 col-12">
                              <div class="controls" style="    text-align: justify;">
                                 <input class="form-control" id=billingAddress1  type="text"  value="<?=   @$tcDireccion ?>" required >
                              </div>
                           </div>
                        </div>
                        <div  class="col-md-4" style="padding-bottom: 5px;display:none"  >
                           <div class="col-md-12 col-12 titulos">
                              <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Direccion 2 (Opcional)  : </b></label>
                           </div>
                           <div class="col-md-12 col-12">
                              <div class="controls" style="    text-align: justify;">
                                 <input class="form-control" ID="billingAddress2" type="text"  value="<?=   @$tcDireccion ?>" >
                              </div>
                           </div>
                        </div>
                        <div  class="col-md-4" style="padding-bottom: 5px; display:none"   >
                           <div class="col-md-12 col-12 titulos">
                              <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Codigo Postal *: </b></label>
                           </div>
                           <div class="col-md-12 col-12">
                              <div class="controls" style="    text-align: justify;">
                                 <input class="form-control" id="billingZip" type="text"  value="<?=   @$tnCodigopostal ?>" >
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </section>
               <div STYLE="display:none">
                  <h3>Datos Opcionales</h3>
                  <section class="card card-body border mb-0" >
                        <form id="form3">
                           <div class="row">
                              <div  class="col-md-4" style="padding-bottom: 5px;"  >
                                 <div class="col-md-12 col-12 titulos">
                                    <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Nro tel alternativo : </b></label>
                                 </div>
                                 <div class="col-md-12 col-12">
                                    <div class="controls" style="    text-align: justify;">
                                       <input class="form-control" id="mdd12"  type="text"  value="<?=   @$tnTelefono ?>" required >
                                    </div>
                                 </div>
                              </div>
                              <div  class="col-md-4" style="padding-bottom: 5px;"  >
                                 <div class="col-md-12 col-12 titulos">
                                    <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> NIT : </b></label>
                                 </div>
                                 <div class="col-md-12 col-12">
                                    <div class="controls" style="    text-align: justify;">
                                       <input class="form-control" id="mdd19"  type="text"  value="<?= @$tnCiNit ?>" required >
                                    </div>
                                 </div>
                              </div>
                              <div  class="col-md-4" style="padding-bottom: 5px;"  >
                                 <div class="col-md-12 col-12 titulos">
                                    <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Edad Comprador : </b></label>
                                 </div>
                                 <div class="col-md-12 col-12">
                                    <div class="controls" style="    text-align: justify;">
                                       <input class="form-control" id="mdd42"   type="text"  value="" required>
                                    </div>
                                 </div>
                              </div>
                              <div  class="col-md-4" style="padding-bottom: 5px;"  >
                                 <div class="col-md-12 col-12 titulos">
                                    <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> CI comprador : </b></label>
                                 </div>
                                 <div class="col-md-12 col-12">
                                    <div class="controls" style="    text-align: justify;">
                                       <input class="form-control" id="mdd11"   type="text"  value="<?= @$tnCiNit ?>" required>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4" style="padding-bottom: 5px;"  >
                                 <div class="col-md-12 col-12 titulos">
                                    <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b> Compra hecha por 3er? : </b></label>
                                 </div>
                                 <div class="col-md-12 col-12">
                                    <div class="controls" style="    text-align: justify;">
                                       <input class="form-control" id="mdd17"  type="text"   value="NO">
                                    </div>
                                 </div>
                              </div>
                              <div  class="col-md-4" style="padding-bottom: 5px;"  >
                                 <div class="col-md-12 col-12 titulos">
                                    <label for="inpci" style="margin-bottom: 0.2rem; margin-top: 0.5rem;"> <b>Nombre Comprador 3ero </b></label>
                                 </div>
                                 <div class="col-md-12 col-12">
                                    <div class="controls" style="    text-align: justify;">
                                       <input class="form-control" id="mdd18" type="text"  value="" >
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                  </section>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-8">
      <div class="card">
         <div class="card-body">
            <div class="row">
            <div class="col-md-6 col-6 botones"  >
            <center>
               <button id="btncarga"  class="btn btn-primary" type="button" style="display:none" disabled>
               <span class="spinner-border spinner-border-sm mr-2" role="status"
                  aria-hidden="true"></span>
               Procesando...
               </button> 
               <button id="btnprepararpago" class="btn btn-primary " disabled onclick="starCCALast()" >Pagar  </button> 
                                       
            </center>
             
                                       
            </div>
            <div class="col-md-6 col-6 botones" >
               <center>
                  <button id="btnpagarotrafactura"  class="btn btn-outline-primary" onclick="facturaspendientes(<?= $clienteempresa ?>)">Pagar otra factura</button>
               </center>
                  
            </div>
           
         
            </div>
         </div>
      </div>
   </div>
</div>
<input type="hidden" id="JWTContainer" value="<?=   trim($result->jwt) ?>" />
<input type="hidden" id="OrderNumber" value="<?=   trim($result->id) ?>" />
<input type="hidden" id="Amount" value="<?=   trim($tcMonto) ?>" />
<input type="hidden" id="ReferenceId" value="<?=   trim($result->Referenceid) ?>" />
<input type="hidden" id="sessionID" value="<?=   trim($result->sessionID) ?>" />
<input type="hidden" id="tnCliente" value="<?=   trim($tnCliente) ?>" />
<input type="hidden" id="tnEmpresa" value="<?=   trim($tnEmpresa) ?>" />
<input type="hidden" id="tcCodigoClienteEmpresa" value="<?=   trim($tcCodigoClienteEmpresa) ?>" />
<input type="hidden" id="tnMetodoPago" value="<?= trim($tnMetodoPago)  ?>" />
<input type="hidden" id="tnFactura" value="<?=   trim($tnFactura) ?>" />
<input type="hidden" id="tcPeriodo" value="<?=   trim($tcPeriodo) ?>" />
<input type="hidden" id="tcApp" value="2" />
<input type="hidden" id="tcMonto" value="<?=   trim($tcMonto) ?>" />
<input type="hidden" id="tnMoneda" value="2" />
<input type="hidden" id="tcComision" value="<?=   trim($tcComision) ?>" />
<input type="hidden" id="tnCiNit" value="<?=   trim($tnCiNit) ?>" />
<input type="hidden" id="sessionID" value="<?=   trim($result->sessionID) ?>" />
<input type="hidden" id="urlvalidation" value="<?=   base_url(); ?>" />
<input type="hidden" id="tnPedidoCheckout" value="<?= $tnpedidocheckout ?>" />
<input type="hidden" id="swguardartarjeta" value="0" />
<button style="display:none" type="button" class="btn btn-primary sweet-multiple"  id="btnmodalconsultaregistrorecurente"> Pago Recurrente</button>
<script src="<?=  base_url() ?>/application/assets/vendors/select2/js/select2.min.js"></script>
<!--  <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js"></script>
<script src="<?=  base_url() ?>/application/assets/assets/js/examples/form-wizard.js"></script>  
<script src="<?=  base_url() ?>/application/assets/vendors/form-wizard/jquery.steps.min.js"></script>

<script src="<?=  base_url() ?>/application/assets/vendors/input-mask/jquery.mask.js"></script>
  
<script>

      console.log("aqui ingfresando ");

      Cardinal.configure({
        logging: {
          level: 'on'
        }, 
      });

      // Step 4.  Listen for Events
    Cardinal.on('payments.setupComplete', function(data){
      console.log('FROM payments.setupComplete');
      //  console.log('setupcomplete',data);
      sessionId = data.sessionId
      console.log("SessionID:",sessionId);
    });

      Cardinal.on("payments.validated", function (data, jwt) {
        console.log('from payments.validated');
        console.log("dATA:",data,"ACTION_CODE:",data.ActionCode);
        /// si entra al if  ingreso por atc atc 
            
        <?php   if($tnMetodoPago==9)  {   ?>
        if(jwt){
          console.log("   jwt atc :",jwt);
          validate_jwt(jwt);
        }
        <?php  }   
        
        if($tnMetodoPago==10){   ?>

        //ingreso aqui pr linkser 
        switch(data.ActionCode){
          case "SUCCESS":
            console.log('jwt linkser');
            console.log(jwt);
            validate_jwt(jwt);
          break;
          case "NOACTION":
            console.log('validacion no action');
          // Handle no actionable outcome
            //$("#btncarga").hide();
            //$("#btnprepararpago").show();
          ///  swal("Mensaje", "Hubo un error al cargar los datos favor volver a ingresar o recargar la página" , "error");
          if(jwt){
                console.log("   jwt linkser :",jwt);
                validate_jwt(jwt);
              }else{
                $("#btncarga").hide();
              $("#btnprepararpago").show();
              }
          break;
          case "FAILURE":
            console.log('validacion failure');
              
              if(jwt){
                console.log("   jwt linkser :",jwt);
                validate_jwt(jwt);
              }else{
                //swal("Mensaje", "Hubo un error al cargar los datos favor volver a ingresar o recargar la página", "error");
                $("#btncarga").hide();
                $("#btnprepararpago").show();
              }
              //swal("Mensaje", "Hubo un error al cargar los datos favor volver a ingresar o recargar la página", "error");
          // Handle failed transaction attempt
          break;
          case "ERROR":
            if(jwt){
                console.log("   jwt linkser :",jwt);
                validate_jwt(jwt);
              }else{
                //swal("Mensaje", "Hubo un error al cargar los datos favor volver a ingresar o recargar la página", "error");
                $("#btncarga").hide();
                $("#btnprepararpago").show();
              }
            //swal("Mensaje", "Hubo un error al cargar los datos favor volver a ingresar o recargar la página" , "error");
              //console.log('validacion error');
          // Handle service level error
          break;
        }

        <?php   }  ?>

        
      });


Cardinal.setup("init", {
  jwt: document.getElementById("JWTContainer").value
});




   $(document).ready(function() {
      $('[data-input-mask="tarjeta"]').mask('0000-0000-0000-0000');
      $('#btn-step-Fin').hide();
    
     $('#btn-step-Siguiente').addClass("btn-info");
     $('#btn-step-Siguiente').addClass("btn-square");
    console.log("finalizando ");
   
   var html = document.getElementsByTagName('html')[0];
   html.setAttribute("style", "--card-color: #cecece");
  
   $('#billingState').select2({
     placeholder: {
     text: 'Seleccionar Ciudad '
   }
   });
   
   
   $('#billingCity').select2({
     placeholder: {
     text: 'Seleccionar Ciudad '
   }
   });
 
   
   $( "#billingCountry" ).change(function() {
      var data =$(this).val();
        console.log(data);   
      var str = data;
      var res =  str.split("-");
        console.log(res);
      cargarestadosatc(res[1]);
      cargarciudadesatc(res[1]);
   })  ;
   <?php if(isset( $tcPais)){  ?>
    $("#billingCountry").val("<?= $tcPais ?>");
      var str ="<?= $tcPais ?>";
      var res =  str.split("-");
      console.log(res);
      cargarestadosatc(res[1]);
      cargarciudadesatc(res[1]);
   
   <?php }  ?>
   
   
   $('.sweet-multiple').on('click', function () {
   swal({
      title: " ¿ Pago Recurrente ?",
      text: "¿  Desea Registrar sus datos de tarjeta para pagos recurrentes !",
      icon: "warning",
      buttons: true,
      dangerMode: true,
   })
      .then((willDelete) => {
          if (willDelete) {
              swal("Listo ! ", {
                  icon: "success",
              });
              $('#tnPagoRecurrente').val(1);
              
          } else {
              swal("ok listo ", {
                  icon: "error",
              });
              $('#tnPagoRecurrente').val(0);
              
          }
      });
   }); 
   
   cargarestadosatc(26);
    cargarciudadesatc(26);
   
   });
   
   
   
   function cargarestadosatc(pais)
   {
      console.log('pais='+pais);
      var urlajax=$("#url").val()+"cargarestados";   
      var datos= {Pais:pais  };
      $.ajax({                    
      url: urlajax,
      data: {datos},
      type : 'POST',
      dataType: "json",
      beforeSend:function( ) {   
            //$("#waitLoadinglogin").fadeIn(1000);
            $('#spnestado').show();
            $('#idcajaestado').hide();
      },                    
      success:function(response) {
      
            $('#billingState').empty();
         
         for (let index = 0; index < response.length; index++) {
            var htmloption=`<option value="`+response[index]['Codigo'] +`"> `+response[index]['Nombre']  +`   </option>`;
            $('#billingState').append(htmloption);
         }
      
      },
      error: function (data) {
            console.log(data);
         
         
      },               
      complete:function( ) {
            $('#spnestado').hide();
            $('#idcajaestado').show();
         
      },
      }
      ); 
   
   }
   
   
   function cargarciudadesatc(pais)
   {
      var urlajax=$("#url").val()+"cargarciudades";   
      var datos= {Pais:pais  };
         $.ajax({                    
            url: urlajax,
            data: {datos},
            type : 'POST',
            dataType: "json",
            beforeSend:function( ) {   
                     $('#spnciudad').show();
                  $('#idcajaciudad').hide();
            },                    
            success:function(response) {
            
                  $('#billingCity').empty();
               
               for (let index = 0; index < response.length; index++) {
                  var htmloption=`<option value="`+response[index]['Nombre'] +`"> `+response[index]['Nombre']  +`   </option>`;
                  $('#billingCity').append(htmloption);
               }
            
            },
            error: function (data) {
                  console.log(data);
               
               
            },               
            complete:function( ) {
               $("#tnCiudad").select2().val("<?= $tnCiudad ?>").trigger("change");
               $('#spnciudad').hide();
                  $('#idcajaciudad').show();
            },
            }
         ); 
   
   }
   

   var mesexpiracion=$( "#slcmes" ).val();
var anioexpiracion=$( "#slcaño" ).val();
var fechadeexpiracion= mesexpiracion+"/"+anioexpiracion;
$(".date_value").html(fechadeexpiracion);

/*
 $( "#slcmes" ).change(function() {
    alert("cambio el mes ");
  
  


});

$( "#slcaño" ).change(function() {

});
*/
      function cambiandoanio(nuevoanio)
      {
      anioexpiracion= nuevoanio;
      fechadeexpiracion=mesexpiracion+"/"+anioexpiracion;
      $("#expirationDate").val(fechadeexpiracion);
      $(".date_value").html(fechadeexpiracion);
      console.log(fechadeexpiracion);      
      $(".date_value").css("color", "white");
      }

      function cambiandomes(nuevomes)
      {
         mesexpiracion=nuevomes;
         fechadeexpiracion= mesexpiracion+"/"+anioexpiracion;
         $("#expirationDate").val(fechadeexpiracion);
         $(".date_value").html(fechadeexpiracion);  
         console.log("fecha "+ $("#expirationDate").val());
         $(".date_value").css("color", "white");
         console.log(fechadeexpiracion);
  
      }
   
   
  
   // 4: VISA, 51 -> 55: MasterCard, 36-38-39: DinersClub, 34-37: American Express, 65: Discover, 5019: dankort
   console.log("render");
   
    var cards = [{
      nome: "mastercard",
      colore: "#0061A8",
      src: "https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.png" },
    {
      nome: "visa",
      colore: "#E2CB38",
      src: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2000px-Visa_Inc._logo.svg.png" },
    {
      nome: "dinersclub",
      colore: "#888",
      src: "http://www.worldsultimatetravels.com/wp-content/uploads/2016/07/Diners-Club-Logo-1920x512.png" },
    {
      nome: "americanExpress",
      colore: "#108168",
      src: "https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/American_Express_logo.svg/600px-American_Express_logo.svg.png" },
    {
      nome: "discover",
      colore: "#86B8CF",
      src: "https://lendedu.com/wp-content/uploads/2016/03/discover-it-for-students-credit-card.jpg" },
    {
      nome: "dankort",
      colore: "#0061A8",
      src: "https://upload.wikimedia.org/wikipedia/commons/5/51/Dankort_logo.png" }];
   
   
    var month = 0;
    var html = document.getElementsByTagName('html')[0];
    var number = "";
   
    var selected_card = -1;
   
    $(document).click(function (e) {
          if (!$(e.target).is(".ccv") || !$(e.target).closest(".ccv").length) {
            $(".card2").css("transform", "rotatey(0deg)");
            $(".seccode").css("color", "var(--text-color)");
          }
          if (!$(e.target).is(".expire") || !$(e.target).closest(".expire").length) {
            $(".date_value").css("color", "var(--text-color)");
          }
          if (!$(e.target).is(".number") || !$(e.target).closest(".number").length) {
            $(".card_number").css("color", "var(--text-color)");
          }
          if (!$(e.target).is(".inputname") || !$(e.target).closest(".inputname").length) {
            $(".fullname").css("color", "var(--text-color)");
          }
    });

    

          // aqui eventos de credicarnumber------------------------------------
      function keyupcardnumber(valortarjeta)
         {
            $(".card_number").text(valortarjeta);
              number =valortarjeta;
   
              if (parseInt(number.substring(0, 2)) > 50 && parseInt(number.substring(0, 2)) < 56) {
                selected_card = 0;
              } else if (parseInt(number.substring(0, 1)) == 4) {
                selected_card = 1;
              } else if (parseInt(number.substring(0, 2)) == 36 || parseInt(number.substring(0, 2)) == 38 || parseInt(number.substring(0, 2)) == 39) {
                selected_card = 2;
              } else if (parseInt(number.substring(0, 2)) == 34 || parseInt(number.substring(0, 2)) == 37) {
                selected_card = 3;
              } else if (parseInt(number.substring(0, 2)) == 65) {
                selected_card = 4;
              } else if (parseInt(number.substring(0, 4)) == 5019) {
                selected_card = 5;
              } else {
                selected_card = -1;
              }
   
              if (selected_card != -1) {
                html.setAttribute("style", "--card-color: " + cards[selected_card].colore);
                $(".bankid").attr("src", cards[selected_card].src).show();
              } else {
                html.setAttribute("style", "--card-color: #cecece");
                $(".bankid").attr("src", "").hide();
              }
   
              if ($(".card_number").text().length === 0) {
                $(".card_number").html("&#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF;");
              }
      
         }

      function onfocuscardnumber()
      {
         $(".card_number").css("color", "white");
      }
      
      function focusoutcardnumber()
      {
      
      }
      // aqui eventos de cvv------------------------------------
   
   
        //Card number input
        /*
        $(".number").keyup(function (event) {
              $(".card_number").text($(this).val());
              number = $(this).val();
   
              if (parseInt(number.substring(0, 2)) > 50 && parseInt(number.substring(0, 2)) < 56) {
                selected_card = 0;
              } else if (parseInt(number.substring(0, 1)) == 4) {
                selected_card = 1;
              } else if (parseInt(number.substring(0, 2)) == 36 || parseInt(number.substring(0, 2)) == 38 || parseInt(number.substring(0, 2)) == 39) {
                selected_card = 2;
              } else if (parseInt(number.substring(0, 2)) == 34 || parseInt(number.substring(0, 2)) == 37) {
                selected_card = 3;
              } else if (parseInt(number.substring(0, 2)) == 65) {
                selected_card = 4;
              } else if (parseInt(number.substring(0, 4)) == 5019) {
                selected_card = 5;
              } else {
                selected_card = -1;
              }
   
              if (selected_card != -1) {
                html.setAttribute("style", "--card-color: " + cards[selected_card].colore);
                $(".bankid").attr("src", cards[selected_card].src).show();
              } else {
                html.setAttribute("style", "--card-color: #cecece");
                $(".bankid").attr("src", "").hide();
              }
   
              if ($(".card_number").text().length === 0) {
                $(".card_number").html("&#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF;");
              }
   
        }).focus(function () {
              $(".card_number").css("color", "white");
        }).on("keydown input", function () {
   
              $(".card_number").text($(this).val());
   
              if (event.key >= 0 && event.key <= 9) {
                if ($(this).val().length === 4 || $(this).val().length === 9 || $(this).val().length === 14) {
                  $(this).val($(this).val() + " ");
                }
              }
        });


        */




   
   //Name Input
      var nombre="";
    /*
      $("#billingFirst").keyup(function () {
            $(".fullname").text($(this).val());
            nombre=$(".fullname").text();
            if ($("#billingFirst").val().length === 0) {
              $(".fullname").text("FULL NAME");
            }
            return event.charCode;
      }).focus(function () {
            $(".fullname").css("color", "white");
      });
   */

         // aqui eventos de cvv------------------------------------
   function keyupnombre(valornombre)
      {
         $(".fullname").text(valornombre);
            nombre=$(".fullname").text();
            if (valornombre.length === 0) {
              $(".fullname").text("FULL NAME");
            }
            return event.charCode;
      }
   
      function onfocusnombre()
      {
         $(".fullname").css("color", "white");
      }
      
   
      function keyupapellido(valorapellido)
      {
         var  apellido= valorapellido;
            
            $(".fullname").text(nombre +" "+ apellido);
   
            return event.charCode;
      }
   
      function onfocusapellido()
      {
         $(".fullname").css("color", "white");
      }
      


   

      // aqui eventos de cvv------------------------------------
      function keyupcvv(valorcvv)
      {
         $(".seccode").text(valorcvv);
          if (valorcvv.length === 0) {
            $(".seccode").html("&#x25CF;&#x25CF;&#x25CF;");
          }
      }
   
      function onfocuscvv()
      {
         $(".card2").css("transform", "rotatey(180deg)");
          $(".seccode").css("color", "white");
      }
      
      function focusoutcvv()
      {
         $(".card2").css("transform", "rotatey(0deg)");
          $(".seccode").css("color", "var(--text-color)");
      }
      // aqui eventos de cvv------------------------------------
   

   //# sourceURL=pen.js
</script>
<script src="<?=  base_url() ?>/application/assets/assets/js/cybersource/checkout5.js"></script>
