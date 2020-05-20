

<div class="card">
    <div  class="card-body">
        <?php if(count($clientes->values) >0 ){ ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Otros </th>
                    <th>opciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php  for ($i=0; $i <  count($clientes->values) ; $i++) { ?>
                        <tr>
                            <td><?= $clientes->values[$i]->nombre ?></td>
                            <td><?= $clientes->values[$i]->direccion ?></td>
                            <td><?= $clientes->values[$i]->uvMzaLote ?></td>
                            <td> <button class="btn btn-primary" >Consultar deuda</button></td>
                        </tr>
                    <?php    }  ?>
            
                
            </table>
        </div>
                    <?php  }else{
                        echo "no hay resultados";
                    } ?>
    </div>
</div>