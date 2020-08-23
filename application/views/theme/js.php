<script src="<?=  base_url() ?>/application/assets/vendors/bundle.js"></script>
    <!-- Apex chart -->
    <script src="<?=  base_url() ?>/application/assets/apexcharts.com/samples/assets/irregular-data-series.js"></script>
    <script src="<?=  base_url() ?>/application/assets/vendors/charts/apex/apexcharts.min.js"></script>

    <!-- Daterangepicker -->
    <script src="<?=  base_url() ?>/application/assets/vendors/datepicker/daterangepicker.js"></script>

    <!-- DataTable -->
    <script src="<?=  base_url() ?>/application/assets/vendors/dataTable/datatables.min.js"></script>

    <!-- Dashboard scripts -->
    <script src="<?=  base_url() ?>/application/assets/assets/js/examples/dashboard.js"></script>

    <!-- Vamp -->
    <script src="<?=  base_url() ?>/application/assets/vendors/vmap/jquery.vmap.min.js"></script>
    <script src="<?=  base_url() ?>/application/assets/vendors/vmap/maps/jquery.vmap.usa.js"></script>
    <script src="<?=  base_url() ?>/application/assets/assets/js/examples/vmap.js"></script>
    <script src="<?=  base_url() ?>/application/assets/vendors/slick/slick.min.js"></script>
    <script src="<?=  base_url() ?>/application/assets/assets/js/examples/slick.js"></script>
    <script src="<?=  base_url() ?>/application/assets/assets/js/examples/sweet-alert.js"></script>
    <script src="<?=  base_url() ?>/application/assets/vendors/prism/prism.js"></script>

    <!-- To use theme colors with Javascript -->
    <div class="colors">
        <div class="bg-primary"></div>
        <div class="bg-primary-bright"></div>
        <div class="bg-secondary"></div>
        <div class="bg-secondary-bright"></div>
        <div class="bg-info"></div>
        <div class="bg-info-bright"></div>
        <div class="bg-success"></div>
        <div class="bg-success-bright"></div>
        <div class="bg-danger"></div>
        <div class="bg-danger-bright"></div>
        <div class="bg-warning"></div>
        <div class="bg-warning-bright"></div>
    </div>

    <script src="<?=  base_url() ?>/application/assets/assets/js/examples/pages/ecommerce-dashboard.js"></script>


    <!-- App scripts -->
  <script src="<?=  base_url() ?>/application/assets/assets/js/app.min.js"></script>
  <script>
    var rubros;
    var empresaspagadas;
    

function cargarrubros()
        {
         
 
                var datos= {ci:0};
                var urlajax=$("#url").val()+"getrubros"; 
            
                $.ajax({                    
                        url: urlajax,
                        data: {datos},
                        type : 'POST',
                        dataType: "json",
                        
                            beforeSend:function( ) {   
                            
                            },                    
                            success:function(response) {
                            rubros= response;
                            console.log(response);
                            cargarmenupagorealizados();
                            },
                            error: function (data) {
                                console.log(data);
                                
                            },               
                            complete:function( ) {
                                
                            },
                        });  

       
        }

        function cargarempresaspagadas()
        {
         
 
                var datos= {ci:0};
                var urlajax=$("#url").val()+"getempresaspagadasfrecuentes"; 
            
                $.ajax({                    
                        url: urlajax,
                        data: {datos},
                        type : 'POST',
                        dataType: "json",
                        
                            beforeSend:function( ) {   
                            
                            },                    
                            success:function(response) {
                            console.log(response);
                            empresaspagadas=response;
                            

                            },
                            error: function (data) {
                                console.log(data);
                                
                            },               
                            complete:function( ) {
                                
                            },
                        });  

       
        }
        function cargarmenupagorealizados()
        {
          console.log(rubros.length);
          console.log(rubros[0].nTipoEmpresa);
          var urlajax=$("#url").val()+"pagosrealizados/"; 
          
          for (let i = 0; i < rubros.length; i++) {
            console.log(rubros[i]);
            var elemento=`<li> <a  href="" >`+  rubros[i].nNombre +` </a>   <ul>`;
            for (let j = 0; j < empresaspagadas.length; j++) {
              if(empresaspagadas[j].nTipoEmpresa==rubros[i].nTipoEmpresa)
              {
               // console.log("entro en " +j+"del rubro :"+i);
                elemento=elemento+`<li> <a href="`+urlajax+ empresaspagadas[j].nEmpresa+`">`+empresaspagadas[j].cDescripcion +`</a></li>`;
                console.log(elemento);
              }
              
            }
            elemento= elemento+`</ul>  </li>`;
            console.log(elemento);
            $("#listarubros").append(elemento);
            
          }
          

        }
          
        $(document).ready(function() {
            cargarempresaspagadas();
            cargarrubros();

            
            
            
            });
 
  </script>
  