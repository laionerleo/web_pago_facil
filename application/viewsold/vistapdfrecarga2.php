<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Documento sin título</title>

        <style type="text/css">
            .table1 {                	 
                background-color: #54B5EF;                   
                padding-bottom: 5px;
                padding-left: 10px;
                padding-right: 10px;
                padding-top: 15px;     
                               
            }

            .table2 {
                background-color: #54B5EF;                   
                padding-bottom: 15px;
                padding-left: 10px;
                padding-right: 10px;
                padding-top: 5px;     

            }

            .divBordeado {
                background-color: white;
                border-radius: 10px;
            }       

            /*
            .bordes {
                border-top-left-radius: 15px;
                border-top-right-radius: 15px;

                border-bottom-right-radius: 4px;
                border-bottom-left-radius: 8px;
            }
            */

            .nombreCoop { 
                color: #0080C0; 
                font-size: 9px;
                font-family: Tahoma,Verdana,Segoe,sans-serif;
                text-align: center;
                padding-top: 3px;

            }

            .imagenEmpresa {
                float:left;

                
                padding-left: 35px;
                padding-right: 35px;
                padding-top: 5px;
                
            }        

            .cabeceraEmpresa {
                font-size: 10px;
                font-family: Tahoma,Verdana,Segoe,sans-serif;


/*
                padding-bottom: 3px;
                padding-left: 10px;
                padding-right: 10px;
                padding-top: 3px;
                */
            }           

            .fuenteCourierNew {
                font-size: 11px;
                font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace; 
            }

            .factura {                
                font-size: 14px;
                font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace; 
                font-weight:bold;
               
            }            

            .fuente {
                font-family: Tahoma,Verdana,Segoe,sans-serif;
                font-size: 9px;
            }

            .cab1 {
                padding-left: 15px;
                padding-top: 5px;
                padding-bottom: 3px;
                font-family: Tahoma,Verdana,Segoe,sans-serif;
                font-size: 10px;
                clear:both;
            }

            .divCuerpo1 {
                padding-left: 18px;
                padding-top: 5px;
                padding-bottom: 3px;
                font-family: Tahoma,Verdana,Segoe,sans-serif;
                font-size: 9px;
            }

            .divCuerpo2 {
                padding-left: 18px;
                padding-top: 3px;
                padding-bottom: 3px;
                font-family: Tahoma,Verdana,Segoe,sans-serif;
                font-size: 9px;
            }
            

            .pieFactura1 {
                font-size: 12px;                 
                font-weight:bold;
                font-family: Tahoma,Verdana,Segoe,sans-serif;
            }

            .pieFactura2 {
                font-family: Tahoma,Verdana,Segoe,sans-serif;
                font-size: 9px;
            }

            .pieFactura3 {
                font-weight:bold; 
                padding-right:20px; 
                padding-left:20px;
                font-size:9px;
                font-family: Tahoma,Verdana,Segoe,sans-serif;
            }

            .pieFactura4 {
                padding-right:20px; 
                padding-left:20px;
                padding-bottom: 3px;
                font-family: Tahoma,Verdana,Segoe,sans-serif;
                font-size: 8px;
            }

            .table2::after {
                content: "";            
                background: url("http://syscoop.com.bo/LogoPagoFacil/logo_sinFondo.png") no-repeat fixed center;
                opacity: 0.3;
                top: 25%;
                left: 27%;
                bottom: 0;
                right: 0;
                position: fixed;
                z-index: -1;            
            }
    
                        
        </style>

    </head>

    <body>

        <table class="table1" width="280" height="500" align="center" style="table-layout: fixed">
            <tr>
                <td>
                    <div class="divBordeado">

                        <div class="nombreCoop">
                            <b><?php   trim(@$laDatosView['Empresa']['pe_nombre']) ?></b>
                        </div>                        
                                                                                                                                                                             
                        <div style="float:right; padding-right:15px; padding-top:5px; font-size: 9px; font-family: Tahoma,Verdana,Segoe,sans-serif;">
                            <label>Nit :</label>                                             
                            <label style="padding-left: 60px;"><?php   @$laDatosView['Empresa']['pe_nit'] ?></label>                                 
                            <br/>
                            <label>Factura N° :</label>                            
                            <label style="padding-left: 29px;"><?php   @$laDatosView['NFactura'] ?></label>                                 
                            <br/>          
                            <label>Nro Autorización :</label>                                                
                            <label style="padding-left: 5px;"><?php   @$laDatosView['NroAutorizacion'] ?></label>                                                                  
                            <br/>     
                            <label>Actividad Economica :</label> 
                            <br/> 
                            <label><?php   @$laDatosView['ActividadNombre'] ?></label>                                                              
                        </div>       


                        <div style="text-align:center; padding-top:5px;">
                            <img style="max-width:150px; max-height:50px;" src="<?php   @$laDatosView['Imagen'] ?>"/>
                        </div>


                        <div style="clear:both; float:left; padding-left:25px; padding-right:210px; text-align:center; font-size:9px; font-family:Tahoma,Verdana,Segoe,sans-serif;">
                            <span class="fuenteCourierNew">Casa Matriz</span>      
                            <br/>
                            <?php   @$laDatosView['Empresa']['pe_direc'] ?>
                            <br/>
                            Telf/Fax :<?php   trim(@$laDatosView['Empresa']['pe_fono']) ?>                                            
                            <br/>
                            <?php   trim(@$laDatosView['Empresa']['pe_localid']) ?>
                        </div>


                        
                        <div style="clear:both; padding-top:20px; float:right;  padding-right:90px; font-size:9px; font-family:Tahoma,Verdana,Segoe,sans-serif;">
                            <label style="padding-right:90px; font-weight:bold; font-size: 17px; font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;">
                                FACTURA
                            </label>
                            <br/>                        
                            <label style="padding-left:10px; padding-right:40px; font-size: 11px; font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace; ">
                                Original
                            </label>     

                            <label style="padding-right:1px;">
                                <label style="font-weight:bold; font-size:11px; font-family:Tahoma,Verdana,Segoe,sans-serif;">Mes: </label><?php   @$laDatosView['MesCobro'] ?>   
                            </label>                                
                        </div>
                            
                            
                            
                        <div class="cab1">
                            <label><b>Fecha Emision :</b></label>
                            <label style="padding-left:10px"><?php   @$laDatosView['FechaEmision'] ?></label>
                            
                            <br/>

                            <label><b>Código Fijo :</b></label>
                            <label style="padding-left:25px; padding-right:75px;"><?php   @$laDatosView['CodigoFijo'] ?></label>

                            <label><b>Ubicación :</b></label>
                            <label style="padding-left:20px"><?php   @$laDatosView['Ubicacion'] ?></label>

                            <br/>

                            <label><b>Señor (es) :</b></label>
                            <label style="padding-left:31px"><?php   @$laDatosView['Senores'] ?></label>

                            <br/>

                            <label><b>Direccion :</b></label>
                            <label style="padding-left:34px"><?php   @$laDatosView['Direccion'] ?></label>

                            <br/>

                            <label><b>NIT/CI :</b></label>
                            <label style="padding-left:51px; padding-right:5px;"><?php   @$laDatosView['NITCI'] ?></label>


                            <div style="float:right; padding-right:35px; ">
                                <label><b>Cat. :</b></label>
                                <label style="padding-left:23px;"><?php   @$laDatosView['Cat'] ?></label>    
                                <br>
                                <label><b>Medidor :</b></label>
                                <label style="padding-left:10px"><?php   @$laDatosView['Medidor'] ?></label>      
                                <br>      
                                <label><b>Consumo :</b></label>
                                <label style="padding-left:10px"><?php   @$laDatosView['Consumo'] ?></label>
                            </div>   
                                             

                            <br/>

                            <label><b>Lect. Anterior :</b></label>
                            <label style="padding-left:15px; padding-right:18px;"><?php   @$laDatosView['LectAnterior'] ?></label>
                            <label style="padding-right:1px;"><?php   @$laDatosView['FechaLectAnt'] ?></label>                           


                            <br/>

                            <label><b>Lect. Actual :</b></label>
                            <label style="padding-left:23px; padding-right:18px;"><?php   @$laDatosView['LectActual'] ?></label>
                            <label style="padding-right:1px;"><?php   @$laDatosView['FechaLectAct'] ?></label>                            
                        </div>       

                    </div>
                </td>
            </tr>
        </table>



        <table class="table2" width="280" height="500" align="center" style="table-layout: fixed">
            <tr>
                <td>

                        

                    <div class="divBordeado">
                                                                
                        <div class="divCuerpo1">
                                                
                            <p style="text-align:left; ">

                                <span style="font-weight:bold;">Detalle</span>

                                <span style="float:right; margin-right:15px; text-align:right">

                                    <span style="font-weight:bold;">Importe Bs.</span>

                                    <br/>
                                    <?php   @$laDatosView['TXTPrint']['M1'] ?>
                                    <br/>
                                    <?php   @$laDatosView['TXTPrint']['M2'] ?>
                                    <br/>
                                    <?php   @$laDatosView['TXTPrint']['M3'] ?>
                                    <br/>
                                    <?php   @$laDatosView['TXTPrint']['M4'] ?>
                                    <br/>
                                    <?php   @$laDatosView['TXTPrint']['M5'] ?>
                                    <br/>
                                    <?php   @$laDatosView['TXTPrint']['M6'] ?>
                                    <br/>
                                    <?php   @$laDatosView['TXTPrint']['M7'] ?>
                                    <br/>
                                    <?php   @$laDatosView['TXTPrint']['M8'] ?>
                                    <br/>
                                    <?php   @$laDatosView['TXTPrint']['M9'] ?>
                                    <br/>
                                    <?php   @$laDatosView['TXTPrint']['M10'] ?>
                                    <br/>
                                    <?php   @$laDatosView['TXTPrint']['M11'] ?>
                                    <br/>

                                    <span style="font-weight:bold;"><?php   @$laDatosView['TXTPrint']['ISubTotal'] ?></span>
                                    
                                    <br/>  
                                    <span><?php   @$laDatosView['TXTPrint']['TaM1'] ?></span>
                                    <br/>
                                    <span><?php   @$laDatosView['TXTPrint']['TaM2'] ?></span>
                                    <br/>
                                    <span><?php   @$laDatosView['TXTPrint']['TaM3'] ?></span>
                                    <br/>

                                    <span style="font-weight:bold;"><?php   @$laDatosView['TXTPrint']['ITasa'] ?></span>
                                    
                                    <br/>
                                    <span><?php   @$laDatosView['TXTPrint']['ExM1'] ?></span>
                                    <br/>
                                    <span><?php   @$laDatosView['TXTPrint']['ExM2'] ?></span>
                                    <br/>
                                    <span><?php   @$laDatosView['TXTPrint']['ExM3'] ?></span>
                                    <br/>
                                    <span><?php   @$laDatosView['TXTPrint']['ExM4'] ?></span>
                                    <br/>
                                    <span><?php   @$laDatosView['TXTPrint']['ExM5'] ?></span>
                                    <br/>
                                    <span><?php   @$laDatosView['TXTPrint']['ExM6'] ?></span>
                                    <br/>

                                    <span style="font-weight:bold;"><?php   @$laDatosView['TXTPrint']['IExcento'] ?></span>
                                    <br/>
                                    <span style="font-weight:bold;"><?php   @$laDatosView['TXTPrint']['TotalPagar'] ?></span>                                    
                                    <br/>

                                    <span><?php   @$laDatosView['TXTPrint']['DeM1'] ?></span>
                                    <br/>
                                    <span><?php   @$laDatosView['TXTPrint']['DeM2'] ?></span>
                                    <br/>
                                    <span><?php   @$laDatosView['TXTPrint']['DeM3'] ?></span>
                                    <br/>
                                    
                                    <span style="font-weight:bold;"><?php   @$laDatosView['TXTPrint']['IDescuento'] ?></span>
                                    <br/>
                                    <span style="font-weight:bold;"><?php   @$laDatosView['TXTPrint']['ICreFiscal'] ?></span>
                                    <br/>

                                    <span><?php   @$laDatosView['TXTPrint']['AM1'] ?></span>
                                    <br/>
                                    <span><?php   @$laDatosView['TXTPrint']['AM2'] ?></span>
                                    <br/>
                                    <span><?php   @$laDatosView['TXTPrint']['AM3'] ?></span>
                                    <br/>

                                    <span style="font-weight:bold;"><?php   @$laDatosView['TXTPrint']['IAnticipo'] ?></span>
                                    <br/>
                                    <span style="font-weight:bold;"><?php   @$laDatosView['TXTPrint']['TotalPagar'] ?></span>                            

                                </span>

                                <!--///////////////////////////////////////////////////////////////////////////////////////////-->

                                <br/>
                                <?php   @$laDatosView['TXTPrint']['Linea1'] ?>
                                <br>
                                <?php   @$laDatosView['TXTPrint']['Linea2'] ?>
                                <br>
                                <?php   @$laDatosView['TXTPrint']['Linea3'] ?>
                                <br>
                                <?php   @$laDatosView['TXTPrint']['Linea4'] ?>
                                <br>
                                <?php   @$laDatosView['TXTPrint']['Linea5'] ?>
                                <br>
                                <?php   @$laDatosView['TXTPrint']['Linea6'] ?>
                                <br>
                                <?php   @$laDatosView['TXTPrint']['Linea7'] ?>
                                <br>
                                <?php   @$laDatosView['TXTPrint']['Linea8'] ?>
                                <br>
                                <?php   @$laDatosView['TXTPrint']['Linea9'] ?>
                                <br>
                                <?php   @$laDatosView['TXTPrint']['Linea10'] ?>
                                <br>
                                <?php   @$laDatosView['TXTPrint']['Linea11'] ?>
                                <br/> 

                                <span style="font-weight:bold;">Total Impuestos...............................................................:</span>
                                
                                <br/> 

                                <?php   @$laDatosView['TXTPrint']['Ta1'] ?>
                                <br/> 
                                <?php   @$laDatosView['TXTPrint']['Ta2'] ?>
                                <br/>
                                <?php   @$laDatosView['TXTPrint']['Ta3'] ?>
                                
                                <br/>

                                <span style="font-weight:bold;">Total Tasas..........................................................................:</span>

                                <br/>
                                <?php   @$laDatosView['TXTPrint']['Ex1'] ?>
                                <br/>
                                <?php   @$laDatosView['TXTPrint']['Ex2'] ?>
                                <br/>
                                <?php   @$laDatosView['TXTPrint']['Ex3'] ?>
                                <br/>
                                <?php   @$laDatosView['TXTPrint']['Ex4'] ?>
                                <br/>
                                <?php   @$laDatosView['TXTPrint']['Ex5'] ?>
                                <br/>
                                <?php   @$laDatosView['TXTPrint']['Ex6'] ?>
                                <br/>

                                <span style="font-weight:bold;">Total Excentos....................................................................:</span>
                                <br/>
                                <span style="font-weight:bold;">TOTAL A FACTURA..............................................................:</span>
                                <br/>

                                <?php   @$laDatosView['TXTPrint']['De1'] ?>
                                <br/>
                                <?php   @$laDatosView['TXTPrint']['De2'] ?>
                                <br/>
                                <?php   @$laDatosView['TXTPrint']['De3'] ?>
                                <br/>


                                <span style="font-weight:bold;">Total Descuento.................................................................:</span>
                                <br/>
                                <span style="font-weight:bold;">Base Para Crédito Fiscal Bs................................................:</span>
                                <br/>

                                <?php   @$laDatosView['TXTPrint']['A1'] ?>
                                <br/>
                                <?php   @$laDatosView['TXTPrint']['A2'] ?>
                                <br/>
                                <?php   @$laDatosView['TXTPrint']['A3'] ?>
                                <br/>

                                <span style="font-weight:bold;">Total Pagos a Cuenta.........................................................:</span>
                                <br/>
                                <span style="font-weight:bold;">TOTAL A PAGAR.................................................................:</span>
                                
                            </p>                                                                                                                                                                                                                                                                                                                                    
                        </div>



                        <div class="divCuerpo2">
                            <div style="padding-bottom:3px;">
                                <label>Son Bs. :</label>
                                <label style="padding-left:3px; "><?php   @$laDatosView['Literal'] ?></label>
                            </div>

                            <div style="padding-bottom:3px;">
                                <label>Cajero:</label>
                                <label style="padding-left:8px;"><?php   @$laDatosView['Cajero'] ?></label>      

                                <div style="float:right; padding-left:3px; padding-right:10px;">
                                    <label>Fecha Pago:</label>
                                    <label><?php   @$laDatosView['FechaPago'] ?></label>
                                    <label style="padding-left:3px;">Hora :</label>
                                    <label><?php   @$laDatosView['HoraPago'] ?></label>                                                                
                                </div>                  

                                                                
                            </div>

                            <div style="padding-bottom:3px;">
                                <label>Entidad de Pago:</label>
                                <label style="padding-left:3px;"><?php   @$laDatosView['EntidadPago'] ?></label>
                            </div>

                            <div style="padding-bottom:3px;">
                                <label>Codigo de Control :</label>
                                <label style="padding-left:3px;"><?php   @$laDatosView['CodigoControl'] ?></label>
                            
                                <label style="padding-left:30px;">Fecha Limite Emisión :</label>
                                <label style="padding-left:3px;"><?php   @$laDatosView['FechaLimiteEmision'] ?></label>                                
                            </div>
                        </div>


                        <div align="center">                        
                        
                            <img src="data:image/png;base64, <?php   $codeQR ?>">                            
                        </div>
                    
                        <div align="center" class="pieFactura1">                            
                            FACTURA DIGITAL
                        </div>  

                        <div align="center" class="pieFactura2">
                            Imprima si es necesario. Cuide el Medio Ambiente.
                        </div>

                        <div align="center" class="pieFactura3">
                            “ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS. EL USO ILÍCITO DE ÉSTA SERÁ SANCIONADO DE ACUERDO A LEY"
                        </div>
                                                                
                        <div align="center" class="pieFactura4">
                            <?php   @$laDatosView['Leyenda'] ?>
                        </div>  

                        <?php if(@$laDatosView['Ley1294']!=='') : ?>
                            <div align="center" class="pieFactura4">
                                "Ley N° 1294 del 1 de Abril del 2020"
                            </div> 
                        <?php endif; ?> 
                    </div>                                                            
                </td>
            </tr>            
        </table>

    </body>
</html>
