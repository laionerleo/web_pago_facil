<script src="<?=  base_url() ?>/application/assets/vendors/bundle.js"></script>
    <!-- Apex chart -->
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

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfY0ZivhLSc_UvIab1HC09cdDlXCgcK0w&callback=initMap">
    </script>
    <!-- App scripts -->
  <script src="<?=  base_url() ?>/application/assets/assets/js/app.min.js"></script>
  <script>
    var rubros;
    var empresaspagadas;
    var allemppresas;
    var metodosdepago;
    

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
                            //console.log(response);
                           // cargarmenu();
                            },
                            error: function (data) {
                                console.log(data);
                                
                            },               
                            complete:function( ) {
                                
                            },
                        });  

       
        }
        function cargarallempresas()
        {
                var datos= {empresa_id:0};
                var urlajax=$("#url").val()+"getallempresas"; 
            
                $.ajax({                    
                        url: urlajax,
                        data: {datos},
                        type : 'POST',
                        dataType: "json",
                        
                            beforeSend:function( ) {   
                            
                            },                    
                            success:function(response) {
                              allempresas= response;
                              var url=$("#url").val()+"empresasafiliadas/"; 
                                 
                              for (let i = 0; i < rubros.length; i++) {
                               // console.log(rubros[i]);
                              
                                var elementoempresasafiliadas=`<li> <a  href="" >`+  rubros[i].nNombre +` </a>   <ul>`;
                                
                                for (let j = 0; j < allempresas.length; j++) {
                                  if(allempresas[j].nTipoEmpresa==rubros[i].nTipoEmpresa)
                                  {
                                  elementoempresasafiliadas=elementoempresasafiliadas+`<li> <a href="`+url+ allempresas[j].nEmpresa+`">`+allempresas[j].cDescripcion +`</a></li>`;
                                  }
                                }
                                elementoempresasafiliadas= elementoempresasafiliadas+`</ul>  </li>`;
                                $("#spinerafiliadas").hide();
                                $("#listarubrosempresasafiliadas").append(elementoempresasafiliadas);
                              }




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
                            //console.log(response);
                            empresaspagadas=response;
                            console.log(rubros);
                              var urlajax=$("#url").val()+"pagosrealizados/"; 
                                for (let i = 0; i < rubros.length; i++) {
                                  console.log(rubros[i]);
                                  var elemento=`<li> <a  href="" >`+  rubros[i].nNombre +` </a>   <ul>`;
                                  for (let j = 0; j < empresaspagadas.length; j++) {
                                    if(empresaspagadas[j].nTipoEmpresa==rubros[i].nTipoEmpresa)
                                    {
                                      elemento=elemento+`<li> <a href="`+urlajax+ empresaspagadas[j].nEmpresa+`">`+empresaspagadas[j].cDescripcion +`</a></li>`;
                                    }
                                  }
                                  elemento= elemento+`</ul>  </li>`;
                               
                                  
                                  console.log(elemento);
                                  $("#spinerrealizados").hide();
                                  $("#listarubros").append(elemento);
                               }
                            

                            },
                            error: function (data) {
                                console.log(data);
                                
                            },               
                            complete:function( ) {
                                
                            },
                        });  

       
        }
        function cargarmetodosdepago()
        {
                var datos= {ci:0};
                var urlajax=$("#url").val()+"metodosdepago"; 
            
                $.ajax({                    
                        url: urlajax,
                        data: {datos},
                        type : 'POST',
                        dataType: "json",
                        
                            beforeSend:function( ) {   
                           
                            },                    
                            success:function(response) {
                            //console.log(response);
                            metodosdepago=response;
                            console.log(metodosdepago);
                              var url=$("#url").val()+"comision/"; 
                                for (let i = 0; i < metodosdepago.length; i++) {
                                  console.log(metodosdepago[i]);
                                  var elemento=`<li> <a  href=""   >`+  metodosdepago[i].nombreMetodoPago +` </a>   <ul>`;
                                  elemento=elemento+`<li> <a target="_blank" href="`+metodosdepago[i].url_metodopago+`">Informacion de Metodo de pago </a></li>`;
                                  elemento=elemento+`<li> <a href="`+url+metodosdepago[i].metodoPago+`"> Ver Comisiones por Empresa</a></li>`;
                                 
                                  elemento= elemento+`</ul>  </li>`;
                               
                                  
                                  console.log(elemento);
                                  $("#spinermetodosdepago").hide();
                                 $("#listametodosdepago").append(elemento);
                               }
                            

                            },
                            error: function (data) {
                                console.log(data);
                                
                            },               
                            complete:function( ) {
                                
                            },
                        });  

       
        }
        function cargarmenu()
        {
          
          console.log(rubros);
          console.log(empresaspagadas);
          var urlajax=$("#url").val()+"pagosrealizados/"; 
        
              
            for (let i = 0; i < rubros.length; i++) {
              console.log(rubros[i]);
              var elemento=`<li> <a  href="" >`+  rubros[i].nNombre +` </a>   <ul>`;
              var elementoempresasafiliadas=`<li> <a  href="" >`+  rubros[i].nNombre +` </a>   <ul>`;
              
              for (let j = 0; j < empresaspagadas.length; j++) {
                if(empresaspagadas[j].nTipoEmpresa==rubros[i].nTipoEmpresa)
                {
                // console.log("entro en " +j+"del rubro :"+i);
                  elemento=elemento+`<li> <a href="`+urlajax+ empresaspagadas[j].nEmpresa+`">`+empresaspagadas[j].cDescripcion +`</a></li>`;
                 // elementoempresasafiliadas="";
                }
                
                
              }
              elemento= elemento+`</ul>  </li>`;
              elementoempresasafiliadas= elementoempresasafiliadas+`</ul>  </li>`;
              
              console.log(elemento);
              $("#listarubros").append(elemento);
              $("#listarubrosempresasafiliadas").append(elementoempresasafiliadas);
              
            
          
          }
        }

        function cargarpagofacilentubarrio()
        {
                var datos= {ci:0};
                var urlajax=$("#url").val()+"cargarpagofacilentubarrio"; 

            
                $.ajax({                    
                        url: urlajax,
                        data: {datos},
                        type : 'POST',
                        dataType: "json",
                        
                            beforeSend:function( ) {   
                           
                            },                    
                            success:function(response) {
                            console.log(response);
                            puntoscobranza=response;
                            
                              var url=$("#url").val()+"pagofacilentubarrio/"; 
                             

                                      for (let i = 0; i < puntoscobranza.length; i++) {
                                        console.log(puntoscobranza[i]);
                                        var nombre="";
                                        if(puntoscobranza[i].tipo=="PF")
                                        {
                                          nombre="Billetera PagoFacil";
                                          tipo=1;
                                        }
                                        if(puntoscobranza[i].tipo=="TM")
                                        {
                                          nombre="Punto Tigo Money ";
                                          tipo=2;
                                        }
                                        var elemento=`<ul> <li  id="link-`+i+`" > <a  href="`+url+tipo+` "   >`+ nombre +` </a>   `;
                                        elemento= elemento+`</ul>  </li>`;
                                        $("#spinerpagofacil").hide();
                                        $("#listapuntosdecobranza").append(elemento);

                                        if(puntoscobranza.length ==1)
                                        {
                                          $(window).attr('location',url+tipo)
                                        }
                                  
                                   
                                 
                                 
                                 }
                               
                                 
                            

                            },
                            error: function (data) {
                                console.log(data);
                                
                            },               
                            complete:function( ) {
                                
                            },
                        });  

       
        }
          
        $(document).ready(function() {
            cargarrubros();
           // cargarallempresas();
           // cargarempresaspagadas();
          
           // cargarmenu();

            
            
            
            });
 
  </script>
  