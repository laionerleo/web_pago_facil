<!doctype html>
<html class="no-js" lang="">


<!-- Mirrored from affixtheme.com/html/xmee/demo/register-23.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jun 2020 20:13:15 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Pago facil</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/application/assets/login/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/application/assets/login/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/application/assets/login/css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="font/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="../../../../fonts.googleapis.com/css89ea.css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/application/assets/login/style.css">
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->      
    <section class="fxt-template-animation fxt-template-layout23" data-bg-image="<?= base_url() ?>/application/assets/assets/media/image/BanerPagoFacil.jpg">          
        <div class="fxt-bg-overlay" data-bg-image="<?= base_url() ?>/application/assets/assets/media/image/BanerPagoFacil.jpg">
            <div class="fxt-content">
                <div class="fxt-header">
                    <a href="login-23.html" class="fxt-logo"><img src="<?= base_url() ?>/application/assets/assets/media/image/logo-pagofacil.png" alt="Logo"></a> 
                </div>                            
                <div class="fxt-form"> 
                    
                    <form id="form_login">
                        <div class="form-group"> 
                            <div class="fxt-transformY-50 fxt-transition-delay-1">                                              
                                <input type="text" id="usuario" name="usuario" class="form-control" name="name" placeholder="Name" required="required" style="color: Black;opacity: 1;"   >
                            </div>
                        </div>
                      
                        <div class="form-group">  
                            <div class="fxt-transformY-50 fxt-transition-delay-2">                                              
                                <input id="contraseña" name ="contraseña" type="password" class="form-control" placeholder="********" required="required" style="color: Black;opacity: 1;" >
                                <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="fxt-transformY-50 fxt-transition-delay-3">
                                        
                                        <h5 id="mensaje" > <?=@$_GET['m']?></h5>
                                        <input type="hidden" id ="url" value="<?= $url ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="fxt-transformY-50 fxt-transition-delay-4">  
                                <input type="button" class="fxt-btn-fill" name="" id="" onclick="realizar_login()" value="Login">
                            </div>
                        </div>
                    </form>                
                </div> 
                <div class="fxt-style-line"> 
                    <div class="fxt-transformY-50 fxt-transition-delay-5">                                
                        
                    </div>
                </div>
                <ul class="fxt-socials">
                <li class="fxt-google">
                        <div class="fxt-transformY-50 fxt-transition-delay-6">  
                        <a href="<?php echo $loginURL; ?>" title="google"><i class="fab fa-google" style="color: #040404;" ></i><span style="color: #040404;">Google</span></a>
                        </div>
                    </li>                                    
                
                    <li class="fxt-facebook"><div class="fxt-transformY-50 fxt-transition-delay-8">  
                        <a href="<?php echo $authURL; ?>" title="Facebook"><i class="fab fa-facebook-f"></i><span>Facebook</span></a>
                        </div>
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
            var urlsucces=$("#url").val()+"inicio";   
                 
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
                        alert("se logueo con exito");
                        window.location.href = urlsucces;
                        //location.reload();
                        
                    }else{
                        $("#mensaje").text('usuario o contraseña incorrectos');
                       
                    }
                    
                },
                error: function (data) {
                    //console.log(data);
                    $("#mensaje").text('usuario o contraseña incorrectos');
                  
                },               
                complete:function( ) {
                    //$("#waitLoadinglogin").fadeOut(1000);  
                },
            }
            ); 

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

</body>


<!-- Mirrored from affixtheme.com/html/xmee/demo/register-23.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jun 2020 20:13:15 GMT -->
</html>