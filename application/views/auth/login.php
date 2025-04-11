<!doctype html>
<html class="no-js" lang="es">


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
                background-size: cover !important;
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

            .margins {
                margin-top: 10px !important;
            }
        }
    </style>
</head>

<body class="account-body" style="
    background: linear-gradient(to right, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 1) 100%), 
                url('<?= base_url() ?>/application/assets/assets/media/image/portada-web.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center top;
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
                                <div class="col-12 fxt-transformY-50 fxt-transition-delay-1 margins"
                                    style="display: block;">
                                    <label for="Usuario" class="form-label" style="margin-left: 20px; ">Usuario</label>
                                    <input type="text" class="form-control mobile-placeholder" name="usuario"
                                        id="usuario" required
                                        style="height: 40px; background-color: #E5E5E5; border-radius: 1.25rem; border-color: #E5E5E5;">
                                </div>
                                <div class="col-12 margins">
                                    <label for="contraseña" class="form-label"
                                        style="margin-left: 20px; margin-bottom: 5px; margin-top: 10px;">Contraseña</label>
                                    <input type="password" class="form-control mobile-placeholder" name="contraseña"
                                        id="contraseña" required
                                        style="height: 40px; background-color: #E5E5E5; border-radius: 1.25rem; border-color: #E5E5E5;">
                                </div>
                                <div class="col-12 d-flex justify-content-around" style="margin-top: 10px;">
                                    <a href="javascript:void(0)" id="recuperar-contra"
                                        style="font-size: 0.9rem; color: #035da4; text-decoration: none; font-weight: 500;">
                                        ¿Olvidaste tu contraseña?
                                    </a>
                                    <a href="javascript:void(0)" id="btn-crear-cuenta"
                                        style="font-size: 0.9rem; color: #035da4; text-decoration: none; font-weight: 500;">
                                        Crear cuenta
                                    </a>
                                </div>

                                <div class="col-12">
                                    <h6 id="mensaje" class="text-danger"></h6>
                                    <input type="hidden" id="url" value="<?= $url ?>">
                                </div>
                                <div class="col-12">
                                    <button id="btnregister" class="btn btn-lg w-100"
                                        style="background: linear-gradient(to right, #FF9A3D, #FF7601); border-radius: 1.25rem; color: white; border: 2px solid #FF7601; transition: 0.3s;"
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
                                </div>
                            </div>
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
                                <!-- <a class="btn d-flex align-items-center justify-content-center gap-2 px-3 mb-2"
                                    style="width: 100%; height: 42px; border-radius: 1.25rem; font-size: 0.9rem; border: 2px solid #0070B4; color: #000000; transition: all 0.3s; padding-top: 4px; padding-bottom: 4px;"
                                    onmouseover="this.style.backgroundColor='#007FCC'; this.style.color='white'"
                                    onmouseout="this.style.backgroundColor='white'; this.style.color='#000000'"
                                    id="btnloginwhatsapp">
                                    <img src="<?= base_url() ?>/application/assets/assets/media/image/iconowhatsapp.svg"
                                        style="width:20px;">
                                    <span>Continuar con WhatsApp</span>
                                </a> -->


                                <!-- <input type="button" class="fxt-btn-fill" name="" style="display:none" id="btnlogininvitado" onclick="realizar_login_invitado()" value="Ingresar como Invitadoold "> -->
                                <a class="btn d-flex align-items-center justify-content-center gap-2 px-3 mb-2"
                                    style="width: 100%; height: 42px; border-radius: 1.25rem; font-size: 0.9rem; border: 2px solid #0070B4; color: #000000; transition: all 0.3s; padding-top: 4px; padding-bottom: 4px;"
                                    onmouseover="this.style.backgroundColor='#007FCC'; this.style.color='white'"
                                    onmouseout="this.style.backgroundColor='white'; this.style.color='#000000'"
                                    id="btnlogininvitado" onclick="realizar_login_invitado()">
                                    <img src="<?= base_url() ?>/application/assets/assets/media/image/iconoinvitado.png"
                                        style="width:20px;">
                                    <span>Continuar como Invitado</span>
                                </a>


                            </div>
                        </form>


                        <form id="form_register" style="display: none;">
                            <div class="row">
                                <div class="col-12 fxt-transformY-50 fxt-transition-delay-1" style="display: block;">
                                    <label for="Nombre" class="form-label" style="margin-left: 20px; ">Nombre</label>
                                    <input type="text" class="form-control mobile-placeholder" name="inpnombre"
                                        id="inpnombre" required
                                        style="height: 40px; background-color: #E5E5E5; border-radius: 1.25rem; border-color: #E5E5E5;"
                                        placeholder="Ingrese su Nombre Completo">
                                </div>

                                <div class="col-12 fxt-transformY-50 fxt-transition-delay-1" style="display: block;">
                                    <label for="Apellido" class="form-label"
                                        style="margin-left: 20px; ">Apellidos</label>
                                    <input type="text" class="form-control mobile-placeholder" name="inpapellido"
                                        id="inpapellido" required
                                        style="height: 40px; background-color: #E5E5E5; border-radius: 1.25rem; border-color: #E5E5E5;"
                                        placeholder="Ingrese su Apellido Completo">
                                </div>

                                <div class="col-12 fxt-transformY-50 fxt-transition-delay-1" style="display: block;">
                                    <label for="Numero" class="form-label" style="margin-left: 20px; ">Teléfono</label>
                                    <input type="text" class="form-control mobile-placeholder" name="inpnumero"
                                        id="inpnumero" required
                                        style="height: 40px; background-color: #E5E5E5; border-radius: 1.25rem; border-color: #E5E5E5;"
                                        placeholder="Ingrese su Número de Teléfono">
                                </div>

                                <div class="col-12 fxt-transformY-50 fxt-transition-delay-1" style="display: block;">
                                    <label for="Correo" class="form-label" style="margin-left: 20px; ">Correo</label>
                                    <input type="text" class="form-control mobile-placeholder" name="inpcorreo"
                                        id="inpcorreo" required
                                        style="height: 40px; background-color: #E5E5E5; border-radius: 1.25rem; border-color: #E5E5E5;"
                                        placeholder="Ingrese su Correo Electrónico">
                                </div>

                                <div class="col-12 fxt-transformY-50 fxt-transition-delay-1" style="display: block;">
                                    <label for="Usuario" class="form-label" style="margin-left: 20px; ">Usuario</label>
                                    <input type="text" class="form-control mobile-placeholder" name="usuario"
                                        id="usuario" required
                                        style="height: 40px; background-color: #E5E5E5; border-radius: 1.25rem; border-color: #E5E5E5;"
                                        placeholder="Ingrese un nombre de Usuario">
                                </div>

                                <div class="col-12">
                                    <label for="contraseña" class="form-label"
                                        style="margin-left: 20px; margin-bottom: 5px; margin-top: 10px;">Contraseña</label>
                                    <input type="password" class="form-control mobile-placeholder" name="contraseña"
                                        id="contraseña" required
                                        style="height: 40px; background-color: #E5E5E5; border-radius: 1.25rem; border-color: #E5E5E5;"
                                        placeholder="Ingrese su Contraseña">
                                </div>

                                <div class="col-12">
                                    <label for="contraseña2" class="form-label"
                                        style="margin-left: 20px; margin-bottom: 5px; margin-top: 10px;">Contraseña</label>
                                    <input type="password" class="form-control mobile-placeholder" name="contraseña2"
                                        id="contraseña" required
                                        style="height: 40px; background-color: #E5E5E5; border-radius: 1.25rem; border-color: #E5E5E5;"
                                        placeholder="Vuelva a ingresar su Contraseña">
                                </div>
                                <div class="col-12 d-flex justify-content-around" style="margin-top: 10px;">
                                    <a href="javascript:void(0)" id="btn-volver-login"
                                        style="font-size: 0.9rem; color: #035da4; text-decoration: none; font-weight: 500;">
                                        ¿Tienes una cuenta? Inicia Sesión
                                    </a>
                                </div>

                                <div class="col-12">
                                    <h6 id="mensaje" class="text-danger"><?= @$_GET['m'] ?></h6>
                                    <input type="hidden" id="url" value="<?= $url ?>">
                                </div>
                                <div class="col-12">

                                    <button id="btnregistrar" class="btn btn-lg w-100 mt-2" type="submit"
                                        style="background-color: #FF7601; border-radius: 1.25rem; color: white; border: 2px solid #FF7601; transition: 0.3s;"
                                        onmouseover="this.style.backgroundColor='white'; this.style.color='#FF7601'"
                                        onmouseout="this.style.backgroundColor='#FF7601'; this.style.color='white'"
                                        onclick="realizar_registro(event)">
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
                            <div class="text-center">
                                <h6 class="" style="font-size: 0.9rem; color: #035da4;">O ingresar por</h6>
                                <div class="d-flex justify-content-center gap-3">
                                    <!-- Google -->
                                    <a href="<?= @$loginURL; ?>"
                                        class="btn rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 44px; height: 44px; border: 2px solid #0070B4; background-color: white; transition: 0.3s;"
                                        onmouseover="this.style.backgroundColor='#007FCC'; this.querySelector('img').style.filter='brightness(0) invert(1)'"
                                        onmouseout="this.style.backgroundColor='white'; this.querySelector('img').style.filter='none'">
                                        <img src="<?= base_url() ?>/application/assets/assets/media/image/iconogoogle.svg"
                                            style="width:20px;">
                                    </a>
                                    <!-- <a class="btn rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 44px; height: 44px; border: 2px solid #0070B4; background-color: white; transition: 0.3s;"
                                        onmouseover="this.style.backgroundColor='#007FCC'; this.querySelector('img').style.filter='brightness(0) invert(1)'"
                                        onmouseout="this.style.backgroundColor='white'; this.querySelector('img').style.filter='none'"
                                        id="btnloginwhatsapp">
                                        <img src="<?= base_url() ?>/application/assets/assets/media/image/iconowhatsapp.svg"
                                            style="width:20px;">
                                    </a> -->

                                    <!-- <a href="realizar_login_invitado()"
                                        class="btn rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 44px; height: 44px; border: 2px solid #0070B4; background-color: white; transition: 0.3s;"
                                        onmouseover="this.style.backgroundColor='#007FCC'; this.querySelector('img').style.filter='brightness(0) invert(1)'"
                                        onmouseout="this.style.backgroundColor='white'; this.querySelector('img').style.filter='none'"
                                        id="btnlogininvitado">
                                        <img src="<?= base_url() ?>/application/assets/assets/media/image/iconoinvitado.png"
                                            style="width:20px;">
                                    </a> -->
                                </div>
                            </div>

                        </form>
                        <input type="hidden" id="url" value="<?= $url ?>">

                        <form id="form_whatsapp" style="display: none;">
                            <div class="row">

                                <div class="col-12 fxt-transformY-50 fxt-transition-delay-1" style="display: block;">
                                    <label for="Numero" class="form-label" style="margin-left: 20px; ">Teléfono</label>
                                    <input type="text" class="form-control mobile-placeholder" name="inpnumero2"
                                        id="inpnumero2" required
                                        style="height: 40px; background-color: #E5E5E5; border-radius: 1.25rem; border-color: #E5E5E5;"
                                        placeholder="Ingrese su Número de Teléfono">
                                </div>
                                <div class="col-12 fxt-transformY-50 fxt-transition-delay-1" style="display: block;">
                                    <label for="Correo" class="form-label" style="margin-left: 20px; ">Correo</label>
                                    <input type="text" class="form-control mobile-placeholder" name="inpcorreo2"
                                        id="inpcorreo2" required
                                        style="height: 40px; background-color: #E5E5E5; border-radius: 1.25rem; border-color: #E5E5E5;"
                                        placeholder="Ingrese su Correo Electrónico">
                                </div>

                                <div class="col-12 d-flex justify-content-around" style="margin-top: 10px;">
                                    <a href="" id="recuperarcontra"
                                        style="font-size: 0.9rem; color: #035da4; text-decoration: none; font-weight: 500;">
                                        ¿Olvidaste tu contraseña?
                                    </a>
                                    <a href="" id="btn-volver-login"
                                        style="font-size: 0.9rem; color: #035da4; text-decoration: none; font-weight: 500;">
                                        Inicia Sesión
                                    </a>
                                </div>

                                <div class="col-12">
                                    <h6 id="mensaje" class="text-danger"></h6>
                                    <input type="hidden" id="url" value="<?= $url ?>">
                                </div>
                                <div class="col-12">
                                    <button id="btnwhatsapp" class="btn btn-lg w-100"
                                        style="background: linear-gradient(to right, #FF9A3D, #FF7601); border-radius: 1.25rem; color: white; border: 2px solid #FF7601; transition: 0.3s;"
                                        onmouseover="this.style.backgroundColor='white'; this.style.color='#FF7601'"
                                        onmouseout="this.style.backgroundColor='#FF7601'; this.style.color='white'"
                                        onclick="ObtenerPin(event)" type="submit">
                                        Obtener PIN
                                    </button>

                                    <button id="btncarga" class="btn btn-lg w-100 mt-2" type="button"
                                        style="display:none; background-color: #FF7601; border-radius: 1.25rem; color: white; border: 2px solid #FF7601;"
                                        disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Verificando...
                                    </button>
                                </div>
                            </div>
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
                            </div>
                        </form>
                        <form id="form_recuperar_contra_whatsapp" style="display: none;">
                            <div class="row">

                                <div class="col-12 fxt-transformY-50 fxt-transition-delay-1 margins" style="display: block;">
                                    <label for="Numero" class="form-label" style="margin-left: 20px; ">Teléfono</label>
                                    <input type="text" class="form-control mobile-placeholder" name="inpnumero3"
                                        id="inpnumero3" required
                                        style="height: 40px; background-color: #E5E5E5; border-radius: 1.25rem; border-color: #E5E5E5;"
                                        placeholder="Ingrese su Número de Teléfono">
                                </div>
                                <div class="col-12 fxt-transformY-50 fxt-transition-delay-1 margins" style="display: block;">
                                    <label for="Correo" class="form-label" style="margin-left: 20px; ">Correo</label>
                                    <input type="text" class="form-control mobile-placeholder" name="inpcorreo3"
                                        id="inpcorreo3" required
                                        style="height: 40px; background-color: #E5E5E5; border-radius: 1.25rem; border-color: #E5E5E5;"
                                        placeholder="Ingrese su Correo Electrónico">
                                </div>

                                <div class="col-12 d-flex justify-content-around" style="margin-top: 10px;">
                                    <a href="" id="btn-volver-login"
                                        style="font-size: 0.9rem; color: #035da4; text-decoration: none; font-weight: 500;">
                                        ¿Tienes una cuenta? Inicia Sesión
                                    </a>
                                </div>

                                <div class="col-12">
                                    <h6 id="mensaje3" class=""></h6>
                                    <input type="hidden" id="url" value="<?= $url ?>">
                                </div>
                                <div class="col-12">

                                    <button id="btnrecuperar" class="btn btn-lg w-100"
                                        style="background: linear-gradient(to right, #FF9A3D, #FF7601); border-radius: 1.25rem; color: white; border: 2px solid #FF7601; transition: 0.3s;"
                                        onmouseover="this.style.backgroundColor='white'; this.style.color='#FF7601'"
                                        onmouseout="this.style.backgroundColor='#FF7601'; this.style.color='white'"
                                        onclick="RecuperarContraseñaWhatsapp(event)" type="submit">
                                        Pedir nueva Contraseña
                                    </button>

                                    <button id="btncarga" class="btn btn-lg w-100 mt-2" type="button"
                                        style="display:none; background-color: #FF7601; border-radius: 1.25rem; color: white; border: 2px solid #FF7601;"
                                        disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Verificando...
                                    </button>
                                </div>
                            </div>
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
                            </div>
                        </form>

                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (window.innerWidth <= 768) { // Puedes ajustar el tamaño según necesidad
                document.getElementById("usuario").placeholder = "Ingresa tu usuario";
                document.getElementById("contraseña").placeholder = "Ingresa tu contraseña";
            }
        });
        document.getElementById("recuperar-contra").addEventListener("click", function () {
            console.log("recuperar-contra");
            document.getElementById("form_register").style.display = "none";
            document.getElementById("form_login").style.display = "none";
            document.getElementById("form_whatsapp").style.display = "none";
            document.getElementById("form_recuperar_contra_whatsapp").style.display = "block";
        });
        document.getElementById("btn-crear-cuenta").addEventListener("click", function () {
            document.getElementById("form_login").style.display = "none";
            document.getElementById("form_whatsapp").style.display = "none";
            document.getElementById("form_recuperar_contra_whatsapp").style.display = "none";
            document.getElementById("form_register").style.display = "block";

            // Ocultar todos los labels del form_register
            document.querySelectorAll("#form_register label").forEach(label => {
                label.style.display = "none";
            });
            const divs = document.querySelectorAll('.col-12');
            divs.forEach(div => {
                div.style.marginTop = '10px'; // Añadimos margin-top
            });
        });

        document.getElementById("btn-volver-login").addEventListener("click", function () {
            document.getElementById("form_register").style.display = "none";
            document.getElementById("form_whatsapp").style.display = "none";
            document.getElementById("form_recuperar_contra_whatsapp").style.display = "none";
            document.getElementById("form_login").style.display = "block";
        });
        // document.getElementById("btnloginwhatsapp").addEventListener("click", function () {
        //     document.getElementById("form_register").style.display = "none";
        //     document.getElementById("form_login").style.display = "none";
        //     document.getElementById("form_recuperar_contra_whatsapp").style.display = "none";
        //     document.getElementById("form_whatsapp").style.display = "block";
        // });


        function realizar_login(event) {
            // event.preventDefault(); // ✅ esto evita el refresh del form
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

                            console.log(urlsucces);
                            window.location.href = urlsucces;
                            //location.reload();

                        } else {
                            $("#mensaje").css("color", "red");
                            $("#mensaje").text(response.mensaje);

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
        function realizar_registro(event) {
            event.preventDefault(); // ✅ esto evita el refresh del form
            var datos = $("#form_register").serialize();
            var urlajax = $("#url").val() + "login_registro";
            var urlsucces = $("#url").val() + "pagorapido";
            console.log(datos);
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
        function realizar_login_invitado() {
            var urlajax = $("#url").val() + "login_invitado";
            console.log(urlajax);
            var datos = $("#form_login").serialize();
            var urlsucces = $("#url").val() + "pagorapido";

            $.ajax({
                url: urlajax,
                data: { datos },
                type: 'POST',
                dataType: "json",
                beforeSend: function () {
                    $("#mensaje").text('...');
                    //   $("#btncarga").show();
                    //  $("#btnlogininvitado").hide();

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
                    //    $("#btnlogininvitado").show();
                    //  $("#btncarga").hide();
                },
            });
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
        function RecuperarContraseñaWhatsapp(event) {
            event.preventDefault(); // ✅ esto evita el refresh del form
            var datos = $("#form_recuperar_contra_whatsapp").serialize();
            console.log(datos);
            var urlajax = $("#url").val() + "cambiarcontrasenawhastapp";
            //var urlsucces=$("#url").val()+"pagorapido";   
            if ($("#inpnumero3").val().length > 0 && $("#inpcorreo3").val().length > 0) {
                $.ajax({
                    url: urlajax,
                    data: { datos },
                    type: 'POST',
                    dataType: "json",
                    beforeSend: function () {
                        $("#mensaje3").text('...');
                        $("#btncarga").show();
                        $("#btnlogin").hide();
                    },
                    success: function (response) {

                        console.log(response);
                        console.log(response.error);
                        console.log(response.message);

                        if (response.error == 1) {
                            $("#mensaje3").css("color", "red");
                            $("#mensaje3").text(response.message);

                        }
                        if (response.error == 0) {
                            $("#mensaje3").css("color", "green");
                            $("#mensaje3").text(response.message);
                            //location.reload();

                            $("#contraseña").val('');
                        }
                    },
                    error: function (data) {
                        //console.log(data);
                        $("#mensaje3").css("color", "red");
                        $("#mensaje3").text('A ocurrido algun error en el sistema o la conexion de internet');

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

        function ObtenerPin(event) {
            event.preventDefault(); // ✅ esto evita el refresh del form
            var datos = $("#form_whatsapp").serialize();
            var urlajax = $("#url").val() + "obtenerpiningreso";
            if ($("#inpnumero2").val().length > 0 && $("#inpcorreo2").val().length > 0) {
                $.ajax({
                    url: urlajax,
                    data: { datos },
                    type: 'POST',
                    dataType: "json",
                    beforeSend: function () {
                        $("#mensaje").text('...');
                    },
                    success: function (response) {
                        console.log(response);
                        console.log(response.estado);
                        console.log(response.mensaje);
                        if (response.estado == 0) {
                            $("#mensaje").text(response.mensaje);
                            $('#btnloginwhatsapp').show();
                            $('#btnwhatsapp').hide();
                            $('#inpcorreo2').hide();
                            $("#inpnumero2").attr("placeholder", "Pin");
                            $("#inpnumero2").val("");
                        } else {
                            $("#mensaje").text(response.mensaje);
                        }
                    },
                    error: function (data) {
                        //console.log(data);
                        $("#mensaje").css("color", "red");
                        $("#mensaje").text('A ocurrido algun error en el sistema o la conexion de internet');

                    },
                    complete: function () {
                        //$("#waitLoadinglogin").fadeOut(1000);  
                    },
                });
            } else {
                //alert("Falta rellenar datos ");
                $("#mensaje").css("color", "red");
                $("#mensaje").text('Falta Rellenar datos ');
            }
        }
        function VerificarPin() {
            var datos = $("#form_login").serialize();
            var urlajax = $("#url").val() + "verificarpin";
            var urlsucces = $("#url").val() + "pagorapido";
            if ($("#inpnumero").val().length > 0) {
                $.ajax({
                    url: urlajax,
                    data: { datos },
                    type: 'POST',
                    dataType: "json",
                    beforeSend: function () {
                        $("#mensaje").text('...');
                    },
                    success: function (response) {
                        console.log(response);
                        console.log(response.estado);
                        if (response.estado == 0) {
                            $("#mensaje").text(response.mensaje);
                            window.location.href = urlsucces;
                        } else {
                            $("#mensaje").text(response.mensaje);
                        }
                    },
                    error: function (data) {
                        //console.log(data);
                        $("#mensaje").css("color", "red");
                        $("#mensaje").text('A ocurrido algun error en el sistema o la conexion de internet');
                    },
                    complete: function () {
                        //$("#waitLoadinglogin").fadeOut(1000);  
                    },
                });
            } else {
                //alert("Falta rellenar datos ");
                $("#mensaje").css("color", "red");
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