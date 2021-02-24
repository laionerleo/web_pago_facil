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
        <?php if(count($clientes->values) >0 ){ ?>
            <div class="table-responsive">
                <table id="tablaclientes" class="table table-striped table-bordered">
                <thead id="theadclientes" >
                <tr >
                    <th>Codigo Fijo</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Otros </th>
                    <th>opciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php  for ($i=0; $i <  count($clientes->values) ; $i++) { ?>
                        <tr  class="fila_clientes" > 
                        
                            <td  data-title="Codigo Fijo"><?= $clientes->values[$i]->codigoClienteEmpresa ?></td>
                            <td  data-title="Nombre" ><?= $clientes->values[$i]->nombre ?></td>
                            <td  data-title="Direccion" ><?= $clientes->values[$i]->direccion ?></td>
                            <td  data-title="Otros" ><?= $clientes->values[$i]->uvMzaLote ?></td>
                            <td  data-title="Opciones" > <button class="btn btn-primary"  onclick="facturaspendientes(<?= $clientes->values[$i]->codigoClienteEmpresa ?>)">Consultar deuda</button></td>
                        </tr>
                    <?php    }  ?>
            
                
                </table>
            </div>
                    <?php  }else{
                        
                        echo $clientes->message;
                    
                    
                    } ?>
    </div>
</div>
<script>
    $('html, body').animate({scrollTop: $("#cardlistaclientes").offset().top }, 2000);
</script>