<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento Pdf</title>
  <style type="text/css">

    hr { 
      border: 3px;
      border-top: 5px double;
      margin-right: 3px;
      margin-left: 3px;
    }

    table {
      border-width: 3px;  
      border-style: solid;
      border-color: black;	  
      
    }
    label {  
      color: black;   
      font-family: Tahoma,Verdana,Segoe,sans-serif;     
      font-size: 11px;  
    }
    td {  
      color: black;   
      font-family: Tahoma,Verdana,Segoe,sans-serif;     
      font-size: 11px; 
          text-align: center; 
    }

  </style>
</head>

<body>

  <table width="350" height="500" align="center" style="table-layout: fixed">
      <tr>
        <td>   	        
          <div align="center">
            <img src="http://syscoop.com.bo/LogoPagoFacil/logo2.png" width="80" height="80"/>
          </div> 


          <div align="center" style="padding-top:2px">         	  
              <label style="font-size: 11px;">
                <b><?php    @$laDatosView['Syscoop']->NombreEmpresa ?></b>
              </label> 
          </div>    
          <div align="center" style="padding-top:3px">     
            <label style="font-size: 10px">   	
                <b>Recarga Billetera PagoFacil   </b>              
            </label>                                   
          </div> 
          

          <div align="center" style="padding-top:3px">     
            <label style="font-size: 10px">   	
                <b>De César Corvera Murakami</b>              
            </label>                                   
          </div>  

          <div align="center" style="padding-top:3px">     
            <label style="font-size: 10px">   	              
                <b>Caza Matriz</b>  
            </label>                                   
          </div>                   
          
          <div align="center" style="padding-top:3px">        
            <label style="font-size: 11px">
                <?php    @$laDatosView['Syscoop']->Direccion ?>              
                <br />
                Telf :<?php    @$laDatosView['Syscoop']->Telefono ?>              
                <br />
                <?php    @$laDatosView['Syscoop']->Region ?>-Bolivia              
            </label>
          </div>
                              
          <div align="center" style="padding-top:3px">      
            <label style="font-size: 14px">
              <b>F A C T U R A</b>
            </label>
          </div>            
          
          <div align="center" style="padding-bottom:3px">      
            <label style="font-size: 11px">
              <b>Original</b>
            </label>
          </div>                                                
          


          <div align="left" style="padding-left:20px">
              <label style="font-size: 11px;">
                <b>NIT:</b>                    
              </label>            
              <label style="font-size: 11px; padding-left:80px">
                <?php    @$laDatosView['Syscoop']->NIT ?>            
              </label>

              <br/>
                    
              <label style="font-size: 11px;">
                <b>Factura Nro. :</b>
              </label>
              <label style="font-size: 11px; padding-left:30px">
                <?php    @$laDatosView['NroFactura'] ?>
              </label>         

              <br/>  

              <label style="font-size: 11px;">
                <b>Autorización Nº :</b>
              </label>
              <label style="font-size: 11px; padding-left:13px">                
                <?php    @$laDatosView['OrdenDosificacion']->NroAutorizacion ?>
              </label>      

              <br/>      

              <label style="font-size: 11px;">
                <b>Actividad Ecónomica :</b>
              </label>
              <label style="font-size: 11px;">
                <?php    @$laDatosView['ActividadEconomica']->DescripcionActividad ?>
              </label>   

          </div>
                    

          <hr />

          
          <div align="left" style="padding-left:13px">
            <label style="font-size: 11px">
              <b>Fecha :</b>
            </label>
            <label style="font-size: 11px">
              <?php    @$laDatosView['TransaccionPago']->FechaFin ?>
            </label>
            
            <label style="font-size: 11px;padding-left:10px">
              <b>Hora :</b>
            </label>
            <label style="font-size: 11px">
              <?php    @$laDatosView['TransaccionPago']->HoraFin ?> 
            </label>

            <br/>
          
            <label style="font-size: 11px">
              <b>Nombre :</b>
            </label>
            <label style="font-size: 11px">
              <?php    @$laDatosView['Cliente']->NombreCompleto ?>
            </label>   

            <br/>         
            
            <label style="font-size: 11px">
              <b>NIT/CI:</b>
            </label>             
            <label style="font-size: 11px">
              <?php    @$laDatosView['Cliente']->cinit ?>
            </label>            
          </div>
          

          <hr />
          

      <table style="border:none">
                <thead id="theadclientes" >
                    <tr>
                        <th>PRODUCTO </th>
                        <th>CANTIDAD</th>
                        <th>P.U</th>
                        <th>DESC</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr   > 
                        <td  data-title="BILLETERA"> SERVICIO RECARGA BILLETERA </td>
                        <td  data-title="CANTIDAD" >1</td>
                        <td  data-title="P.U" ><?php    @$laDatosView['TransaccionPago']->MontoClienteSYSCOOP ?></td>
                        <td  data-title="DESCUENTO" >0.00</td>
                        <td  data-title="TOTAL" ><?php    @$laDatosView['TransaccionPago']->MontoClienteSYSCOOP ?></td>
                    </tr>
                    <tr   > 
                        <td  data-title="BILLETERA"> COMISIÓN ONLINE </td>
                        <td  data-title="CANTIDAD" >1</td>
                        <td  data-title="P.U" > <?php    @$laDatosView['TransaccionPago']->MontoClienteSYSCOOP ?></td>
                        <td  data-title="DESCUENTO" >0.00</td>
                        <td  data-title="TOTAL" ><?php    @$laDatosView['TransaccionPago']->MontoClienteSYSCOOP ?></td>
                    </tr>
                    <hr>
                    <tr> 
                        <td  data-title="totalventa">     <b>Total Venta (Bs) :</b>    </td>
                        <td  data-title="montocomision" ><?php    @$laDatosView['TransaccionPago']->MontoClienteSYSCOOP ?></td>
                        <td  data-title="descripcion" > SON:   <?php    @$laDatosView['FraccionTotal'] ?></td>
                    </tr>
                
                </tbody>
      </table>
          
          <hr />
          
          <div align="left" style="padding-left:15px">
            <label style="font-size:11px">
              <b>Código de Control:</b>
            </label>

            <label style="font-size: 11px">
              <?php    @$laDatosView['Factura']->CodigoControl ?>    
            </label>

            <br />

            <label style="font-size:11px">
              <b>Fecha Limite de Emisión :</b>
            </label>

            <label style="font-size: 11px">              
              <?php    @$laDatosView['OrdenDosificacion']->FechaLimite ?>
            </label>

            <br />      
          </div>
          
          <hr />
          
                              
          <div align="center">                        
           
            <img src="data:image/png;base64, <?php    $codeQR ?>">
          </div>      
          
          
          <hr />
          
          <div align="center" style="padding-right:15px; padding-left:15px">
            <label style="font-size: 11px;">
              "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS EL USO ILICITO DE ESTE SERA SANCIONADO DE ACUERDO A LEY"
            </label>
          </div>
              
          <div align="center" style="padding-top:3px">
            <label style="font-size: 11px">
              <?php    @$laDatosView['Leyenda']->Glosa ?>
            </label>        
          </div>  
          
        
          <br />      
          
          <div align="center">
            <label style="font-size: 14px; padding-top:5px">
              <b>FACTURA DIGITAL</b>
            </label>

            <br />
                      
            <label style="font-size: 10px">
              Imprima si es necesario. Cuide el Medio Ambiente.
            </label>

            <br />
          </div>
      
        </td>
      </tr>
    
  </table>

</body>
</html>
