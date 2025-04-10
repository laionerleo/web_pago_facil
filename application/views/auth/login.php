<!doctype html>
<html class="no-js" lang="">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> PagoFacil Bolivia</title>
    <meta name="description" content="sitio Web para poder realizar tus pagos ">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Primary Meta Tags -->
    <title> PagoFacil Bolivia</title>
    <meta name="title" content="PagoFacil Bolivia">
    <meta name="description"
        content="PagoFacil Bolivia es un motor de pago y de recaudación de productos y/o servicios en línea, a través de múltiples métodos de pago que se encuentra disponible las 24 horas del día.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.pagofacil.com.bo/online/">
    <meta property="og:title" content="PagoFacil Bolivia">
    <meta property="og:description"
        content="PagoFacil Bolivia es un motor de pago y de recaudación de productos y/o servicios en línea, a través de múltiples métodos de pago que se encuentra disponible las 24 horas del día.">
    <meta property="og:image" content="<?= base_url() ?>/application/assets/assets/media/image/portada-web.png">
    <meta property="og:image:secure_url"
        content="<?= base_url() ?>/application/assets/assets/media/image/portada-web.png">
    <meta property="og:image:width" content="1920">
    <meta property="og:image:height" content="1155">
    <link rel="manifest" href="<?= base_url() ?>/application/assets/pwa/manifest.json">
    <script src="<?= base_url() ?>/application/assets/pwa/js/main.js"></script>
    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="<?= base_url() ?>/application/assets/assets/media/image/logo-pagofacil.png"/>  -->
    <link rel="shortcut icon" href="https://pagofacil.com.bo/wp-content/uploads/2017/11/favicon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/application/assets/login/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/application/assets/login/css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="font/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="../../../../fonts.googleapis.com/css89ea.css?family=Roboto:300,400,500,700&amp;display=swap"
        rel="stylesheet">
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/application/assets/login/style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        @media (max-width: 768px) {
            body.account-body {
                background: url('<?= base_url() ?>/application/assets/assets/media/image/portada-mobile.png') no-repeat center bottom !important;
                background-size: contain !important;
                background-attachment: fixed !important;
            }

            .centering {
                justify-content: center !important;
                padding-left: 2rem !important;
                padding-right: 2rem !important;
            }

            .form-label {
                display: none !important;
            }

            .login-card .card-body {
                display: block !important;
                background: transparent !important;
                padding: 0 !important;
            }

            .mobile-placeholder::placeholder {
                color: #7F7F7F !important;
                opacity: 1;
            }
        }
    </style>
</head>

<body class="account-body" style="
    background: linear-gradient(to right, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 1) 100%), 
                url('<?= base_url() ?>/application/assets/assets/media/image/portada-web.png');
    background-size: 100% 100vh;
">
    <div class="container">
        <div class="row d-flex justify-content-start align-items-center centering">
            <div class="col-12 col-md-6 col-xl-4" style="margin-top: 50px;">
                <section class="py-3 py-md-5 py-xl-8">
                    <div class="card shadow-lg border-0 rounded-4 px-4 py-4" style="background-color: white;">
                        <div class="text-center mb-4">
                            <img src="<?= base_url() ?>/application/assets/assets/media/image/logo-pagofacil.png"
                                alt="Logo" class="img-fluid" style="height: 60px;">
                        </div>
                        <form id="form_login">
                            <div class="row">
                                <div class="col-12">
                                    <label for="usuario" class="form-label"
                                        style="margin-left: 20px; margin-bottom: 5px;">Usuario</label>
                                    <input type="text" class="form-control mobile-placeholder" name="usuario"
                                        id="usuario" required
                                        style="height: 40px; background-color: #E5E5E5; border-radius: 1.25rem; border-color: #E5E5E5;">
                                </div>
                                <div class="col-12">
                                    <label for="contraseña" class="form-label"
                                        style="margin-left: 20px; margin-bottom: 5px;margin-top: 10px;">Contraseña</label>
                                    <input type="password" class="form-control mobile-placeholder" name="contraseña"
                                        id="contraseña" required
                                        style="height: 40px; background-color: #E5E5E5; border-radius: 1.25rem; border-color: #E5E5E5;">
                                </div>
                                <div class="col-12 d-flex justify-content-around" style="margin-top: 10px;">
                                    <a href="<?= base_url() ?>auth/recuperar_contraseña"
                                        style="font-size: 0.9rem; color: #035da4; text-decoration: none; font-weight: 500;">
                                        ¿Olvidaste tu contraseña?
                                    </a>
                                    <a href="javascript:void(0)" id="contraseñaojo"
                                        style="font-size: 0.9rem; color: #035da4; text-decoration: none; font-weight: 500;">
                                        Crear cuenta
                                    </a>
                                </div>

                                <div class="col-12">
                                    <h6 id="mensaje" class="text-danger"><?= @$_GET['m'] ?></h6>
                                    <input type="hidden" id="url" value="<?= $url ?>">
                                </div>
                                <div class="col-12">
                                    <button id="btnlogin" class="btn btn-lg w-100"
                                        style="background: linear-gradient(to right, #FF7601, #FF9A3D); border-radius: 1.25rem; color: white; border: 2px solid #FF7601; transition: 0.3s;"
                                        onmouseover="this.style.backgroundColor='white'; this.style.color='#FF7601'"
                                        onmouseout="this.style.backgroundColor='#FF7601'; this.style.color='white'"
                                        onclick="realizar_login()" type="submit">
                                        Acceder
                                    </button>

                                    <button id="btncarga" class="btn btn-lg w-100 mt-2" type="button"
                                        style="display:none; background-color: #FF7601; border-radius: 1.25rem; color: white; border: 2px solid #FF7601;"
                                        disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Verificando...
                                    </button>

                                    <button id="btnregistrar" class="btn btn-lg w-100 mt-2" type="submit"
                                        style="display:none; background-color: #FF7601; border-radius: 1.25rem; color: white; border: 2px solid #FF7601; transition: 0.3s;"
                                        onmouseover="this.style.backgroundColor='white'; this.style.color='#FF7601'"
                                        onmouseout="this.style.backgroundColor='#FF7601'; this.style.color='white'"
                                        onclick="realizar_registro()">
                                        Registrar
                                    </button>

                                    <button id="btnregistrate" class="btn btn-lg w-100 mt-2" type="button"
                                        style="display:none; background-color: #FF7601; border-radius: 1.25rem; color: white; border: 2px solid #FF7601;"
                                        onclick="Registrate()" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Verificando...
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <h6 class="mb-2" style="font-size: 0.9rem; color: #035da4;">O ingresar por</h6>

                            <a href="<?php echo @$loginURL; ?>"
                                class="btn d-flex align-items-center justify-content-center gap-2 px-3 mb-2"
                                style="width: 100%; height: 42px; border-radius: 1.25rem; font-size: 0.9rem; border: 2px solid #0070B4; color: #000000; transition: all 0.3s; padding-top: 4px; padding-bottom: 4px;"
                                onmouseover="this.style.backgroundColor='#007FCC'; this.style.color='white'"
                                onmouseout="this.style.backgroundColor='white'; this.style.color='#000000'">
                                <img src="<?= base_url() ?>/application/assets/assets/media/image/iconogoogle.svg"
                                    style="width:20px;">
                                <span>Continuar con Google</span>
                            </a>

                            <a href="<?php echo $authURL; ?>"
                                class="btn d-flex align-items-center justify-content-center gap-2 px-3"
                                style="width: 100%; height: 42px; border-radius: 1.25rem; font-size: 0.9rem; border: 2px solid #0070B4; color: #000000; transition: all 0.3s; padding-top: 4px; padding-bottom: 4px;"
                                onmouseover="this.style.backgroundColor='#007FCC'; this.style.color='white'"
                                onmouseout="this.style.backgroundColor='white'; this.style.color='#000000'">
                                <img src="<?= base_url() ?>/application/assets/assets/media/image/icons8-facebook2.svg"
                                    style="width:20px;">
                                <span>Continuar con Facebook</span>
                            </a>
                            <a href="<?php echo $authURL; ?>"
                                class="btn d-flex align-items-center justify-content-center gap-2 px-3"
                                style="width: 100%; height: 42px; border-radius: 1.25rem; font-size: 0.9rem; border: 2px solid #0070B4; color: #000000; transition: all 0.3s; padding-top: 4px; padding-bottom: 4px;"
                                onmouseover="this.style.backgroundColor='#007FCC'; this.style.color='white'"
                                onmouseout="this.style.backgroundColor='white'; this.style.color='#000000'">
                                <img src="<?= base_url() ?>/application/assets/assets/media/image/icons8-facebook2.svg"
                                    style="width:20px;">
                                <span>Continuar con Facebook</span>
                            </a>
                            <a href="<?php echo $authURL; ?>"
                                class="btn d-flex align-items-center justify-content-center gap-2 px-3"
                                style="width: 100%; height: 42px; border-radius: 1.25rem; font-size: 0.9rem; border: 2px solid #0070B4; color: #000000; transition: all 0.3s; padding-top: 4px; padding-bottom: 4px;"
                                onmouseover="this.style.backgroundColor='#007FCC'; this.style.color='white'"
                                onmouseout="this.style.backgroundColor='white'; this.style.color='#000000'">
                                <img src="<?= base_url() ?>/application/assets/assets/media/image/icons8-facebook2.svg"
                                    style="width:20px;">
                                <span>Continuar con Facebook</span>
                            </a>
                        </div>


                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>


        function realizar_login() {
            var datos = $("#form_login").serialize();
            var urlajax = $("#url").val() + "login_user";
            var urlsucces = $("#url").val() + "pagorapido";
            if ($("#usuario").val().length > 0 && $("#contraseña").val().length > 0) {
                $.ajax({
                    url: urlajax,
                    data: { datos },
                    type: 'POST',
                    dataType: "json",
                    beforeSend: function () {
                        $("#mensaje").text('...');
                        $("#btncarga").show();
                        $("#btnlogin").hide();

                    },
                    success: function (response) {

                        console.log(response);

                        if (response == 0) {
                            $("#mensaje").css("color", "black");
                            $("#mensaje").text("Ingreso Exitoso ");


                            window.location.href = urlsucces;
                            //location.reload();

                        } else {
                            $("#mensaje").css("color", "red");
                            $("#mensaje").text('usuario o contraseña incorrectos');

                        }

                    },
                    error: function (data) {
                        //console.log(data);
                        $("#mensaje").css("color", "red");
                        $("#mensaje").text('A ocurrido algun error en el sistema o la conexion de internet');

                    },
                    complete: function () {
                        //$("#waitLoadinglogin").fadeOut(1000);  
                        $("#btnlogin").show();
                        $("#btncarga").hide();
                    },
                }
                );


            } else {
                //alert("Falta rellenar datos ");
                $("#mensaje").css("color", "red");
                $("#mensaje").text('Falta Rellenar datos ');
            }


        }
        sw = 1;
        function realizar_registro() {
            var datos = $("#form_login").serialize();
            var urlajax = $("#url").val() + "login_registro";
            var urlsucces = $("#url").val() + "pagorapido";

            $.ajax({
                url: urlajax,
                data: { datos },
                type: 'POST',
                dataType: "json",
                beforeSend: function () {
                    //$("#waitLoadinglogin").fadeIn(1000);
                },
                success: function (response) {

                    console.log(response);

                    if (response == 0) {
                        alert("se registro con Exito");
                        window.location.href = urlsucces;
                        //location.reload();

                    }

                },
                error: function (data) {
                    //console.log(data);
                    $("#mensaje").text('usuario o contraseña incorrectos');

                },
                complete: function () {
                    //$("#waitLoadinglogin").fadeOut(1000);  
                },
            }
            );

        }
        function Registrate() {
            // aqui entra para habilitar 
            if (sw == 1) {
                usuario
                $("#usuario").val('');
                $("#contraseña").val('');
                $("#inpnombre").show();
                $("#inpapellido").show();
                $("#inpnumero").show();
                $("#inpcorreo").show();
                $('#btnlogin').hide();
                $('#btnregistrar').show();

                sw = 2;
            } else {
                $("#inpnombre").hide();
                $("#inpapellido").hide();
                $("#inpnumero").hide();
                $("#inpcorreo").hide();
                $('#btnlogin').show();
                $('#btnregistrar').hide();
                sw = 1;
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
        sw = 1;
        $('#contraseñaojo').on("click", function (event) {
            if (sw == 1) {
                $('#contraseña').attr("type", "text");
                sw = 2;
            } else {
                $('#contraseña').attr("type", "password");
                sw = 1;
            }

        });

    </script>

</body>


</html>