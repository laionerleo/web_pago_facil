<!doctype html>
<html class="no-js" lang="">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> PagoFacil Bolivia</title>
    <meta name="description" content="sitio Web para poder realizar tus pagos ">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php 
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Credentials: true ");
        header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
    ?>
    
    <!-- Primary Meta Tags -->
    <title> PagoFacil Bolivia</title>
<meta name="title" content="PagoFacil Bolivia">
<meta name="description" content="PagoFacil Bolivia es un motor de pago y de recaudación de productos y/o servicios en línea, a través de múltiples métodos de pago que se encuentra disponible las 24 horas del día." >

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://www.pagofacil.com.bo/online/">
<meta property="og:title" content="PagoFacil Bolivia">
<meta property="og:description" content="PagoFacil Bolivia es un motor de pago y de recaudación de productos y/o servicios en línea, a través de múltiples métodos de pago que se encuentra disponible las 24 horas del día.">

<meta property="og:image" content="https://pagofacil.com.bo/online//application//assets/assets/media/image/PortadaPagoFacil.png">
<meta property="og:image:secure_url" content="https://pagofacil.com.bo/online//application//assets/assets/media/image/PortadaPagoFacil.png">
<meta property="og:image:width" content="1920">
<meta property="og:image:height" content="1155">


<link rel="manifest" href="<?=  base_url() ?>/application/assets/pwa/manifest.json">

<script src="<?=  base_url() ?>/application/assets/pwa/js/main.js"></script>


    <!-- Favicon -->
        <!-- <link rel="shortcut icon" href="<?=  base_url() ?>/application/assets/assets/media/image/logo-pagofacil.png"/>  -->
        <link rel="shortcut icon" href="https://pagofacil.com.bo/wp-content/uploads/2017/11/favicon.png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/application/assets/login/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/application/assets/login/css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="font/flaticon.css">
    <!-- Google Web Fonts
    <link href="../../../../fonts.googleapis.com/css89ea.css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
     -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/application/assets/login/style.css">

    <style>
    
@media only screen and (max-width: 520px) {
    .cambiarimagen{
        background-image: url(<?= base_url() ?>/application/assets/assets/media/image/bannerpagofacilloginmovil.jpeg);
    }
}
@media only screen and (min-width: 560px) {
    .cambiarimagen{
        background-image: url(<?= base_url() ?>/application//assets/assets/media/image/PortadaPagoFacil.png);
    }
}
    
    </style>
</head>

<body>
     
    <section class="fxt-template-animation fxt-template-layout23 cambiarimagen" >          
        <div class="fxt-bg-overlay cambiarimagen"  style="background-size: cover;" >
            <div class="fxt-content">
                <div class="fxt-header" style="display:none">
                    <a href="login-23.html" class="fxt-logo"><img src="<?= base_url() ?>/application/assets/assets/media/image/logo-pagofacil.png" alt="Logo"></a> 
                </div>         
                <br><br>                 
                <div class="fxt-form"> 
                    
                    <form id="form_login">
                    <div class="form-group" > 
                            <div class="fxt-transformY-50 fxt-transition-delay-1">                                              
                                <input type="text" style="display:none ;opacity: 1;" id="inpnombre" name="inpnombre" class="form-control"  placeholder="Nombre" required="required" style=" background-color: white;  color: black;opacity: 1;"   >
                            </div>
                        </div>
                        
                        <div class="form-group"> 
                            <div class="fxt-transformY-50 fxt-transition-delay-1">                                              
                                <input type="text" id="inpapellido" style="display:none ;color: Black;opacity: 1;" name="inpapellido" class="form-control" placeholder="Apellido" required="required" style=" background-color: white;  color: black;opacity: 1;"   >
                            </div>
                        </div>
                        
                        <div class="form-group"> 
                            <div class="fxt-transformY-50 fxt-transition-delay-1">                                              
                                <input type="text" id="inpnumero" name="inpnumero" style="display:none ;opacity: 1;  background-color: white " class="form-control" placeholder="Telefono" required="required" style=" background-color: white;  color: black;opacity: 1;"   >
                            </div>
                        </div>
                        
                        <div class="form-group"> 
                            <div class="fxt-transformY-50 fxt-transition-delay-1">                                              
                                <input type="text" id="inpcorreo" name="inpcorreo" style="display:none ;  background-color: white;  color: black; opacity: 1" class="form-control"  placeholder="Correo" required="required"  >
                            </div>
                        </div>
                        
                        <div class="form-group"> 
                            <div class="fxt-transformY-50 fxt-transition-delay-1">                                              
                                <input type="text" id="usuario" name="usuario" class="form-control" name="Login" placeholder="Usuario" required="required" style=" background-color: white;  color: black; opacity: 1;"   >
                            </div>
                        </div>
                        <div class="form-group">  
                            <div class="fxt-transformY-50 fxt-transition-delay-2">                                              
                                <input id="contraseña" name ="contraseña" type="password" class="form-control" placeholder="********" required="required" style=" background-color: white;  color: black;opacity: 1;" >
                                <i toggle="#password" id="contraseñaojo" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="fxt-transformY-50 fxt-transition-delay-3">
                                <a  id="forgot_password" onclick="recuperarcontraseña1()" alt="Descripción de la imagen" style="color: rgb(43, 106, 253);   white-space: nowrap;" target="_blank">
                                        <span>¿Olvidó su contraseña?</span>
                                </a>

                                <a  id="forgot_password" onclick="Registrate()" alt="Descripción de la imagen" style="color: rgb(43, 106, 253);   white-space: nowrap;" target="_blank">
                                        <span>&nbsp; &nbsp; &nbsp; &nbsp;Crear Cuenta</span>
                                </a>
                            
                                <h5 id="mensaje" style="color:green" > <?=@$_GET['m']?></h5>
                                <input type="hidden" id ="url" value="<?= $url ?>">
                            </div>
                        </div>
                        <div class="form-group">
                        
                            <div class="fxt-transformY-50 fxt-transition-delay-4">  
                                <input type="button" class="fxt-btn-fill" name="" id="btnlogin" onclick="realizar_login()" value="Iniciar sesión">
                                <input type="button" class="fxt-btn-fill" name="" style="display:none" id="btnloginwhatsapp" onclick="VerificarPin()" value="Verificar Pin">
                                <input type="button" class="fxt-btn-fill" name="" style="display:none" id="btnwhatsapp" onclick="ObtenerPin()" value="Obtener PIN">
                                <input type="button" class="fxt-btn-fill" name="" style="display:none" id="btncarga" disabled value="Cargando">
                                
                                <input type="button" class="fxt-btn-fill"  name="" style="display:none" id="btnrecuperar" onclick="RecuperarContraseñaWhatsapp()" value="Pedir Nueva Contraseña">
                                 <input type="button" class="fxt-btn-fill" name="" id="btnregistrar" style="display:none " onclick="realizar_registro()" value="Agregar"> 
                               <!-- <input type="button" class="fxt-btn-fill"  name="" id="btnregistrate" onclick="Registrate()" value="Registrarse"> -->
                                <input type="button" class="fxt-btn-fill" name="" style="display:none" id="btnlogininvitado" onclick="realizar_login_invitado()" value="Ingresar como Invitadoold ">
                                

                            </div>
                        </div>
                    </form>                
                </div> 
                <div class="fxt-style-line"> 
                    <div class="fxt-transformY-50 fxt-transition-delay-5">                                
                        O Ingresar por
                    </div>
                </div>
                <ul class="fxt-socials">
                    <li  style="    display: contents;" >
                            <a href="<?php echo @$loginURL; ?>" title="google"> <img style="width: 37px; height: -webkit-fill-available;" src="<?= base_url() ?>/application/assets/assets/media/image/iconogoogle.svg" alt=""></a>
                    </li>                                    
                    <li style="    display: contents;" >
                            <a href="<?php echo @$authURL; ?>" title="Facebook">  <img style=" height: inherit;" src="<?= base_url() ?>/application/assets/assets/media/image/icons8-facebook2.svg" alt=""></a>
                    </li>   
                    <li style="    display: contents;" >
                        <a   title="whatsapp" onclick="vistawhatsapp()">  <img style=" height: inherit;" src="<?= base_url() ?>/application/assets/assets/media/image/iconowhatsapp.svg" alt=""></a>
                    </li>
                    <li style="    display: contents;" >
                        <a   title="Invitado" onclick="realizar_login_invitado()">  <img style=" height: inherit;" src="<?= base_url() ?>/application/assets/assets/media/image/iconoinvitado.png" alt=""></a>
                    </li>
                                                  
                </ul>
                <div class="fxt-footer">
                    <div class="fxt-transformY-50 fxt-transition-delay-9">  
             
                    </div> 
                </div> 
            </div>
        </div>
    </section>
    <script>
      
            
    function realizar_login()
		{
			var datos=$("#form_login").serialize();
			var urlajax=$("#url").val()+"login_user";   
            var urlsucces=$("#url").val()+"pagorapido";   
            if($("#usuario").val().length>0  &&  $("#contraseña").val().length>0  )
            {
                $.ajax({                    
                url: urlajax,
                data: {datos},
                type : 'POST',
                dataType: "json",
                beforeSend:function( ) {  
                    $("#mensaje").text('...'); 
                    $("#btncarga").show();
                    $("#btnlogin").hide();

                },                    
                success:function(response) {
                
                console.log(response);
                if(response.tipo=="1")
                    //if(response==0)
                    {
                        $("#mensaje").css("color","black");
                        $("#mensaje").text("Ingreso Exitoso "); 

                 
                        window.location.href = urlsucces;
                        //location.reload();
                        
                    }
                    if(response.tipo=="3")
                    {
                        $("#mensaje").css("color","red");
                        $("#mensaje").text(response.mensaje);
                       
                    }
                    
                },
                error: function (data) {
                    //console.log(data);
                    $("#mensaje").css("color","red");
                    $("#mensaje").text('A ocurrido algun error en el sistema o la conexion de internet');
                  
                },               
                complete:function( ) {
                    //$("#waitLoadinglogin").fadeOut(1000);  
                    $("#btnlogin").show();
                    $("#btncarga").hide();
                },
            }
            ); 


            }else{
                //alert("Falta rellenar datos ");
                $("#mensaje").css("color","red");
                $("#mensaje").text('Falta Rellenar datos ');
            }
                 
            
		}

            
        function realizar_login_invitado()
		{
            var urlajax=$("#url").val()+"login_invitado"; 
			var datos=$("#form_login").serialize();
            var urlsucces=$("#url").val()+"pagorapido";   

                $.ajax({                    
                url: urlajax,
                data: {datos},
                type : 'POST',
                dataType: "json",
                beforeSend:function( ) {  
                    $("#mensaje").text('...'); 
                 //   $("#btncarga").show();
                  //  $("#btnlogininvitado").hide();

                },                    
                success:function(response) {
                    console.log(response);    
                    if(response==0)
                    {
                        $("#mensaje").css("color","black");
                        $("#mensaje").text("Ingreso Exitoso "); 
                        window.location.href = urlsucces;
                        //location.reload();
                    }else{
                        $("#mensaje").css("color","red");
                        $("#mensaje").text('usuario o contraseña incorrectos');
                       
                    }
                },
                error: function (data) {
                    //console.log(data);
                    $("#mensaje").css("color","red");
                    $("#mensaje").text('A ocurrido algun error en el sistema o la conexion de internet');
                },               
                complete:function( ) {
                    //$("#waitLoadinglogin").fadeOut(1000);  
                //    $("#btnlogininvitado").show();
                  //  $("#btncarga").hide();
                },
            }
            ); 

    
            
		}
        
        sw=1;
        function realizar_registro()
		{
            var lcContraseña=$("#contraseña").val();
            if( validarContraseña(lcContraseña) )
            {
                var datos=$("#form_login").serialize();
                var urlajax=$("#url").val()+"login_registro";   
                var urlsucces=$("#url").val()+"pagorapido";   
                    
                $.ajax({                    
                    url: urlajax,
                    data: {datos},
                    type : 'POST',
                    dataType: "json",
                    beforeSend:function( ) {   
                        //$("#waitLoadinglogin").fadeIn(1000);
                    },                    
                    success:function(response) {
                    
                        console.log(response);
                    
                            if(response==0)
                            {
                                alert("se registro con Exito");
                                window.location.href = urlsucces;
                                //location.reload();
                                
                            }
                        
                    },
                    error: function (data) {
                        //console.log(data);
                        $("#mensaje").text('usuario o contraseña incorrectos');
                    
                    },               
                    complete:function( ) {
                        //$("#waitLoadinglogin").fadeOut(1000);  
                    },
                }); 
            }else{
                //$("#mensaje").text('usuario o contraseña incorrectos');
                $("#mensaje").css("color","red");
                $("#mensaje").css("color", "red");

                // Crear una lista de requisitos con formato HTML
                let mensaje = `
                    <ul>
                        <li>✔ Tener al menos 8 caracteres.</li>
                        <li>✔ Contener al menos una letra mayúscula.</li>
                        <li>✔ Contener al menos un número.</li>
                    </ul>
                `;

                // Mostrar el mensaje en el div con id="mensaje" con HTML formateado
                $("#mensaje").html(mensaje);

            }
			

		}

        function validarContraseña(texto) {
                // Verificar si la longitud es mayor o igual a 8
                if (texto.length < 8) {
                    return false;
                }
                
                // Verificar si contiene al menos una letra mayúscula
                const tieneMayuscula = /[A-Z]/.test(texto);
                
                // Verificar si contiene al menos un número
                const tieneNumero = /\d/.test(texto);
                
                // Validar que tenga mayúsculas y números
                return tieneMayuscula && tieneNumero;
            }

        function Registrate()
        {
            // aqui entra para habilitar 
            if(sw==1)
            {
                usuario
                $("#usuario").val('');
                $("#contraseña").val('');
            $("#inpnombre").show();
            $("#inpapellido").show();
            $("#inpnumero").show();
            $("#inpcorreo").show();
            $('#btnlogin').hide();
            $('#btnregistrar').show();
            
            sw=2;
            }else{
                $("#inpnombre").hide();
            $("#inpapellido").hide();
            $("#inpnumero").hide();
            $("#inpcorreo").hide();
            $('#btnlogin').show();
            $('#btnregistrar').hide();
            sw=1;
            }
            
            

        }

        function recuperarcontraseña1()
        {
            // aqui entra para habilitar 
            if(swrecuperar==1)
            {
                $("#inpnumero").val('');
                $("#inpcorreo").val('');
                $("#usuario").hide();
                $("#contraseña").hide();
                $("#inpnumero").show();
                $("#inpcorreo").show();
                $('#btnrecuperar').show();
                $('#btnlogin').hide();
                $('#btnregistrar').hide();
                $('#btnregistrate').hide();
                $('#contraseñaojo').hide();
                $('#btnlogininvitado').hide();
                $('#btnwhatsapp').hide();
                $("#mensaje").text('Colocar su  correo y telefono de su cuenta Pagofacil ');
                swrecuperar=2;
            }else{
                $("#inpnombre").hide();
                $("#inpnumero").hide();
                $("#contraseña").show();
                $("#inpcorreo").hide();
                $("#usuario").show();
                $("#usuario").val($("#inpcorreo").val());
                
                $('#btnlogin').show();

                $('#btnrecuperar').hide();
                $('#btnlogin').show();
                $('#btnregistrar').hide();
                $('#btnregistrate').show();
                $('#contraseñaojo').show();
                $('#btnrecuperar').hide();
                
               // $("#mensaje").text('');
                swrecuperar=1;
            }
        }

        function RecuperarContraseñaWhatsapp()
        {
            
            var datos=$("#form_login").serialize();
			var urlajax=$("#url").val()+"cambiarcontrasenawhastapp";   
            //var urlsucces=$("#url").val()+"pagorapido";   
            if($("#inpnumero").val().length>0  &&  $("#inpcorreo").val().length>0  )
            {
                $.ajax({                    
                url: urlajax,
                data: {datos},
                type : 'POST',
                dataType: "json",
                beforeSend:function( ) {  
                    $("#mensaje").text('...'); 
                    $("#btncarga").show();
                    $("#btnlogin").hide();

                },                    
                success:function(response) {
                
                console.log(response);
                console.log(response.error);
                console.log(response.message);
            
                    if(response.error==1)
                    {
                        $("#mensaje").css("color","red");
                        $("#mensaje").text(response.message);
                         
                    }
                    if(response.error==0)
                    {
                        $("#mensaje").css("color","green");
                        $("#mensaje").text(response.message);
                        //location.reload();
                        recuperarcontraseña1();
                        
                        $("#contraseña").val('');
                    }
                },
                error: function (data) {
                    //console.log(data);
                    $("#mensaje").css("color","red");
                    $("#mensaje").text('A ocurrido algun error en el sistema o la conexion de internet');
                  
                },               
                complete:function( ) {
                    //$("#waitLoadinglogin").fadeOut(1000);  
                    $("#btnlogin").show();
                    $("#btncarga").hide();
                },
            }
            ); 


            }else{
                //alert("Falta rellenar datos ");
                $("#mensaje").css("color","red");
                $("#mensaje").text('Falta Rellenar datos ');
            }
        }


        function vistawhatsapp()
        {
            // aqui entra para habilitar 
            if(swrecuperarwhatsapp==1)
            {
                $("#inpnumero").val('');
                $("#inpcorreo").val('');
                $("#usuario").hide();
                $("#contraseña").hide();
                $("#inpnumero").show();
                $("#inpcorreo").show();
                $('#btnwhatsapp').show();
                $('#btnlogin').hide();
                $('#btnregistrar').hide();
                $('#btnregistrate').hide();
                $('#contraseñaojo').hide();
                $('#btnlogininvitado').hide();
                $("#mensaje").text('Colocar su  correo y telefono de su cuenta Pagofacil ');
                swrecuperarwhatsapp=2;
            }else{
                $("#inpnombre").hide();
                $("#inpnumero").hide();
                $("#contraseña").show();
                $("#inpcorreo").hide();
                $("#usuario").show();
                $("#usuario").val($("#inpcorreo").val());
                
                $('#btnlogin').show();

                $('#btnwhatsapp').hide();
                $('#btnlogin').show();
                $('#btnregistrar').hide();
                $('#btnregistrate').show();
                $('#contraseñaojo').show();
                $('#btnrecuperar').hide();
               // $("#mensaje").text('');
               swrecuperarwhatsapp=1;
            }
        }

        function ObtenerPin()
        {
            
            var datos=$("#form_login").serialize();
			var urlajax=$("#url").val()+"obtenerpiningreso";     
            if($("#inpnumero").val().length>0  &&  $("#inpcorreo").val().length>0  )
            {
                $.ajax({                    
                url: urlajax,
                data: {datos},
                type : 'POST',
                dataType: "json",
                beforeSend:function( ) {  
                    $("#mensaje").text('...'); 
                  

                },                    
                success:function(response) {
              
                    console.log(response);
                    console.log(response.estado);
                    console.log(response.mensaje);
                if(response.estado==0)
                {   
                    $("#mensaje").text(response.mensaje);
                    $('#btnloginwhatsapp').show();
                    $('#btnwhatsapp').hide();
                    $('#inpcorreo').hide();
                    $("#inpnumero").attr("placeholder", "Pin");
                    $("#inpnumero").val("");
                    
                }else{
                    $("#mensaje").text(response.mensaje); 
                }
                

                
            
                
                },
                error: function (data) {
                    //console.log(data);
                    $("#mensaje").css("color","red");
                    $("#mensaje").text('A ocurrido algun error en el sistema o la conexion de internet');
                  
                },               
                complete:function( ) {
                    //$("#waitLoadinglogin").fadeOut(1000);  
                 
                },
            }
            ); 


            }else{
                //alert("Falta rellenar datos ");
                $("#mensaje").css("color","red");
                $("#mensaje").text('Falta Rellenar datos ');
            }
        }
        function VerificarPin()
        {
            
            var datos=$("#form_login").serialize();
			var urlajax=$("#url").val()+"verificarpin";   
            var urlsucces=$("#url").val()+"pagorapido";    
            if($("#inpnumero").val().length>0 )
            {
                $.ajax({                    
                url: urlajax,
                data: {datos},
                type : 'POST',
                dataType: "json",
                beforeSend:function( ) {  
                    $("#mensaje").text('...'); 
                },                    
                success:function(response) {
                
                    console.log(response);
                    console.log(response.estado);
                    if(response.estado==0)
                    {   
                        $("#mensaje").text(response.mensaje);
                        window.location.href = urlsucces;
                    }else{
                        $("#mensaje").text(response.mensaje); 
                    }
                },
                error: function (data) {
                    //console.log(data);
                    $("#mensaje").css("color","red");
                    $("#mensaje").text('A ocurrido algun error en el sistema o la conexion de internet');
                  
                },               
                complete:function( ) {
                    //$("#waitLoadinglogin").fadeOut(1000);  
                 
                },
            }
            ); 


            }else{
                //alert("Falta rellenar datos ");
                $("#mensaje").css("color","red");
                $("#mensaje").text('Falta Rellenar datos ');
            }
        }


    </script>
    <!-- jquery-->
    <script src="<?= base_url() ?>/application/assets/login/js/jquery-3.5.0.min.js"></script>
    <!-- Popper js -->
    <script src="<?= base_url() ?>/application/assets/login/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?= base_url() ?>/application/assets/login/js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="<?= base_url() ?>/application/assets/login/js/imagesloaded.pkgd.min.js"></script>    
    <!-- Validator js -->
    <script src="<?= base_url() ?>/application/assets/login/js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="<?= base_url() ?>/application/assets/login/js/main.js"></script>
    <script>
        sw=1;
        swrecuperar=1;
        swrecuperarwhatsapp = 1;
          $('#contraseñaojo').on("click",function(event) {
            if(sw==1)
            {
                $('#contraseña').attr("type","text");
                sw=2;
            }else{
                $('#contraseña').attr("type","password");
                sw=1;
            }
            
            });

    </script>

</body>


</html>