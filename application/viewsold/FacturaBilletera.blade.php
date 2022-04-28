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

    #tablaprincipal {
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

  <table width="350" height="500" align="center" id="tablaprincipal" style="table-layout: fixed">
      <tr>
        <td>   	        
          <div align="center">
            <img src="http://syscoop.com.bo/LogoPagoFacil/logo2.png" width="80" height="80"/>
          </div> 


          <div align="center" style="padding-top:2px">         	  
              <label style="font-size: 11px;">
                <b>{!!    @$laDatosView['Syscoop']->NombreEmpresa !!}</b>
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
                {!!    @$laDatosView['Syscoop']->Direccion !!}              
                <br />
                Telf :{!!    @$laDatosView['Syscoop']->Telefono !!}              
                <br />
                {!!    @$laDatosView['Syscoop']->Region !!}-Bolivia              
            </label>
          </div>
                              
          <div align="center" style="padding-top:3px">      
            <label style="font-size: 14px">
              <b>R E C I B O </b>
            </label>
          </div>            
          <div align="left" style="padding-left:20px">
              <br/>
          </div>
        <hr>
                 
          <div align="center" style="padding-left: 13px;height: 20px;background: #57c9f054;border: groove;border-radius: 16px;line-height: 20px;">
            <label style="font-size: 11px">
              <b>RECIBO   Nro:</b>
            </label>
            <label style="font-size: 11px;">
              {!!    @$laDatosView['TransaccionPago']->FechaFin !!}
            </label> 
          </div>  

          <hr />

          
          <div align="left" style="padding-left:13px">
            <label style="font-size: 11px">
              <b>Fecha :</b>
            </label>
            <label style="font-size: 11px">
              {!!    @$laDatosView['TransaccionPago']->FechaFin !!}
            </label>
            
            <label style="font-size: 11px;padding-left:10px">
              <b>Hora :</b>
            </label>
            <label style="font-size: 11px">
              {!!    @$laDatosView['TransaccionPago']->HoraFin !!} 
            </label>

            <br/>
          
            <label style="font-size: 11px">
              <b>Nombre :</b>
            </label>
            <label style="font-size: 11px">
              {!!    @$laDatosView['Cliente']->NombreCompleto !!}
            </label>   

            <br/>         
            
            <label style="font-size: 11px">
              <b>NIT/CI:</b>
            </label>             
            <label style="font-size: 11px">
              {!!    @$laDatosView['Cliente']->cinit !!}
            </label>            
          </div>
          

  <hr>
          
  <div align="center" style="padding-top:3px">      
            <label style="font-size: 14px">
              <b>Detalle </b>
            </label>
          </div> 

      <table style="border:none; width: -webkit-fill-available;">
                <thead id="theadclientes" >
                    <tr>
                        <th>PRODUCTO </th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr> 
                        <td  data-title="BILLETERA"> RECARGA BILLETERA </td>
                        <td  data-title="TOTAL" style="text-align: end;" > {!!    @$laDatosView['TransaccionPago']->MontoClienteSYSCOOP !!}</td>
                    </tr>
                    <tr> 
                        <td  data-title="BILLETERA"> COMISIÓN DE COBRANZA  </td>
                        <td  data-title="TOTAL" style="text-align: end;" >  {!!    @$laDatosView['TransaccionPago']->tnMontoClienteSyscoop !!}</td>
                    </tr>
                    <tr> 
                        <td  data-title="BILLETERA" style="text-align: right;"  > <b>TOTAL</b></td>
                        <td  data-title="TOTAL"  style="text-align: end;" > <b> {!!   @$laDatosView['TransaccionPago']->MontoClienteSYSCOOP + @$laDatosView['TransaccionPago']->tnMontoClienteSyscoop  !!}  </b> </td>
                    </tr>
                  
                 
               
                
                </tbody>
      </table>
      <hr style="margin-right: 3px; margin-left: 3px;">
      <table style=" width: -webkit-fill-available;">
     
                <tbody>
                    <tr> 
                        <td  data-title="totalventa">     <b>Total Venta (Bs) :</b>    </td>
                        <td  data-title="montocomision" >  {!!   @$laDatosView['TransaccionPago']->MontoClienteSYSCOOP + @$laDatosView['TransaccionPago']->tnMontoClienteSyscoop  !!} </td>
                        <td  data-title="descripcion" > SON:  {!!    @$laDatosView['FraccionTotal'] !!}</td>
                    </tr>
                
                </tbody>
      </table>
          
          <hr />
   
          <div align="center" style="padding-left:13px">
           
              <label style="font-size: 11px">
                  <b>Metodo de pago  :</b>
              </label>
              <label style="font-size: 11px">
                    {!!    @$laDatosView['MetodoPago']->nombreMetodoPago !!}
              </label>
              
           </div>

           <div align="center" style="padding-left:13px">
            <img style="width: 150px;" src="{!!    @$laDatosView['MetodoPago']->url_icon !!}" alt="">
          </div>

            
            
          </DIV>
          <hr>
      
          
      
          <div align="center">
            

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

