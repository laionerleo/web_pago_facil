// Step 3.  Configure Songbird

Cardinal.configure({
    logging: {
      level: 'on'
    }, 
  });

  // Step 4.  Listen for Events
Cardinal.on('payments.setupComplete', function(data){
  console.log('FROM payments.setupComplete');
  console.log('setupcomplete',data);
  sessionId = data.sessionId
  console.log("SessionID:",sessionId);
});

  Cardinal.on("payments.validated", function (data, jwt) {
    console.log('from payments.validated');
    console.log("dATA:",data,"ACTION_CODE:",data.ActionCode);

    
    if(jwt){
      console.log("jWT_DEVUELTO:",jwt);
      validate_jwt(jwt);
    }

    
    switch(data.ActionCode){
      case "SUCCESS":
        console.log('jwt linkser');
        console.log(jwt);
        //validate_jwt(jwt);
      break;
      case "NOACTION":
          console.log('validacion no action');
          // Handle no actionable outcome
          //$("#btncarga").hide();
          //$("#btnprepararpago").show();
          // swal("Mensaje", "Hubo un error al cargar los datos favor volver a ingresar o recargar la página", "error");

          
      break;
      case "FAILURE":
        console.log('validacion failure');
          $("#btncarga").hide();
          $("#btnprepararpago").show();
          swal("Mensaje", "Hubo un error al cargar los datos favor volver a ingresar o recargar la página", "error");
      // Handle failed transaction attempt
      break;
      case "ERROR":
        $("#btncarga").hide();
        $("#btnprepararpago").show();
        swal("Mensaje", "Hubo un error al cargar los datos favor volver a ingresar o recargar la página" , "error");
          console.log('validacion error');
      // Handle service level error
      break;
    }




  });

// Step 5.  Initialze Songbird
    Cardinal.setup("init", {
        jwt: document.getElementById("JWTContainer").value
    });

      


var sessionId;



console.log('JWT CREADO:', document.getElementById("JWTContainer").value);

function starCCALast(){

/***
* 
* 
*       CardExpMonth: document.getElementById('expirationDate').value.slice(0,2),
CardExpYear: 20 + document.getElementById('expirationDate').value.slice(-2,),
CardCode: document.getElementById('cvvCode').value,
*/

var creditCardNumber=$('#creditCardNumber').val();
var expirationDate=$('#expirationDate').val();
var cvvCode=$('#cvvCode').val();
var billingNumber=$('#cvvCode').val();
var emailAddress1=$('#emailAddress1').val();
var billingCountry=$('#billingCountry').val();
var billingState=$('#billingState').val();
var billingZip=$('#billingZip').val();
$("#btncarga").show();
$("#btnprepararpago").hide();

if(creditCardNumber.length>0  &&  creditCardNumber.length==19  &&  expirationDate.length >0     && cvvCode.length >0   && billingNumber.length >0    && emailAddress1.length >0 && billingCountry.length >0    && billingState.length >0  && billingZip.length >0       )
    {
        let data = this.getOrderObjectLast();
        console.log("startCCA",data)
        Cardinal.start("cca", data)
    }else{
      var lcTextoError="rellenar datos de";
        if(creditCardNumber.length!=19 )
        {
          lcTextoError=  lcTextoError+" tarjeta," ;
        }
        if(cvvCode.length  == 0 )
        {
          lcTextoError=  lcTextoError+" Cvv," ;
        }
        if(expirationDate.length==0 )
        {
          lcTextoError=  lcTextoError+" Año o Mes," ;
        }

        $("#btncarga").hide();
        $("#btnprepararpago").show();
        swal("Mensaje",lcTextoError.slice(0,-1) , "error");
    }
}



//Step 9: Order Object Requirements
function getOrderObjectLast(){

var incognita = document.getElementById('creditCardNumber').value;
arraycard =incognita.split('-');
console.log(arraycard);
var nuevocard=arraycard[0]+arraycard[1]+arraycard[2]+arraycard[3];


var valorselect  = document.getElementById('billingCountry').value;
var valor =  valorselect.split("-");
let orderObject = {
Consumer: {
    Account: {
        AccountNumber: nuevocard,
        ExpirationMonth: document.getElementById('expirationDate').value.slice(0,2),
        ExpirationYear: 20 + document.getElementById('expirationDate').value.slice(-2,),
        CardCode: document.getElementById('cvvCode').value
    }
    ,
    BillingAddress: {
        FirstName: document.getElementById('billingFirst').value,
        LastName: document.getElementById('billingLast').value,
        Address1: document.getElementById('billingAddress1').value,
        City: document.getElementById('billingCity').value,
        State: document.getElementById('billingState').value,
        PostalCode: document.getElementById('billingZip').value,
        CountryCode: valor[0]
    }
    ,
    OrderDetails: {
        OrderNumber: document.getElementById('OrderNumber').value, //15000 = 150
        Amount: parseInt(document.getElementById('Amount').value),
        CurrencyCode: document.getElementById('CurrencyCode').value,
        OrderChannel: 'P' // *** Add logic for how the order was placed ***
    }
}
};
console.log("OrderObject:",orderObject);
return orderObject;
}


var referenceID;
var transactionID;
// Step 12. JWT Validation
function validate_jwt(jwt) {

var urlajax=$("#urlvalidation").val()+"es/jwt_validation";             
var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
$.ajax({
  sync: 'true',
  type: 'POST',
  url: urlajax,
  data: {'tcJWT':jwt  , tnIdentificarPestaña:tnIdentificarPestaña},
 
  success: function(message) {
    message=JSON.parse(message);  
    console.log("Validate",message);
  
    if (message != '') {
      console.log("JWT calidado correctamente, pasando a enrollar...");
      transactionID=message.Payload.Payment.ProcessorTransactionId;
      referenceID=message.ReferenceId;
      console.log("referenceID", referenceID);
      EnrollProcess(message.Payload.Payment.ProcessorTransactionId);
    }
    else {

      console.log("ERRORRRRR")
      alert('ERROR:', message.message)
    };
  },
  error: function(xhr, status) {
    alert('Error in backend, validacion jwt')
  },

});
};

function EnrollProcess(tcTransactionID){
var urlajax=$("#urlvalidation").val()+"es/metodoatc";    



$.ajax({
  sync: 'true',
  type: 'POST',
  url: urlajax, 
  data: getDataEnroll(tcTransactionID),
  beforeSend:function( ) {   
    $("#btncarga").show();
    $("#btnprepararpago").hide();
    console.log("EnrollProcess BEFORE");
    

  },    
  success: function(response) {
    console.log("RESPONSEEE",response)
    response=JSON.parse(response);  
         
    if(response.tipo==10)
    {
        ///swal("Mensaje", response.mensaje , "success");
        $("#Idpedido").val(response.Idpedido);
        $('#vistaresultado').show();
        $("#textoresultado").text('EL PAGO SE A REALIZADO CON EXITO ');
        $("#divtransaccion").show();
        $("#lntransacccion").val(response.tnTransaccion);

        $("#resultado-tab").click();
        console.log(response);
        setTimeout('volveralcomercio()',5000);
        
            
    }
    if(response.tipo==1)
    {
        swal("Mensaje", response.mensaje , "error");
        //$("#mensaje").text(response.valor);
        $("#divtransaccion").show();
        $("#lntransacccion").val(response.valor);
        
        
    }

  },
  error: function(xhr, status) {
    alert('Error in backend, enroll process')
  },
  complete:function( ) {
    $("#btncarga").hide();
    $("#btnprepararpago").show();
    console.log("EnrollProcess complete");

    
},
});
};

var sAcsUrl = ''; //AcsURL que regresa CyberSource en el campo payerAuthEnrollReply_acsURL
var sPayload = ''; //PaReq que regresa CyberSource en el campo payerAuthEnrollReply_paReq
var sTransactionId = ''; //TransactionId que regresa CyberSource en el campo payerAuthEnrollReply_authenticationTransactionID

var continueObj;
var orderObj;


function continueFunction() {
console.log("continue function",continueObj, orderObj);
//if(sAcsUrl.length>1){
Cardinal.continue('cca',continueObj,orderObj);
//}
} 

function getDataEnroll(tcTransactionID){

var incognita = document.getElementById('creditCardNumber').value;
//console.log(incognita.replace(" - ", ""));
arraycard =incognita.split('-');
console.log(arraycard);
var nuevocard=arraycard[0]+arraycard[1]+arraycard[2]+arraycard[3];

var valorselect  = document.getElementById('billingCountry').value;
var valor =  valorselect.split("-");


var tnIdentificarPestaña = sessionStorage.getItem("gnIdentificadorPestana");
  

var obj={
tnCliente: document.getElementById('tnCliente').value,
tnEmpresa: document.getElementById('tnEmpresa').value,
tcCodigoClienteEmpresa: document.getElementById('tcCodigoClienteEmpresa').value,
tnMetodoPago: document.getElementById('tnMetodoPago').value,
tnFactura: document.getElementById('tnFactura').value,
tcPeriodo: document.getElementById('tcPeriodo').value,
tcApp: document.getElementById('tcApp').value,
tcMonto: parseFloat(document.getElementById('tcMonto').value),
tnMoneda: document.getElementById('tnMoneda').value,
tcComision: document.getElementById('tcComision').value,
tnCiNit: document.getElementById('tnCiNit').value,


CardNumber: nuevocard,//
CardExpMonth: document.getElementById('expirationDate').value.slice(0,2),
CardExpYear: 20 + document.getElementById('expirationDate').value.slice(-2,),
CardCode: document.getElementById('cvvCode').value,
BillingFirstName: document.getElementById('billingFirst').value,
BillingLastName: document.getElementById('billingLast').value,
BillingAddress1: document.getElementById('billingAddress1').value,
BillingAddress2: document.getElementById('billingAddress2').value,
BillingAddress3: ' ',
BillingCity: document.getElementById('billingCity').value,
BillingState: document.getElementById('billingState').value,
BillingPostalCode: document.getElementById('billingZip').value,
BillingCountryCode: valor[0],
MobilePhone: document.getElementById('billingNumber').value,
Email: document.getElementById('emailAddress1').value,
tcReferenceID: referenceID,
OrderNumber: document.getElementById('OrderNumber').value,
Amount: document.getElementById('Amount').value,
CurrencyCode: document.getElementById('CurrencyCode').value,
tcTransactionID : tcTransactionID,
tcFingerPrint : document.getElementById('sessionID').value,
mdd12 : document.getElementById('mdd12').value+" ",
mdd19 : document.getElementById('mdd19').value +" ",
mdd42 : document.getElementById('mdd42').value +" " ,
mdd11 : document.getElementById('mdd11').value+" ",
mdd17 : document.getElementById('mdd17').value+" " ,
mdd18 : document.getElementById('mdd18').value+" ",
swguardartarjeta : document.getElementById('swguardartarjeta').value,
tnIdentificarPestaña:tnIdentificarPestaña,
tnPedidoCheckout : document.getElementById('tnPedidoCheckout').value

};    
console.log(obj);
return obj;
};
