<style>

.flotante2 {
    display:none;
        position:fixed;
        bottom:150px;
        right:0px;
        font-size: smaller;
}
</style>

<script>

var gnFooterNombreEmpresa="";
var gnFooterNombreMetodoPago="";
var gaMetododepagofooter=Array();
    function cargarurlayudaEmpresa(nombreempresa )
    {
        gnFooterNombreEmpresa= nombreempresa;
        var urlayuda="https://api.whatsapp.com/send?phone=75353593&text=Hola,Nesesito ayuda para poder realizar el pago de mis facturas de la empresa " + nombreempresa ;
        $("#ayudawhatsapp").attr("href", urlayuda);
       
        
    
    }
    function cargarurlayudaMetodoPago(MetodoPago )
    {
        console.log("metodo de pago igresado", MetodoPago);
        cargartextometodo(MetodoPago);

        //var arraymetodopago=["TIGO Money", "Billetera PagoFacil", "Tarjeta Débito/Crédito-Enlace", "Pago QR", "Tarjetas BCP", "Tarjetas VISA MASTERCARD", "Soli Pagos", "BNB QR", "Tarjeta Débito/Crédito-CyberATC", "Tarjeta Débito/Crédito-CyberLinkSer", "Pago Express", "Banco Ganadero", "Banco BCP", "Multi Red", "CoinBase", "CHEZBRAND S.R.L.", "Multipagos S.R.L.", "Rana", "FarmaCorp", "Yolo  Pago"];
        var  arraymetodopago = ["",                                
                                "TIGO Money",
                                "Billetera PagoFacil",
                                "Tarjeta Débito/Crédito-Enlace",
                                "QR",
                                "Tarjetas BCP",
                                "Tarjetas VISA MASTERCARD",
                                "Yape",
                                "BNB QR",
                                "Tarjeta Débito/Crédito-CyberATC",
                                "Tarjeta Débito/Crédito-CyberLinkSer",
                                "Pago Express",
                                "Banco Ganadero",
                                "Banco BCP",
                                "Multi Red",
                                "Binance",
                                "CHEZBRAND S.R.L.",
                                "Multipagos S.R.L.",
                                "Rana",
                                "FarmaCorp",
                                "Yolo Pago",
                                "LPAYINC SERVICIOS DIGITALES S.A",
                                "Multiapps SRL",
                                "LASTMILEBOLIVIA SRL",
                                "E-FECTIVO ESPM S.A",
                                "Transferencia Bancaria",
                                "Pago BMSC QR",
                                "Sintesis SA",
                                "V PAY",
                                "Pago BISA QR",
                                "PIX QR",
                                "El Genio X"
                            ];
        console.log(arraymetodopago[MetodoPago]);

        gnFooterNombreMetodoPago= arraymetodopago[MetodoPago];
        var urlayuda="https://api.whatsapp.com/send?phone=75353593&text=Hola,Nesesito ayuda para poder realizar el pago de mis facturas de la empresa " + gnFooterNombreEmpresa + ", con el metodo de pago "+gnFooterNombreMetodoPago;
        $("#ayudawhatsapp").attr("href", urlayuda);
       
        $("#textometodo").text("con "+gnFooterNombreMetodoPago);
   //     $("#textometodo").style("display: grid;justify-items: center;");
        crecerImagen();
    }


    function crecerImagen() {
        console.log("llamndno al acjhikacas");
        $('#ayudametodopago').animate({
            width: '70px' // Tamaño más grande
        }, 1000, achicarImagen); // Llama a achicarImagen después de la animación
    }

    // Función para achicar la imagen
    function achicarImagen() {
        $('#ayudametodopago').animate({
            width: '50px' // Tamaño original
        }, 1000, crecerImagen); // Llama a crecerImagen después de la animación
    }
    

    


</script>
<footer class="content-footer">
<style>				
                        .flotante {
                            display:scroll;
                                position:fixed;
                                bottom:15px;
                                right:0px;
                        }
                        </style>
                        <a  target="_blank" id="ayudametodopago" onclick=" $('#ayudawhatsapp').show();" class='flotante2' href= ><img width="55px"  height="55px"  src='https://pagofacil.com.bo/online/application/assets/assets/iconos/COMOPAGARv2.png' /> <label id="textometodo" for=""></label> </a>
                        <a  target="_blank"  id="ayudawhatsapp"   class='flotante'  href="https://api.whatsapp.com/send?phone=75353593&text=Hola,Nesesito ayuda para poder realizar el pago de mis facturas !" style="display:none" ><img width="60px"  height="70px"  src='<?= base_url() ?>application/assets/assets/media/image/iconowhatsapp.svg'  /></a>
                        
                        
                <div style="text-transform: none;"  >© PagoFacil Bolivia - 2024 <a href="http://laborasyon.com/" target="_blank"></a></div>
                <div>
                    <nav class="nav">
                       
                    </nav>
                </div>
</footer>
<script>
    
   function cargartextometodo(metodopago)
   {
    //1,4,5,6,7,8 , 9 , 10 , 12 ,14 , 11,13 
    $("#ayudametodopago").css("display","grid");
    $("#ayudametodopago").css("justify-items","center");
  
    
    var lcmetodopago=" ";
    var lcurlvideometodopago=" ";
        switch (metodopago) {
            case 1:
                lcmetodopago=" con el  metodo de pago  Tigo Money";
                lcurlvideometodopago= "https://www.youtube.com/shorts/hrabtMn_YaA";                
                
                break;
            case 4:
                lcmetodopago=" con el  metodo de pago  Pago QR";
                lcurlvideometodopago= "https://www.youtube.com/watch?v=rsBBsgTpG8s";                
                
                break;
            case 5:
                lcmetodopago=" con el  metodo de pago  tarjeta BCP";
                break;
            case 6:
                lcmetodopago="  con el  metodo de pago  Tarjeta Visa MASTERCARD";
                break;
            case 7:
                lcmetodopago=" con el  metodo de pago  Soli Pago";
                lcurlvideometodopago= "https://www.youtube.com/shorts/J0tmM1OE89E";                
                
                break;
            case 8:
                lcmetodopago=" con el  metodo de pago  QR bnb";
                lcurlvideometodopago= "https://www.youtube.com/watch?v=rsBBsgTpG8s";                
                break;
            case 9:
                lcmetodopago=" con el  metodo de pago   Tarjeta Débito/Crédito-CyberATC";
                lcurlvideometodopago= "https://www.youtube.com/watch?v=sVAkCdIWVSg";
                break;
            case 10:
                lcmetodopago=" con el  metodo de pago  Tarjeta Débito/Crédito-CyberLinkSer";
                lcurlvideometodopago= "https://www.youtube.com/watch?v=sVAkCdIWVSg";
                break;
            case 12:
                lcmetodopago=" con el  metodo de pago  Banco Ganadero";
                break;
            case 14:
                lcmetodopago=" con el  metodo de pago  Multi Red";
                break;
            case 11:
                lcmetodopago=" con el  metodo de pago  Pago Express";
                break;
            case 13:
                lcmetodopago=" con el  metodo de pago  Banco BCP";
                break;
            default:
                lcmetodopago="";
       }

        var hrefwhatsapp="https://api.whatsapp.com/send?phone=+59175353593 &text=Hola , necesito asistencia tecnica sobre el pago para  el comercio <?= @$datosempresa->cDescripcion  ?>  " ;
        document.getElementById("ayudawhatsapp").href =hrefwhatsapp +lcmetodopago ;

        var hrefwhatsapp="" ;
        document.getElementById("ayudametodopago").href =lcurlvideometodopago;

    console.log(hrefwhatsapp);
   }

   cargartextometodo(100);

</script>