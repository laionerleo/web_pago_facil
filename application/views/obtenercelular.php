<!doctype html>
<html lang="en">
<?php $this->load->view('theme/head'); ?>
<body  class="">

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<!-- BEGIN: Sidebar Group -->
<div class="sidebar-group">

    <!-- BEGIN: User Menu -->
  <?php  $this->load->view('theme/menu_lateral_derecho');   ?>
    <!-- END: User Menu -->

    <!-- BEGIN: Settings -->
    <?php  $this->load->view('theme/menu_lateral_configuraciones');   ?>
   
    <!-- END: Settings -->

</div>
<!-- END: Sidebar Group -->

<!-- begin::main -->
<div class="layout-wrapper">

    <!-- begin::header -->
    <?php  $this->load->view('theme/header'); ?>
    <!-- end::header -->

    <div class="content-wrapper">

        <!-- begin::navigation -->
     <?php $this->load->view('theme/menu_lateral_izquierdo');   ?>
        <!-- end::navigation -->

        <div class="content-body">

            <div class="content">
                <div class="page-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href=index-2.html>E-commerce</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    <button id="getPhoneNumberButton">Obtener Número de Teléfono</button>
                            <p id="phoneNumberDisplay"></p>
                    </div>
                </div>
            </div>

            <!-- begin::footer -->
         <?php $this->load->view('theme/footer');  ?>
            <!-- end::footer -->

        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
    var getPhoneNumberButton = document.getElementById("getPhoneNumberButton");
    var phoneNumberDisplay = document.getElementById("phoneNumberDisplay");
    
    getPhoneNumberButton.addEventListener("click", function() {
        if ('contacts' in navigator) {
            alert("ingreso aqui ");
            var contactProperties = ['name', 'tel'];
            alert("segundo ");
            alert(contactProperties);
            navigator.contacts.select(contactProperties, function(contacts) {
                alert(contacts );
               
                if (contacts.length > 0) {
                    var phoneNumber = contacts[0].tel[0].value;
                    phoneNumberDisplay.textContent = "Tu número de teléfono es: " + phoneNumber;
                } else {
                    phoneNumberDisplay.textContent = "No se seleccionó un número de teléfono.";
                }
            });
        } else {
            phoneNumberDisplay.textContent = "La API de contactos no es compatible con este dispositivo.";
        }
    });
});
        </script>

    </div>

</div>
<!-- end::main -->

<!-- Plugin scripts -->
  
  <?php $this->load->view('theme/js');  ?>
</body>


</html>
