<style>
		/*
	Max width before this PARTICULAR table gets nasty. This query will take effect for any screen smaller than 760px and also iPads specifically.
	*/
	@media
	  only screen 
    and (max-width: 760px), (min-device-width: 768px) 
    and (max-device-width: 1024px)  {
		#tablaclientes{
           width:100%;
		   border: 1px solid black;
       }
       #theadclientes {
           display: none;
       }
       tr:nth-of-type(2n) {
           background-color: inherit;
		   
       }
       .fila_clientes td:first-child {
           background: #2a67cc;
           font-weight:bold;
           font-size:1.5em;
		   border: 1px solid black;
		   
       }
       .fila_clientes td {
           display: block;
           text-align:center;
		   
       }
       .fila_clientes td:before {
           content: attr(data-title);
           display: block;
		   text-align:center;
		   
       }
	}
</style>

<div class="card" id="cardlistaclientes" >
    <div  class="card-body">
        
            <div class="table-responsive">
                <table id="tablaclientes" class="table table-striped table-bordered">


                <thead id="theadclientes" >
                    <tr>
                        <?php if(isset($clientes[0]->Sistema)){ ?>
                            <th> Sistema</th>
                        <?php    }  ?>

                        <th> <?=  $titulo ?> </th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Otros </th>
                        <th>opciones</th>
                    </tr>
                </thead>
                <tbody>
                        <?php  for ($i=0; $i <  count($clientes) ; $i++) { ?>
                            <tr  class="fila_clientes" >                       
                                    <?php if(isset($clientes[$i]->Sistema)){ ?> 
                                        <td  data-title="sistema"><?= $clientes[$i]->NombreSistema ?></td>
                                    <?php    }  ?>  
                                <td  data-title="<?=  $titulo ?>"><?= $clientes[$i]->codigoClienteEmpresa ?></td>
                                <td  data-title="Nombre" ><?= $clientes[$i]->nombre ?></td>
                                <td  data-title="Direccion" ><?= $clientes[$i]->direccion ?></td>
                                <td  data-title="Otros" ><?= $clientes[$i]->uvMzaLote ?></td>
                                <td  data-title="Opciones" >                                     
                                 
                                        <button class="btn btn-primary "  onclick="facturaspendientesmultiple(<?= $i ?>)"> consultar deuda </button>
                                        <?php if($etiquetas->EtiquetaAviso != "" ){ ?> 
                                            <button class="btn btn-primary "  onclick="veraviso('2024-ENE', '<?= $clientes[$i]->codigoClienteEmpresa ?>')">  <?= $etiquetas->EtiquetaAviso ?>  </button>    
                                        <?php    }  ?>
                                    
                                    
                                </td>
                            </tr>
                        <?php    }  ?>
                </tbody>
                

                </table>
                <center>
                    <p>
                        <?=  $mensaje    ?>
                    </p>
                </center>
               
             
            </div>
                    
    </div>
</div>

<div id="vysorpdfbody">

</div>
<script>
    $('html, body').animate({scrollTop: $("#cardlistaclientes").offset().top }, 2000);
    

    function veraviso(idfactura, lcCodigoClienteEmpresa)
    {
        //
    // var idfactura= $("#periodo").val();
        console.log("veraviso");
        var tipo ;
        console.log(screen.width);
            if(screen.width>=1025)
            {
                tipo =1
            }else{
                tipo=2;
            }
        var datos= { idfactura:idfactura , tipo:tipo  , lnEmpresa:empresa_id  , lcCodigoClienteEmpresa:lcCodigoClienteEmpresa};
        var urlajax=$("#url").val()+"vysoravisopdfactualizado";          
        $("#vysorpdfbody").empty();
        $("#vysorpdfbody").append(`<div class="d-flex justify-content-center">
                                    <div class="spinner-border" style="width: 5rem; height: 5rem;"  role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <br>
                                `);
           $('html, body').animate({scrollTop: $("#vysorpdfbody").offset().top }, 2500);
        $("#vysorpdfbody").load(urlajax,{datos});  
        //$("#vysorpdf-tab").click(); 
     
    
    
        
    }
</script>