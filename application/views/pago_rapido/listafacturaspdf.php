<table id="tabladetalle" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Periodo</th>
            <th>Monto Total </th>
            <th>Accion </th>

        </tr>
    </thead>
    <tbody>
        <?php for ($j = 0; $j < count($facturaspagadas); $j++) { ?>
            <td>
                <label for=""><?= $facturaspagadas[$j]->periodoaux ?></label>
            </td>
            <td> <?= $facturaspagadas[$j]->montoTotal  ?></td>

            <td>
                <a target="_blank" download="Factura.txt" href="https://serviciopagofacil.syscoop.com.bo/getFacturaEmpresa2/<?= @$tntransaccionDePago ?>/<?= $facturaspagadas[$j]->factura  ?>">Descargar</a>
            </td>

            </tr>

        <?php }  ?>

    </tbody>
    <tfoot>
        <tr>
            <th>Periodo</th>
            <th>NroDePago </th>
            <th>Accion </th>
        </tr>
    </tfoot>
</table>