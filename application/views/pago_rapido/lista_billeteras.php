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
    <center><label for=""><?= @$tcTitulo ?></label></center>
        <?php if(count($billeteras) >0 ){ ?>
            <div class="table-responsive">
                <table id="tablaclientes" class="table table-striped table-bordered">
                <thead id="theadclientes" >
                <tr >
                    <th>Billetera </th>
                    <th>Nombre</th>
                    <?php if($billeteras[0]->nombreEstablecimiento!= ""){ ?>
                    <th>Establecimiento</th>
                    <?php } ?>
                    <?php if($billeteras[0]->Saldo!= ""){ ?>
                    <th>Saldo </th>
                    <?php } ?>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php  for ($i=0; $i <  count($billeteras) ; $i++) { ?>
                        <tr  class="fila_clientes" > 
                        
                            <td  data-title="Billetera"><?= $billeteras[$i]->idBilletera ?></td>
                            <td  data-title="Nombre" ><?= $billeteras[$i]->NombreCliente ?></td>
                            <?php if($billeteras[$i]->nombreEstablecimiento!= ""){ ?>
                            <td  data-title="Establecimiento" ><?= @$billeteras[$i]->nombreEstablecimiento ?></td>
                            <?php } ?>
                            <?php if($billeteras[$i]->Saldo!= ""){ ?>
                            <td  data-title="Saldo" ><?= @$billeteras[$i]->Saldo ?></td>
                            <?php } ?>
                            <td  data-title="Opciones" >
                                 <button class="btn btn-primary" onclick="vistarecarga(<?= $billeteras[$i]->idBilletera ?>)"  >Realizar recarga</button>
                                 
                            </td>
                        </tr>
                    <?php    }  ?>
            
                
                </table>
                <center>Elegir Billetera que va a recargar </center>
            </div>
                    <?php  }else{
                        echo "no hay resultados";
                    } ?>
    </div>
</div>
<script>
    $('html, body').animate({scrollTop: $("#cardlistaclientes").offset().top }, 2000);
</script>